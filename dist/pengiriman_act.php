<?php 
include 'koneksi.php';
session_start();
for ($i=1; $i <= $_POST['jumlah_data'] ; $i++) { 


	$nm_penm=$_POST['nm_penm'.$i];
	$nh_penm=$_POST['nh_penm'.$i];
	$al_penm=$_POST['al_penm'.$i];

	$nm_pena=$_POST['nm_pena'.$i];
	$nh_pena=$_POST['nh_pena'.$i];
	$al_pena=$_POST['al_pena'.$i];

	$supir=$_POST['supir'.$i];
	$jumlah=$_POST['jumlah'.$i];
	$berat=$_POST['berat'.$i];

	/* Khusus Untuk Volumetrix*/
/*	$panjang=$_POST['panjang'.$i];
	$lebar=$_POST['lebar'.$i];
	$tinggi=$_POST['tinggi'.$i];*/

	$pelayanan = $_POST['pelayanan'.$i];
	$cara = $_POST['cara'.$i];
	$asuransi=$_POST['asuransi'.$i];
	$packing=$_POST['packing'.$i];
	$jenis=$_POST['jenis'.$i];
	$kt = $_POST['kt'.$i];
	$ka = $_SESSION['kota'];

	$waktu = date('Y-m-d');


		$query = mysqli_query($conn, "INSERT INTO pengiriman VALUES (null, '$nm_penm', '$nm_pena', '$al_penm', '$al_pena', '$nh_penm', '$nh_pena', '$supir', '$jumlah', '$berat','$asuransi','$packing','$pelayanan','$cara','$jenis','$ka','$kt','$waktu')") or die(mysqli_error($conn));

	// $pengirim = mysqli_query($conn, "INSERT INTO pengirim VALUES (null, '$nm_penm', '$al_penm', '$nh_penm')") or die(mysqli_error($conn));
		
	// $penerima = mysqli_query($conn, "INSERT INTO penerima VALUES (null, '$nm_pena', '$al_pena', '$nh_pena')") or die(mysqli_error($conn));

}


if ($query) {
	// echo 'Sudah Sukses';
	header("location:pengiriman.php?input=sukses");
}else{
	// echo 'Belum Sukses';
	header("location:pengiriman.php?input=gagal");
}

 ?>