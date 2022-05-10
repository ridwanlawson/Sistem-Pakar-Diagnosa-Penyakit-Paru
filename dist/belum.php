<?php 
  include 'header.php'; 
  include 'koneksi.php';
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Belum dikirim</h1>
          </div>

          <div class="section-body">
          	            
              <?php 
                  include 'koneksi.php';
                  $query = mysqli_query($conn, "SELECT * FROM pengiriman WHERE id_pengirim = '$_SESSION[id]'");
                  while ($data = mysqli_fetch_array($query)) { 
                    if ($data['status'] == "sampai" && $data['click'] == 0) { ?>
                    <div class="alert alert-primary alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Apakah Anda Ingin Memesan Fastron 300 unit? <a href="kirim.php" style="color:cyan">Klik Pesan Sekarang!</a>.
                      </div>
                    </div>
               <?php     
                  }
                }
               ?>

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
                        Berhasil Menambahkan.
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
                        Gagal Menambahkan.
                      </div>
                    </div>
            <?php }else{

            } ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Barang Belum Kirim</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Nama Pengirim</th>
                            <th>No HP Pengirim</th>
                            <th>Alamat Pengirim</th>
                            <th>Nama Penerima</th>
                            <th>No HP Penerima</th>
                            <th>Alamat Penerima</th>
                            <th>Tujuan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysqli_query($conn, "SELECT pengiriman.*, tarif.*, kota.* FROM pengiriman, tarif, kota WHERE tarif.id_tarif = pengiriman.id_tarif AND kota.id_kota = tarif.id_kota AND NOT EXISTS (SELECT * FROM tracking WHERE tracking.id_pengiriman = pengiriman.id_pengiriman)");
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo ucwords($b['nm_pengirim']) ?></td>
                            <td><?php echo $b['nohp_pengirim'] ?></td>
                            <td><?php echo ucwords($b['alt_pengirim']) ?></td>
                            <td><?php echo ucwords($b['nm_penerima']) ?></td>
                            <td><?php echo $b['nohp_penerima'] ?></td>
                            <td><?php echo ucwords($b['alt_penerima']) ?></td>
                            <td><?php echo ucwords($b['nm_kota']) ?></td>
                            <td><a href="proses_barang.php?id=<?php echo $b[0] ?>" class="form-control btn btn-primary">Kirim</a></td>
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
                            <!-- <th>Tanggal Masuk</th> -->
                            <!-- <th>Jumlah (Unit)</th> -->
<!--                             <td><?php //echo date('d-M-Y', strtotime($b[3])) ?></td>
                            <td><?php // echo $b[4] ?></td> -->