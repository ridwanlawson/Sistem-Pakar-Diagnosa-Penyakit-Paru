<?php 
include 'koneksi.php';
$id=$_GET['id'];
$jen=strtolower($_GET['jen']);
$jens=ucwords($jen);
echo $jen;
if($jens == 'Lelang'){
echo 'id'.$jen;
$query = mysqli_query($conn, "delete from $jen where $jen.id$jens=$id") or die(mysqli_error($conn));
}else{
$query = mysqli_query($conn, "delete from $jen where id_$jen='$id'") or die(mysqli_error($conn));
}
if ($query) {
// 	echo 'Berhasil';
	echo '<meta http-equiv = "refresh" content = "0; url = '.$jen.'.php?input=sukses"/>';
}else{
// 	echo 'Gagal';
	echo '<meta http-equiv = "refresh" content = "0; url = '.$jen.'.php?input=gagal"/>';
}

?>