<div class="container">
	<div class="top-navigation">
		<ul class="top-nav clearfix">
			<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>+093 857 09 08</a></li>
			<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> exempl@exempl.com</a></li>
			<li><i class="fa fa-clock-o" aria-hidden="true"></i> 9am-18pm</li>
		</ul>
		<ul class="top-nav-social clearfix">
			<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>		
		</ul>			
<!-- 		<form action=""><input type="text" class="">
			<input type="submit">
		</form> -->
	</div>
	<div class="navbar-header">
		<a href="index.php" class="navbar-brand"><span class="logo-fir">Tours</span><span class="logo-sec">Trips</span></a>
	</div>
	<ul class="nav navbar-nav nav-right">
		<li><a href="index.php?page=1">Tours</a></li>
		<li><a href="index.php?page=2">Review</a></li>
		<li><a href="index.php?page=3">Register</a></li>
		<li><a href="index.php?page=4">Admin</a></li>
		<li><a id="login" href="#dialog" name="modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	</ul>	

	<div id="boxes">
		<div id="dialog" class="window">
			<form class="login-form" action="formLogin.php">
				<input class="form-control" placeholder="Login" name="login" type="text" size="15" maxlength="15">					
				<input class="form-control" placeholder="Password" name="pass1" type="password" size="15" maxlength="15">
				<input class="form-control"  type="submit" name="login" value="login">
			</form>
			<span><a href="#" class="close">Close</a></span>
		</div>
		<div id="mask"></div>
	</div>

</div>
<?php 
	if (empty($_SESSION['login']) || empty($_SESSION['id'])) {
		echo "You are not logged in";
	}
	else{
		echo "You are logged in as".$_SESSION['login'];
	}
?>