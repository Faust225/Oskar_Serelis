<!DOCTYPE html>
<html>
<head>
	<title>Oskaras Šerelis</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" href="style/phpmysql.css" type="text/css" />
	<link rel="stylesheet" href="style/table_style.css" type="text/css" />

	<script src="js/jquery.js"></script>

	 <meta name="description" content="Oskar, Šerelis, Oskaras, Oskaras Šerelis, Sherelis, CV"/>

<!-- Tags for helping users to find webpage-->

	 <meta name="keywords" content="Oskar, Šerelis, Oskaras, Oskaras Šerelis, Sherelis, CV"/>

<!-- Compatibility with internet explorer-->

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<!-- jQuery library -->
<!-- Latest compiled JavaScript -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- To ensure proper rendering and touch zooming -->
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php
	require('config.php');
?>
	<div id="container">
	<header class="main-header">
		<nav class="main-nav">
			<ul>
				<li><a class="active" href="index.php">Home</a></li>
				<li><a href="#">PHP and MySQL works</a></li>
			</ul>
		</nav><!--./main-nav-->
	</header><!--./main-header-->
	<div id="main">
		<aside id="sidebar">
			<div class="block">
				<form method="post">
					<input type="submit" name="showdb" class="show"value="Show database">
				</form>

				<a href="edit.php" class="edit">&#128295; Edit table</a>
				<?php
				require('showdb.php');
				?>

			</div><!--./side1-->
		</aside>
	</div><!--./main-->
	<div class="clr"></div>
</div><!--./container-->
</body>
</html>