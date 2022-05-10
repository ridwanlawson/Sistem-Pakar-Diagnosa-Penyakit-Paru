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
			$id = $_GET['id'];
      $judul = $_POST['judul'];
			$isi = $_POST['isi'];
      $jenis = $_POST['jenis'];
			// $gambar = $_POST['image']['name'];
			$today = "Tanggal : ".date("j F Y, ")."Pukul ".date("g:i a");

           $encoded_image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
           $encoded_image = 'data:image/' . $ext . ';base64,' . $encoded_image;

          $query = "UPDATE berita SET judul = '$judul', isi = '$isi', gambar = '$encoded_image' WHERE id = '$id'";

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
       }else{

           $id = $_GET['id'];
           $judul = $_POST['judul'];
           $isi = $_POST['isi'];
           $jenis = $_POST['jenis'];
           $gambar = $_POST['old_img'];
           $today = "Tanggal : ".date("j F Y, ")."Pukul ".date("g:i a");

           $query = "UPDATE berita SET judul = '$judul', isi = '$isi', gambar = '$gambar' WHERE id = '$id'";

           mysqli_query($conn, $query);
           
           if(mysqli_affected_rows($conn) > 0) {
              echo "Status : Uploaded";
              $last_insert_id = mysqli_insert_id($conn); 
              header('location:pengumuman_h.php?input=sukses');
           } else {
              echo "Status : Failed to upload!";
              header('location:pengumuman_h.php?input=gagal');
           }
       }
  }else{

           $id = $_POST['id'];
           $judul = $_POST['judul'];
           $isi = $_POST['isi'];

           $query = "UPDATE berita SET judul = '$judul', isi = '$isi' WHERE id = '$id'";

           mysqli_query($conn, $query);
           
           if(mysqli_affected_rows($conn)>0){
              echo "Status : Uploaded";
              $last_insert_id = mysqli_insert_id($conn); 
              header('location:pengumuman_h.php?input=sukses');
           } else {
              echo "Status : Failed to upload!";
              header('location:pengumuman_h.php?input=gagal');
           }
       }
}

 ?>
