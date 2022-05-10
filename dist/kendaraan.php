<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Entri Data</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Kendaraan</h2>
            <!-- <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->
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
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Input Kendaraan</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="post">
                    <div class="form-row">
                      <div class="form-group col-md-2">
                        <label>Nama Kendaraan</label>
                        <input type="text" name="nk" placeholder="Fuso LT 3000" class="form-control" required="">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Nomor Polisi</label>
                        <input type="text" name="ni" placeholder="BA 3225 BT" class="form-control" required="">
                      </div>                
                      <div class="form-group col-md-2">
                        <label>Nama Supir </label>
                        <div class="input-group">
                          <input type="text" name="nr" placeholder="Ujang" class="form-control pwstrength" required="" data-indicator="pwindicator">
                        </div>
                      </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
<?php  
                  if (isset($_POST['submit'])) {
                    $nk=strtolower($_POST['nk']);
                    $ni=strtolower($_POST['ni']);
                    $nr=strtolower($_POST['nr']);
                    $waktu = date('Y-m-d');
                    $query = mysqli_query($conn, "insert into kendaraan values(null, '$nk', '$ni', '$nr', '$waktu')") or die(mysqli_error($conn));
                  }
?>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Nama Kendaraan</th>
                            <th>Nomor Polisi</th>
                            <th>Supir</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysqli_query($conn, "SELECT * FROM kendaraan order by id_kendaraan desc") or die(mysqli_error($conn));
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo ucwords($b['1']); ?></td>
                            <td><?php echo strtoupper($b['2']); ?></td>
                            <td><?php echo ucwords($b['3']); ?></td>
                            <td><a href="hapus_all.php?jen=kendaraan&id=<?php echo $b['0'] ?>" class="form-control btn-primary" style="text-decoration: none;"><center>Hapus</center></a></td>
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