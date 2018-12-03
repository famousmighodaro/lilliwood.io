<?php 


if (isset($_POST['erstellen'])) {
	if (isset($_POST['erstellen'])) {
			$produkt_name =$_POST['produkt_name'];
			$produkt_kategorie_id = $_POST['produkt_kategorie_id'];
			$produkt_höhe=$_POST['produkt_höhe'];
			$produkt_querschnitte=$_POST['produkt_querschnitte'];
			$produkt_breite=$_POST['produkt_breite'];
			$produkt_beschreibung =$_POST['produkt_beschreibung'];
			$produkt_bild=$_FILES['produkt_bild']['name'];
			$produkt_bild_tmp=$_FILES['produkt_bild']['tmp_name'];
			$datum=date('d-m-y');

			move_uploaded_file($produkt_bild_tmp, "./img/$produkt_bild");


			$erstellen_produkt_qry= "INSERT INTO produkts(produkt_kategorie_id, produkt_name, produkt_höhe, produkt_querschnitte, produkt_breite, produkt_beschreibung, produkt_bild, datum) VALUES('{$produkt_kategorie_id}', '{$produkt_name}', '{$produkt_höhe}', '{$produkt_querschnitte}', '{$produkt_breite}', '{$produkt_beschreibung}', '{$produkt_bild}', now())";

			$produkt_erstellen_qry_result=mysqli_query($con, $erstellen_produkt_qry);

			if (!$produkt_erstellen_qry_result) {
				die("Query Failed. ".mysqli_error($con));
			}
			

		}
}


?>
	 
				        <div class="row" >
				          <div class="col-lg-12 product-display">
				            <div class="col-lg-8 ">
				             
				               <div class="wrapper">
									<div class="image-gallery">
									  <aside class="thumbnails">
									    
									    	<?php /*

									    		while ($bilder_rows=mysqli_fetch_assoc($bild_select_qry_result)) {
									              	$bild_id=$bilder_rows['bild_id'];
									              	$bild_produkt_id=$bilder_rows['produkt_id'];
									              	$bild_name=$bilder_rows['bild_name'];

									              	echo "<a  class='selected thumbnail' data-big='img/{$bild_name}'>
									              			<div class='thumbnail-image' style='background-image: url(img/{$bild_name})'>
									              			</div>
									              		</a>";
									              }
									    	 
*/
									    	?>
									      
									    
									  </aside>

									  <main class="primary" style="background-image: url('img/<?php echo $produkt_bild; ?>');"></main>
									</div>

									</div> 
				                
				         
				            </div>
				            <div class="col-lg-4 product-data" >
				              <h3></h3>
				              
				              <div class="product-details">
				                <h1><?php echo $produkt_name; ?></h1>
				                <ul>

				                  <?php if($produkt_höhe){echo "<li>Höhe: {$produkt_höhe}</li>" ;} ?>
				                  <?php if($produkt_breite){echo "<li>Breite: {$produkt_breite}</li>" ;} ?>
				                  <?php if($produkt_querschnitte){echo "<li>Querschnitte: {$produkt_querschnitte}</li>" ;} ?>
				                  <?php if($produkt_kategorie_id){echo "<li>Kategorie: {$produkt_kategorie_id}</li>" ;} ?>
				                  
				                  
				                </ul>
				              </div>

				            </div>
				            
				          </div>
				          <div>
				          	
				          <?php if($produkt_beschreibung){echo "<br>";} ?>
				            <?php if($produkt_beschreibung){
				            echo "<h4>Beschreibung:</h4><p> {$produkt_beschreibung}</p>" ;} ?>

				            
				        
				          </div>
				    </div>