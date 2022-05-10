<?php 

	include '../../koneksi.php';
	if(isset($_POST['simpan']) && !empty($_POST['simpan'])) {
    if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
        //Allowed file type
        $allowed_extensions = array("jpg","jpeg","png","gif");
    
        //File extension
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    
        //Check extension
        if(in_array($ext, $allowed_extensions)) {
           //Convert image to base64
			$judul = $_POST['judul'];
			$isi = $_POST['isi'];
			// $gambar = $_POST['image']['name'];
			$today = date("j F Y, g:i a");

           $encoded_image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
           $encoded_image = 'data:image/' . $ext . ';base64,' . $encoded_image;

           $query = "INSERT INTO berita VALUES(null,'$judul','$isi','$encoded_image','$today')";
           mysqli_query($conn, $query);
           echo "File name : " . $_FILES['image']['name'];
           echo "<br>";
           if(mysqli_affected_rows($conn) > 0) {
              echo "Status : Uploaded";
              $last_insert_id = mysqli_insert_id($conn); 
              header('location:pengumuman_h.php?input=sukses');
           } else {
              echo "Status : Failed to upload!";
              header('location:pengumuman_h.php?input=gagal');
           }
       } else {
           echo "File not allowed";
       }
  }else{
      $allowed_extensions = array("jpg","jpeg","png","gif");
    
        //File extension
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    
        //Check extension
        // if(in_array($ext, $allowed_extensions)) {
           //Convert image to base64
      $judul = $_POST['judul'];
      $isi = $_POST['isi'];
      // $gambar = $_POST['image']['name'];
      $today = date("j F Y, g:i a");

           // $encoded_image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
           // $encoded_image = 'data:image/' . $ext . ';base64,' . $encoded_image;
           $encoded_image = 'No Image';

           $query = "INSERT INTO berita VALUES(null,'$judul','$isi','$encoded_image','$today')";
           mysqli_query($conn, $query);
           // echo "File name : " . $_FILES['image']['name'];
           echo "<br>";
           if(mysqli_affected_rows($conn) > 0) {
              echo "Status : Uploaded";
              $last_insert_id = mysqli_insert_id($conn); 
              header('location:pengumuman_h.php?input=sukses');
           } else {
              echo "Status : Failed to upload!";
              header('location:pengumuman_h.php?input=gagal');
           }
       // } else {
       //     echo "Something Gone Wrong";
       // }
  }
}
/*
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$gambar = $_POST['image']['name'];
	$today = date("j F Y, g:i a");

	$result = mysqli_query($conn, "INSERT INTO berita VALUES(null,'$judul','$isi','$gambar','$today')");
	if ($result) {
		header('location:daftar.php?daftar=sukses');
	}else{
		header('location:daftar.php?daftar=gagal');
	}

*/
 ?>
