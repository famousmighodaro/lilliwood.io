<?php include("head.php"); ?>
<?php include("header.php"); ?>
	
	<?php include ("nav.php") ?>

<div class=" container-fluid main-container">
	<div class="container_fluid content">
		<div class="container-fluid body">

			<div class="page-header">
				<h1>Admin Bereich  <small><?php $_SESSION['username'] ?></small></h1>
			</div>
			
			<div class="clearfix row">
				<div class="left-half col co-sm-3">
					<?php include ("includes/menu.php") ?>
				</div>
				<div class="right-half col col-lg-9">
					<?php include ("includes/panel_produkt_list.php") ?>
				</div>
			</div>
			
		</div>
	</div>
	
	
</div>
<?php include ("footer.php") ?>
<?php include ("script_links.php") ?>