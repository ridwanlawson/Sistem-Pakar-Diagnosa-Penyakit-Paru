<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Entri Data</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Pengguna</h2>
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
                    <h4>Input Pengguna</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="post">
                    <div class="form-row">
                      <div class="form-group col-md-2">
                        <label>Username</label>
                        <input type="text" name="nm" placeholder="Admin" class="form-control" required="">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Email</label>
                        <input type="email" name="em" placeholder="admin@tm.co.id" class="form-control" required="">
                      </div>                
                      <div class="form-group col-md-2">
                        <label>Password </label>
                        <div class="input-group">
                          <input type="password" name="pass" placeholder="******" class="form-control pwstrength" required="" data-indicator="pwindicator">
                        </div>
                        <div id="pwindicator" class="pwindicator">
                          <div class="bar"></div>
                          <div class="label"></div>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <label>Level</label>
                        <select class="form-control"  name="lvl" required=""> 
                          <option value="1">Admin</option>
                          <option value="2">Pimpinan</option>
                        </select>
                      </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
<?php  
                  if (isset($_POST['submit'])) {
                    $nm=strtolower($_POST['nm']);
                    $em=strtolower($_POST['em']);
                    $pass=md5($_POST['pass']);
                    $lvl=$_POST['lvl'];
                    $kota=$_POST['kota'];
                    $query = mysqli_query($conn, "insert into user values(null, '$nm', '$em', '$pass', '$lvl')") or die(mysqli_error($conn));
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysqli_query($conn, "SELECT user.* FROM user order by id_user desc") or die(mysqli_error($conn));
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo ucwords($b['1']) ?></td>
                            <td><?php echo ucwords($b['2']) ?></td>
                            <td><?php if ($b['4']=='1') {
                                        echo 'Admin';                    
                                      }elseif ($b['4']=='2'){
                                        echo 'Pimpinan';
                                      } ?>
                            </td>
                            <td><a href="hapus_all.php?jen=user&id=<?php echo $b['0'] ?>" class="form-control btn-primary" style="text-decoration: none;"><center>Hapus</center></a></td>
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