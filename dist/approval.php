<?php include 'header.php' ?>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Approval</h1>
          </div>
          <div class="section-body">
          	<div class="row">
			<div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Invoices</h4>
                  <div class="card-header-action">
                    <select style="padding: 10px 10px 10px 10px" class="btn btn-danger">
                    	<option >Belum Membayar</option>	 
                    	<option>Sudah Membayar</option>	 
                	</select>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Kode Invoice</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Kali Pengiriman</th>
                        <th>Jatuh Tempo</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>2/10</td>
                        <td>July 19, 2018</td>
                        <td>
                          <a href="#" class="btn btn-danger">Approve</a>
                          <a href="detail.php" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-76824</a></td>
                        <td class="font-weight-600">Muhamad Nuruzzaki</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>1/1</td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-danger">Approve</a>
                          <a href="detail.php" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-84990</a></td>
                        <td class="font-weight-600">Agung Ardiansyah</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td>2/10</td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="#" class="btn btn-danger">Approve</a>
                          <a href="detail.php" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87320</a></td>
                        <td class="font-weight-600">Ardian Rahardiansyah</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>1/1</td>
                        <td>July 22, 2018</td>
                        <td>
                          <a href="detail.php" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-48574</a></td>
                        <td class="font-weight-600">Hasan Basri</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>2/2</td>
                        <td>July 21, 2018</td>
                        <td>
                          <a href="detail.php" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-48574</a></td>
                        <td class="font-weight-600">Hasan Basri</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>1/2</td>
                        <td>July 01, 2018</td>
                        <td>
                          <a href="detail.php" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           </div>
        </div>
    </section>
</div>
<?php include 'footer.php' ?>