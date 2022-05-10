<?php 
include 'koneksi.php';
include 'header.php' ?>
      <div class="main-content">
        <section class="section">
          <div class="section-header">
              <h1>Detail Transaksi</h1>
          </div>
          <?php 
            error_reporting(0);
            if ($_GET['status'] == 'po') {
              ?>
              <div class="card-body">
               <div class='form-row'>
                <div class='form-group col-md-2'>
                    <input id="idf" value="1" type="hidden" />
                    <a href="po.php" name="po"  class="form-control btn-danger" style="color: white; border-style: none;" target="_blank"><center>Cetak PO</center></a>
                </div>
              </div>
              <p>Note : PO yang dicetak hanya untuk disimpan bukan untuk diserahkan pada PT Pertamina</p>
            </div>
<?php            }else{
           ?>
          <div class="section-body">
               <div class="card-body">
                <h4></h4>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Jumlah Barang</th>
                            <th>Berat Barang</th>
                            <th>Asuransi</th>
                            <th>Biaya Packing</th>
                            <th>Pelayanan</th>
                            <th>Cara Bayar</th>
                            <th>Jenis</th>
                            <th>Kota Asal</th>
                            <th>Tujuan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $id = $_GET['id'];
                          $no = 1;
                          $brg=mysqli_query($conn, "SELECT pengiriman.*, jenis.*, kota.nm_kota FROM pengiriman, jenis, kota WHERE pengiriman.id_pengiriman = '$id' AND pengiriman.jenis = jenis.id_jenis AND pengiriman.id_kota_asal = kota.id_kota") or die(mysqli_error($conn));
                          $no=1;
                          while($b=mysqli_fetch_array($brg)){

                            $kota=mysqli_query($conn, "SELECT pengiriman.*, tarif.*, kota.nm_kota FROM pengiriman, kota, tarif WHERE pengiriman.id_pengiriman = '$id' AND tarif.id_tarif = '$b[id_tarif]' AND tarif.id_kota = kota.id_kota") or die(mysqli_error($conn));
                            $kot = mysqli_fetch_array($kota)
                            ?>                                 
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $b['jml_koli'].' Koli'; ?></td>
                            <td><?php echo $b['berat'].' kg'; ?></td>
                            <td><?php if ($b['asuransi']==1) {echo 'Ya';}else{echo 'Tidak';}; ?></td>
                            <td><?php echo 'Rp.'.number_format($b['biaya_packing']); ?></td>
                            <td><?php echo ucwords($b['pelayanan']); ?></td>
                            <td><?php echo ucwords($b['cara_bayar']); ?></td>
                            <td><?php echo ucwords($b['nm_jenis']); ?></td>
                            <td><?php echo ucwords($b['nm_kota']); ?></td>
                            <td><?php echo ucwords($kot['nm_kota']); ?></td>
                          </tr>                             
                          <?php } ?>

                          <?php 
                            $trans = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_pengiriman = '$id'");
                            $tran = mysqli_fetch_array($trans);
                          ?>
                          <tr>
                            <td align="right" colspan="9"><b>Total Biaya</b></td>
                            <td><?php echo 'Rp.'.number_format($tran['tot_biaya']) ?></td>
                          </tr>
                          <tr>
                            <td align="right" colspan="9"><b>Biaya Asuransi</b></td>
                            <td><?php echo 'Rp.'.number_format($tran['b_asuransi']) ?></td>
                          </tr>
                          <tr>
                            <td align="right" colspan="9"><b>Biaya Packing</b></td>
                            <td><?php echo 'Rp.'.number_format($tran['b_packing']) ?></td>
                          </tr>
                          <tr>
                            <td align="right" colspan="9"><b>Total Bayar</b></td>
                            <td><?php echo 'Rp.'.number_format($tran['tot_bayar']) ?></td>
                          </tr>
                          <?php  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

<?php } include 'footer.php' ?>