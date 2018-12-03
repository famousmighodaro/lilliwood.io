
<?php include("head.php"); ?>
<?php include("header.php"); ?>
	
	<?php include ("nav.php") ?>

<div class=" container-fluid main-container">
	<div class="container content">
		<div class="container body">

			<div class="page-header">
				<h1>Galerie</h1>
			</div>
			
			<div class="clearfix row">
				<div class="left-half col co-md-3">
					<?php include ("includes/kategorieliste.php") ?>
				</div>
				<div class="right-half col col-md-9">
					<?php include ("includes/kategorieliste_sub.php") ?>
				</div>
			</div>
			
		</div>
	</div>
	
	
</div>
<?php include ("footer.php") ?>
<?php include ("script_links.php") ?>