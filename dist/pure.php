<?php 
	
	include 'koneksi.php';

	$id = $_GET['id'];

	$query = mysqli_query($conn, "UPDATE biodata SET status = 'Validasi' WHERE nisn = '$id'");
	if ($query) {
		# code...
	header('location:index_admin.php?input=sukses');
	}else{
	header('location:index_admin.php?input=gagal');
	}
 ?>