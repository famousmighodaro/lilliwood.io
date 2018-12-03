
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
					<ul class="products">

							<?php 

							   

							        

							     ?>

							    <?php 

							    if (isset($_GET['kategorie_id'])) {
							        $kategorie_id=$_GET['kategorie_id'];
							    }else{
							    	header('Location:galerie.php');
							    }

							    $kat_produkt_seite="SELECT * FROM produkts WHERE status=1 AND produkt_kategorie_id=$kategorie_id";
							        $res=mysqli_query($con, $kat_produkt_seite);
							        while ($rows=mysqli_fetch_assoc($res)) {
							            $produkt_id=$rows['produkt_id'];
							            $produkt_name=$rows['produkt_name'];
							            $produkt_bild=$rows['produkt_bild'];


							            echo "<li><a href='produkt.php?produkt_id=$produkt_id' class='product_tumbnail'>";
							            echo "<img src='admin/img/$produkt_bild'><p>{$produkt_name}</p></a></li>";
							    //<!-- more list items -->
							        }


							     ?>
							    
							</ul>
				</div>
			</div>
			
		</div>
	</div>
	
	
</div>
<?php include ("footer.php") ?>
<?php include ("script_links.php") ?>