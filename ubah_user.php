<?php
session_start();

$title = 'Ubah User | MY bkm';

include 'layout/header.php';

// Mengambil data dari URL
$id_user = (int)$_GET['id_user'];

$user = select("SELECT * FROM user WHERE id_user = $id_user")[0];

if (isset($_POST['ubah'])) {
    if (update_user($_POST) > 0) {
        echo "<script src='assets_template/plugins/jquery/jquery.min.js'></script>
              <script src='assets_template/plugins/sweetalert2/sweetalert2.all.min.js'></script>
              <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data user Berhasil Diubah',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'user.php';
                });
              </script>";
    } else {
        echo "<script src='assets_template/plugins/jquery/jquery.min.js'></script>
              <script src='assets_template/plugins/sweetalert2/sweetalert2.all.min.js'></script>
              <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data user Gagal Diubah',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'user.php';
                });
              </script>";
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Data user</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Data User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User <i class="nav-icon fas fa-users-cog"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form action="" method="post">

                            <input type="hidden" name="id_user" value="<?=$user['id_user'];?>">

                            <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="<?=$user['nama'];?>" placeholder="Nama">
                            </div>

                            <div class="mb-3">
                            <label for="username" class="form-label">username</label>
                            <input type="text" id="username" name="username" class="form-control"  value="<?=$user['username'];?>"placeholder="username">
                            </div>

                            <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control select2" style="width: 100%;"type="text" id="password" name="password" class="form-control"  value="<?=$user['password'];?>"placeholder="password">
                            </div>

                            <div class="mb-3">
                                <label for="level" class="form-label">Level</label>
                                <select class="form-control select2" style="width: 100%;" id="level" name="level" aria-label="level">
                                    <option <?php if($user['level'] == "admin") echo "selected"; ?>>admin</option>
                                    <option <?php if($user['level'] == "user") echo "selected"; ?>>user</option>
                                </select>
                            </div>

                            <button type="submit" name="ubah" class="btn btn-success mt-2" style="float: right;"><i class="fas fa-edit"></i> Ubah</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('layout/footer.php');
?>
