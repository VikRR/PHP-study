<?php 

include_once("functions.php");
connect();
// $hid = $_GET['hoid'];
$hid = $_POST['hoid'];
$res = mysql_query('select id, hotel, stars, cost from hotels where city_id='.$hid);
echo'<table>';
echo '<tr><th>Hotel</th><th>Stars</th><th>Cost</th><th>Info</th></tr>';
while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
	echo '<tr><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td><a target="_blank" href="pages/review.php?hoid='.$row[0].'">More...</a></td></tr>';
}
echo '</table>';
mysql_free_result($res);