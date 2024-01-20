<?php
session_start();

$title = 'Ubah Data | MY bkm';

include 'layout/header.php';

// Mengambil data dari URL
$id_outside = (int)$_GET['id_outside'];

$outside = select("SELECT * FROM outside WHERE id_outside = $id_outside")[0];

if (isset($_POST['ubah'])) {
    if (update_outside($_POST) > 0) {
        echo "<script src='assets_template/plugins/jquery/jquery.min.js'></script>
              <script src='assets_template/plugins/sweetalert2/sweetalert2.all.min.js'></script>
              <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data outside Berhasil Diubah',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'outside.php';
                });
              </script>";
    } else {
        echo "<script src='assets_template/plugins/jquery/jquery.min.js'></script>
              <script src='assets_template/plugins/sweetalert2/sweetalert2.all.min.js'></script>
              <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data outside Gagal Diubah',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'outside.php';
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
                    <h1 class="m-0">Ubah Data outside</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Data outside</li>
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
                            <h3 class="card-title">outside <i class="fas fa-archway"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="" method="post">
                                 <input type="hidden" name="id_outside" value="<?=$outside['id_outside'];?>">
                                 <div class="form-group">
                                    <label for="truck_id">TRUCK ID</label>
                                    <input type="text" id="truck_id" name="truck_id" class="form-control"
                                        value="<?= $outside['truck_id']; ?>" placeholder="TRUCK ID">
                                </div>

                                <div class="form-group">
                                    <label for="id_supir">ID SUPIR</label>
                                    <input type="text" id="id_supir" name="id_supir" class="form-control"
                                        value="<?= $outside['id_supir']; ?>" placeholder="ID SUPIR">
                                </div>

                                 <div class="form-group">
                                    <label for="no_count">NO COUNT</label>
                                    <input type="text" id="no_count" name="no_count" class="form-control"
                                        value="<?= $outside['no_count']; ?>" placeholder="NO COUNT">
                                </div>

                                <div class="form-group">
                                    <label for="no_segel">NO SEGEL</label>
                                    <input type="text" id="no_segel" name="no_segel" class="form-control"
                                        value="<?= $outside['no_segel']; ?>" placeholder="NO SEGEL">
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">TANGGAL DAN WAKTU</label>
                                    <input type="datetime-local" id="tanggal" name="tanggal" class="form-control"
                                        value="<?= date('Y-m-d\TH:i', strtotime($outside['tanggal'])); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="jenis_count">JENIS COUNT</label>
                                    <select class="form-control select2" style="width: 100%;" id="jenis_count" name="jenis_count"
                                        aria-label="jenis_count">
                                        <option value="20ft"
                                            <?php if ($outside['jenis_count'] == "20ft") echo "selected"; ?>>20ft
                                        </option>
                                        <option value="21ft"
                                            <?php if ($outside['jenis_count'] == "21ft") echo "selected"; ?>>21ft
                                        </option>
                                        <option value="40ft"
                                            <?php if ($outside['jenis_count'] == "40ft") echo "selected"; ?>>40ft
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pelayaran">PELAYARAN</label>
                                    <select class="form-control select2" style="width: 100%;" id="pelayaran" name="pelayaran" aria-label="pelayaran">
                                        <option value="meratus"
                                            <?php if ($outside['pelayaran'] == "meratus") echo "selected"; ?>>
                                            Meratus</option>
                                        <option value="tanto"
                                            <?php if ($outside['pelayaran'] == "tanto") echo "selected"; ?>>Tanto
                                        </option>
                                        <option value="spill"
                                            <?php if ($outside['pelayaran'] == "spill") echo "selected"; ?>>Spill
                                        </option>
                                        <option value="temas"
                                            <?php if ($outside['pelayaran'] == "temas") echo "selected"; ?>>Temas
                                        </option>
                                        <option value="samas"
                                            <?php if ($outside['pelayaran'] == "samas") echo "selected"; ?>>Samas
                                        </option>
                                        <option value="srill"
                                            <?php if ($outside['pelayaran'] == "srill") echo "selected"; ?>>Srill
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="mitra">MITRA</label>
                                    <select class="form-control select2" style="width: 100%;" id="mitra" name="mitra"
                                        aria-label="mitra">
                                        <option value="Depo" <?php if ($outside['mitra'] == "Depo") echo "selected"; ?>>
                                            Depo</option>
                                        <option value="Ckl" <?php if ($outside['mitra'] == "Ckl") echo "selected"; ?>>Ckl
                                        </option>
                                        <option value="Sjc" <?php if ($outside['mitra'] == "Sjc") echo "selected"; ?>>Sjc
                                        </option>
                                        <option value="Pwo" <?php if ($outside['mitra'] == "Pwo") echo "selected"; ?>>Pwo
                                        </option>                                     
                                        <option value="Others"
                                            <?php if ($outside['mitra'] == "Others") echo "selected"; ?>>Others
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="re_maks">Re-Maks</label>
                                    <textarea class="form-control" id="re_maks" name="re_maks"
                                        rows="3"><?= $outside['re_maks']; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control select2" style="width: 100%;" id="status" name="status" aria-label="status">
                                        <option value="Belum Selesai" <?php if ($outside['status'] == "Belum Selesai") echo "selected"; ?>>Belum Selesai</option>
                                        <option value="Sudah Selesai" <?php if ($outside['status'] == "Sudah Selesai") echo "selected"; ?>>Sudah Selesai</option>                            
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
