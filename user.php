<?php

session_start();

$title = 'Data User | MY bkm';

include('layout/header.php');


$data_user = select("SELECT * FROM user");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Users </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
           <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users <i class="nav-icon fas fa-users-cog"></i></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                  <th>No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Editing</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
            <?php foreach ($data_user as $user) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['level'] ?></td>
                    <td width="10%" class="text-center">
                        <a href="ubah_user.php?id_user=<?= $user['id_user']; ?>" class="btn btn-block bg-gradient-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="javascript:void(0);"class="btn btn-block bg-gradient-danger btn-sm"onclick="confirmDelete(<?= $user['id_user']; ?>)"><i class="fas fa-trash-alt"></i> Hapus</a>                    
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
                </table>
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

<script>
    function confirmDelete(id_user) {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Yakin untuk menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'hapus_user.php?id_user=' + id_user;
            }
        });
    }
</script>

  