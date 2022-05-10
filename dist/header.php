<?php 
  session_start();
  include 'koneksi.php';
  $sql = $conn->query("SELECT * FROM perusahaan WHERE id_perusahaan = 1");
  $judul = $sql->fetch_object();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
  if(!isset($_SESSION['uname'])){ 
    header("location:../index.php");
  }
  include 'koneksi.php';
  include 'tes6.php';
?>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <!-- <title>Forms &rsaquo; Editor &mdash; Stisla</title> -->
  <title><?php echo $judul->nm_perusahaan; ?></title>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <link rel="stylesheet" href="assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  
  <link rel="stylesheet" href="assets/modules/modal/bootstrap.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css"> <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg" style="background-color:darkred;"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo ucwords($_SESSION['nama']); ?> as <?php if ($_SESSION['level']=='1') {
                echo 'Admin';                    
              }elseif ($_SESSION['level']=='2'){
                echo 'Pimpinan';
              } ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <!-- <a href="#" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <?php 
          if ($_SESSION['level']==2) {
            # code...
       ?> 
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand" style="line-height: 25px; margin-top: 25px">
            <a href="transaksi.php"><?php echo $judul->nm_perusahaan; ?></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm" style="line-height: 25px; margin-top: 25px">
            <a href="transaksi.php"><?php echo $judul->init_perusahaan; ?></a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="menu-header">Dashboard</li> -->
            <!-- <li><a class="nav-link active" href="home_p.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li> -->
            <li class="menu-header">Process</li>
              <li><a class="nav-link active" href="hasil.php"><i class="fas fa-history"></i> <span>Hasil Diagnosa</span></a></li>
              <li><a class="nav-link active" href="#"> <span></span></a></li>
          </ul>
        </aside>
      </div>
    <?php  }elseif ($_SESSION['level']== 1) {?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand" style="line-height: 25px; margin-top: 25px">
            <a href="transaksi.php"><?php echo $judul->nm_perusahaan; ?></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm" style="line-height: 25px; margin-top: 25px">
            <a href="transaksi.php"><?php echo $judul->init_perusahaan; ?></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link active" href="home_p.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Process</li>
              <li><a class="nav-link active" href="hasil.php"><i class="fas fa-history"></i> <span>Hasil Diagnosa</span></a></li>
              <li><a class="nav-link" href="userdiagnosa.php"><i class="fas fa-archive"></i> <span>User Diagnosa</span></a></li>
            <li class="menu-header">Entry Data</li>
              <li><a class="nav-link" href="gejala.php"><i class="fas fa-notes-medical"></i><span>Gejala</span></a></li>
              <li><a class="nav-link" href="penyakit.php"><i class="fas fa-stethoscope"></i><span>Penyakit</span></a></li>
              <li><a class="nav-link" href="user.php"><i class="fas fa-user"></i><span>User</span></a></li>
              <li><a class="nav-link active" href="#"> <span></span></a></li>
          </ul>
        </aside>
      </div>
    <?php    }
     ?>