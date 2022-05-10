<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Entri Data</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Gejala</h2>
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
                    <h4>Input Gejala</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data"> 
                    <div class="form-row">
                      <div class="form-group col-md-2">
                          <label>Kode Gejala</label>
                          <input type="text" name="kode" value="<?= $_GET['id'] ?>" <?php if ($_GET['jen']=='edit'): ?>readonly<?php endif ?> style="text-transform: uppercase" required="" maxlength="6" class="form-control">
                      </div>
                      <div class="form-group col-md-4">
                          <label>Nama Gejala</label>
                          <textarea name="gejala" value="" required="" class="form-control"><?= $_GET['gejala'] ?></textarea>
                      </div><!-- 
                      <div class="form-group col-md-4">
                          <label>Gambar</label>
                          <input type="file" name="foto" accept=".jpg, .png, .jpeg" class="form-control">
                      </div> -->
                    </div>
                    <input type="hidden" name="jenis" value="<?= $_GET['jen'] ?>">
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <a href="gejala.php" type="reset" class="btn btn-icon icon-left btn-danger" value="Reset">Reset</a> 
                    </form>
                  </div>
<?php  
                  if (isset($_POST['submit'])) {
                    // echo $_POST['jenis'];
                    if ($_POST['jenis']=='edit') {
                    $kode=strtoupper($_POST['kode']);
                    $nm_jen=strtolower($_POST['gejala']);
                    $query = mysqli_query($conn, "UPDATE gejala SET nm_gejala = '$nm_jen' WHERE id_gejala = '$kode'") or die(mysqli_error($conn));
                    } else {
                    $kode=strtoupper($_POST['kode']);
                    $nm_jen=strtolower($_POST['gejala']);
                    $limit = 10 * 1024 * 1024;
                    $ekstensi =  array('png','jpg','jpeg');
                    $jumlahFile = count($_FILES['foto']['name']);
                      $namafile = $_FILES['foto']['name'];
                      $tmp = $_FILES['foto']['tmp_name'];
                      $tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
                      $ukuran = $_FILES['foto']['size'];
                      if (!empty($namafile)) {                          
                        if($ukuran > $limit){
                          header("location:gejala.php?alert=gagal_ukuran");    
                        }else{
                          if(!in_array($tipe_file, $ekstensi)){
                            header("location:gejala.php?alert=gagal_ektensi");     
                          }else{    
                            move_uploaded_file($tmp, 'file/'.date('d-m-Y').'-'.$namafile);
                            $xs = date('d-m-Y').'-'.$namafile;
                            $query = mysqli_query($conn, "insert into gejala values('$kode','$nm_jen', '$xs')") or die(mysqli_error($conn));
                            // $simpan = mysqli_query($conn,"INSERT INTO gambar VALUES(NULL, '$nama', '$email', '$xs')");
                            if ($query) {
                              echo "<script>
                                      alert('Berhasil Menambahkan');
                                    </script>";
                            } else {
                              echo "<script>
                                      alert('Berhasil Gagal');
                                    </script>";
                            }
                            
                          }
                        }
                      } else {
                            $query = mysqli_query($conn, "insert into gejala values('$kode','$nm_jen', null)") or die(mysqli_error($conn));
                            // $simpan = mysqli_query($conn,"INSERT INTO gambar VALUES(NULL, '$nama', '$email', '$xs')");
                            if ($query) {
                              echo "<script>
                                      alert('Berhasil Menambahkan');
                                    </script>";
                            } else {
                              echo "<script>
                                      alert('Berhasil Gagal');
                                    </script>";
                            }
                      }  
                    }
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
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <!-- <th>Gambar Gejala</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysqli_query($conn, "SELECT * FROM gejala order by id_gejala desc") or die(mysql_error());
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $b['0'] ?></td>
                            <td><?php echo ucwords($b['1']) ?></td>
                            <!-- <td><img src="file/<?php echo ucwords($b['2']) ?>" width="100%" alt="gambar"></td> -->
                            <td>
                              <a href="gejala.php?jen=edit&id=<?php echo $b['0'] ?>&gejala=<?php echo $b['1'] ?>" class="form-control btn-primary" style="text-decoration: none;"><center>Edit</center></a>
                              <a href="hapus_all.php?jen=gejala&id=<?php echo $b['0'] ?>" class="form-control btn-danger" style="text-decoration: none;"><center>Hapus</center></a>
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