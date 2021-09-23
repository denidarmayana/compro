<?php
$ip    = $this->input->ip_address(); // Mendapatkan IP user
$date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
$waktu = time(); //
$timeinsert = date("Y-m-d H:i:s");
  
// Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
$s = $this->db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
$ss = isset($s)?($s):0;
  
 
// Kalau belum ada, simpan data user tersebut ke database
if($ss == 0){
$this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
}
 
// Jika sudah ada, update
else{
$this->db->query("UPDATE visitor SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
}
		 
?>
<!doctype html>
<html lang="en">
<head>
	<title><?=$title ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Deni Darmayana">
	<meta name="description" content="Creative Multipurpose Bootstrap Template">
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?=base_url('assets/web/') ?>assets/images/favicon.png">
	<!-- Google Font -->
	<link
		href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900%7CPlayfair+Display:400,400i,700,700i%7CRoboto:400,400i,500,700"
		rel="stylesheet">
	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/web/') ?>assets/vendor/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/web/') ?>assets/vendor/themify-icons/css/themify-icons.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/web/') ?>assets/vendor/animate/animate.min.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/web/') ?>assets/vendor/fancybox/css/jquery.fancybox.min.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/web/') ?>assets/vendor/owlcarousel/css/owl.carousel.min.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/web/') ?>assets/vendor/swiper/css/swiper.min.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/web/') ?>assets/css/style.css" />

	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<body>


	<!-- =======================
	header Start-->
	<header class="header-static navbar-sticky navbar-light">
		<!-- Search -->
		<div class="top-search collapse bg-light" id="search-open" data-parent="#search">
			<div class="container">
				<div class="row position-relative">
					<div class="col-md-8 mx-auto py-5">
						<form>
							<div class="input-group">
								<input class="form-control border-radius-right-0 border-right-0" type="text"
									name="search" autofocus placeholder="What are you looking for?">
								<button type="button" class="btn btn-grad border-radius-left-0 mb-0">Search</button>
							</div>
						</form>
						<p class="small mt-2 mb-0"><strong>e.g.</strong>Template, Wizixo, WordPress theme </p>
					</div>
					<a class="position-absolute top-0 right-0 mt-3 mr-3" data-toggle="collapse" href="#search-open"><i
							class="fa fa-window-close"></i></a>
				</div>
			</div>
		</div>
		<!-- End Search -->

		<!-- Navbar top start-->

		<!-- Navbar top End-->

		<!-- Logo Nav Start -->
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<!-- Logo -->
				<a class="navbar-brand" href="index.html">
					<img src="<?=base_url('assets/web/') ?>assets/images/logo.png" width="150" height="150" alt="">
				</a>
				<!-- Menu opener button -->
				<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
					data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"> </span>
				</button>
			<!-- Main Menu Start -->
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav ml-auto">
						<?php foreach ($menu as $m) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link <?=($m->submenu == 1 ? "dropdown-toggle" : "dropdown") ?>" href="<?=base_url().$m->url ?>" id="<?=$m->slug ?>" data-toggle="<?=($m->submenu == 1 ? "dropdown" : "") ?>" aria-haspopup="true"
								aria-expanded="false"><?=$m->name ?></a>
							<?php 
							if ($m->submenu == 1) { ?>
								<ul class="dropdown-menu" aria-labelledby="<?=$m->slug ?>">
									<?php 
									foreach ($this->db->get_where("menu",['parent'=>$m->id])->result() as $sub) {
										echo '<li><a class="dropdown-item" href="'.base_url().$sub->url.'">'.$sub->name.'</a></li>';
									}
									?>
								</ul>
							<?php } ?>
						</li>
						<?php } ?>
					</ul>
				</div>
				<!-- Main Menu End -->
				<!-- Header Extras Start-->
				<div class="navbar-nav">
					<!-- extra item Search-->
					<div class="nav-item search border-0 pl-3 pr-0 px-lg-2" id="search">
						<a class="nav-link" data-toggle="collapse" href="#"><i class="ti-search"> </i></a>
					</div>
					<!-- extra item Btn-->

				</div>
				<!-- Header Extras End-->
			</div>
		</nav>
		<!-- Logo Nav End -->
	</header>
	<!-- =======================
	header End-->

	<?=$contents ?>

	<!-- =======================
	call to action-->

	<!-- =======================
	call to action-->

	<!-- =======================
	footer  -->
	<footer class="footer bg-light pt-6">
		<div class="footer-content pb-3">
			<div class="container">
				<div class="row">
					<!-- Footer widget 1 -->
					<div class="col-md-3">
						<div class="widget">
							<a href="index.html" class="footer-logo">
								<img src="<?=base_url('assets/web/') ?>/assets/images/logo.png" width="150" height="150" alt="">
							</a>
							<p class="mt-3">Contact us by social media</p>
							<i class="fa fa-facebook-square"></i>&emsp;
							<i class="fa fa-twitter"></i>&emsp;
							<i class="fa fa-linkedin"></i>&emsp;
							<i class="fa fa-instagram"></i>&emsp;
						</div>
					</div>
					<!-- Footer widget 2 -->
					<div class="col-md-3 col-sm-6">
						<div class="col-md-8 col-sm-6">
							<div class="widget">
								<h6>Contact With Us</h6>
								<ul class="nav flex-column primary-hover">
									<strong>
										<p>Ask How Protemus Capital Can Help You</p>
									</strong>
									<li class="nav-item"><a class="nav-link" href="callto:<?=$contact->phone ?>"><?=$contact->phone ?></a></li>
									<li class="nav-item"><a class="nav-link" href="callto:<?=$contact->fax ?>"><?=$contact->fax ?></a></li>
									<li class="nav-item"><a class="nav-link" href="mailto:<?=$contact->email ?>"><?=$contact->email ?></a></li>
									<li class="nav-item"><a class="nav-link" href="#"></a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Footer widget 3 -->
					<div class="col-md-2 col-sm-6">
						<div class="widget">
							<h6>Localization</h6>
							<?php 
							$alamat = explode(",", $contact->address);
							?>
							<ul class="nav flex-column primary-hover">
								<li class="nav-item"><a class="nav-link" href="#"><?=$alamat[0] ?></a></li>
								<li class="nav-item"><a class="nav-link" href="#"><?=$alamat[1] ?></a></li>
								<li class="nav-item"><a class="nav-link" href="#"><?=$alamat[2] ?></a></li>
								<li class="nav-item"><a class="nav-link" href="#"><?=$alamat[3] ?></a></li>
								<li class="nav-item"><a class="nav-link" href="#"><?=$alamat[4] ?></a></li>
							</ul>
						</div>
					</div>
					<!-- Footer widget 4 -->
					<div class="col-md-2 col-sm-6">
						<div class="widget">
							<h6>Useful Links</h6>
							<ul class="nav flex-column primary-hover">
								<?php foreach ($menu as $mn) { ?>
								<li class="nav-item"><a class="nav-link" href="#"><?=$mn->name ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>

					<div class="col-md-2 col-sm-4">
						<div class="widget">

							<ul class="nav flex-column primary-hover">
								<li class="nav-item"><a class="nav-link" href="#">News Articles</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Carrer</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
								<li class="nav-item"><a class="nav-link" href="#"></a></li>
								<li class="nav-item"><a class="nav-link" href="#"></a></li>
							</ul>
						</div>
					</div>
					<!-- Footer widget 4 -->
				</div>
			</div>
			<div class="divider mt-3"></div>
			<!--footer copyright -->
			<div class="footer-copyright py-3">
				<div class="container">
					<div class="d-md-flex justify-content-between align-items-center py-3 text-center text-md-left">
						<!-- copyright text -->
						<div class="copyright-text">©2021 All Rights Reserved by <a href="#"></a></div>
						<!-- copyright links-->
						<div class="copyright-links primary-hover mt-3 mt-md-0">
							<ul class="list-inline">
								<li class="list-inline-item pl-2"><a class="list-group-item-action" href="#">Privacy
										Policy</a></li>
								<li class="list-inline-item pl-2"><a class="list-group-item-action pr-0" href="#">Use of
										terms</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	</footer>
	<!-- =======================
	footer  -->

	<div> <a href="#" class="back-top btn btn-grad"><i class="ti-angle-up"></i></a> </div>

	<!--Global JS-->
	<script src="<?=base_url('assets/web/') ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url('assets/web/') ?>assets/vendor/popper.js/umd/popper.min.js"></script>
	<script src="<?=base_url('assets/web/') ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?=base_url('assets/web/') ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!--Vendors-->
	<script src="<?=base_url('assets/web/') ?>assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>
	<script src="<?=base_url('assets/web/') ?>assets/vendor/owlcarousel/js/owl.carousel.min.js"></script>
	<script src="<?=base_url('assets/web/') ?>assets/vendor/swiper/js/swiper.js"></script>
	<script src="<?=base_url('assets/web/') ?>assets/vendor/wow/wow.min.js"></script>

	<!--Template Functions-->
	<script src="<?=base_url('assets/web/') ?>assets/js/functions.js"></script>

</body>


</html>