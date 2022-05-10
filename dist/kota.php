<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Entri Data</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Kota</h2>
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
                    <h4>Input Kota</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="post"> 
                    <div class="form-row">
                      <div class="form-group col-md-4">
                          <label>Nama Daerah</label>
                          <select name="daerah"  required="" class="form-control">
                            <?php  
                              $queri = mysqli_query($conn, "SELECT * FROM daerah");
                              while ($daerah = mysqli_fetch_array($queri)) {
                            ?>
                            <option value="<?php echo $daerah[0] ?>"><?php echo ucwords($daerah[1]) ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class="form-group col-md-4">
                          <label>Nama Kota</label>
                          <input type="text" name="kota" maxlength="30" minlength="4" required=""  placeholder="Padang" class="form-control">
                      </div>
                      <div class="form-group col-md-2">
                          <label>Kode Kota</label>
                          <input type="text" name="kd_kota" maxlength="4" minlength="1" required=""  placeholder="PDG" class="form-control">
                      </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
<?php  
                  if (isset($_POST['submit'])) {
                    $daerah=$_POST['daerah'];
                    $kota=strtolower($_POST['kota']);
                    $kd_kota=strtolower($_POST['kd_kota']);
                    $query = mysqli_query($conn, "insert into kota values(null, '$daerah', '$kota', '$kd_kota')") or die(mysql_error());
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
                            <th>Nama Kota</th>
                            <th>Nama Daerah</th>
                            <th>Kode Kota</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysqli_query($conn, "SELECT kota.*, daerah.* FROM kota, daerah WHERE daerah.id_daerah = kota.id_daerah order by id_kota desc") or die(mysql_error());
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo ucwords($b['nm_kota']) ?></td>
                            <td><?php echo ucwords($b['daerah']) ?></td>
                            <td><?php echo strtoupper($b['kd_kota']) ?></td>
                            <td><a href="hapus_all.php?jen=kota&id=<?php echo $b['0'] ?>" class="form-control btn-primary" style="text-decoration: none;"><center>Hapus</center></a></td>
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