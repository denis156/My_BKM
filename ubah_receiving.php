<?php
session_start();

$title = 'Ubah Data | MY bkm';

include 'layout/header.php';

// Mengambil data dari URL
$id_receiving = (int)$_GET['id_receiving'];

$receiving = select("SELECT * FROM receiving WHERE id_receiving = $id_receiving")[0];

if (isset($_POST['ubah'])) {
    if (update_receiving($_POST) > 0) {
        echo "<script src='assets_template/plugins/jquery/jquery.min.js'></script>
              <script src='assets_template/plugins/sweetalert2/sweetalert2.all.min.js'></script>
              <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data receiving Berhasil Diubah',
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
                    text: 'Data receiving Gagal Diubah',
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
                    <h1 class="m-0">Ubah Data Receiving</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Data Receiving</li>
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

                        <input type="hidden" name="id_receiving" value="<?=$receiving['id_receiving'];?>">

                        <div class="mb-3">
                        <label for="truck_id" class="form-label">TRUCK ID</label>
                        <input type="text" id="truck_id" name="truck_id" class="form-control" value="<?=$receiving['truck_id'];?>" placeholder="TRUCK ID">
                        </div>

                        <div class="mb-3">
                        <label for="id_supir" class="form-label">ID SUPIR</label>
                        <input type="text" id="id_supir" name="id_supir" class="form-control" value="<?=$receiving['id_supir'];?>" placeholder="ID SUPIR">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">TANGGAL DAN WAKTU</label>
                            <input type="datetime-local" id="tanggal" name="tanggal" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($receiving['tanggal'])); ?>">
                        </div>


                        <div class="mb-3">
                        <label for="no_count" class="form-label">NO COUNT</label>
                        <input type="text" id="no_count" name="no_count" class="form-control"  value="<?=$receiving['no_count'];?>"placeholder="NO COUNT">
                        </div>

                        <div class="mb-3">
                            <label for="jenis_count" class="form-label">JENIS COUNT</label>
                            <select class="form-control select2" style="width: 100%;" id="jenis_count" name="jenis_count" aria-label="jenis_count">
                                <option <?php if($receiving['jenis_count'] == "20ft") echo "selected"; ?>>20ft</option>
                                <option <?php if($receiving['jenis_count'] == "21ft") echo "selected"; ?>>21ft</option>
                                <option <?php if($receiving['jenis_count'] == "40ft") echo "selected"; ?>>40ft</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pelayaran" class="form-label">PELAYARAN</label>
                            <select class="form-control select2" style="width: 100%;" id="pelayaran" name="pelayaran" aria-label="pelayaran">
                                <option value="meratus" <?php if ($receiving['pelayaran'] == "meratus") echo "selected"; ?>>Meratus</option>
                                <option value="tanto" <?php if ($receiving['pelayaran'] == "tanto") echo "selected"; ?>>Tanto</option>
                                <option value="spill" <?php if ($receiving['pelayaran'] == "spill") echo "selected"; ?>>Spill</option>
                                <option value="temas" <?php if ($receiving['pelayaran'] == "temas") echo "selected"; ?>>Temas</option>
                                <option value="samas" <?php if ($receiving['pelayaran'] == "samas") echo "selected"; ?>>Samas</option>
                                <option value="srill" <?php if ($receiving['pelayaran'] == "srill") echo "selected"; ?>>Srill</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="mitra" class="form-label">MITRA</label>
                            <select class="form-control select2" style="width: 100%;" id="mitra" name="mitra" aria-label="mitra">
                                <option value="Depo" <?php if ($receiving['mitra'] == "Depo") echo "selected"; ?>>Depo</option>
                                <option value="Ckl" <?php if ($receiving['mitra'] == "Ckl") echo "selected"; ?>>Ckl</option>
                                <option value="Sjc" <?php if ($receiving['mitra'] == "Sjc") echo "selected"; ?>>Sjc</option>
                                <option value="Pwo" <?php if ($receiving['mitra'] == "Pwo") echo "selected"; ?>>Pwo</option>
                                <option value="Others" <?php if ($receiving['mitra'] == "Others") echo "selected"; ?>>Others</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="re_maks" class="form-label">Re-Maks</label>
                            <textarea class="form-control" id="re_maks" name="re_maks" rows="3"><?=$receiving['re_maks'];?></textarea>
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
