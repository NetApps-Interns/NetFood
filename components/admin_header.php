<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="assets/res/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&display=swap" rel="stylesheet" />
	<link rel="shortcut icon" href="assets/res/img/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="assets/vendor/css/grid.css" />
	<link rel="stylesheet" href="assets/vendor/css/normalize.css" />
	<link rel="stylesheet" href="assets/vendor/css/splide.min.css" />
	
	<script src="assets/vendor/js/jquery.min.js"></script>
	<script src="assets/vendor/js/sweetalert2.min.js"></script>
	<script src="assets/vendor/js/splide.min.js"></script>
	

	<title>NETFood</title>
</head>

<body>
	<header>
		<a href="admin.php?page=dashboard">
			<img src="assets/res/img/logo.png" alt="NETFood logo" class="logo" />
			<h2>NETFood</h2>
		</a>
		<nav>
			<a class="mobile-nav-icon js--nav-icon">
				<ion-icon name="menu-outline"></ion-icon>
			</a>
			<ul class="main-nav">
                <li><a href="admin.php?page=orders">Orders</a></li>
				<li><a href="admin.php?page=vendors">Vendors</a></li>
                <li><a href="admin.php?page=">Logistics</a></li>
			</ul>
		</nav>
	</header>