<?php 
include 'koneksi.php';
$id=$_GET['id'];
$stat=$_GET['stat'];
$query = mysqli_query($conn, "UPDATE lelang SET stat = '$stat' where idLelang='$id'");

if ($query) {
	echo '<meta http-equiv = "refresh" content = "0; url = lelang.php?input=sukses"/>';
}else{
	echo '<meta http-equiv = "refresh" content = "0; url = lelang.php?input=gagal"/>';
}

?>