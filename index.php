<?php 
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald|Ubuntu" rel="stylesheet">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/ajax.js"></script>
	<title>Trips and Travel</title>
</head>
<body>
	<?php include_once('pages/functions.php') ?>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<?php 
			include_once("pages/menu top.php");
			?>
		</nav>
	</header>	
	<div class="page container">
		<?php 
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			if($page == 1) include_once("pages/tours.php");
			if($page == 2) include_once("pages/review.php");
			if($page == 3) include_once("pages/register.php");
			if($page == 4) include_once("pages/admin.php");
		}
		?>
	</div>



	<!-- <footer class="footer">
		<nav class="container text-center">
			<?php include_once("pages/menu footer.php");?>			
		</nav>
	</footer>	 -->
	<script>
	// $(".owl-carousel").owlCarousel();
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>