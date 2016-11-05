<?php
$user = 'root';
$pass = '123456';
$host = 'localhost';
$dbname = 'tours';

function connect(){
	global $user, $pass, $host, $dbname;
	$link = mysql_connect($host,$user,$pass) or die('connection error');
	mysql_select_db($dbname) or die('db open error');
	mysql_query("set names 'utf8'");
}