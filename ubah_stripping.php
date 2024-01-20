<?php
session_start();

$title = 'Ubah Data | MY bkm';

include 'layout/header.php';

// Mengambil data dari URL
$id_stripping = (int)$_GET['id_stripping'];

$stripping = select("SELECT * FROM stripping WHERE id_stripping = $id_stripping")[0];

if (isset($_POST['ubah'])) {
    if (update_stripping($_POST) > 0) {
        echo "<script src='assets_template/plugins/jquery/jquery.min.js'></script>
              <script src='assets_template/plugins/sweetalert2/sweetalert2.all.min.js'></script>
              <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data stripping Berhasil Diubah',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'stripping.php';
                });
              </script>";
    } else {
        echo "<script src='assets_template/plugins/jquery/jquery.min.js'></script>
              <script src='assets_template/plugins/sweetalert2/sweetalert2.all.min.js'></script>
              <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data stripping Gagal Diubah',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'stripping.php';
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
                    <h1 class="m-0">Ubah Data Stripping</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Data Stripping</li>
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
                            <h3 class="card-title">Stripping <i class="fas fa-truck-loading"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form action="" method="post">

                        <input type="hidden" name="id_stripping" value="<?=$stripping['id_stripping'];?>">

                        <div class="mb-3">
                        <label for="no_bl" class="form-label">NO BL</label>
                        <input type="text" id="no_bl" name="no_bl" class="form-control" value="<?=$stripping['no_bl'];?>" placeholder="NO BL">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">TANGGAL DAN WAKTU</label>
                            <input type="datetime-local" id="tanggal" name="tanggal" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($stripping['tanggal'])); ?>">
                        </div>

                        <div class="mb-3">
                        <label for="no_count" class="form-label">NO COUNT</label>
                        <input type="text" id="no_count" name="no_count" class="form-control"  value="<?=$stripping['no_count'];?>"placeholder="NO COUNT">
                        </div>

                        <div class="mb-3">
                            <label for="jenis_count" class="form-label">JENIS COUNT</label>
                            <select class="form-control select2" style="width: 100%;" id="jenis_count" name="jenis_count" aria-label="jenis_count">
                                <option <?php if($stripping['jenis_count'] == "20ft") echo "selected"; ?>>20ft</option>
                                <option <?php if($stripping['jenis_count'] == "21ft") echo "selected"; ?>>21ft</option>
                                <option <?php if($stripping['jenis_count'] == "40ft") echo "selected"; ?>>40ft</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pelayaran" class="form-label">PELAYARAN</label>
                            <select class="form-control select2" style="width: 100%;" id="pelayaran" name="pelayaran" aria-label="pelayaran">
                                <option value="meratus" <?php if ($stripping['pelayaran'] == "meratus") echo "selected"; ?>>Meratus</option>
                                <option value="tanto" <?php if ($stripping['pelayaran'] == "tanto") echo "selected"; ?>>Tanto</option>
                                <option value="spill" <?php if ($stripping['pelayaran'] == "spill") echo "selected"; ?>>Spill</option>
                                <option value="temas" <?php if ($stripping['pelayaran'] == "temas") echo "selected"; ?>>Temas</option>
                                <option value="samas" <?php if ($stripping['pelayaran'] == "samas") echo "selected"; ?>>Samas</option>
                                <option value="srill" <?php if ($stripping['pelayaran'] == "srill") echo "selected"; ?>>Srill</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="mitra" class="form-label">MITRA</label>
                            <select class="form-control select2" style="width: 100%;" id="mitra" name="mitra" aria-label="mitra">
                                <option value="Depo" <?php if ($stripping['mitra'] == "Depo") echo "selected"; ?>>Depo</option>
                                <option value="Ckl" <?php if ($stripping['mitra'] == "Ckl") echo "selected"; ?>>Ckl</option>
                                <option value="Sjc" <?php if ($stripping['mitra'] == "Sjc") echo "selected"; ?>>Sjc</option>
                                <option value="Pwo" <?php if ($stripping['mitra'] == "Pwo") echo "selected"; ?>>Pwo</option>
                                <option value="Others" <?php if ($stripping['mitra'] == "Others") echo "selected"; ?>>Others</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="re_maks" class="form-label">Re-Maks</label>
                            <textarea class="form-control" id="re_maks" name="re_maks" rows="3"><?=$stripping['re_maks'];?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control select2" style="width: 100%;" id="status" name="status" aria-label="status">
                                <option value="Belum Selesai" <?php if ($stripping['status'] == "Belum Selesai") echo "selected"; ?>>Belum Selesai</option>
                                <option value="Sudah Selesai" <?php if ($stripping['status'] == "Sudah Selesai") echo "selected"; ?>>Sudah Selesai</option>                            
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
