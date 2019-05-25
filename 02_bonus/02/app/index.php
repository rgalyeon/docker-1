<?php 
// index.php
session_start();

// If user is logged in, retrieve identity from session.
$identity = null;
if (isset($_SESSION['identity'])) {
    $identity = $_SESSION['identity'];
}
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="veiwport" content="width=device-width, initial-scale=1.0">
		<title>Choose your fighter!</title>
		<link rel="stylesheet" href="css/bootstrap.css"
			type="text/css">
	</head>
	<body>
		<div class="jumbotron">
			<div class="container" align="center">
				<h1>Choose your fighter</h1>
				<p>
				<img src="images/salamandra.jpg" width="200" height="200">
				<img src="images/alpaka.jpg" width="200" height="200">
				<img src="images/medoed.jpg" width="200" height="200">
				<img src="images/kapibara.jpg" width="200" height="200">
				</p>
			</div>
			<div class="container" align="center">
				<p>
				<a href="" class="btn btn-success btn-lg">Salamander</a>
				<a href="" class="btn btn-success btn-lg">Alpaca</a>
				<a href="" class="btn btn-success btn-lg">Honey badger</a>
				<a href="" class="btn btn-success btn-lg">Capybara</a>
				</p>
			</div>
		</div>
	</body>
</html>