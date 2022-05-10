<?php 
  include 'header.php';
 ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pengumuman</h1>
          </div>
          <?php 
              include 'koneksi.php';
              $id = $_GET['id'];
              $query = mysqli_query($conn, "SELECT * FROM berita WHERE id = '$id'");
              $data = mysqli_fetch_array($query);
           ?>
          <div class="section-body">
            <h2 class="section-title">Editor</h2>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <!-- <h4>Full Summernote</h4> -->
                  </div>
                  <form action="pk_update.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="judul" value="<?php echo $data[1]; ?>" class="form-control">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar<br><p>Recommended Image Size <br> 640 x 420 </p></label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                          <label for="image-upload" id="image-label">Choose File </label>
                          <input type="file" name="image" id="image-upload" value="<?php echo $data[3]; ?>" />
                        </div>
                        <br>
                          <img name="" src="<?php echo $data['gambar']; ?>" width="60%" height="60%" alt="news image" class="img-fluid">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="isi"><?php echo $data[2]; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="submit" name="simpan" class="btn btn-primary" value="Publish">
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </section>
      </div>

      <?php 
        include 'footer.php';
      ?>