<?php session_start(); ?>

<?php 
	$_SESSION['username'] =null;
		$_SESSION['id'] =null;
		$_SESSION['role']=null;
		header("Location: ../../index.php");
 ?>