<?php
require "../connection.php";
include "../dashboard/database.php";
$data->setTable("publikasi");
$limit = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$data_table = $data->read($conn, $limit, $page);
$total_rows = $data->getTotalRows($conn);
$total_pages = ceil($total_rows / $limit);
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
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
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
    </head>
    <body class="blog-page">
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
            <div class="page-title" data-aos="fade">
                <nav class="breadcrumbs">
                    <div class="container">
                        <ol>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li class="current">Blog</li>
                        </ol>
                    </div>
                </nav>
            </div>
            <!-- End Page Title -->
            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section">
                <div class="container mb-4">
					<?php foreach ($data_table as $key => $value) { ?>
						<a href="details.php?id=<?php echo $value["id"] ?>">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<img src="../assets/img/blog/<?php echo $value["foto"] ?>" alt="" class="img-fluid w-100">
										</div>
										<div class="col-10">
											<div class="fs-3 fw-bold"><?php echo $value["judul"] ?></div>
											<div class="fs-4"><?php echo $value["deskripsi_singkat"] ?></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
                </div>
                <?php if ($total_pages > 1) { ?>
                <div class="container">
                    <div class="pagination">
                        <ul class="pagination justify-content-center">
                            <?php if ($page > 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
                            <?php endif; ?>
                            
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            
                            <?php if ($page < $total_pages): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </section>
            <!-- /Blog Posts Section -->
        </main>
        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
            <i class="bi bi-arrow-up-short"></i>
        </a>
        <!-- Preloader -->
        <div id="preloader"></div>
        <!-- Vendor JS Files -->
		<script src="../plugins/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>
        <script src="../assets/vendor/aos/aos.js"></script>
        <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
        <!-- Main JS File -->
        <script src="../assets/js/main.js"></script>
    </body>
</html>