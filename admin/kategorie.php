<?php include("head.php"); ?>
<?php include("header.php"); ?>

	
	<?php include ("nav.php") ?>

<div class=" container-fluid main-container">
	<div class="container content">
		<div class="container body">

			<div class="page-header">
				<h1>Admin Kategorie Bereich</h1>
			</div>
			
			<div class="clearfix row">
				<div class="left-half col col-lg-3">
					<?php include ("includes/menu.php") ?>
				</div>
				<div class="right-half col col-lg-9">
					<div class="row">
						<div class="col-lg-4">
						
						<?php include "includes/menus/kategorie_erzeugen.php" ?>

                            <?php 

                                if (isset($_GET['bearbeiten'])) {
                                    include "includes/menus/kategorie_bearbeiten.php";
                                }
                             ?>
					</div>
					<div class="col-lg-8">
						
						<?php kategory_loschen(); ?><!-- löschen function -->

						<div class="table-responsiv">
							<table class="table table-hover">
								<thead class="thead">
									<th>Kategorie Id</th>
									<th>Kategorie Name</th>
									<th>bearbeiten</th>
									<th>löschen</th>
								</thead>
								<tbody>
									 <?php alle_kategorien_anzeigen(); ?>
								</tbody>
							</table>
						</div>
					</div>
					</div> <!-- end of inner col-sm-9 row div -->
				</div>
			</div>
			
		</div>
	</div>
	
	
</div>
<?php include ("footer.php") ?>
<?php include ("script_links.php") ?>