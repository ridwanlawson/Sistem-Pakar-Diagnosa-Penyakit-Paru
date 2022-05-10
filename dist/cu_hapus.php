<?php 
include 'koneksi.php';
$id=$_GET['id'];
$query = mysqli_query($conn, "delete from cu where id='$id'");
if ($query) {
	header("location:cu.php?input=sukses&id=$id");
}else{
	header("location:cu.php?input=gagal&id=$id");
}

?>