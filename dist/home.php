<?php 
  include "header.php";
 ?>
<div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Stastik Pesanan - 
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">Agustus</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Pilih Bulan</li>
                        <li><a href="#" class="dropdown-item">Januari</a></li>
                        <li><a href="#" class="dropdown-item">Februari</a></li>
                        <li><a href="#" class="dropdown-item">Maret</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">Mei</a></li>
                        <li><a href="#" class="dropdown-item">Juni</a></li>
                        <li><a href="#" class="dropdown-item">Juli</a></li>
                        <li><a href="#" class="dropdown-item active">Agustus</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">Oktober</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">Desember</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">24</div>
                      <div class="card-stats-item-label">Pending</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">12</div>
                      <div class="card-stats-item-label">Perjalanan</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">23</div>
                      <div class="card-stats-item-label">Selesai</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Orders</h4>
                  </div>
                  <div class="card-body">
                    59
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart">
                  <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tagihan (Per 25 Agustus )</h4>
                  </div>
                  <div class="card-body">
                    Rp. 34,500,000
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart">
                  <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Point</h4>
                  </div>
                  <div class="card-body">
                    4,732
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Invoices</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Kode Invoice</th>
                        <th>Barang</th>
                        <th>Status</th>
                        <th>Tanggal Jatuh Tempo</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Pertamax</td>
                        <td><div class="badge badge-warning">Belum Bayar</div></td>
                        <td>July 19, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-48574</a></td>
                        <td class="font-weight-600">Pertalite</td>
                        <td><div class="badge badge-success">Sudah Bayar</div></td>
                        <td>July 21, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-76824</a></td>
                        <td class="font-weight-600">Pertamax Turbo</td>
                        <td><div class="badge badge-warning">Belum Bayar</div></td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-84990</a></td>
                        <td class="font-weight-600">Solar Non-Subsidi</td>
                        <td><div class="badge badge-warning">Belum Bayar</div></td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87320</a></td>
                        <td class="font-weight-600">Minyak Tanah</td>
                        <td><div class="badge badge-success">Sudah Bayar</div></td>
                        <td>July 28, 2018</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                  </div>
                  <h4>5</h4>
                  <div class="card-description">Pesan Admin</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Pesanan Anda Sudah Sampai</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Pertamax Turbo 1000 Kl</div>
                        <div class="bullet"></div>
                        <div class="text-primary">6 hours ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Mohon Lunasi Pembayaran Sebelum Jatuh Tempo</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Payment</div>
                        <div class="bullet"></div>
                        <div>2 hours ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Promo! Khusus untuk kamu yang melakukan Pembayaran Sebelum Jatuh Tempo</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Syahdan Ubaidillah</div>
                        <div class="bullet"></div>
                        <div>6 hours ago</div>
                      </div>
                    </a>
                    <a href="features-tickets.html" class="ticket-item ticket-more">
                      View All <i class="fas fa-chevron-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Produk Terbaik Kami</h4>
                </div>
                <div class="card-body">
                  <div class="owl-carousel owl-theme" id="products-carousel">
                    
                    <?php 
                      include 'koneksi.php';
                      $query = mysqli_query($conn, "SELECT * FROM barang order by harga ");
                      while ($datas = mysqli_fetch_array($query)) {
                     ?>
                    <div>
                      <div class="product-item pb-3">
                        <div class="product-image">
                          <img alt="image" src="assets/img/products/product-4-50.png" class="img-fluid">
                        </div>
                        <div class="product-details">
                          <div class="product-name"><?php echo $datas['nm_brg'] ?></div>
                          <div class="product-review">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                          </div>
                          <?php $selisih = $data['jumlah'] - $data['sisa']?>
                          <div class="text-muted text-small"><?php echo $selisih ?> Sales</div>
                          <div class="product-cta">
                            <a href="#" class="btn btn-primary">Detail</a>
                          </div>
                        </div>  
                      </div>
                    </div>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h4>Grafik Pemesanan</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="158"></canvas>
                </div>
              </div>
            </div>
                        <div class="col-lg-4">
              <div class="card gradient-bottom">
                <div class="card-header">
                  <h4>Produk-produk Unggulan Kami</h4>
                  <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Perbulan</a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <li class="dropdown-title">Select Period</li>
                      <li><a href="#" class="dropdown-item">Perhari ini</a></li>
                      <li><a href="#" class="dropdown-item">Perminggu ini </a></li>
                      <li><a href="#" class="dropdown-item active">Perbulan ini</a></li>
                      <li><a href="#" class="dropdown-item">Pertahun ini</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body" id="top-5-scroll">
                  <ul class="list-unstyled list-unstyled-border">
                    <?php 
                      include 'koneksi.php';
                      $query = mysqli_query($conn, "SELECT * FROM barang order by harga ");
                      while ($data = mysqli_fetch_array($query)) {
                     ?>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-3-50.png" alt="product">
                      <div class="media-body">
                        <!-- <div class="float-right"><div class="font-weight-600 text-muted text-small">86 Sales</div></div> -->
                        <div class="media-title"><?php echo $data['nm_brg'] ?></div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="<?php 
                            $nilai = $data['harga']/100; echo $nilai;?>%"></div>
                            <div class="budget-price-label"><?php echo 'Rp.'.number_format($data['harga']) ?></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
                <div class="card-footer pt-3 d-flex justify-content-center">
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Selling Price</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <?php 
        include "footer.php";
     ?>