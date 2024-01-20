<?php
session_start();
include 'conf/app.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notification</title>

    <link rel='stylesheet' href='assets_template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'>
    <!-- Anda juga bisa memasukkan link CSS lainnya di sini -->

    <script src='assets_template/plugins/jquery/jquery.min.js'></script>
    <script src='assets_template/plugins/sweetalert2/sweetalert2.all.min.js'></script>
    <!-- Anda juga bisa memasukkan script JavaScript lainnya di sini -->
</head>
<body>

<?php
$id_delivery = (int)$_GET['id_delivery'];

if (delete_delivery($id_delivery) > 0) {
    echo "<script>
        Swal.fire({
            title: 'Berhasil',
            text: 'Data delivery Berhasil Dihapus',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'delivery.php';
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            title: 'Gagal',
            text: 'Data delivery Gagal Dihapus',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'delivery.php';
        });
    </script>";
}
?>

</body>
</html>
