<?php
require "connection.php";
include "dashboard/database.php";
$data->setTable("background");
$background = $data->read($conn);
$data->setTable("foto_desa");
$foto_desa = $data->read($conn);
$data->setTable("pegawai");
$pegawai = $data->read($conn);
$data->setTable("publikasi");
$publikasi = $data->read($conn, 3);
$data->setTable("tulisan_text");
$tulisan_text = $data->read($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Website Desa Parigi</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="index-page">
	<header id="header" class="header d-flex align-items-center fixed-top">
		<div class="container-fluid position-relative d-flex align-items-center justify-content-between ms-5">
			<a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
				<img src="assets/img/logo.png" alt="">
				<h1 class="sitename">Desa Parigi <div class="fs-6">Kecamatan Tinggimoncong</div>
				</h1>
			</a>
			<nav id="navmenu" class="navmenu mx-5">
				<ul>
					<li>
						<a href="index.php#hero" class="active fs-5 fw-bolder">Homes</a>
					</li>
					<li>
						<a href="index.php#about" class="fs-5 fw-bolder">Profil Desa</a>
					</li>
					<li>
						<a href="index.php#portfolio" class="fs-5 fw-bolder">Foto Desa</a>
					</li>
					<li>
						<a href="index.php#team" class="fs-5 fw-bolder">Pegawai Desa</a>
					</li>
					<li>
						<a href="publikasi/" class="fs-5 fw-bolder">Publikasi</a>
					</li>
					<li>
						<a href="login/" class="fs-5 fw-bolder">Login</a>
					</li>
				</ul>
				<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
			</nav>
		</div>
	</header>
	<main class="main">
		<!-- Hero Section -->
		<section id="hero" class="hero section dark-background">
			<img src="assets/img/background/<?php echo $background[0]["foto"]; ?>" alt="" data-aos="fade-in">
			<div class="container">
				<div class="row">
					<div class="col-lg-10">
						<h2 data-aos="fade-up" data-aos-delay="100">Desa Parigi (KKN UNHAS)</h2>
					</div>
				</div>
			</div>
		</section>
		<!-- End Hero Section -->
         
		<!-- About Section -->
		<section id="about" class="about section light-background">
			<div class="container" data-aos="fade-up" data-aos-delay="100">
				<div class="row align-items-xl-center gy-5">
					<div class="col-xl-5 content">
						<h2>About US</h2>
						<p><?php echo $tulisan_text[0]["kalimat"] ?></p>
					</div>
				</div>
			</div>
		</section>
		<!-- /About Section -->
		<!-- Stats Section -->
		<section id="stats" class="stats section dark-background">
			<img src="assets/img/background/<?php echo $background[1]["foto"]; ?>" alt="" data-aos="fade-in">
			<div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
				<div class="row gy-4">
					<div class="col-lg-3 col-md-6">
						<div class="stats-item text-center w-100 h-100">
							<span data-purecounter-start="0" data-purecounter-end="<?php echo $tulisan_text[4]["kalimat"] ?>" data-purecounter-duration="1" class="purecounter"></span>
							<p>Jumlah Penduduk</p>
						</div>
					</div>
					<!-- End Stats Item -->
					<div class="col-lg-3 col-md-6">
						<div class="stats-item text-center w-100 h-100">
							<span data-purecounter-start="0" data-purecounter-end="<?php echo $tulisan_text[5]["kalimat"] ?>" data-purecounter-duration="1" class="purecounter"></span>
							<p>Laki-Laki</p>
						</div>
					</div>
					<!-- End Stats Item -->
					<div class="col-lg-3 col-md-6">
						<div class="stats-item text-center w-100 h-100">
							<span data-purecounter-start="0" data-purecounter-end="<?php echo $tulisan_text[6]["kalimat"] ?>" data-purecounter-duration="1" class="purecounter"></span>
							<p>Perempuan</p>
						</div>
					</div>
					<!-- End Stats Item -->
					<div class="col-lg-3 col-md-6">
						<div class="stats-item text-center w-100 h-100">
							<span data-purecounter-start="0" data-purecounter-end="<?php echo $tulisan_text[7]["kalimat"] ?>" data-purecounter-duration="1" class="purecounter"></span>
							<p>Rumah</p>
						</div>
					</div>
					<!-- End Stats Item -->
				</div>
			</div>
		</section>
		<!-- /Stats Section -->
		<!-- Portfolio Section -->
		<section id="portfolio" class="portfolio section">
			<!-- Section Title -->
			<div class="container section-title" data-aos="fade-up">
				<h2>Foto Desa</h2>
				<p><?php echo $tulisan_text[1]["kalimat"] ?></p>
			</div>
			<!-- End Section Title -->
			<div class="container">
				<div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
					<!-- End Portfolio Filters -->
					<div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
						<?php foreach ($foto_desa as $key => $value) { ?>
						<div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
							<img src="assets/img/foto-desa/<?php echo $value["foto"] ?>" class="img-fluid" alt="">
							<div class="portfolio-info">
								<h4><?php echo $value["judul"] ?></h4>
								<p><?php echo $value["deskripsi"] ?></p>
								<a href="assets/img/foto-desa/<?php echo $value["foto"] ?>" title="<?php echo $value["judul"] ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link">
									<i class="bi bi-zoom-in"></i>
								</a>
							</div>
						</div>
						<?php } ?>
					</div>
					<!-- End Portfolio Container -->
				</div>
			</div>
		</section>
		<!-- /Portfolio Section -->
		<!-- Team Section -->
		<section id="team" class="team section light-background">
			<!-- Section Title -->
			<div class="container section-title" data-aos="fade-up">
				<h2>Pegawai Desa (PNS)</h2>
				<p><?php echo $tulisan_text[2]["kalimat"] ?></p>
			</div>
			<!-- End Section Title -->
			<div class="container">
				<div class="row gy-5">
					<?php foreach ($pegawai as $key => $value) { ?>
					<div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
						<div class="member-img">
							<img src="assets/img/team/<?php echo $value["foto"] ?>" class="img-fluid" alt="">
						</div>
						<div class="member-info text-center">
							<h4><?php echo $value["nama"] ?></h4>
							<span><?php echo $value["jabatan"] ?></span>
							<p>Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel dolorum distinctio dire flow</p>
						</div>
					</div>
					<?php } ?>
					<!-- End Team Member -->
				</div>
			</div>
		</section>
		<!-- /Team Section -->

		<!-- Recent Posts Section -->
		<section id="recent-posts" class="recent-posts section">
			<!-- Section Title -->
			<div class="container section-title" data-aos="fade-up">
				<h2>Publikasi</h2>
				<p><?php echo $tulisan_text[3]["kalimat"] ?></p>
			</div>
			<!-- End Section Title -->
			<div class="container">
				<div class="row gy-4">
					<?php foreach ($publikasi as $key => $value) { ?>
					<div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
						<article>
							<div class="post-img">
								<img src="assets/img/blog/<?php echo $value["foto"] ?>" alt="" class="img-fluid w-100">
							</div>
							<p class="post-category"><?php echo $value["judul"] ?></p>
							<h2 class="title">
								<a href="publikasi/details.php?id=<?php echo $value["id"] ?>"><?php echo $value["deskripsi_singkat"] ?></a>
							</h2>
                            <!-- Author Publikasi -->
							<!-- <div class="d-flex align-items-center">
								<img src="assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
								<div class="post-meta">
									<p class="post-author">Maria Doe</p>
									<p class="post-date">
										<time datetime="2022-01-01">Jan 1, 2022</time>
									</p>
								</div>
							</div> -->
						</article>
					</div>
					<?php } ?>
				</div>
				<!-- End recent posts list -->
			</div>
		</section>
		<!-- /Recent Posts Section -->
		<!-- Contact Section -->
		<footer id="contact" class="footer dark-background">
			<!-- Section Title -->
			<div class="container mx-auto text-center" data-aos="fade-up">
				<h4>© UNHAS</h4>
				<p>Created by KKN UNHAS 113</p>
			</div>
		</footer>
		<!-- /Contact Section -->
	</main>

	<!-- Scroll Top -->
	<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
		<i class="bi bi-arrow-up-short"></i>
	</a>
	<!-- Preloader -->
	<div id="preloader"></div>
	<!-- Vendor JS Files -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<!-- Main JS File -->
	<script src="assets/js/main.js"></script>
</body>

</html>