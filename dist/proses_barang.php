<?php 
include 'koneksi.php';
session_start();

	$id=$_GET['id'];
	$tanggal=date('Y-m-d');

	$track = mysqli_query($conn, "INSERT INTO tracking VALUES (null, '$id', 'proses', '$tanggal', '')") or die(mysqli_error($conn));

	$get = mysqli_query($conn, "SELECT * FROM pengiriman WHERE id_pengiriman = '$id'");
	$get_data = mysqli_fetch_array($get);

	$tarifs = mysqli_query($conn, "SELECT * FROM tarif WHERE id_tarif = '$get_data[id_tarif]'");
	$tarif = mysqli_fetch_array($tarifs);

	$rumus_volumetrik = ($get_data['panjang']*$get_data['lebar']*$get_data['tinggi'])/4000;

	if ($get_data['type']=='Volumetrik') {
		$tot_biaya = $tarif['harga']*$rumus_volumetrik; 
	}else{
		$tot_biaya = $tarif['harga']*$get_data['berat'];
	}

	if ($get_data['asuransi']==1) {
		$asuransi = 0.3*$tot_biaya;
	}else{
		$asuransi = 0;
	}

	$packing = $get_data['biaya_packing'];

	$tot_bayar = $tot_biaya + $asuransi + $packing;

	echo $tot_biaya.'<br>';
	echo $asuransi.'<br>';
	echo $packing.'<br>';
	echo $tot_bayar.'<br>';

	$trans = mysqli_query($conn, "INSERT INTO transaksi VALUES (null, '$id', '$tot_biaya', '$asuransi', '$packing', '$tot_bayar', 'proses')") or die(mysqli_error($conn));


if ($track&&$trans) {
	// echo 'Sudah Sukses';
	header("location:belum.php?input=sukses");
}else{
	// echo 'Belum Sukses';
	header("location:belum.php?input=gagal");
}

 ?>