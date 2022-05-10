<?php 
  session_start();
  include 'dist/koneksi.php';
  $sql = $conn->query("SELECT * FROM perusahaan WHERE id_perusahaan = 1");
  $judul = $sql->fetch_object();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
  include 'dist/koneksi.php';
  include 'dist/tes6.php';
  if(isset($_SESSION['uname'])){ 
    header("location:dist/index.php");
  }
?>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <!-- <title>Forms &rsaquo; Editor &mdash; Stisla</title> -->
  <title><?php echo $judul->nm_perusahaan; ?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="dist/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="dist/assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="dist/assets/modules/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="dist/assets/modules/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="dist/assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="dist/assets/modules/prism/prism.css">
  <link rel="stylesheet" href="dist/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="dist/assets/css/style.css">
  <link rel="stylesheet" href="dist/assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body style="background-color:darkred;">
  