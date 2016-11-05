<?php connect(); ?>
<h3>tours</h3>
<select class="form-control" name="countryid" onclick="showCities(this.value)" id="countryid">
	<?php 
	$res = mysql_query('select * from countries');
	while($row=mysql_fetch_array($res, MYSQL_NUM)){
	 ?>
	<option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?> </option>
	<?php } ?>
</select>
<?php 
echo '<div id="citylist"></div>';
echo '<div id="hotellist"></div>';
 ?>
 