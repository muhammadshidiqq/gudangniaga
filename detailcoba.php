<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detail</title>
	<link href="css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="dist/css/lightbox.min.css">
</head>
<body>
	<!--navbar-->
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark main-color">
			<div class="container-fluid">
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse  " id="navbarNav">
			    	<a class="navbar-brand me-auto" href="#"><img src="image/logo1.png" alt="" width="50" height="30"> NiagaPet</a>
			      <ul class="navbar-nav">
			        <li class="nav-item">
			          <a class="nav-link " href="index.html">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#">Service</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page"  href="Produk.html">Produk</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="keranjang.html"><i class="bi bi-cart-check-fill"></i> Keranjang</a>
			        </li>
			        	<a class="nav-link" href="ab/login.html"><i class="bi bi-person-lines-fill"></i> Masuk</a> 
			        <li class="nav-item">
			    </div>
			</div>
		</nav>

	<!--breadcrumb-->
	<div class="container-fluid pt-5">
		<div class="container pt-5">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="Produk.html" style="text-decoration: none;">Produk</a></li>
			    <li class="breadcrumb-item">Cat Jungle Hideaway</li>
			  </ol>
			</nav>
		</div>
	</div>
	<!--breadcrumb-->

	<!--Detail produk-->
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<!--image-->
				<div class="col-md-4 col-lg-4" style="border: 1px solid;border-radius: 5px;">
					<img src="image/chiken food cat.jpg" class="img-fluid">
				</div>
				<!--image-->

				<!--produk detail-->
				<div class="col-md-7 offset-md-1 col-lg-7 offset-lg-1">
					<h2>Chiken food cat</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500th</p>
					<h4 class="text-warning">Rp 230.000</h4>
					<button class="btn btn-outline-warning mt-3"><a href="keranjang.html" class="text-dark" style="text-decoration:none;">Beli Sekarang</a></button>
				</div>
				<!--image-->
			</div>
		</div>
	</div>
	<!--Detail produk-->

	<!--footer-->
		<div class="container-fluid py-5 content-subscribe text-light mt-5">
		<div class="container">
			<h5 class=" text-center mb-3">Temui Kami</h5>
			<div class=" row justify-content-center">
				<div class="col-sm-1  d-flex justify-content-center">
					 <a href="#" class="bi bi-facebook fs-4 bg-footer"></a>
				</div>
				<div class="col-sm-1  d-flex justify-content-center">
					<a href="#" class="bi bi-instagram fs-4 bg-footer"></a>
				</div>
				<div class="col-sm-1  d-flex justify-content-center">
					<a href="#" class="bi bi-youtube fs-4 bg-footer"></a>
				</div>
				<div class="col-sm-1 d-flex justify-content-center">
					<a href="#" class="bi bi-whatsapp fs-4 bg-footer"></a>
				</div>
			</div>
		</div>
	</div>

	    <!-- Copyright -->
	    <div class="text-center copyright text-light py-3">
	      © 2020 Copyright NiagaPet.com
	    </div>
	    <!-- Copyright -->
	  </footer>
	  <!-- Footer -->
	</section>	
	<!--footer-->

	<script src="dist/js/lightbox-plus-jquery.min.js"></script>
	<script src="boostrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<div class="row">
                                    <!--image-->
                                    <div class="col" style="border: 1px solid">
                                        <?=$img;?>
                                    </div>
                                    <!--image-->
                                    <div class="col">
                                        Nama Barang
                                        <strong>
                                            <?=$namabarang;?>
                                        </strong>
                                    </div>
                                    <!-- <div class="col"><?=$img;?></div> -->
                                    <div class="col"><?=$deskripsi;?></div>
                                    <div class="col"><?=$stock;?></div>
                                </div>