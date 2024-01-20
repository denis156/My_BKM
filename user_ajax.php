<?php

// Sertakan file db ke database atau metode db yang sesuai
include('conf/app.php');

// Ambil nilai id_user dari parameter GET
$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : null;

// Buat query untuk mengambil data user berdasarkan id_user
$query = "SELECT * FROM user";

// Jika id_user diberikan, tambahkan kondisi WHERE untuk memfilter hasil
if ($id_user !== null) {
    $query .= " WHERE id_user = $id_user";
}

// Eksekusi query
$result = mysqli_query($db, $query);

// Inisialisasi array untuk menyimpan data user
$users = array();

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

// Set header untuk memberi tahu bahwa respons adalah JSON
header('Content-Type: application/json');

// Cek apakah data ditemukan atau tidak
if (empty($users)) {
    echo json_encode(['error' => 'Data tidak ditemukan.']);
} else {
    echo json_encode(['users' => $users]);
}
?>
