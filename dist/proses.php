<?php 
  include 'header.php'; 
  include 'koneksi.php';
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Proses</h1>
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
                    <h4>Check Pengiriman</h4>
                  </div><!-- 
                  <form method="get" >
                    <div class="card-body">
                      <div class='form-row'>
                      <div class='form-group col-md-2'>
                      <?php //$date = date('Y'); ?>
                          <select name="tahun" class="form-control">
                            <option value="0">Pilih Tahun</option>
                            <?php //for ($i=2018; $i <= $date ; $i++) { ?>
                           <option><?php //echo $i ?></option>
                           <?php //} ?>
                           <option value="0">Lihat Semua</option>
                          </select>
                        </div>
                      <div class='form-group col-md-2'>
                          <input type="submit" name="cek" value="Cek" class="form-control btn-primary">
                      </div>  
                      </div>
                    </div>
                    </form> -->
<!--                     <div class="card-body">
                    	<div class="button">
                      		<a href="lap_barang.php" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
                  		</div>
                  	</div> -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>No Pengiriman</th>
                            <th>Nama Pengirim</th>
                            <th>Nama Penerima</th>
                            <th>Tujuan</th>
                            <th>Total Biaya</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;  
                            $query = mysqli_query($conn, "SELECT transaksi.*, pengiriman.*, kota.*, tarif.* FROM transaksi, pengiriman, kota, tarif WHERE transaksi.id_pengiriman = pengiriman.id_pengiriman AND pengiriman.id_tarif = tarif.id_tarif AND tarif.id_kota = kota.id_kota AND NOT EXISTS (SELECT * FROM tracking WHERE tracking.id_pengiriman = pengiriman.id_pengiriman AND status = 'sampai' OR tracking.id_pengiriman = pengiriman.id_pengiriman AND status = 'selesai')");
                            while ($data = mysqli_fetch_array($query)) {
                          ?>
                          <tr>
                          	<td><?php echo $no++; ?></td>
                          	<td><?php echo $data['id_pengiriman']; ?></td>
                          	<td><?php echo ucwords($data['nm_pengirim']); ?></td>
                          	<td><?php echo ucwords($data['nm_penerima']); ?></td>
                          	<td><?php echo ucwords($data['nm_kota']); ?></td>
                          	<td><?php echo 'Rp.'.number_format($data['tot_bayar']); ?></td>
                            <td><?php echo ucwords($data['status']); ?></td>
                            <td><a href="sampai.php?id=<?php echo $data['id_pengiriman']; ?>&tgls=<?php echo $data['tgl_kirim']; ?>" class="form-control btn btn-primary">Sampai</a></td>
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