<?php 
  include 'header.php'; 
  include 'koneksi.php';
  // P
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan Transaksi</h1>
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
                    <h4>Laporan Transaksi</h4>
                  </div>
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
                          <a href="lap_transaksi.php?dtgl=<?php echo $_GET['dtgl'] ?>&stgl=<?php echo $_GET['stgl']; ?>" target="_blank" class="btn btn-icon icon-left btn-danger"><i class="fas fa-print"></i> Cetak</a>
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
                            <th>ID Lelang</th>
                            <th>Kebutuhan</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Harga Awal</th>
                            <th>Harga Disepakati</th>
                            <th>Jumlah Awal</th>
                            <th>Jumlah Disepakati</th>
                            <th>Tanggal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            if (!empty($_GET['stgl'])||!empty($_GET['dtgl'])) {

                            $query = mysqli_query($conn, "SELECT pemenang.*,pelelang.*, lelang.* FROM pemenang, pelelang, lelang WHERE pelelang.idLelang = lelang.idLelang AND pelelang.status = 'selesai' AND pemenang.idPelelang = pelelang.idPelelang AND pemenang.timestamppPemenang BETWEEN '$_GET[dtgl]' AND '$_GET[stgl]' order by pemenang.timestamppPemenang desc") or die(mysqli_error($conn));
                            }else{
                              $tahun = date('Y');
                              $query = mysqli_query($conn, "SELECT pemenang.*,pelelang.*, lelang.* FROM pemenang, pelelang, lelang WHERE pelelang.idLelang = lelang.idLelang AND pelelang.status = 'selesai' AND pemenang.idPelelang = pelelang.idPelelang order by pemenang.timestamppPemenang desc") or die(mysqli_error($conn));
                            }
                            
                            while ($data = mysqli_fetch_array($query)) {
                          ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo ucwords($data['idPelelang']); ?></td>
                            <td><?php echo ucwords($data['desk']); ?></td>
                            <td><?php echo ucwords($data['namaPelelang']); ?></td>
                            <td><?php echo strtolower($data['emailPelelang']); ?></td>
                            <td><?php echo ucwords($data['nohpPelelang']); ?></td>
                            <td><?php echo 'Rp.'.number_format($data['hargaLelang']); ?></td>
                            <td><?php echo 'Rp.'.number_format($data['hargaDisepakati']); ?></td>
                            <td><?php echo number_format($data['jumlahDisanggupi']); ?></td>
                            <td><?php echo number_format($data['jumlahDisepakati']); ?></td>
                            <td><?php echo date('d-M-Y', strtotime($data['timestamppPemenang'])); ?></td>
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