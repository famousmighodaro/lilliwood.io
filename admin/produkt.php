<?php include("head.php"); ?>
<?php include("header.php"); ?>
	
	<?php include ("nav.php") ?>

<div class=" container-fluid main-container">
	<div class="container content" >
		<div class="container-fluid body">

			<div class="page-header">
				<h1>Admin Bereich</h1>
			</div>
			
			<div class="row">
				<div class="left-half col co-lg-3">
					<?php include ("includes/menu.php") ?>
				</div>
				<div class="right-half  col-lg-9" >



					<?php 

					if (isset($_GET['source'])) {
						$source=$_GET['source'];

					}else{
						    $source='';
						}

					switch ($source) {
							case 'produkt_hinzufugen':
								include "includes/produkt_hinz.php";
								break;
							case 'produkt_bearbeiten':
								include "includes/produkt_bearbeiten.php";
								break;
							case 'produkt_anzeigen':
								include "includes/produkt_anzeigen.php";
								break;
							case 'vorschau':
								include "includes/vorschau.php";
								break;
							default:
								include "includes/alle_produkt_list_anzeigen.php";
								break;
						}

					 ?>
				</div>
			</div>
			
		</div>
	</div>
	
	
</div>
<?php include ("footer.php") ?>
<?php include ("script_links.php") ?>