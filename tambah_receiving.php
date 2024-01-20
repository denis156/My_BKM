<?php
session_start();
$title = 'Tambah Data | MY bkm';

include 'layout/header.php';

$data_receiving = select("SELECT * FROM receiving");
if (isset($_POST['tambah'])) {
    if (create_receiving($_POST) > 0) {
        echo "<script src='assets_template/plugins/jquery/jquery.min.js'></script>
              <script src='assets_template/plugins/sweetalert2/sweetalert2.all.min.js'></script>
              <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data receiving Berhasil Ditambahkan',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'receiving.php';
                });
              </script>";
    } else {
        echo "<script src='assets_template/plugins/jquery/jquery.min.js'></script>
              <script src='assets_template/plugins/sweetalert2/sweetalert2.all.min.js'></script>
              <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data receiving Gagal Ditambahkan',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'receiving.php';
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
                    <h1 class="m-0">Tambah Data Receiving</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Data Receiving</li>
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
                            <h3 class="card-title">Receiving <i class="nav-icon fas fa-truck-moving"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form action="" method="post">
                                <div class="mb-3">
                                <label for="truck_id" class="form-label">TRUCK ID</label>
                                <input type="text" id="truck_id" name="truck_id" class="form-control" placeholder="TRUCK ID"required>
                                </div>

                                <div class="mb-3">
                                <label for="id_supir" class="form-label">ID SUPIR</label>
                                <input type="text" id="id_supir" name="id_supir" class="form-control" placeholder="ID SUPIR"required>
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">TANGGAL DAN WAKTU</label>
                                    <input type="datetime-local" id="tanggal" name="tanggal" class="form-control"required>
                                </div>

                                <div class="mb-3">
                                <label for="no_count" class="form-label">NO COUNT</label>
                                <input type="text" id="no_count" name="no_count" class="form-control" placeholder="NO COUNT"required>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_count" class="form-label">JENIS COUNT</label>
                                    <select class="form-control select2" style="width: 100%;" select id="jenis_count" name="jenis_count" class="form-select" aria-label="jenis_count"required>
                                        <option selected>--Pilih Jenis Count--</option>
                                        <option value="20ft">20ft</option>
                                        <option value="21ft">21ft</option>
                                        <option value="40ft">40ft</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="pelayaran" class="form-label">PELAYARAN</label>
                                    <select class="form-control select2" style="width: 100%;" select id="pelayaran" name="pelayaran" aria-label="pelayaran"required>
                                        <option selected>--Pilih Pelayaran--</option>
                                        <option value="meratus">Meratus</option>
                                        <option value="tanto">Tanto</option>
                                        <option value="spill">Spill</option>
                                        <option value="temas">Temas</option>
                                        <option value="samas">Samas</option>
                                        <option value="srill">Srill</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="mitra" class="form-label">MITRA</label>
                                    <select class="form-control select2" style="width: 100%;" select id="mitra" name="mitra" aria-label="mitra"required>
                                        <option selected>--Pilih Mitra--</option>
                                        <option value="Depo">Depo Smi</option>
                                        <option value="Ckl">Ckl</option>
                                        <option value="Sjc">Sjc</option>
                                        <option value="Pwo">Pwo</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                        <label for="re_maks" class="form-label">Re-Maks</label>
                                        <textarea class="form-control" name="re_maks" id="re_maks" rows="3"required></textarea>
                                </div>

                                
                            
                                <button type="submit" name="tambah" class="btn btn-primary mt-2" style="float: right;"><i class="fas fa-plus-circle"></i> Tambah</button>

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
