<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Hasil Diagnosa</h1>
          </div>
			<?php
            // error_reporting(0);
            if (@$_GET['input']=="sukses") {
            ?>
                    <div class="alert alert-primary alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Berhasil.
                      </div>
                    </div>
            <?php }elseif (@$_GET['input']=="gagal") {
              ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Gagal.
                      </div>
                    </div>
            <?php }else{ } ?>
          <div class="section-body">
            <!-- <h2 class="section-title">Data User Hasil Diagnosa</h2> -->
            <!-- <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->
            
            <div class="row">
              <div class="col-12 ">
                <div class="card">
		          <form method="get" >
		            <div class="card-body">
		              <div class='form-row'>
		                <div class='form-group col-md-3'>
		                  <label>Dari Tanggal</label>
		                  <input type="date" name="dtgl" value="<?php if(!empty($_GET['dtgl'])){ echo $_GET['dtgl']; } ?>" class="form-control">
		                </div>
		                <div class='form-group col-md-3'>
		                  <label>Sampai Tanggal</label>
		                  <input type="date" name="stgl" value="<?php if(!empty($_GET['stgl'])){ echo $_GET['stgl']; } ?>" class="form-control">
		                </div> 
		                <div class='form-group col-md-2'>
		                    <label>-</label>
		                    <input type="submit" name="cek" value="Lihat" class="form-control btn btn-primary">
		                </div>  
		              </div>
		              <div class="button">
		                  <a href="cetakhasil.php?dtgl=<?php echo $_GET['dtgl'] ?>&stgl=<?php echo $_GET['stgl']; ?>" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
		              </div>
		            </div>
		          </form>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php include "footer.php"; ?>