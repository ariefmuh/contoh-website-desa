<?php
require "../connection.php";
include "../dashboard/database.php";
$data->setTable("publikasi");
$data_publikasi = $data->getData($conn, $_GET["id"]);
$data_table = $data->read($conn, 5);
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
		<link href="../assets/img/logo.png" rel="icon">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com" rel="preconnect">
		<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<!-- Vendor CSS Files -->
		<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
		<link href="../assets/vendor/aos/aos.css" rel="stylesheet">
		<link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
		<link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
		<!-- Main CSS File -->
		<link href="../assets/css/main.css" rel="stylesheet">
		<style>
			#search_results {
				position: sticky;
				background-color: #fff;
				border: 1px solid #ccc;
				z-index: 1;
				max-height: 200px;
				overflow-y: auto; 
			}
		</style>
	</head>
	<body class="blog-details-page">
		<header id="header" class="header d-flex align-items-center sticky-top">
			<div class="container-fluid position-relative d-flex align-items-center justify-content-between ms-5">
				<a href="../index.php" class="logo d-flex align-items-center me-auto me-xl-0">
					<img src="../assets/img/logo.png" alt="">
					<h1 class="sitename">Desa Parigi <div class="fs-6">Kecamatan Tinggimoncong</div>
					</h1>
				</a>
				<nav id="navmenu" class="navmenu mx-5">
					<ul>
						<li>
							<a href="../index.php#hero" class="active fs-5 fw-bolder">Homes</a>
						</li>
						<li>
							<a href="../index.php#about" class="fs-5 fw-bolder">Profil Desa</a>
						</li>
						<li>
							<a href="../index.php#portfolio" class="fs-5 fw-bolder">Foto Desa</a>
						</li>
						<li>
							<a href="../index.php#team" class="fs-5 fw-bolder">Pegawai Desa</a>
						</li>
						<li>
							<a href="index.php" class="fs-5 fw-bolder">Publikasi</a>
						</li>
						<li>
							<a href="../login/" class="fs-5 fw-bolder">Login</a>
						</li>
					</ul>
					<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
				</nav>
			</div>
		</header>
		<main class="main">
			<!-- Page Title -->
			<div class="page-title">
				<nav class="breadcrumbs">
					<div class="container">
						<ol>
							<li>
								<a href="../">Home</a>
							</li>
							<li class="current">Blog Details</li>
						</ol>
					</div>
				</nav>
			</div>
			<!-- End Page Title -->
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<!-- Blog Details Section -->
						<section id="blog-details" class="blog-details section">
							<div class="container">
								<article class="article">
									<div class="post-img">
										<img src="../assets/img/blog/<?php echo $data_publikasi["foto"] ?>" alt="" class="img-fluid w-100">
									</div>
									<h2 class="title"><?php echo $data_publikasi["judul"] ?></h2>
									<div class="meta-top">
										<ul>
											<li class="d-flex align-items-center">
												<i class="bi bi-clock"></i>
												<a href="blog-details.html">
													<time datetime="2020-01-01"><?php echo date("Y M d", strtotime($data_publikasi["created_at"])); ?></time>
												</a>
											</li>
										</ul>
									</div>
									<!-- End meta top -->
									<div class="content">
										<p> <?php echo nl2br($data_publikasi["deskripsi"]) ?></p>
										<!-- <blockquote>
											<p> Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos. </p>
										</blockquote> -->
									</div>
								</article>
							</div>
						</section>
					</div>
					<div class="col-lg-4 sidebar">
						<div class="widgets-container">
							<!-- Search Widget -->
							<div class="search-widget widget-item">
								<h3 class="widget-title">Search</h3>
								<form>
									<input type="text" id="search_input">
								</form>
								<div id="search_results" class="w-100">
							</div>

							</div>
							<!--/Search Widget -->

							<!-- Recent Posts Widget -->
							<div class="recent-posts-widget widget-item">
								<h3 class="widget-title">Recent Posts</h3>
                                <?php foreach ($data_table as $key => $value) { ?>
                                    <div class="post-item">
                                        <img src="../assets/img/blog/<?php echo $value["foto"] ?>" alt="" class="flex-shrink-0">
                                        <div>
                                            <h4>
                                                <a href="index.php?id=<?php echo $value["id"] ?>"><?php echo $value["judul"] ?></a>
                                            </h4>
                                            <time datetime="<?php echo date("Y, M d", strtotime($value["created_at"])) ?>"><?php echo date("Y, M d", strtotime($value["created_at"])) ?></time>
                                        </div>
                                    </div>
                                <?php } ?>
							</div>
							<!--/Recent Posts Widget -->
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>
	<script src="../plugins/jquery/jquery.min.js"></script>
	<script>
    $(document).ready(function() {
        $('#search_input').on('input', function() {
            var searchTerm = $(this).val();

            if (searchTerm.trim() === "") {
                $("#search_results").html(""); 
                return;
            }

            $.ajax({
                url: "publikasi-api.php", 
                type: "POST",
                data: { search: searchTerm },
                success: function(response) {
                    $("#search_results").html(response);
                },
                error: function() {
                    $("#search_results").html("An error occurred.");
                }
            });
        });
    });
	</script>
</html>