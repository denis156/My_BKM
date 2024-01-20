<?php

session_start();

$title = 'Dashboard | MY bkm';

include('layout/header.php');

$data_delivery = select("SELECT * FROM delivery");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard <i class="nav-icon fas fa-tachometer-alt"></i></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                <h3>My_Bkm<sup style="font-size: 20px"></sup></h3>

                <p>PT. BARRAKA KARYA MANDIRI</p>
              </div>
              <div class="icon">
              <i class="fas fa-desktop"></i>
              </div>              
            </div>
          </div>          

            <!-- ./col -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>4 | others<sup style="font-size: 20px"></sup></h3>

                <p>Partner/Mitra</p>
              </div>
              <div class="icon">
              <i class="far fa-handshake"></i>
              </div>
            </div>
          </div>

          <!-- ./col -->
          <?php if ($_SESSION['level'] == 'admin') : ?>
          <div class="col-lg-3 col-6" id="user-data-container">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="user-count">Loading...</h3>
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-house-user"></i>
              </div>
            </div>
          </div>
          <?php endif; ?>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>37<sup style="font-size: 20px">%</sup></h3>

                <p>Implementasi</p>
              </div>
              <div class="icon">
              <i class="fas fa-laptop-code"></i>
              </div>
            </div>
          </div> 

          <?php if ($_SESSION['level'] == 'user') : ?>          
          <!-- ./col -->
          <div class="col-lg-3 col-6" id="delivery-data-container">
          <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="delivery-count">Loading...</h3>

                   <p>Delivery</p>
                </div>
                <div class="icon">
                <i class="nav-icon fas fa-ship"></i>
              </div>
              <?php if ($_SESSION['level'] == 'admin') : ?>
              <a href="delivery" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php endif; ?>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6" id="receiving-data-container">
          <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="receiving-count">Loading...</h3>
                
                   <p>Receiving</p>
                </div>
                <div class="icon">
                <i class="nav-icon fas fa-truck-moving"></i>
              </div>
              <?php if ($_SESSION['level'] == 'admin') : ?>
              <a href="receiving" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php endif; ?>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6" id="stripping-data-container">
          <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="stripping-count">Loading...</h3>
                
                   <p>Stripping</p>
                </div>
                <div class="icon">
                <i class="fas fa-truck-loading"></i>
              </div>
              <?php if ($_SESSION['level'] == 'admin') : ?>
              <a href="stripping" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php endif; ?>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6" id="buffer-data-container">
          <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="buffer-count">Loading...</h3>
                
                   <p>Stuffing Buffer</p>
                </div>
                <div class="icon">
                <i class="nav-icon fas fa-truck-moving"></i>
              </div>
              <?php if ($_SESSION['level'] == 'admin') : ?>
              <a href="buffer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php endif; ?>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6" id="outside-data-container">
          <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="outside-count">Loading...</h3>
                
                   <p>Stuffing Outside</p>
                </div>
                <div class="icon">
                <i class="nav-icon fas fa-truck-moving"></i>
              </div>
              <?php if ($_SESSION['level'] == 'admin') : ?>
              <a href="outside" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>
          
          <?php if ($_SESSION['level'] == 'admin') : ?>
          <?php include('box/small_box.php');?>   
          <?php endif; ?>

        </div>
        
           <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th class="text-center">Truck ID</th>
                    <th class="text-center">No BL</th>
                    <th class="text-center">ID Supir</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">No Count</th>
                    <th class="text-center">Jenis Count</th>
                    <th class="text-center">Pelayaran</th>
                    <th class="text-center">Mitra</th>
                    <th class="text-center">Re-maks</th>
                  </tr>
                </thead>
                <tbody>
              <?php $no= 1 ;?>
              <?php foreach($data_delivery as $delivery): ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$delivery['truck_id']?></td>
                    <td><?=$delivery['no_bl']?></td>
                    <td><?=$delivery['id_supir']?></td>
                    <td><?=date('d:n:y | H:i',strtotime($delivery['tanggal']))?></td>
                    <td><?=$delivery['no_count']?></td>
                    <td><?=$delivery['jenis_count']?></td>
                    <td><?=$delivery['pelayaran']?></td>
                    <td><?=$delivery['mitra']?></td>
                    <td><?=$delivery['re_maks']?></td>
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

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="assets_template/dist/img/logo.png" alt="logo" height="295" width="295">
  </div>

  <?php

include('layout/footer.php');

?>

  