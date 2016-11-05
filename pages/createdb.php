<?php
include_once('functions.php');
connect();
$ct1 = 'create table Countries(id int not null auto_increment primary key, country varchar(64))default charset="utf8"';
$ct2 = 'create table Cities(id int not null auto_increment primary key, city varchar(64), country_id int,
 foreign key(country_id) references Countries(id) on delete cascade)default charset="utf8"';
$ct3 = 'create table Hotels(id int not null auto_increment primary key, hotel varchar(64), country_id int,
 foreign key(country_id) references Countries(id) on delete cascade, city_id int,
 foreign key(city_id) references Cities(id) on delete cascade, stars int, cost int, info varchar(1024))default charset="utf8"';
$ct4 = 'create table Images(id int not null auto_increment primary key, 
	imagepath varchar(255),
	hotel_id int,
	foreign key(hotel_id) references Hotels(id) on delete cascade) default charset="utf8"';
$ct5 = 'create table Roles(id int not null auto_increment primary key, role varchar(32))default charset="utf8"';
$ct6 = 'create table Users(id int not null auto_increment primary key,
 login varchar(32),
 pass varchar(32),
 email varchar(128), discount int,
 role_id int, avatar mediumblob, phone varchar(128),
 foreign key(role_id) references Roles(id) on delete cascade
 )default charset="utf8"';

mysql_query($ct1);
mysql_query($ct2);
mysql_query($ct3);
mysql_query($ct4);
mysql_query($ct5);
mysql_query($ct6);

$err = mysql_errno();
if($err){
	echo 'Error code'.$err.'<br>';
	exit();
}