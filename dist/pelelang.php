<?php 
  include 'header.php'; 
  include 'koneksi.php';
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pelelang</h1>
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
                    <h4>Pelelang Masuk</h4>
                  </div>
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
                            <th>Nama Pelelang</th>
                            <th>No Handphone</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Harga Lelang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Masuk</th>
                            <th>Gambar</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;

                            $query = mysqli_query($conn, "SELECT pelelang.*, lelang.* FROM  pelelang, lelang WHERE pelelang.idLelang = lelang.idLelang AND pelelang.status = 'masuk' order by pelelang.idPelelang desc") or die(mysqli_error($conn));
                            
                            while ($data = mysqli_fetch_array($query)) {

                              $awalnohp = substr($data['nohpPelelang'], 0,1);
                              if ($awalnohp == 0) {
                                $nohp = substr($data['nohpPelelang'], 1);
                              } else {
                                $nohp = $data['nohpPelelang'];
                              }
                          ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo ucwords($data['namaPelelang']); ?></td>
                            <td><a target="_blank" data-toggle="tooltip" data-placement="top" title="Klik Untuk Menghubungi Via Whatsapp" href="https://wa.me/62<?php echo $nohp; ?>?text=Halo%20kami%20dari%20PT%20KSI">0<?php echo $nohp; ?></a></td>
                            <td><a target="_blank" data-toggle="tooltip" data-placement="top" title="Klik Untuk Menghubungi Via Gmail" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $data->email; ?>&su=Pemberitahuan&body=Halo%20kami%20dari%20PT%20KSI"><?php echo strtolower($data['emailPelelang']); ?></a></td>
                            <td><?php echo ucwords($data['alamat']); ?></td>
                            <td><?php echo 'Rp.'.number_format($data['hargaLelang']); ?></td>
                            <td><?php echo number_format($data['jumlahDisanggupi']); ?></td>
                            <td><?php echo ucwords($data['status']); ?></td>
                            <td>
                            <?php 
                              $gambars = mysqli_query($conn, "SELECT * FROM gambar WHERE gambar.namaPelelang = '$data[namaPelelang]' AND gambar.email = '$data[emailPelelang]' ") or die(mysqli_error($conn));
                              while ($gambar = mysqli_fetch_array($gambars)) { ?>
                                  <a href="#" data-toggle="modal" data-target="#exampleModalgam<?= $gambar[idGambar]?>">
                                    <img data-toggle="tooltip" data-placement="top" title="Klik Untuk Melihat Gambar" src="../file/<?= $gambar['gambar'] ?>" width="100%">
                                  </a>
        <?php                   }
                             ?>
                              
                            </td>
                            <td>
                              <a data-toggle="modal" data-target="#exampleModal<?= $data['idPelelang']?>" href="" class="form-control btn btn-primary"><i class="fas fa-check"></i> Diterima / Menang</a>
                              <a data-toggle="modal" data-target="#exampleModaldel<?= $data['idPelelang']?>" href="" class="form-control btn btn-danger"><i class="fas fa-times"></i> Gagal</a>
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
      <?php 
        $dataas = mysqli_query($conn, "SELECT pelelang.* FROM pelelang WHERE pelelang.status = 'masuk'");
        while ($datass =  mysqli_fetch_array($dataas)) {
       ?>
      <div class="modal fade" id="exampleModal<?= $datass['idPelelang']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pemenang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="selesai.php" method="POST">
              <div class="modal-body"> 
                <div class="form-row">
                    <input type="hidden" name="id" value="<?= $datass['idPelelang']?>" class="form-control">
                  <div class="col-md-6">
                    <label>Jumlah yang Disepakati</label>
                    <input type="number" name="jml" value="<?= $datass['jumlahDisanggupi']?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Harga yang Disepakati</label>
                    <input type="number" name="harga" value="<?= $datass['hargaLelang']?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php 
        }
       ?>

      <?php 
        $dataass = mysqli_query($conn, "SELECT pelelang.* FROM pelelang WHERE pelelang.status = 'masuk'");
        while ($datasss =  mysqli_fetch_array($dataass)) {
       ?>
      <div class="modal fade" id="exampleModaldel<?= $datasss['idPelelang']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="gagal.php?id=<?php echo $datasss['idPelelang']; ?>" method="POST">
              <div class="modal-body"> 
                <h1 align="center">Apakah Anda Yakin Akan Menghapus Data Ini?</h1>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php 
        }
       ?>

      <?php 
        $dataas = mysqli_query($conn, "SELECT gambar.* FROM gambar");
        while ($datass =  mysqli_fetch_array($dataas)) {
       ?>
      <div class="modal fade" id="exampleModalgam<?= $datass['idGambar']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Gambar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="selesai.php" method="POST">
              <div class="modal-body"> 
                <img src="../file/<?= $datass['gambar'] ?>" width="100%">
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php 
        }
       ?>
<?php include 'footer.php' ?>
                            <!-- <th>Tanggal Masuk</th> -->
                            <!-- <th>Jumlah (Unit)</th> -->
<!--                             <td><?php //echo date('d-M-Y', strtotime($b[3])) ?></td>
                            <td><?php // echo $b[4] ?></td> -->