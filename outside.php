<?php

session_start();

$title = 'Data Outside | MY bkm';

include('layout/header.php');


$data_outside = select("SELECT * FROM outside");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Outside</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Outside</li>
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

        <?php if ($_SESSION['level'] == 'admin') : ?>
        <?php include('box/small_box.php');?>   
        <?php endif; ?>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Outside <i class="fas fa-warehouse"></i></h3>
                <!--posisi tombol ubah hapus  -->
              </div>
              <div class="mt-3  ml-3">
                   <a href="tambah_outside.php" class="btn btn-primary d-inline-block mr-1" ><i class="fas fa-plus-circle"></i> Tambah</a>
                   <?php if ($_SESSION['level'] == 'admin') : ?>
                   <a href="download_excel_outside.php" class="btn btn-success d-inline-block"><i class="far fa-file-excel"></i> Excel</a>
                   <?php endif; ?> 
              </div>
              <!-- /.card-header -->     
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>    
                  <tr>
                    <th>No</th>
                    <th class="text-center">Truck ID</th>
                    <th class="text-center">ID Supir</th>
                    <th class="text-center">No Count</th>
                    <th class="text-center">No Segel</th>                                     
                    <th class="text-center">Tanggal</th>                    
                    <th class="text-center">Jenis Count</th>
                    <th class="text-center">Pelayaran</th>
                    <th class="text-center">Mitra</th>                    
                    <th class="text-center">Re-maks</th>
                    <th class="text-center">Status</th>                  
                    <?php if ($_SESSION['level'] == 'admin') : ?>
                    <th class="text-center">Editing</th>
                    <?php endif; ?> 
                  </tr>
                </thead>
                <tbody>
              <?php $no= 1 ;?>
              <?php foreach($data_outside as $outside): ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$outside['truck_id']?></td>
                    <td><?=$outside['id_supir']?></td>
                    <td><?=$outside['no_count']?></td>
                    <td><?=$outside['no_segel']?></td>
                    <td><?=date('d:n:y | H:i',strtotime($outside['tanggal']))?></td>                    
                    <td><?=$outside['jenis_count']?></td>
                    <td><?=$outside['pelayaran']?></td>
                    <td><?=$outside['mitra']?></td>                    
                    <td><?=$outside['re_maks']?></td>
                    <td>
                      <span class="badge <?php echo ($outside['status'] == 'Belum Selesai') ? 'bg-danger' : 'bg-success'; ?>">
                        <?php echo $outside['status']; ?>
                      </span>
                    </td>                      
                    <?php if ($_SESSION['level'] == 'admin') : ?>
                    <td width="10%" class="text-center">
                        <a href="ubah_outside.php?id_outside=<?= $outside['id_outside']; ?>" class="btn btn-block bg-gradient-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>                    
                        <a href="javascript:void(0);"class="btn btn-block bg-gradient-danger btn-sm"onclick="confirmDelete(<?= $outside['id_outside']; ?>)"><i class="fas fa-trash-alt"></i> Hapus</a>                    
                    </td>
                    <?php endif; ?> 
                </tr>
              <?php endforeach ;?>  
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
    function confirmDelete(id_outside) {
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
                window.location.href = 'hapus_outside.php?id_outside=' + id_outside;
            }
        });
    }
</script>
  

  