<?php

// Sertakan file db ke database atau metode db yang sesuai
include('conf/app.php');

// Ambil nilai id_buffer dari parameter GET
$id_buffer = isset($_GET['id_buffer']) ? $_GET['id_buffer'] : null;

// Buat query untuk mengambil data buffer berdasarkan id_buffer
$query = "SELECT * FROM buffer";

// Jika id_buffer diberikan, tambahkan kondisi WHERE untuk memfilter hasil
if ($id_buffer !== null) {
    $query .= " WHERE id_buffer = $id_buffer";
}

// Eksekusi query
$result = mysqli_query($db, $query);

// Inisialisasi array untuk menyimpan data buffer
$buffers = array();

while ($row = mysqli_fetch_assoc($result)) {
    $buffers[] = $row;
}

// Set header untuk memberi tahu bahwa respons adalah JSON
header('Content-Type: application/json');

// Cek apakah data ditemukan atau tidak
if (empty($buffers)) {
    echo json_encode(['error' => 'Data tidak ditemukan.']);
} else {
    echo json_encode(['buffers' => $buffers]);
}
?>
