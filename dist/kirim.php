
<?php 
  error_reporting(1);
  include"header.php"; 
  include"koneksi.php"; 
?>

<script language="javascript">
   function tambahHobi() {
     var idf = document.getElementById("idf").value;
     var stre;
     stre="<div id='srow" + idf + "' class='card-body'> <div class='form-row'> <div class='form-group col-md-3'> <label>Nama Barang</label> <select class='form-control' name='barang'> <option>Nama Barang</option> <?php include 'koneksi.php'; $query = mysqli_query($conn, 'SELECT * FROM barang'); while ($data = mysqli_fetch_array($query)) {?> <option value='<?php echo $data['id_brg'] ?>'><?php echo $data['nm_brg'] ?></option> <?php } ?> </select> </div> <div class='form-group col-md-1'> <label>Jumlah</label> <input type='number' name='jumlah' placeholder='Masukkan Jumlah' <?php if (!empty($_GET['j'])) {?>value='<?php echo $_GET['j'];?>'<?php }else{?>value='1000'<?php } ?> class='form-control'> </div> <div class='form-group col-md-2'> <label>Satuan</label> <select class='form-control' name='satuan'> <option>Pilih Satuan</option> <option value='1' selected>Kl</option> <option value='2'>l</option> <option value='3'>Dus</option> </select> </div> <div class='form-group col-md-2'> <label>Kali Pengiriman</label> <input type='number' name='kali' class='form-control' placeholder='Masukkan Angka' value='1'> </div> <div class='form-group col-md-3'> <label>Tempat Serah Terima</label> <select class='form-control' name='tempat'> <option>Pilih Tempat</option> <option selected>Gudang (Pertamina)</option> <option>Gudang Saya (User)</option> </select> </div> <div class='form-group col-md-1'> <a href='#' style=\'margin-bottom:1000px;\' onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a> </div> </div> </div>";
     $("#divHobi").append(stre);
     idf = (idf-1) + 2;
     document.getElementById("idf").value = idf;
   }

   function hapusElemen(idf) {
     $(idf).remove();
   }
</script>
<?php
  include "config/koneksi.php";
  if (isset($_GET['save'])) {
      $id = $_SESSION['id'];
    $barang = $_GET['barang'];
    $kali = $_GET['kali'];
    $tempat = $_GET['tempat'];
    $jml = $_GET['jumlah'];
    $tahun = $_GET['tahun'];
    $harga = 5000;
    $satuan = $_GET['satuan'];
    $tentang = $_GET['tentang'];
    $author = $_SESSION['nama'];
    $tgl_m = date("d-m-Y");
    $total = $harga * $jml;
    if ($satuan == 'l' && $jml >10000 ) {
       $diskon = 0.1 * $total;
    }elseif ($satuan == 'kl' && $jml >10 ) {
       $diskon = 0.1 * $total;
    }

    $query = "INSERT INTO lat VALUES";

    echo $barang." ".$id." ".$jml." ".$harga." ".$satuan." ".$kali." ".$tempat." ".$tgl_m." ".$diskon." ".$total." ".$tgl_po." "."status";
    // $index = 0;
    // foreach ($daerah as $wilayah) { 
    //   $query .= "('".null."','".$wilayah."','".$nomor[$index]."','".$tahun[$index]."','".$tentang[$index]."','".$file[$index]."','".$author."','".$today."'),";
    //   $index++;
    // }

    // $query = substr($query, 0, strlen($query) - 1).";";
    // mysqli_query($conn, $query) or mysql_error();

    // echo "<meta http-equiv=refresh content=1;url=kirim.php?input=sukses>";

      // $query = "insert into lat values $data;";
      // $insert = mysql_query($query);
      // echo $query;

  }
?>

<body>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Premium</h1>
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
                    <h4>Kirim</h4>
                  </div>
                    <div class="card-body">
                     <div class='form-row'>
                      <div class='form-group col-md-2'>
                          <input id="idf" value="1" type="hidden" />
                          <button name="add" onclick="tambahHobi(); return false;"  class="form-control btn-danger" style="color: white">Tambah Pesanan</button>
                      </div>
                    </div>
                  </div>
                  <form method="get" action="Keranjang.php" >
                  <div class="card-body">
                     <div class='form-row'>
                      <div class='form-group col-md-2'>
                          <label>Nama Barang</label>
                          <select class="form-control" name="barang">
                              <option>Nama Barang</option>
                            <?php 
                              include 'koneksi.php';
                              $query = mysqli_query($conn, "SELECT * FROM barang");
                              while ($data = mysqli_fetch_array($query)) {
                             ?>
                              <option value="<?php echo $data['id_brg'] ?>"><?php echo $data['nm_brg'] ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class='form-group col-md-2'>
                          <label>Jumlah Barang</label>
                          <input type="number" name="jumlah" placeholder="Masukkan Jumlah" <?php if (!empty($_GET['j'])) {?>value="<?php echo $_GET['j'];?>"<?php }else{?>value="1000"<?php } ?> class="form-control">
                      </div>
                      <div class='form-group col-md-1'>
                          <label>Satuan</label>
                          <select class="form-control" name="satuan">
                            <option>Pilih Satuan</option>
                            <option value="1" selected>Kl</option>
                            <option value="2">l</option>
                            <option value="3">Dus</option>
                          </select>
                      </div>
                      <div class='form-group col-md-1'>
                          <label>Pengiriman</label>
                            <input type="number" name="kali" class="form-control" placeholder="Masukkan Angka" value="1">
                      </div>
                      <div class='form-group col-md-3'>
                          <label>Tempat Serah Terima</label>
                          <select class="form-control" name="tempat">
                            <option>Pilih Tempat</option>
                            <option selected>Gudang (Pertamina)</option>
                            <option>Gudang Saya (User)</option>
                          </select>
                      </div>
                      <div class='form-group col-md-2'>
                        <label>.</label>
                          <input type="submit" name="cek" value="Cek Harga" class="form-control btn-primary">
                      </div>
                      <div class='form-group col-md-1'>
                        <label>Total</label>
                            <p>Rp. <b></b></p>
                      </div>
                    </div>
                    </div>

                   <div id="divHobi">
                   </div>
   <button type="submit" class="form-control btn-primary" name="save">Masukkan ke Keranjang</button>
<!--    <input id="idf" value="1" type="hidden" />
   <button type="button" style="margin: 2px 2px 12px 2px" onclick="tambahHobi(); return false;">Klik untuk Menambahkan LAT</button> -->
</form>
</div>
</div>
</div>
</section>

<?php 
  include"footer.php"; 
?>