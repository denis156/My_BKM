<?php

// Sertakan file db ke database atau metode db yang sesuai
include('conf/app.php');

// Ambil nilai id_stripping dari parameter GET
$id_stripping = isset($_GET['id_stripping']) ? $_GET['id_stripping'] : null;

// Buat query untuk mengambil data stripping berdasarkan id_stripping
$query = "SELECT * FROM stripping";

// Jika id_stripping diberikan, tambahkan kondisi WHERE untuk memfilter hasil
if ($id_stripping !== null) {
    $query .= " WHERE id_stripping = $id_stripping";
}

// Eksekusi query
$result = mysqli_query($db, $query);

// Inisialisasi array untuk menyimpan data stripping
$strippings = array();

while ($row = mysqli_fetch_assoc($result)) {
    $strippings[] = $row;
}

// Set header untuk memberi tahu bahwa respons adalah JSON
header('Content-Type: application/json');

// Cek apakah data ditemukan atau tidak
if (empty($strippings)) {
    echo json_encode(['error' => 'Data tidak ditemukan.']);
} else {
    echo json_encode(['strippings' => $strippings]);
}
?>
