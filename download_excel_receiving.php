<?php

session_start();

// MEMBATASI HALAMAN LOGIN
if (!isset($_SESSION["login"])) {
    echo "<script>
        alert('Silahkan Login terlebih dahulu');
        document.location.href = 'login.php';
        </script>";
    exit;
}

require 'conf/app.php';

// Pindahkan session_start ke bagian atas
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();

// Mengatur border ke seluruh tabel
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
        ],
    ],
];

$activeWorksheet->getStyle('A3:I3')->applyFromArray($styleArray);

// Menambahkan judul "TABBLE RECEIVING" sebagai judul tabel
$activeWorksheet->setCellValue('A1', 'TABBLE RECEIVING');
$activeWorksheet->mergeCells('A1:I1');

// Mengatur warna latar belakang dan teks pada judul tabel
$activeWorksheet->getStyle('A1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('DDDDDD');
$activeWorksheet->getStyle('A1:I1')->getFont()->setBold(true)->setSize(16)->getColor()->setRGB('000000');
$activeWorksheet->getStyle('A1:I1')->getAlignment()->setHorizontal('center');

$activeWorksheet->setCellValue('A3', 'No');
$activeWorksheet->setCellValue('B3', 'Truck_id');
$activeWorksheet->setCellValue('C3', 'Id_supir');
$activeWorksheet->setCellValue('D3', 'Tanggal');
$activeWorksheet->setCellValue('E3', 'No_count');
$activeWorksheet->setCellValue('F3', 'Jenis_count');
$activeWorksheet->setCellValue('G3', 'Pelayaran');
$activeWorksheet->setCellValue('H3', 'Mitra');
$activeWorksheet->setCellValue('I3', 'Re_maks');

// Query untuk mendapatkan data receiving tanpa kolom 'id_receiving'
$data_receiving = select("SELECT truck_id, id_supir, tanggal, no_count, jenis_count, pelayaran, mitra, re_maks FROM receiving");

// Pastikan $data_receiving adalah objek yang valid sebelum menggunakan metode getHighestRow()
if ($data_receiving) {
    $rowNumber = 1; // Inisialisasi nomor baris
    foreach ($data_receiving as $row) {
        $activeWorksheet->setCellValue('A' . ($rowNumber + 3), $rowNumber); // Kolom "No" diisi dengan nomor baris
        $activeWorksheet->fromArray($row, NULL, 'B' . ($rowNumber + 3)); // Menuliskan data ke dalam lembar kerja Excel
        $rowNumber++;
    }

    $highestRow = $activeWorksheet->getHighestRow();  // Mendapatkan baris tertinggi
    foreach (range('A', 'I') as $column) {
        $activeWorksheet->getColumnDimension($column)->setAutoSize(true);  // Mengatur lebar kolom berdasarkan panjang teks terpanjang di dalamnya
    }
    $activeWorksheet->getStyle('A3:I' . $highestRow)->applyFromArray($styleArray);  // Mengatur border pada seluruh tabel
    $activeWorksheet->getStyle('A3:I3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('CCCCCC'); // Memberi warna latar belakang pada baris header
    $activeWorksheet->getStyle('A3:I3')->getFont()->getColor()->setRGB('000000'); // Memberi warna teks pada baris header
    $activeWorksheet->setAutoFilter('A3:I3'); // Menambahkan filter pada baris header
}

$writer = new Xlsx($spreadsheet);

// Setelah menyimpan file, beri nama file yang diinginkan
$filename = 'TABBLE RECEIVING.xlsx';
$writer->save($filename);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$filename\"");
readfile($filename);

// Hapus file setelah diunduh
unlink($filename);

exit;
?>
