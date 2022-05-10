<?php 
  session_start();
  include 'dist/koneksi.php';
	
	$nama = $_POST['nama'];
	$nohp = $_POST['nohp'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$tgl = $_POST['tgl'];
	$waktu = date('Y-m-d H:i:s');
	
	$datas=mysqli_query($conn, "SELECT userdiagnosa.* FROM userdiagnosa WHERE nama = '$nama' AND email = '$email' AND nohp = '$nohp' AND tgl_lahir = '$tgl' ") or die(mysqli_error($conn));
	if(mysqli_num_rows($datas)>0){
		$data = mysqli_fetch_assoc($datas);
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['nohp'] = $data['nohp'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['alamat'] = $data['alamat'];
		$_SESSION['tgl'] = $data['tgl_lahir'];
	} else {
		$track = mysqli_query($conn, "INSERT INTO userdiagnosa VALUES (null, '$nama', '$nohp', '$email', '$alamat', '$tgl', '$waktu')") or die(mysqli_error($conn));
		$_SESSION['nama'] = $_POST['nama'];
		$_SESSION['nohp'] = $_POST['nohp'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['alamat'] = $_POST['alamat'];
		$_SESSION['tgl'] = $_POST['tgl'];
	}
	
	
	if ($track) {
		// echo 'Sudah Sukses';
		header("location:diagnosa.php?input=sukses");
	}else{
		// echo 'Belum Sukses';
		header("location:diagnosa.php?input=gagal");
	}


 ?>
