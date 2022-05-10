<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Entri Data</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Penyakit</h2>
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
                    <h4>Input Penyakit</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data"> 
                    <div class="form-row">
                      <div class="form-group col-md-2">
                          <label>Kode Penyakit</label>
                          <input type="text" maxlength="6" name="kode" required="" style="text-transform: uppercase" class="form-control" value="<?=$_GET['id']?>" <?php if ($_GET['jen']=='edit'): ?>readonly<?php endif ?>>
                      </div>
                      <div class="form-group col-md-3">
                          <label>Nama Penyakit</label>
                          <textarea name="penyakit" required="" class="form-control"><?=$_GET['nama']?></textarea>
                      </div>
                      <div class="form-group col-md-7">
                          <label>Nama Gejala</label>
                          <select name="gejala[]" required="" class="form-control select2" style="width: 100%" multiple="">
                            <?php 
                              $gejala = explode(",", $_GET['idgejala']); 
                              $query = mysqli_query($conn, "SELECT * FROM gejala");
                              while ($data = (mysqli_fetch_array($query))) { ?>
                                <option value="<?= $data['id_gejala'] ?>"<?php if (in_array($data['id_gejala'], $gejala)): ?>selected<?php endif ?>><?= '('.$data['id_gejala'].') '.$data['nm_gejala'] ?></option>
                            <?php
                              }
                             ?>
                          </select>
                      </div>
                      <div class="form-group col-md-4">
                          <label>Keterangan</label>
                          <textarea name="ket" required="" class="form-control" value=""><?=$_GET['ket']?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                          <label>Pencegahan</label>
                          <textarea name="penc" required="" class="form-control" value=""><?=$_GET['penc']?></textarea>
                      </div>
                      <div class="form-group col-md-4">
                          <label>Penanggulangan</label>
                          <textarea name="pena" required="" class="form-control" value=""><?=$_GET['pena']?></textarea>
                      </div><!-- 
                      <div class="form-group col-md-12">
                          <label>Gambar</label>
                          <input type="file" name="foto" accept=".jpg, .png, .jpeg" class="form-control">
                      </div> -->
                    </div>
                    <input type="hidden" name="jenis" value="<?= $_GET['jen'] ?>">
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
<?php  
                  if (isset($_POST['submit'])) {
                    if ($_POST['jenis']=='edit') {
                      $kode=strtoupper($_POST['kode']);
                      $nm_jen=strtolower($_POST['penyakit']);
                      $gejala= implode(",", $_POST['gejala']);
                      $penc=strtolower($_POST['penc']);
                      $pena=strtolower($_POST['pena']);
                      $ket=strtolower($_POST['ket']);
                      $query = mysqli_query($conn, "UPDATE penyakit SET id_gejala = '$gejala', nama_penyakit = '$nm_jen', ket = '$ket', pencegahan = '$penc', penanggulangan = '$pena' WHERE id_penyakit = '$kode'") or die(mysqli_error($conn));
                    } else {
                      $kode=strtoupper($_POST['kode']);
                      $nm_jen=strtolower($_POST['penyakit']);
                      $ket=strtolower($_POST['ket']);
                      $penc=strtolower($_POST['penc']);
                      $pena=strtolower($_POST['pena']);
                      $gejala = implode(",", $_POST['gejala']);
                      $limit = 10 * 1024 * 1024;
                      $ekstensi =  array('png','jpg','jpeg');
                      $jumlahFile = count($_FILES['foto']['name']);
                        $namafile = $_FILES['foto']['name'];
                        $tmp = $_FILES['foto']['tmp_name'];
                        $tipe_file = strtolower(pathinfo($namafile, PATHINFO_EXTENSION));
                        $ukuran = $_FILES['foto']['size'];
                        if (!empty($namafile)) {    
                          if($ukuran > $limit){
                                echo "<script>
                                        alert('Gagal Karena File Melebihi Batas');
                                      </script>";
                          }else{
                            if(!in_array($tipe_file, $ekstensi)){
                                echo "<script>
                                        alert('Gagal Karena Ekstensi File Bukan Berupa Gambar');
                                      </script>";   
                            }else{    
                              move_uploaded_file($tmp, 'file/'.date('d-m-Y').'-'.$namafile);
                              $xs = date('d-m-Y').'-'.$namafile;
                              $query = mysqli_query($conn, "insert into penyakit values('$kode','$gejala','$nm_jen','$ket','$penc','$pena', '$xs')") or die(mysqli_error($conn));
                              if ($query) {
                                echo "<script>
                                        alert('Berhasil Menambahkan');
                                      </script>";
                              } else {
                                echo "<script>
                                        alert('Gagal Menambahkan');
                                      </script>";
                              }
                              
                            }
                          }
                      }else{
                          $query = mysqli_query($conn, "insert into penyakit values('$kode','$gejala','$nm_jen','$ket','$penc','$pena', null)") or die(mysqli_error($conn));
                            // $simpan = mysqli_query($conn,"INSERT INTO gambar VALUES(NULL, '$nama', '$email', '$xs')");
                            if ($query) {
                              echo "<script>
                                      alert('Berhasil Menambahkan');
                                    </script>";
                            } else {
                              echo "<script>
                                      alert('Gagal Menambahkan');
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
                            <th>Kode Penyakit</th>
                            <th>Kode Gejala</th>
                            <th>Nama Penyakit</th>
                            <th>Keterangan</th>
                            <th>Pencegahan</th>
                            <th>Penanggulangan</th>
                            <!-- <th>Gambar penyakit</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysqli_query($conn, "SELECT * FROM penyakit order by id_penyakit desc") or die(mysql_error());
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){
                              $id = $b['0'];                            
                          ?>                                 
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $id ?></td>
                            <td><?php echo ucwords($b['1']) ?></td>
                            <td><?php echo ucwords($b['2']) ?></td>
                            <td><?php echo ucwords($b['3']) ?></td>
                            <td><?php echo ucwords($b['4']) ?></td>
                            <td><?php echo ucwords($b['5']) ?></td>
                            <!-- <td><img src="file/<?php echo ucwords($b['6']) ?>" width="100%" alt="gambar"></td> -->
                            <td>
                              <a href="penyakit.php?jen=edit&id=<?php echo $b['0']; ?>&idgejala=<?php echo $b['1']; ?>&nama=<?php echo $b['2']; ?>&ket=<?php echo $b['3']; ?>&penc=<?php echo $b['4']; ?>&pena=<?php echo $b['5']; ?>" class="form-control btn-primary" style="text-decoration: none;"><center>Edit</center></a>
                              <a href="hapus_all.php?jen=penyakit&id=<?php echo $b['0'] ?>" class="form-control btn-danger" style="text-decoration: none;"><center>Hapus</center></a>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
//        CKEDITOR.replace('ket');
  //      CKEDITOR.replace('penc');
    //    CKEDITOR.replace('pena');
    </script>
<?php include "footer.php"; ?>