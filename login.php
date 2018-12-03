<?php include("head.php");
include("header.php");
include("nav.php");
session_start();?>
<?php 
if (isset($_POST['anmelden'])) {
	$username=$_POST['email'];
	$password=$_POST['password'];
	$username = mysqli_real_escape_string($con, $username);
	$password = mysqli_real_escape_string($con, $password);
$qrys="SELECT * FROM users WHERE username='{$username}' AND  password='{$password}'";
$user_qry_result= mysqli_query($con, $qrys);
	if (!$user_qry_result) {
		die("Query Failed ".mysqli_error($con));
	}
	if (mysqli_num_rows($user_qry_result)>0) {
		while ($row=mysqli_fetch_assoc($user_qry_result)) {
		$db_id=$row['id'];
		$db_username =$row['username'];
		$db_password=$row['password'];
		$db_role=$row['role'];
	}
if ($username!==$db_username && $password!==$db_password) {
header("Location: ../index.php");
	}else if($username==$db_username && $password==$db_password){
		$_SESSION['username'] =$db_username;
		$_SESSION['id'] =$db_id;
		$_SESSION['role']=$db_role;
		header("Location: admin/index.php");
	}else{
		header("Location: ../index.php");
	}
	}else{
		$login_error="Benutzername oder kennwork ist falsch";
	}
	
}
 ?>

<div class="container-fluid main-container">
	<div class="container login-container">	
		<div class="body">
		<form class="form-group" action="" method="post">
			<?php if (isset($login_error)) {
				echo $login_error;
			} ?>
			<div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Kennwort</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
			  </div>
			  <div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Check me out</label>
			  </div>
			  <button type="submit" class="btn btn-primary" name="anmelden">anmelden</button>
			</form>
	</div>
	</div>	
</div>
<?php include ("footer.php") ?>
<?php include ("script_links.php") ?>
