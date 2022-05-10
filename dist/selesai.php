<?php 
session_start();
include 'koneksi.php';

	$id=$_POST['id'];
	$jml=$_POST['jml'];
	$harga=$_POST['harga'];
	$tanggal=date('Y-m-d');

	$trans = mysqli_query($conn, "UPDATE pelelang SET status = 'selesai' WHERE idPelelang = '$id'") or die(mysqli_error($conn));
	$track = mysqli_query($conn, "INSERT INTO pemenang VALUES(null, '$id', '$jml', '$harga', '$tanggal')") or die(mysqli_error($conn));

if ($trans&&$track) {
	// echo 'Sudah Sukses';
	echo '<meta http-equiv = "refresh" content = "0; url = pelelang.php?input=sukses"/>';
}else{
	// echo 'Belum Sukses';
	echo '<meta http-equiv = "refresh" content = "0; url = pelelang.php?input=gagal"/>';
}

 ?>