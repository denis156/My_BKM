<?php

if ( !isset($_SESSION["login"])){
  echo"<script>
      document.location.href = 'login.php'
      </script>";
  exit;
}

include 'conf/app.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>


<script>
    document.addEventListener("DOMContentLoaded", function() {
      const currentLocation = window.location.href;
      const sidebarItems = document.querySelectorAll('.nav-sidebar .nav-item');

      sidebarItems.forEach(item => {
        const itemLink = item.querySelector('a');
        const itemHref = itemLink.getAttribute('href');

        if (currentLocation.endsWith(itemHref)) {
              item.classList.add('active');
              itemLink.classList.add('active');
          }

        // Periksa apakah item memiliki sub-menu
        const subMenu = item.querySelector('.nav-treeview');
        if (subMenu) {
          const subMenuLinks = subMenu.querySelectorAll('.nav-item');

          subMenuLinks.forEach(subItem => {
            const subItemLink = subItem.querySelector('a');
            const subItemHref = subItemLink.getAttribute('href');

            if (currentLocation.endsWith(subItemHref)) {
                  subItem.classList.add('active');
                  subItemLink.classList.add('active');
                  item.classList.add('menu-open');
              }
          });
        }
      });
    });
</script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? 'MY bkm | Barraka Karya Mandiri'; ?></title>
  
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  <!-- Sweetalert 2 -->
  <link rel="stylesheet" href="assets_template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets_template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets_template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets_template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets_template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets_template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
 <!-- DataTables -->
  <link rel="stylesheet" href="assets_template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets_template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets_template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets_template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets_template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets_template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- cdn awasome icon -->
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" 
  integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" 
  crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="index" class="brand-link ">
      <img src="assets_template/dist/img/logo.png" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><small><b>My_Bkm</b></small> (Barraka)</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar  bg-gradient-black">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info ml-6">
              <b><a href="#" class="d-block "><?php echo ucfirst($_SESSION['level']) . ' : ' . $_SESSION['nama']; ?></a></b>
          </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2 " >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
          <li class="nav-header bg-gradient-gray "><b>My_Bkm Menu</b> <i class="fas fa-desktop"></i></li>

          <li class="nav-item">
            <a href="index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <?php if ($_SESSION['level'] == 'admin') :?>
          <li class="nav-item">
            <a href="user" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <?php endif ; ?>         
                  
          <li class="nav-header bg-gradient-gray"><b>Form Data</b> <i class="fas fa-edit"></i></li>

          <li class="nav-item form-permohonan <?php echo (strpos($_SERVER['PHP_SELF'], 'tambah_delivery') !== false || strpos($_SERVER['PHP_SELF'], 'tambah_receiving') !== false || strpos($_SERVER['PHP_SELF'], 'tambah_stripping') !== false) ? 'menu-open active' : ''; ?>">
                 <a href="form-permohonan" class="nav-link <?php echo (strpos($_SERVER['PHP_SELF'], 'tambah_delivery') !== false || strpos($_SERVER['PHP_SELF'], 'tambah_receiving') !== false || strpos($_SERVER['PHP_SELF'], 'tambah_stripping') !== false) ? 'active' : ''; ?>">

                  <i class="fas fa-pencil-alt"></i>
                  <p>
                    Permohonan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="tambah_delivery" class="nav-link">
                      <i class="fas fa-ship"></i>
                      <p> Form Delivery</p>                      
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="tambah_receiving" class="nav-link">  
                     <i class="nav-icon fas fa-truck-moving"></i>                   
                     <p>Form Receiving</p>                    
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="tambah_stripping" class="nav-link">    
                      <i class="fas fa-truck-loading"></i>                  
                      <p> Form Stripping</p>                      
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item form-stuffing <?php echo (strpos($_SERVER['PHP_SELF'], 'tambah_buffer') !== false | strpos($_SERVER['PHP_SELF'], 'tambah_outside') !== false) ? 'menu-open active' : ''; ?>">
                 <a href="form-stuffing" class="nav-link <?php echo (strpos($_SERVER['PHP_SELF'], 'tambah_buffer') !== false | strpos($_SERVER['PHP_SELF'], 'tambah_outside') !== false) ? 'active' : ''; ?>">
                  <i class="fas fa-pencil-alt"></i>
                  <p>
                    Stuffing
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="tambah_buffer" class="nav-link">
                      <i class="fas fa-archway"></i>
                      <p> Form Buffer</p>                      
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="tambah_outside" class="nav-link">
                      <i class="fas fa-warehouse"></i>  
                      <p> Form Outside</p>                                                               
                    </a>
                  </li>
                </ul>
              </li>

          <li class="nav-header bg-gradient-gray"><b>Data Laporan</b> <i class="fas fa-table"></i></li>

          <li class="nav-item">
                <a href="#" class="nav-link <?php echo (strpos($_SERVER['PHP_SELF'], 'delivery') !== false || strpos($_SERVER['PHP_SELF'], 'receiving') !== false || strpos($_SERVER['PHP_SELF'], 'stripping') !== false) ? 'active' : ''; ?>">
                    <i class="far fa-list-alt"></i>
                  <p>
                    Permohonan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="delivery" class="nav-link">   
                      <i class="fas fa-ship"></i>                   
                      <p> Data Delivery</p>                      
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="receiving" class="nav-link">   
                     <i class="nav-icon fas fa-truck-moving"></i>                  
                     <p>Data Receiving</p>                     
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="stripping" class="nav-link">                      
                      <i class="fas fa-truck-loading"></i>
                      <p> Data Stripping</p>                      
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
              <a href="#" class="nav-link <?php echo (strpos($_SERVER['PHP_SELF'], 'buffer') !== false || strpos($_SERVER['PHP_SELF'], 'outside') !== false) ? 'active' : ''; ?>">
                    <i class="far fa-list-alt"></i>
                  <p>
                    Stuffing
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="buffer" class="nav-link">    
                      <i class="fas fa-archway"></i>                
                      <p> Data Buffer</p>                      
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="outside" class="nav-link">
                     <i class="fas fa-warehouse"></i>                  
                     <p> Data Outside</p>                     
                    </a>
                  </li>
                </ul>
              </li>

          <li class="nav-header bg-danger"><b>Menu Akhir</b>  <i class="fas fa-power-off"></i></li>

          <li class="nav-item">
              <a href="#" onclick="confirmLogout();" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>
                      Log Out
                  </p>
              </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>