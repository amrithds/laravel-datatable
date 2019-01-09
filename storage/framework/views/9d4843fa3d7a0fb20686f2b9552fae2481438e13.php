<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>

<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title><?php echo e(config('app.name', 'Laravel')); ?></title>

<!-- Bootstrap core CSS -->
<link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
	href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet"
	href="//cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
<?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">Laravel</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarResponsive" aria-controls="navbarResponsive"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li><a class="nav-link" href="<?php echo e(route('surveys.index')); ?>">Surveys</a></li>
					<li><a class="nav-link" href="<?php echo e(route('users.index')); ?>">Users</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Page Content -->
	<div class="container">
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel"
			role="navigation">
			<div class="container">
				<a class="navbar-brand" href="<?php echo e(url('/')); ?>"> <?php echo e(config('app.name',
					'Laravel')); ?> </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<li><a class="nav-link" href="<?php echo e(route('surveys.index')); ?>">Surveys</a></li>
						<li><a class="nav-link" href="<?php echo e(route('users.index')); ?>">Users</a></li>
					</ul>

				</div>
			</div>
		</nav>

		<main class="p-4"> <?php echo $__env->yieldContent('content'); ?> </main>

	</div>
	<!-- /.container -->

	<!-- Footer -->
	<!--     <footer class="py-5 bg-dark"> -->
	<!--       <div class="container"> -->
	<!--         <p class="m-0 text-center text-white">Copyright</p> -->
	<!--       </div> -->
	<!-- /.container -->
	<!--     </footer> -->

	<!-- Bootstrap core JavaScript -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
	<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>