<?php
  include 'header.php';
?>
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12">
            <div class="login-brand">
	        	<h1><?= $judul->nm_perusahaan ?></h1>
              <img src="images/logo.png" alt="logo" width="100" class="shadow-light">
            </div>

            <div class="card card-primary">
              <div class="card-header">
              	<h4>Diagnosa <?= $_SESSION['nama'] ?></h4>
              </div>

              <div class="card-body">
              	<p>Centang Diagnosa yang sesuai dengan keluhan anda :-) </p>
                <form method="POST" action="diagnosa_act.php" class="needs-validation" novalidate="">
	            	<table width="100%" align="center" class="table table-striped" style="">
	            		<thead>
	            			<tr>
	            				<th class="text-center" style="color: white">Gejala</th>
	            				<th class="text-center" style="color: white">Diagnosa</th>
	            			</tr>
	            		</thead>
	            		<tbody>
						<?php 
						$datas=mysqli_query($conn, "SELECT userdiagnosa.* FROM userdiagnosa WHERE nama = '$_SESSION[nama]' AND email = '$_SESSION[email]' AND nohp = '$_SESSION[nohp]' AND tgl_lahir = '$_SESSION[tgl]'") or die(mysqli_error($conn)); 
						$data = mysqli_fetch_array($datas);
						?>
							<input type="hidden" name="id" value="<?= $data['id_userdiagnosa'] ?>">
						<?php
						$brg=mysqli_query($conn, "SELECT gejala.* FROM gejala order by id_gejala") or die(mysqli_error($conn));
						$no=1;
						while($b=mysqli_fetch_array($brg)){ ?>
	            			<tr>
	            				<td><b><?= '('.$b['id_gejala'].') '.$b['nm_gejala'] ?></b></td>
	            				<td>
	            					<center>
										<div class="form-check">
										  <input name="gejala[]" value="<?= $b['id_gejala'] ?>" style="transform : scale(3); margin-top: -5px " class="form-check-input" type="checkbox">
										</div>
	            					</center>
	            				</td>
	            			</tr>
	                	<?php 
	                	}
	                	?>
	            		</tbody>
	            	</table>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg" tabindex="4">
                      Check
                    </button>
                  </div>
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