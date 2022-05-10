<?php 
include 'koneksi.php';
session_start();

	$id=$_GET['id'];
	$tgls=$_GET['tgls'];
	$tanggal=date('Y-m-d');

	$track = mysqli_query($conn, "INSERT INTO tracking VALUES (null, '$id', 'sampai', '$tgls', '$tanggal')") or die(mysqli_error($conn));

if ($track) {
	// echo 'Sudah Sukses';
	header("location:proses.php?input=sukses");
}else{
	// echo 'Belum Sukses';
	header("location:proses.php?input=gagal");
}

 ?>