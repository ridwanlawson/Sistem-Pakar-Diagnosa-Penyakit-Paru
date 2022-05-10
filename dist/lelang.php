<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Entri Data</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Lelang</h2>
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
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Input lelang</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="post">
                    <div class="form-row">                
                      <div class="form-group col-md-7">
                        <label>Deskripsi</label>
                        <div class="input-group">
                          <input type="text" name="desk" placeholder="deskripsi kebutuhan perusahaan" class="form-control" required="">
                        </div>
                      </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
<?php  
                  if (isset($_POST['submit'])) {
                    $desk=$_POST['desk'];
                    $date=date('Y-m-d');
                    $query = mysqli_query($conn, "insert into lelang values(null, '$desk', 'nonaktif', '$date')") or die(mysqli_error($conn));
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
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Waktu</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysqli_query($conn, "SELECT lelang.* FROM lelang order by stat = 'nonaktif'") or die(mysqli_error($conn));
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo ucwords($b['desk']) ?></td>
                            <td><?php echo ucwords($b['stat']) ?></td>
                            <td><?php echo ucwords($b['timestampp']) ?></td>
                            <td>
                              <?php if ($b['stat'] == 'nonaktif'): ?>
                                <a href="aktif.php?stat=aktif&id=<?php echo $b['0'] ?>" class="form-control btn-success" style="text-decoration: none;"><center>Aktif</center></a>
                              <?php elseif ($b['stat'] == 'aktif'): ?>
                                <a href="aktif.php?stat=nonaktif&id=<?php echo $b['0'] ?>" class="form-control btn-success" style="text-decoration: none;"><center>Nonaktif</center></a>
                              <?php endif ?>
                              <a href="hapus_all.php?jen=Lelang&id=<?php echo $b['0'] ?>" class="form-control btn-primary" style="text-decoration: none;"><center>Hapus</center></a>
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
<?php include "footer.php"; ?>