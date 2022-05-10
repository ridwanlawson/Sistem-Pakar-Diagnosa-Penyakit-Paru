 <?php
  include 'config.php';
  $jenis=$_POST['jenis'];
  $sing=$_POST['biaya'];

  $query = mysql_query("INSERT INTO jenis VALUES(null,'$jenis','$sing')") or die(mysql_error());
  if ($query) {
    # code...
    header("location:jenis.php?input=sukses");
  }else{
    header("location:jenis.php?input=gagal");
  }
?>