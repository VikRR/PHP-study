<div class="container">
	<div class="admin-page">
		<div class="row ">
			<div class="col-md-6 vl">
				<?php
				connect();
				$sel = 'select * from countries';
				$res = mysql_query($sel);
				$url = 'action="index.php?page=4" method="post"';
				?>
				<h3> Add City</h3>
				<form <?php echo $url; ?>>
					<?php mysql_free_result($res); ?>
					<div class="col-md-4"><input class="form-control" type="text" name="country"></div>
					<div class="col-md-4"><input class="btn btn-default" type="submit" name="addcountry" value="Add country..."></div>
					<div class="col-md-4"><input class="btn btn-default" type="submit" name="delcountry" value="Remove country..."></div>
				</form>
				<?php
				if (isset($_POST['addcountry'])) {
					$country = trim(htmlspecialchars($_POST['country']));
					if ($country == "") exit();
					$insert = 'insert into Countries (country) values("'.$country.'")';
					mysql_query($insert);
					echo'<script>window.location.href=document.URL;</script>';
				}
				if (isset($_POST['delcountry'])) {
					foreach ($_POST as $key => $value) {
						if (substr($key, 0, 2) == "cb") {
							$idc = substr($key, 2);
							$del = 'delete from countries where id='.$idc;
							mysql_query($del);
						}
					}
					echo'<script>window.location.href=document.URL;</script>';
				}
				$sel = 'select * from countries';
				$res = mysql_query($sel);
				?>
				<div class="table">
					<table>
						<tr>
							<th>Id</th>
							<th>Country</th>
							<th></th>
						</tr>
						<tr>
							<?php
							while($row = mysql_fetch_array($res, MYSQL_NUM)){ ?>
							<tr>
								<td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td>
								<td><input type="checkbox" name="cb<?php echo $row[0]; ?>"></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
				<div class="col-md-6">
					<h3> Add City</h3>
					<form <?php echo $url; ?>>
						<?php mysql_free_result($res);
						$res = mysql_query('select * from countries'); ?>
						<div class="col-md-4">
							<select class="form-control" name="countryname">
								<?php
								while($row = mysql_fetch_array($res, MYSQL_NUM)){?>
								<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-4"><input class="form-control" type = "text" name="city"></div>
						<div class="col-md-4"><input class="btn btn-default" type = "submit" name="addcity" value="Add City..."></div>
					</form>
					<?php
					if (isset($_POST['addcity'])) {
						$city = trim(htmlspecialchars($_POST['city']));
						// if ($city == "") exit();
						$country_id = $_POST['countryname'];
						$ins = 'insert into cities (city, country_id) values("'.$city.'", '.$country_id.')';
						mysql_query($ins);
						echo'<script>window.location.href=document.URL;</script>';
					}
					?>
					<div class="table">
						<?php
						$sel = 'select ci.id,ci.city,co.country from cities ci, countries co where ci.country_id = co.id';
						$res = mysql_query($sel);?>
						<table>
							<tr>
								<th>Id</th>
								<th>City</th>
								<th>Country</th>
							</tr>
							<tr>
								<?php while($row = mysql_fetch_array($res, MYSQL_NUM)){ ?>
								<tr>
									<td><?php echo $row[0];?></td><td><?php echo $row[1];?></td><td><?php echo $row[2];?></td>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<h3> Add Hotels</h3>
					<form <?php echo $url; ?>>
						<?php
						mysql_free_result($res);
						$res = mysql_query('select ci.id, ci.city, co.id, co.country from cities ci, countries co where ci.country_id=co.id');
						?>
						<div class="col-md-2">
							<select class="form-control" name="citycountryname">
								<?php
								while($row = mysql_fetch_array($res, MYSQL_NUM)){
									?>
									<option value=" <?php echo $row[0].'-'.$row[2]; ?> "> <?php echo $row[1].'-'.$row[3]; ?> </option>
									<?php } ?>
								</select>
							</div>

								<div class="col-md-4">
									<input type="text" placeholder="Add Hotel" class="form-control" name="hotel">
								</div>
								<div class="col-md-2">
									<input type="text" placeholder="Add Star" class="form-control" name="star">
								</div>
								<div class="col-md-2">
									<input type="text" placeholder="Add Cost" class="form-control" name="cost">
								</div>
								<textarea class="form-control" name="info" cols="91" rows="3" placeholder="Add Info"></textarea>
								<input type="submit" name="addhotel" class="btn btn-default" value="Add Hotel...">
							</form>
							<?php
							if(isset($_POST['addhotel'])){
								$hotel = trim(htmlspecialchars($_POST['hotel']));
								if($city = "") exit();
								$country_hot_id = explode("-", $_POST['citycountryname']);
								$star = $_POST['star'];
								$cost = $_POST['cost'];
								$info = $_POST['info'];
								$insert_hotel = 'insert into hotels (hotel, city_id, country_id, stars, cost, info)
								values("'.$hotel.'", '.$country_hot_id[0].', '.$country_hot_id[1].', '.$star.', '.$cost.', "'.$info.'")';
								mysql_query($insert_hotel);
								echo'<script>window.location.href=document.URL;</script>';
							}
							?>
							<div class="table">
								<table>
									<tr>
										<th>Id</th>
										<th>Hotel</th>
										<th>City</th>
										<th>Country</th>
										<th>Stars</th>
										<th>Cost</th>
										<th>Info</th>
									</tr>
									<tr>
										<?php
										$sel = 'select ho.id, ho.hotel, ci.city, co.country, ho.stars, ho.cost, ho.info
										from hotels ho, cities ci, countries co
										where ho.city_id = ci.id and ho.country_id = co.id';
										$res = mysql_query($sel);
										while($row = mysql_fetch_array($res, MYSQL_NUM)){
											?>
											<td> <?php echo $row[0]; ?> </td>
											<td> <?php echo $row[1]; ?> </td>
											<td> <?php echo $row[2]; ?> </td>
											<td> <?php echo $row[3]; ?> </td>
											<td> <?php echo $row[4]; ?> </td>
											<td> <?php echo $row[5]; ?> </td>
											<td> <?php echo $row[6]; ?> </td>
										</tr>
										<?php } ?>
									</table>
								</div>
							</div>
							<div class="row">
								<hr>
						<div class="col-md-4">
							<form action="index.php?page=4" method="post" enctype="multipart/form-data">
							<select class="form-control" name="hotelid">
								<?php
									$sel= 'select ho.id, co.country, ci.city, ho.hotel
									from countries co, cities ci, hotels ho
									where co.id = ho.country_id and ci.id = ho.city_id
									order by co.country';
									$res = mysql_query($sel);
									while($row = mysql_fetch_array($res, MYSQL_NUM)){?>
								  <option value=" <?php echo $row[0]; ?> "> <?php echo $row[1].'&nbsp;&nbsp;'.$row[2].'&nbsp;&nbsp;'.$row[3]; ?> </option>
								<?php }
								 mysql_free_result($res);
								  ?>
							</select>
							<input class="form-control" type="file" name="file[]" multiple accept="image/*">
							<input class="btn btn-default" type="submit" name="addimages" value="Add Images...">
							</form>
							<?php
								if (isset($_REQUEST['addimages'])){
									foreach($_FILES['file']['name'] as $k => $v){
										if ($_FILES['file']['error'][$k] !=0) {
											echo '<script>alert("Wrong file size:'.$v.'")</script>';
											continue;
										}
										if (move_uploaded_file($_FILES['file']['tmp_name'][$k], 'img/'.$v)) {
											$ins = 'insert into images(hotel_id, imagepath) values('.$_REQUEST['hotelid'].',"img/'.$v.'")';
											mysql_query($ins);
										}
									}
								}
							 ?>
							 </div>
						</div>
						</div>
					</div>
