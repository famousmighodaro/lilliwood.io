
<?php ob_start(); ?>
<?php if (!session_start()) {
	session_start();
} ?>


<?php 



if (!isset($_SESSION['role'])) {

	
	
	//if (isset($_SESSION['role'])!=='admin') {
	
	header('Location: ../login.php');
//}
	
}


 ?>


<?php include("../includes/db.php");  ?>
<?php include_once "sections/functions.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	

	<link rel="stylesheet" type="text/css" href="../css/style.css?ver=3.0">
	<link rel="stylesheet" type="text/css" href="css/style.css?ver=3.0">
	<title>Liliwood</title>
</head>
<body>