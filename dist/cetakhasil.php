<?php 
  include 'koneksi.php';
  $sql = $conn->query("SELECT * FROM perusahaan WHERE id_perusahaan = 1");
  $judul = $sql->fetch_object();  
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $judul->nm_perusahaan; ?></title>
	<link rel="stylesheet" href="assets/css/style.css">
	<script type="text/javascript">
		window.print();
	</script>
</head>
<body>
      		<h1 align="center"><?php echo $judul->nm_perusahaan; ?></h1>
      		<h3 align="center">Laporan Data Diagnosa</h3>
      		<h4>
      			<?php 
      			if (!empty($_GET['dtgl'])) { ?>
	      			Tanggal : <?php echo date('d-M-Y', strtotime($_GET['dtgl']))  ?> s/d <?php echo date('d-M-Y', strtotime($_GET['stgl']))  ?>
<?php      			} else {
      				# code...
	      			}
      			 ?>
      		</h4>
      		<center>
                      <table width="100%" class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Hasil Diagnosa</th> 
                            <th>Waktu Masuk</th> 
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if (!empty($_GET['stgl'])||!empty($_GET['dtgl'])) {
                            $brg=mysqli_query($conn, "SELECT diagnosa.*, userdiagnosa.*, penyakit.* FROM diagnosa, userdiagnosa, penyakit WHERE penyakit.id_penyakit = diagnosa.id_penyakit AND diagnosa.id_userdiagnosa = userdiagnosa.id_userdiagnosa  AND diagnosa.waktu BETWEEN '$_GET[dtgl]' AND '$_GET[stgl]' order by diagnosa.id_userdiagnosa desc") or die(mysql_error());
                            }else{
                            $brg=mysqli_query($conn, "SELECT diagnosa.*, userdiagnosa.*, penyakit.* FROM diagnosa, userdiagnosa, penyakit WHERE penyakit.id_penyakit = diagnosa.id_penyakit AND diagnosa.id_userdiagnosa = userdiagnosa.id_userdiagnosa order by diagnosa.id_userdiagnosa desc") or die(mysql_error());
                            }

                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo 'U-'.$b['id_userdiagnosa'] ?></td>
                            <td><?php echo ucwords($b['nama']) ?></td>
                            <td><?php echo ucwords($b['nama_penyakit']) ?></td>
                            <td><?php echo date('d-m-Y H:i:s', strtotime($b['waktu'])) ?></td>
                            <!-- <td><a href="hapus_all.php?jen=gejala&id=<?php echo $b['0'] ?>" class="form-control btn-primary" style="text-decoration: none;"><center>Hapus</center></a></td> -->
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </center>
</body>
</html>