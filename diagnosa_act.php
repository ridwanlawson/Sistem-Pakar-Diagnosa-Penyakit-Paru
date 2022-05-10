<?php 
include 'header.php';
include 'dist/koneksi.php';
// error_reporting(0);
	if (empty($_POST['id'])) {
		echo '<script language="javascript">window.location="diagnosa.php";</script>';
	} 

	$id = $_POST['id'];
	$gejala = implode(",", $_POST['gejala']);
	
	$datas=mysqli_query($conn, "SELECT penyakit.* FROM penyakit WHERE id_gejala = '$gejala'") or die(mysqli_error($conn));
	$data=mysqli_fetch_array($datas);
	if (!empty($data)) {
		$date = date('Y-m-d H:i:s');
		$id_penyakit = $data['id_penyakit'];
		$simpan = mysqli_query($conn, "INSERT INTO diagnosa VALUES(null, '$id', '$id_penyakit', '$date')");
		// echo "<h1>".$id_penyakit."</h1>";
	} 
	
 ?><?php
?>
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12">
            <div class="login-brand">
	        	<h3><?= $judul->nm_perusahaan ?></h3>
              <img src="images/logo.png" alt="logo" width="100" class="shadow-light">
            </div>
            <div class="card card-primary">
              <div class="card-body">
              	<h4 align="center">Hasil Diagnosa <?= $_SESSION['nama'] ?></h4>
                <form method="POST" action="diagnosa_act.php" class="needs-validation" novalidate="">
	            	<table width="100%" align="center" class="table table-striped" style="">
	            		<thead>
	            			<tr>
	            				<th class="text-center" style="color: white">Keterangan</th>
	            				<th class="text-center" style="color: white">Hasil</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			<?php if (!empty($data)): ?>
	            				
	            			<tr>
	            				<td><b>Nama Penyakit</b></td>
	            				<td><b><?= ucwords($data['nama_penyakit']) ?></b></td>
	            			</tr>
	            			<tr>
	            				<td><b>Gejala</b></td>
	            				<td><b>
	            						<?php 
	            							$no = 1;
	            							$arrgejala = explode(",", $data['id_gejala']);
	            							foreach ($arrgejala as $datagejala) {
												$datass=mysqli_query($conn, "SELECT gejala.* FROM gejala WHERE id_gejala = '$datagejala'") or die(mysqli_error($conn));
												while ($datasss=mysqli_fetch_array($datass)) {
													echo $no++.'. '.$datasss['nm_gejala'].'<br>'; 
												}
	            							 } 
	            						 ?>
	            					</b>
	            				</td>
	            			</tr>
	            			<tr>
	            				<td><b>Keterangan</b></td>
	            				<td><b><?= ucwords($data['ket']) ?></b></td>
	            			</tr>
	            			<tr>
	            				<td><b>Pencegahan</b></td>
	            				<td><b><?= ucwords($data['pencegahan']) ?></b></td>
	            			</tr>
	            			<tr>
	            				<td><b>Penanggulangan</b></td>
	            				<td><b><?= ucwords($data['penanggulangan']) ?></b></td>
	            			</tr>
	            			<tr>
	            				<td><b>Gambar</b></td>
	            				<td><b><img src="dist/file/<?= $data['gambar_pen'] ?>" width="100%"></b></td>
	            			</tr>
	            			<?php else: ?>
            				<tr>
            					<td colspan="2" align="center">Maaf Penyakit Tidak Terdeteksi</td>
            				</tr>
	            			<?php endif ?>
	            		</tbody>
	            	</table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
  include 'footer.php';
?>