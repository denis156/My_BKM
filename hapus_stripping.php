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
$id_stripping = (int)$_GET['id_stripping'];

if (delete_stripping($id_stripping) > 0) {
    echo "<script>
        Swal.fire({
            title: 'Berhasil',
            text: 'Data stripping Berhasil Dihapus',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'stripping.php';
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            title: 'Gagal',
            text: 'Data stripping Gagal Dihapus',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'stripping.php';
        });
    </script>";
}
?>

</body>
</html>
