    <?php 
      include 'header.php';
      $id = $_GET['id'];
      $query = mysqli_query($conn, "SELECT biodata.*, nilai.*, jurusan.*, user.* FROM user, biodata, nilai, jurusan WHERE user.id = biodata.id AND nilai.nisn = '$id' AND biodata.nisn = '$id' AND jurusan.id = biodata.pilihan");
      $data = mysqli_fetch_array($query);
     ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Calon Siswa</h1>

          </div>

          <div class="section-body">
<!--             <h2 class="section-title">Biodata</h2>
            <p class="section-lead">
              We would like to thank the makers of these cool plugins and images.
            </p> -->

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                      <h2 class="section-title">Biodata</h2>
                  </div>
                  <div class="card-body">
                    <div class="list-unstyled list-unstyled-border mt-4">
                      <div class="media">
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>NISN</h6>
                          <p><?php echo $data['nisn'] ?></p>
                        </div>
                      <!-- </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Nama</h6>
                          <p><?php echo ucwords($data['1']) ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>NIK KK</h6>
                          <p><?php echo $data['nikkk'] ?></p>
                        </div>
                      </div>
                      <br/>
                      <div class="media">
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Tempat/ Tanggal Lahir </h6>
                          <p><?php echo ucwords($data['tempat']).' / '.date('d-m-Y', strtotime($data['tanggal'])); ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Jenis Kelamin</h6>
                          <p><?php echo $data['jk'] ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Alamat Rumah</h6>
                          <p><?php echo ucwords($data['alamat_rumah']) ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Asal Sekolah</h6>
                          <p><?php echo ucwords($data['asal_sekolah']) ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Alamat Sekolah</h6>
                          <p><?php echo ucwords($data['alamat_sekolah']) ?></p>
                        </div>
                      </div>
                      <br>
                      <div class="media">
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Nama Orang Tua</h6>
                          <p><?php echo ucwords($data['nama_ortu']) ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>No. Handphone Orang Tua</h6>
                          <p><?php echo $data['nohp_ortu'] ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Penghasilan</h6>
                          <p><?php echo 'Rp. '.number_format($data['penghasilan']). ' / Bulan' ?></p>
                        </div>
                      </div>
                      <br>
                      <div class="media">
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Jurusan Pilihan</h6>
                          <p><?php echo $data['pilihan'] ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Status</h6>
                          <p><?php echo ucwords($data['14']) ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                      <div class="card-header">
                          <h2 class="section-title">Nilai Ijazah</h2>
                      </div>
                  <div class="card-body">
                    <div class="list-unstyled list-unstyled-border mt-4">
                      <div class="media">
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Nilai B.Indonesia</h6>
                          <p><?php echo $data['bind'] ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Nilai B.Inggris</h6>
                          <p><?php echo $data['bing'] ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Nilai Matematika</h6>
                          <p><?php echo $data['mtk'] ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Nilai IPA</h6>
                          <p><?php echo $data['ipa'] ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Jumlah</h6>
                          <p><?php echo $data['jumlah'] ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Rata-rata</h6>
                          <p><?php echo $data['rata'] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                      <div class="card-header">
                          <h2 class="section-title">Data Akun</h2>
                      </div>
                  <div class="card-body">
                    <div class="list-unstyled list-unstyled-border mt-4">
                      <div class="media">
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Username</h6>
                          <p><?php echo ucwords($data['nama']) ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Email</h6>
                          <p><?php echo $data['email'] ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>No.Handphone</h6>
                          <p><?php echo $data['hp'] ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Level</h6>
                          <p><?php echo ucwords($data['level']) ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Status</h6>
                          <p><?php echo ucwords($data['status']) ?></p>
                        </div>
<!--                       </div>
                      <div class="media"> -->
                        <div class="media-icon"></div>
                        <div class="media-body">
                          <h6>Timestamp</h6>
                          <p><?php echo $data['timestamp'] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <ul id="icons" class="ionicons">
          <a href="data_siswa.php"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </ul>
        </section>
      </div>
    <?php 
      include 'footer.php';
     ?>