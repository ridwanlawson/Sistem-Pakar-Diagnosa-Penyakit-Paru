<?php include "header.php"; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Jurusan</h1>
          </div>

          <div class="section-body">
            <!-- <h2 class="section-title">Barang Masuk</h2> -->
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
                    <h4>Tambah Jurusan Baru</h4>
                  </div>
                  <div class="card-body">
                    <form action="jurusan_act.php" method="post">
                    <div class="form-row">           
                      <div class="form-group col-md-6">
                        <label>Nama Jurusan</label>
                        <input type="text" name="jurusan" class="form-control">
                      </div>
                    </div>
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