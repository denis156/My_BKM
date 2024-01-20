<?php

session_start();

$title = 'Data Buffer | MY BKM';

include('layout/header.php');

$data_buffer = select("SELECT * FROM buffer");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Buffer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Buffer</li>
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
                <h3 class="card-title">Buffer <i class="fas fa-archway"></i></h3>
                <!--posisi tombol ubah hapus  -->
              </div>
              <div class="mt-3  ml-3">
                   <a href="tambah_buffer.php" class="btn btn-primary d-inline-block mr-1"><i class="fas fa-plus-circle"></i> Tambah</a>
                   <?php if ($_SESSION['level'] == 'admin') : ?>
                   <a href="download_excel_buffer.php" class="btn btn-success d-inline-block"><i class="far fa-file-excel"></i> Excel</a>
                   <?php endif; ?> 
              </div>
              <!-- /.card-header -->     
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>    
                  <tr>
                    <th>No</th>
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
                <?php foreach($data_buffer as $buffer): ?>
                  <tr>
                      <td><?=$no++?></td>
                      <td><?=$buffer['no_count']?></td>
                      <td><?=$buffer['no_segel']?></td>
                      <td><?=date('d:n:y | H:i',strtotime($buffer['tanggal']))?></td>                    
                      <td><?=$buffer['jenis_count']?></td>
                      <td><?=$buffer['pelayaran']?></td>
                      <td><?=$buffer['mitra']?></td>
                      <td><?=$buffer['re_maks']?></td>
                      <td>
                        <span class="badge <?php echo ($buffer['status'] == 'Belum Selesai') ? 'bg-danger' : 'bg-success'; ?>">
                          <?php echo $buffer['status']; ?>
                        </span>
                      </td>                                             
                      <?php if ($_SESSION['level'] == 'admin') : ?>
                      <td width="10%" class="text-center">
                          <a href="ubah_buffer.php?id_buffer=<?= $buffer['id_buffer']; ?>" class="btn btn-block bg-gradient-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>                    
                          <a href="javascript:void(0);"class="btn btn-block bg-gradient-danger btn-sm"onclick="confirmDelete(<?= $buffer['id_buffer']; ?>)"><i class="fas fa-trash-alt"></i> Hapus</a>                    
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
    function confirmDelete(id_buffer) {
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
                window.location.href = 'hapus_buffer.php?id_buffer=' + id_buffer;
            }
        });
    }
</script>
  