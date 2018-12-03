<?php 


$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="lil";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

//$con =mysqli_connect('localhost', 'root', '', 'cms');

$con =mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$con) {
	mysql_error("not connected to database");	
}


	mysqli_set_charset($con, 'utf8');
 ?>