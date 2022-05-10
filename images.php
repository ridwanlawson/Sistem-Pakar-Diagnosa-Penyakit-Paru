<?php 

function uploadKtp(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['ktp']['name'];
	$ukuranFile = $_FILES['ktp']['size'];
	$error = $_FILES['ktp']['error'];
	$tmpName = $_FILES['ktp']['tmp_name'];

	if ($error === 4) {
		$ktp_old = $_POST['ktp_old'];
		return $ktp_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File KTP Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 2000000) {
		$data = "Error Ukuran File KTP Harus kurang dari 2 MB!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/ktp/'.$namaFileBaru);

	return $namaFileBaru;
}

function uploadKk(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['kk']['name'];
	$ukuranFile = $_FILES['kk']['size'];
	$error = $_FILES['kk']['error'];
	$tmpName = $_FILES['kk']['tmp_name'];

	if ($error === 4) {
		$kk_old = $_POST['kk_old'];
		return $kk_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File KK Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 2000000) {
		$data = "Error Ukuran File KK Harus kurang dari 2 MB!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/kk/'.$namaFileBaru);

	return $namaFileBaru;
}

function uploadSuni(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['suni']['name'];
	$ukuranFile = $_FILES['suni']['size'];
	$error = $_FILES['suni']['error'];
	$tmpName = $_FILES['suni']['tmp_name'];

	if ($error === 4) {
		$suni_old = $_POST['suni_old'];
		return $suni_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File Surat Nikah Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 2000000) {
		$data = "Error Ukuran File Surat Nikah Harus kurang dari 2 MB! <a target='_blank' href='https://www.ps2pdf.com/compress-jpg'>Klik Disini Untuk Perkecil Ukuran File</a> ";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/suni/'.$namaFileBaru);

	return $namaFileBaru;
}

function uploadPbb(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['pbb']['name'];
	$ukuranFile = $_FILES['pbb']['size'];
	$error = $_FILES['pbb']['error'];
	$tmpName = $_FILES['pbb']['tmp_name'];

	if ($error === 4) {
		$pbb_old = $_POST['pbb_old'];
		return $pbb_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File PBB Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 2000000) {
		$data = "Error Ukuran File PBB Harus kurang dari 2 MB!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/pbb/'.$namaFileBaru);

	return $namaFileBaru;
}

function uploadRekli(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['rekli']['name'];
	$ukuranFile = $_FILES['rekli']['size'];
	$error = $_FILES['rekli']['error'];
	$tmpName = $_FILES['rekli']['tmp_name'];

	if ($error === 4) {
		$rekli_old = $_POST['rekli_old'];
		return $rekli_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File Rekening Listrik Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 2000000) {
		$data = "Error Ukuran File Rekening Listrik Harus kurang dari 2 MB!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/rekli/'.$namaFileBaru);

	return $namaFileBaru;
}

function uploadRekta(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['rekta']['name'];
	$ukuranFile = $_FILES['rekta']['size'];
	$error = $_FILES['rekta']['error'];
	$tmpName = $_FILES['rekta']['tmp_name'];

	if ($error === 4) {
		$rekta_old = $_POST['rekta_old'];
		return $rekta_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File Rekening Tabungan Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 2000000) {
		$data = "Error Ukuran File Rekening Tabungan Harus kurang dari 2 MB!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/rekta/'.$namaFileBaru);

	return $namaFileBaru;
}

function uploadSlip(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['slip']['name'];
	$ukuranFile = $_FILES['slip']['size'];
	$error = $_FILES['slip']['error'];
	$tmpName = $_FILES['slip']['tmp_name'];

	if ($error === 4) {
		$slip_old = $_POST['slip_old'];
		return $slip_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File Slip Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 2000000) {
		$data = "Error Ukuran File Slip Harus kurang dari 2 MB!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/slip/'.$namaFileBaru);

	return $namaFileBaru;
}

function uploadIzin(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['izin']['name'];
	$ukuranFile = $_FILES['izin']['size'];
	$error = $_FILES['izin']['error'];
	$tmpName = $_FILES['izin']['tmp_name'];

	if ($error === 4) {
		$izin_old = $_POST['izin_old'];
		return $izin_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File Izin-izin Usaha Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 2000000) {
		$data = "Error Ukuran File Izin-izin Usaha Harus kurang dari 2 MB!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/izin/'.$namaFileBaru);

	return $namaFileBaru;
}

function uploadImb(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['imb']['name'];
	$ukuranFile = $_FILES['imb']['size'];
	$error = $_FILES['imb']['error'];
	$tmpName = $_FILES['imb']['tmp_name'];

	if ($error === 4) {
		$imb_old = $_POST['imb_old'];
		return $imb_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File SHM/SHGB, IMB Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 2000000) {
		$data = "Error Ukuran File SHM/SHGB, IMB Harus kurang dari 2 MB!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/imb/'.$namaFileBaru);

	return $namaFileBaru;
}

function uploadBpkb(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['bpkb']['name'];
	$ukuranFile = $_FILES['bpkb']['size'];
	$error = $_FILES['bpkb']['error'];
	$tmpName = $_FILES['bpkb']['tmp_name'];

	if ($error === 4) {
		$bpkb_old = $_POST['bpkb_old'];
		return $bpkb_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File BPKB, Faktur, STNK, SIM Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 2000000) {
		$data = "Error Ukuran File BPKB, Faktur, STNK, SIM Harus kurang dari 2 MB!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/bpkb/'.$namaFileBaru);

	return $namaFileBaru;
}

 ?>
<!--  <a target='_blank' href='https://www.ps2pdf.com/compress-jpg'>Klik Disini Untuk Perkecil Ukuran File</a> -->