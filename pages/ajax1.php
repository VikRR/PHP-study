<?php 
	include_once('functions.php');	
	connect();
	$coid = $_GET['coid'];
	$sel = 'select * from cities where country_id='.$coid;
	$res = mysql_query($sel);	
	echo'<select class="form-control" name="cityid" id="cityid" onclick="showHotels(this.value)">';
	while($row=mysql_fetch_array($res, MYSQL_NUM)){
		echo '<option value="'.$row[0].'">'.$row[1].'</option>';
	}
	echo'</select>';
	mysql_free_result($res); 
 ?>
