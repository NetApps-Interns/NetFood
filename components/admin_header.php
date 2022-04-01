<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="assets/vendor/css/grid.css" />

	<link rel="stylesheet" href="../assets/vendor/css/normalize.css" />
	<link rel="stylesheet" href="../assets/res/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&display=swap" rel="stylesheet" />
	<link rel="shortcut icon" href="assets/res/img/favicon.ico" type="image/x-icon" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="assets/res/script.js"></script>

	<title>NETFood</title>
</head>

<body>
	<header>
		<a href="index.php?page=menu">
			<img src="../assets/res/img/logo.png" alt="NETFood logo" class="logo" />
			<h2>NETFood</h2>
		</a>
		<nav>
			<a class="mobile-nav-icon js--nav-icon">
				<ion-icon name="menu-outline"></ion-icon>
			</a>
			<ul class="main-nav">
				<li><a href="../Admin/Dashboard.php">Dashboard</a></li>
				<li><a href="../Admin/manage_admin.php">Admins</a></li>
                <li><a href="../Admin/Orders.php">Orders</a></li>
				<li><a href="../Admin/Manage_Vendors.php">Vendors</a></li>
                <li><a href="../Admin/Manage_riders.php">Logistics</a></li>
			</ul>
		</nav>
	</header>