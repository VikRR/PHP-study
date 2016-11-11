<?php connect(); ?>

<section class="banner-area">
	<div class="row">
		<div class="container">
			<div class="col-md-6 banner-area-header text-center">
				<h1>Where your journey begins.</h1>
				<p>Discover your next great adventure,<br>become an explorer to get started!</p>
			</div>
			<div class="col-md-6 banner-area-form text-center">
				<h2>Search Tour</h2>
				<p>Find your dream tour today!</p>
				<form action="#">
					<select class="form-control" name="countryid" onclick="showCities(this.value)" id="countryid">
						<?php 
						$res = mysql_query('select * from countries');
						while($row=mysql_fetch_array($res, MYSQL_NUM)){
							?>
							<option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?> </option>
							<?php 
						} 
						?>
					</select>					
				</form>
				<?php 
				echo '<div id="citylist"></div>';
				echo '<div id="hotellist"></div>';
				?>
			</div>		
			<div class="col-md-12 banner-area-text">				
				<div class="container">
					<div class="col-md-6">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies erat mollis metus molestie, quis porta nunc finibus. Phasellus in nibh libero.</p>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>