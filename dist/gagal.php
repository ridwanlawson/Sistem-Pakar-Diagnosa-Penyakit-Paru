<?php 
session_start();
include 'koneksi.php';

	$id=$_GET['id'];
	$tanggal=date('Y-m-d');

	$trans = mysqli_query($conn, "UPDATE pelelang SET status = 'gagal' WHERE idPelelang = '$id'") or die(mysqli_error($conn));

if ($trans) {
// 	echo 'Sudah Sukses';
	echo '<meta http-equiv = "refresh" content = "0; url = pelelang.php?input=sukses"/>';
}else{
// 	echo 'Belum Sukses';
	echo '<meta http-equiv = "refresh" content = "0; url = pelelang.php?input=gagal"/>';
}

 ?>