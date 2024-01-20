<?php

// Sertakan file db ke database atau metode db yang sesuai
include('conf/app.php');

// Ambil nilai id_receiving dari parameter GET
$id_receiving = isset($_GET['id_receiving']) ? $_GET['id_receiving'] : null;

// Buat query untuk mengambil data receiving berdasarkan id_receiving
$query = "SELECT * FROM receiving";

// Jika id_receiving diberikan, tambahkan kondisi WHERE untuk memfilter hasil
if ($id_receiving !== null) {
    $query .= " WHERE id_receiving = $id_receiving";
}

// Eksekusi query
$result = mysqli_query($db, $query);

// Inisialisasi array untuk menyimpan data receiving
$receivings = array();

while ($row = mysqli_fetch_assoc($result)) {
    $receivings[] = $row;
}

// Set header untuk memberi tahu bahwa respons adalah JSON
header('Content-Type: application/json');

// Cek apakah data ditemukan atau tidak
if (empty($receivings)) {
    echo json_encode(['error' => 'Data tidak ditemukan.']);
} else {
    echo json_encode(['receivings' => $receivings]);
}
?>
