<?php 
include 'koneksi.php';
$id=$_GET['id'];
$query = mysqli_query($conn, "delete from berita where id='$id'");
if ($query) {
	header("location:pengumuman_h.php?input=sukses&id=$id");
}else{
	header("location:pengumuman_h.php?input=gagal&id=$id");
}

?>