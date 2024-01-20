<?php

// Sertakan file db ke database atau metode db yang sesuai
include('conf/app.php');

// Ambil nilai id_outside dari parameter GET
$id_outside = isset($_GET['id_outside']) ? $_GET['id_outside'] : null;

// Buat query untuk mengambil data outside berdasarkan id_outside
$query = "SELECT * FROM outside";

// Jika id_outside diberikan, tambahkan kondisi WHERE untuk memfilter hasil
if ($id_outside !== null) {
    $query .= " WHERE id_outside = $id_outside";
}

// Eksekusi query
$result = mysqli_query($db, $query);

// Inisialisasi array untuk menyimpan data outside
$outsides = array();

while ($row = mysqli_fetch_assoc($result)) {
    $outsides[] = $row;
}

// Set header untuk memberi tahu bahwa respons adalah JSON
header('Content-Type: application/json');

// Cek apakah data ditemukan atau tidak
if (empty($outsides)) {
    echo json_encode(['error' => 'Data tidak ditemukan.']);
} else {
    echo json_encode(['outsides' => $outsides]);
}
?>
