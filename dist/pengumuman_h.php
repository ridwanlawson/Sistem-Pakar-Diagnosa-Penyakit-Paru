<?php 
  include 'header.php'; 
  include 'koneksi.php';
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan</h1>
          </div>

          <div class="section-body">
          	            <?php 
            error_reporting(0);
            if ($_GET['input']=="sukses") {
              # code...

            ?>
                    <div class="alert alert-primary alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Berhasil.
                      </div>
                    </div>
            <?php }elseif ($_GET['input']=="gagal") {
              # code...
              ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Gagal.
                      </div>
                    </div>
            <?php }else{

            } ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Pengumuman</h4>
                  </div>
                    <div class="card-body">
                    	<div class="button">
                      		<!-- <a href="lap_barang.php" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a> -->
                  		</div>
                  	</div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Gambar</th>
                            <th>Timestamp</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysqli_query($conn, "select * from berita");
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $b[1] ?></td>
                            <td ><?php echo $b[2] ?></td>
                            <td>
                                  <img src="<?php echo $b['gambar']; ?>" alt="news image"  class="img-fluid">
                                </div></td>
                            <td ><?php echo $b[4] ?></td>
                            <td>
                                <a href="pk_edit.php?id=<?php echo $b[0]; ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
                                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='pengumuman_hapus.php?id=<?php echo $b[0]; ?>' }" style="color: white" class="btn btn-icon icon-left btn-warning"><i class="fas fa-exclamation-triangle"></i> Delete</a>
                            </td>
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


<?php include 'footer.php' ?>