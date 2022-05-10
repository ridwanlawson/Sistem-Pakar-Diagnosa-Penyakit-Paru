<?php 
session_start();
include 'dist/koneksi.php';
$uname=mysqli_escape_string($conn, $_POST['name']);
$pass=mysqli_escape_string($conn, $_POST['password']);
$pas=md5($pass);
$query=mysqli_query($conn, "select * from user where nama='$uname' or email = '$uname' and password='$pas'")or die(mysql_error());
if(mysqli_num_rows($query)==1){
	$row = mysqli_fetch_assoc($query);
	$id = $row['id_user'];
	$level = $row['level'];
	$email = $row['email'];
	$nama = $row['nama'];
	if($level == 1){
		$data = mysqli_fetch_array($query);
		$_SESSION['id']=$id;
		$_SESSION['nama']=$nama;
		$_SESSION['email']=$email;
		$_SESSION['uname']=$uname;
		$_SESSION['level']=$level;
		echo '<script language="javascript">window.location="dist/hasil.php";</script>';
	 }elseif($level == 2){
	$row = mysqli_fetch_array($query);
		$_SESSION['id']=$id;
		$_SESSION['nama']=$nama;
		$_SESSION['email']=$email;
		$_SESSION['uname']=$uname;
		$_SESSION['level']=$level;
		echo '<script language="javascript">window.location="dist/hasil.php";</script>';
	}else{
    	echo '<script language="javascript">window.location="index.php?pesan=gagal";</script>';
	} 
}else{
    	echo '<script language="javascript">window.location="index.php?pesan=gagal";</script>';
    // 	header("location:index.php?pesan=gagal")or die(mysql_error());
	// mysql_error();
}


// echo $pas;
 ?>