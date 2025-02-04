<?php
include "session.php"
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title ?? 'Default Title'; ?></title>
		<link href="../assets/img/logo.png" rel="icon">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="../dist/css/adminlte.min.css">
	</head>
	<body class="hold-transition sidebar-mini dark-mode">
		<!-- Site wrapper -->
		<div class="wrapper">
			<?php include "navbar.php"; ?>
			<?php include "sidebar.php"; ?>			
			<div class="content-wrapper p-4">
				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1><?php echo $header ?? 'Admin Dashboard'; ?></h1>
							</div>
						</div>
					</div>
				</section>
				<section class="content">
					<?php echo $content ?? ''; ?>
				</section>
			</div>
			<footer class="main-footer text-center">
				<strong>Copyright &copy; 2025 <a href="https://adminlte.io">KKN UNHAS</a>. </strong>
			</footer>
			<!-- <aside class="control-sidebar control-sidebar-dark">
			</aside> -->
		</div>
		<script src="../plugins/jquery/jquery.min.js"></script>
		<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../dist/js/adminlte.min.js"></script>
		<script src="../dist/js/demo.js"></script>
	</body>
</html>