<?php

// Sertakan file db ke database atau metode db yang sesuai
include('conf/app.php');

// Ambil nilai id_delivery dari parameter GET
$id_delivery = isset($_GET['id_delivery']) ? $_GET['id_delivery'] : null;

// Buat query untuk mengambil data delivery berdasarkan id_delivery
$query = "SELECT * FROM delivery";

// Jika id_delivery diberikan, tambahkan kondisi WHERE untuk memfilter hasil
if ($id_delivery !== null) {
    $query .= " WHERE id_delivery = $id_delivery";
}

// Eksekusi query
$result = mysqli_query($db, $query);

// Inisialisasi array untuk menyimpan data delivery
$deliverys = array();

while ($row = mysqli_fetch_assoc($result)) {
    $deliverys[] = $row;
}

// Set header untuk memberi tahu bahwa respons adalah JSON
header('Content-Type: application/json');

// Cek apakah data ditemukan atau tidak
if (empty($deliverys)) {
    echo json_encode(['error' => 'Data tidak ditemukan.']);
} else {
    echo json_encode(['deliverys' => $deliverys]);
}
?>
