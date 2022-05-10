<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pengiriman</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Pengiriman</h2>
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
                    <h4>Input Pengiriman</h4>
                  </div>
                  <form method="get">
                    <div class="card-body">
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <label>Jumlah Pengiriman</label>
                          <input type="text" name="jt" value="<?php echo $_GET['jt'] ?>" placeholder="1" onKeyPress="return kodeScript(event,'0123456789',this)" maxlength="2" minlength="1" required="" class="form-control" >
                        </div>
<!--                         <div class="form-group col-md-2">
                          <label>Jenis Pengiriman</label>
                          <select name="jp" required="" class="form-control" readonly>
                            <option <?php //if ($_GET['jp']=='Biasa') { echo 'selected';} ?>>Biasa</option>
                            <option <?php //if ($_GET['jp']=='Volumetrik') { echo 'selected';} ?> disabled>Volumetrik</option>
                          </select>
                        </div> -->
                        <div class="form-group col-md-2">
                          <label>-</label>
                          <input type="submit" style="color: white" name="lihat" class="form-control btn-danger" value="Submit" >
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="card-body">
                    
                    <form action="pengiriman_act.php" method="post">
                    <?php 
                    if (isset($_GET['jt']) && !empty($_GET['jt']) ) {
                      for ($i=1; $i <=$_GET['jt'] ; $i++) {
                     ?>

                      <h3 align="center">Data <?php echo $i ?><br></h3>
                    <div class="form-row">
                      <input type="hidden" value="<?php echo $_GET['jp'] ?>" name="type">
                      <div class="form-group col-md-3">
                        <label>Nama Pengirim</label>
                        <input type="text" name="nm_penm<?php echo $i ?>" minlength="4" placeholder="Rudi Sikumbang" required="" class="form-control" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyz ',this)">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Nomor Handphone Pengirim</label>
                        <input type="text" name="nh_penm<?php echo $i ?>" maxlength="15" minlength="9" placeholder="081299292991" required="" class="form-control" onKeyPress="return kodeScript(event,'0123456789',this)">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Alamat Pengirim</label>
                        <textarea type="text" name="al_penm<?php echo $i ?>" minlength="8" placeholder="Jl Kaki RT.04 Rw.05 Kelurahan. Sawahan Timur Kecamatan. Padang Timur" required="" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Nama Penerima</label>
                        <input type="text" name="nm_pena<?php echo $i ?>" minlength="4" placeholder="Rudi Chaniago" required="" class="form-control" onKeyPress="return kodeScript(event,'abcdefghijklmnopqrstuvwxyz ',this)">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Nomor Handphone Penerima</label>
                        <input type="text" name="nh_pena<?php echo $i ?>" maxlength="15" minlength="4" placeholder="081297867876" required="" class="form-control" onKeyPress="return kodeScript(event,'0123456789',this)">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Alamat Penerima</label>
                        <textarea type="text" name="al_pena<?php echo $i ?>" minlength="8" placeholder="Jl Kaki RT.04 Rw.05 Kelurahan. Ciamis Kecamatan. Cisedeg" required="" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-1">
                        <label>Jumlah Koli</label>
                        <input type="number" min="1" value="1" name="jumlah<?php echo $i ?>" minlength="1" required="" onKeyPress="return kodeScript(event,'0123456789',this)" maxlength="11" class="form-control">
                      </div>
                      <div class="form-group col-md-1">
                        <label>Berat(Kg)</label>
                        <input type="number" min="30" value="30" name="berat<?php echo $i ?>" minlength="1" required="" onKeyPress="return kodeScript(event,'0123456789',this)" maxlength="11" class="form-control">
                      </div>
                      <div class="form-group col-md-2">
                        <label>Pelayanan</label>
                        <select name="pelayanan<?php echo $i ?>" class="form-control">
                          <option>Darat</option>
                          <option>Udara</option>
                          <option>Laut</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label>Cara Pembayaran</label>
                        <select name="cara<?php echo $i ?>" class="form-control">
                          <option>Tunai</option>
                          <option>T.Penerima</option>
                          <option>T.Pengirim</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label>Jenis Kiriman</label>
                        <select name="jenis<?php echo $i ?>" class="form-control">
                          <?php
                            $brg=mysqli_query($conn, "select * from jenis");
                            while ($jenis = mysqli_fetch_array($brg)) {
                            echo "<option value=$jenis[0]>".ucwords($jenis[1])."</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Kota Tujuan</label>
                        <select name="kt<?php echo $i ?>" class="form-control">       
                          <?php
                            $brg=mysqli_query($conn, "select tarif.*, kota.* from tarif, kota WHERE tarif.id_kota = kota.id_kota");
                            while ($jenis = mysqli_fetch_array($brg)) {
                            echo "<option value=$jenis[id_tarif]>".ucwords($jenis[nm_kota]).' Rp.'.ucwords($jenis[harga]).'/kg -> '.ucwords($jenis[hari]).'Hari'."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
<!--                     <?php if ($_GET['jp']=='Volumetrik') { ?>
                      <div class="form-group col-md-1">
                        <label>Panjang(cm)</label>
                        <input type="number" min="1" name="panjang<?php //echo $i ?>" minlength="1" required="" onKeyPress="return kodeScript(event,'0123456789',this)" maxlength="11" class="form-control">
                      </div>
                      <div class="form-group col-md-1">
                        <label>Lebar(cm)</label>
                        <input type="number" min="1" name="lebar<?php //echo $i ?>" minlength="1" required="" onKeyPress="return kodeScript(event,'0123456789',this)" maxlength="11" class="form-control">
                      </div>
                      <div class="form-group col-md-1">
                        <label>Tinggi(cm)</label>
                        <input type="number" min="1" name="tinggi<?php //echo $i ?>" minlength="1" required="" onKeyPress="return kodeScript(event,'0123456789',this)" maxlength="11" class="form-control">
                      </div>
                    <?php } ?> -->
                      <div class="form-group col-md-2">
                        <label>Asuransi</label>
                        <select name="asuransi<?php echo $i ?>" class="form-control">
                          <option value="1">Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Packing</label>
                        <select name="packing<?php echo $i ?>" class="form-control" >
                          <option value="0">Tidak Ada Packing</option>
                          <option value="75000">Packing Biasa</option>
                          <option value="100000">Packing Khusus</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Supir</label>
                        <select name="supir<?php echo $i ?>" class="form-control select2" required>
                          <?php
                            $brg=mysqli_query($conn, "select * from kendaraan");
                            while ($jenis = mysqli_fetch_array($brg)) {
                            echo "<option value=$jenis[0]>".ucwords($jenis[3]).'-> '.ucwords($jenis[1])."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  <?php }
                    }
                    $jumlah = $i - 1;
                   ?>
                    <input type="hidden" name="jumlah_data" value="<?php echo $jumlah ?>"> 
                    <input type="submit" name="submit" class="btn btn-icon icon-left btn-primary" value="Submit"> 
                    <input type="reset" class="btn btn-icon icon-left btn-danger" value="Reset"> 
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php include "footer.php"; ?>