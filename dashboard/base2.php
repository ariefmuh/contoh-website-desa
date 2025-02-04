<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title ?? 'Default Title'; ?></title>
		<link href="../../assets/img/logo.png" rel="icon">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
	</head>
	<body class="hold-transition sidebar-mini dark-mode">
		<div class="wrapper">
			<?php include "../navbar2.php"; ?>
			<?php include "../sidebar2.php"; ?>			
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
				<section class="content p-5">
					<?php echo $content ?? ''; ?>
				</section>
			</div>
			<footer class="main-footer text-center">
				<strong>Copyright &copy; 2025 <a href="https://adminlte	.io">KKN UNHAS</a>. </strong>
			</footer>
			<!-- <aside class="control-sidebar control-sidebar-dark">
			</aside> -->
		</div>
		<script src="../../plugins/jquery/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
		<script src="../../dist/js/adminlte.min.js"></script>
		<script src="../../dist/js/demo.js"></script>
	</body>
</html>