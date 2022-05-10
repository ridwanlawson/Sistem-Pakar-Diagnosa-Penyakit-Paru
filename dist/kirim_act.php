<?php 
include 'koneksi.php';
$id = $_SESSION['id'];
if (isset($_GET['cek'])) {
	# code...
$query = mysqli_query($conn, "SELECT * FROM ")
}

if (isset($_GET['tambah'])) {
$barang = $_GET['barang'];
$jumlah = $_GET['jumlah'];
$satuan = $_GET['satuan'];
$kali = $_GET['kali'];
$tempat = $_GET['tempat'];
$tgl = date('Y-m-d');
$cahar = mysqli_query($conn, "SELECT * FROM barang WHERE id = '$barang'");
$data = mysqli_fetch_array($cahar);
$harga = $data['harga']; 
$query = mysqli_query($conn, "INSERT INTO pemesanan VALUES(null, '$barang', '$id', '$jumlah', '$harga', '$satuan', '$kali', '$tempat', '$tgl' ) ")
}

 ?>
