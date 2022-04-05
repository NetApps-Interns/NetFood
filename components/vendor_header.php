<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="../assets/vendor/css/grid.css" />

	<link rel="stylesheet" href="../assets/vendor/css/normalize.css" />
	<link rel="stylesheet" href="../assets/res/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&display=swap" rel="stylesheet" />
	<link rel="shortcut icon" href="assets/res/img/favicon.ico" type="image/x-icon" />

	<script src="../assets/vendor/js/jquery.min.js"></script>
	<script src="../assets/vendor/js/sweetalert2.min.js"></script>
	

	<title>NETFood</title>
</head>

<body>
	<?php 
	
	if (isset($_SESSION["userid"])) {
		include 'private-header.php';
	}else{
		include 'public-header.php';
	}
	
	// $_SESSION["userid"] ? '':
	
