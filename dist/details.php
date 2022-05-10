<?php 
  include 'header.php'; 
  include 'koneksi.php';
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Approval</h1>
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
                    <h4>Check Produk</h4>
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
                            <th>Nama Customer</th>
                            <th>Nama Barang</th>
                            <th>Kali Pengiriman</th>
                            <th>Jatuh Tempo</th>
                            <th>Qty</th>
                            <th>Tempat Penerimaan Barang</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Diskon</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          	<td>1</td>
                          	<td>Kusnadi</td>
                          	<td>Pertalite</td>
                          	<td>1/1</td>
                          	<td>July 19, 2018</td>
                          	<td>1000 l</td>
                          	<td>Gudang Pertamina</td>
                          	<td>19 Juni 2018</td>
                          	<td>Rp. 1.600.000</td>
                          	<td>Rp. 16.000.000</td>
                          	<td>Telah Sampai</td>
                          </tr>
                          <tr>
                          	<td>2</td>
                          	<td>Kusnadi</td>
                          	<td>Pertamax</td>
                          	<td>1/1</td>
                          	<td>July 19, 2018</td>
                          	<td>100 l</td>
                          	<td>Gudang Pertamina</td>
                          	<td>19 Juni 2018</td>
                          	<td>Rp. 1.000.000</td>
                          	<td>Rp. 10.000.000</td>
                          	<td>Telah Sampai</td>
                          </tr>
                          <tr>
                          	<td>1</td>
                          	<td>Kusnadi</td>
                          	<td>Solar Non-Subsidi</td>
                          	<td>1/1</td>
                          	<td>July 19, 2018</td>
                          	<td>300 l</td>
                          	<td>Gudang Pertamina</td>
                          	<td>19 Juni 2018</td>
                          	<td>Rp. 300.000</td>
                          	<td>Rp. 3.000.000</td>
                          	<td>Telah Sampai</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <a href="cekstat.php" style="border-style: none;"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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