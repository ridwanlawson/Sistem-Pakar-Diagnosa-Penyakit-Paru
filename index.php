<?php 
  include 'dist/koneksi.php';
  $sql = $conn->query("SELECT * FROM perusahaan WHERE id_perusahaan = 1");
  $judul = $sql->fetch_object();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $judul->nm_perusahaan; ?></title>
<!--/tags -->
<?php include 'dist/koneksi.php' ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Trek Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!--css-->
<?php 
	if (@$_GET['input'] == 'sukses') {
		echo "<script>alert('Berhasil Menambahkan')</script>";
	} elseif (@$_GET['input'] == 'gagal') {
		echo "<script>alert(Gagal Menambahkan)</script>";
	}
	
 ?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/chocolat.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<!--//css-->
<!--google fonts-->
<link href="//fonts.googleapis.com/css?family=Poppins:200,200i,300,400,500,500i,600,700,700i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Nunito:400,700,700i,800i,900" rel="stylesheet">
<link rel="stylesheet" href="dist/assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="dist/assets/modules/jquery-selectric/selectric.css">
  <!-- <link rel="stylesheet" href="dist/assets/modules/jqvmap/dist/jqvmap.min.css"> -->
  <!-- <link rel="stylesheet" href="dist/assets/css/style.css"> -->
<link rel="stylesheet" href="dist/assets/css/components.css">
<link rel="stylesheet" href="dist/assets/modules/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/modules/dropzonejs/dropzone.css">
<!--//google fonts-->
</head>
<body>
<!--banner-->
<div class="top nav">
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" class="active">Beranda</a></li>
	    <li><a href="#our-team" class="page-scroll">Diagnosa</a></li>
		<li><a href="#about" class="page-scroll">Tentang</a></li>
<!-- 		<li><a href="#services" class="page-scroll">Tarif</a></li> -->
		<li><a href="#locations" class="page-scroll">Galeri</a></li><!-- 
		<li><a href="#contact" class="page-scroll">Kontak</a></li> -->
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<div class="banner" id="home">
	<div class="container-fluid">
   <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="false">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="images/gambar1.jpg" alt="w3layouts" class="img-responsive">
			</div>
			<div class="item">
				<img src="images/gambar2.jpg" alt="w3layouts" class="img-responsive">
			</div>
			<div class="item">
				<img src="images/gambar3.jpg" alt="w3layouts" class="img-responsive">
			</div>
		</div>
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		</div>
		<div class="banner-info-w3layouts">
			<div class="jumbotron text-center">
				<h1><?php echo $judul->nm_perusahaan; ?></h1>
				<!-- <p>.</p> -->
			</div>
		</div>
	</div>
</div>


<!--about us-->
<div class="about-us-agileits" id="about">
<div class="about-info text-center">
	<h3>TENTANG KAMI</h3>
	<label></label>
	</div>
		<div class="about-us-agileits-info">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-5">
						<h2>Cerita Tentang Kami</h2>
						<p align="justify"><?php echo $judul->desk_perusahaan; ?></p>	
					</div>
					<div class="col-sm-6 col-md-7 text-right">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/96ZPwmtjpJQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
</div>
<!--//about us-->
<!--locations-->
<div class="our-team-w3l" style="background-color: darkred;color: white;" id="our-team">
	<div class="our-team-w3l-info text-center">
	<h3>Sistem Pakar Penyakit Paru</h3>
	<!-- <p style="color: white">ID L-<?php echo $b['idLelang'] ?> Dengan Kebutuhan : <?php echo $b['desk'] ?> </p> -->
	<?php 
	 ?>
	</div>
	<div class="our-team-w3l-content">
  	<div class="container">
    	<div class="row">
                  <div class="col-12">
                    <div class="card">
                      <form method="post" action="save.php" enctype="multipart/form-data">
                        <div class="card-body">
                          <div class='form-row' style="color: white">
                            <div class='form-group col-md-4'>
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" required="">
                            </div>
                            <div class='form-group col-md-4'>
                                <label>Nomor Handphone</label>
                                <input type="number" name="nohp" class="form-control" required="">
                            </div>
                            <div class='form-group col-md-4'>
                                <label>Alamat Email</label>
                                <input type="email" name="email" class="form-control" required="">
                            </div>
                            <div class='form-group col-md-6'>
                                <label>Alamat Rumah</label>
                                <input type="text" name="alamat" class="form-control" required="">
                            </div>
                            <div class='form-group col-md-6'>
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl" class="form-control" required="">
                            </div>
                          </div>
                          <div class='form-group'>
                              <input type="submit" name="cek" value="Cek" class="form-control btn-primary">
                          </div>
                        </div>
                      </form>
                    </div>
    	          </div>
      <div class="clearfix"></div>
    </div>
  </div>
	</div>
</div>
<div class="locations-w3-agile" id="locations">
	<div class="locations-w3-agile-info text-center">
		<h3>Galeri</h3>
		<label></label>
	</div>
	<div class="locations-w3-agile-content">
	<div class="container">
		<div class="portfolio-gallery" id="gal">
	<div class="gallery_product-w3-agile col-lg-4 col-md-4 col-sm-4 col-xs-6">
		<div class="hovereffect">
			<a class="chocolat-image"  href="images/locations-img1.jpg"><img src="images/locations-img1.jpg" class="img-responsive" alt=" ">
			<div class="overlay">
				<h4>Algeria</h4>
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
				
			</div>
			</a>
		</div>
	</div>
			

	<div class="gallery_product-w3-agile col-lg-4 col-md-4 col-sm-4 col-xs-6">
			<div class="hovereffect">
		<a class="chocolat-image" href="images/locations-img2.jpg"><img src="images/locations-img2.jpg" class="img-responsive" alt=" ">
		<div class="overlay">
				<h4> Iceland</h4>
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
				
			</div>
			</a>
			</div>	
	</div>

	<div class="gallery_product-w3-agile col-lg-4 col-md-4 col-sm-4 col-xs-6">
	<div class="hovereffect">
        <a class="chocolat-image" href="images/locations-img3.jpg"><img src="images/locations-img3.jpg" class="img-responsive" alt=" ">
		<div class="overlay">
				<h4> Jordan</h4>
				<p>Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
				
			</div>
			</a>
		</div>
				
    </div>

			<div class="clearfix"></div>
			
			</div>
</div> <!-- container / end -->
</div>
</div>
<!---728x90--->
<!--our-team-->
<div class="footer text-center">&copy; <?php echo date('Y') ?> <?php echo $judul->nm_perusahaan; ?>. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></div>
<!--javascript-->

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/grayscale.js"></script>
<script src="js/move-top.js"></script>
<script src="dist/assets/js/page/modules-datatables.js"></script>
<script src="dist/assets/modules/datatables/datatables.min.js"></script>
<script src="dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<!--//javascript-->
<!-- js for gallery -->
<script type="text/javascript" src="js/jquery.chocolat.js"></script>
<script>
$(function(){
                $('#gal').Chocolat({
                    imageSize: 'contain'
                });
            });
</script>
<script type="text/javascript">
$(document).ready(function() {
var defaults = {
containerID: 'toTop', // fading element id
containerHoverID: 'toTopHover', // fading element hover id
scrollSpeed: 1200,
easingType: 'linear' 
};

$().UItoTop({ easingType: 'easeOutQuart' });

});
</script>

<!-- //js for gallery -->	
</body>
</html>