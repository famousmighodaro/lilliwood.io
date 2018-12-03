
<?php 


			if (isset($_GET['produkt_id'])) {
				$bearbeiten_produkt_id=$_GET['produkt_id'];
			}else{
				header('Location:produkt.php');
			}


			$produkt_bearbeiten_qry = "SELECT * FROM produkts WHERE produkt_id=$bearbeiten_produkt_id";
			$produkt_bearbeiten_qry_result = mysqli_query($con, $produkt_bearbeiten_qry);


			 while ($rows=mysqli_fetch_assoc($produkt_bearbeiten_qry_result)) {
              $produkt_id=$rows['produkt_id'];
              $produkt_name =$rows['produkt_name'];
              $produkt_kategorie_id = $rows['produkt_kategorie_id'];
             
              $produkt_höhe=$rows['produkt_höhe'];
              $produkt_querschnitte=$rows['produkt_querschnitte'];;
              $produkt_breite=$rows['produkt_breite'];
              $produkt_beschreibung =$rows['produkt_beschreibung'];
              $produkt_bild=$rows['produkt_bild'];
              $datum=$rows['datum'];
              $status=$rows['status'];

              

              $select_produkt_kategorie_qry="SELECT * FROM kat WHERE kat_id=$produkt_kategorie_id";
              $select_produkt_kategorie_qry_result=mysqli_query($con, $select_produkt_kategorie_qry);
              while ($rowss=mysqli_fetch_assoc($select_produkt_kategorie_qry_result)) {
                $pro_kat_id=$rowss['kat_id'];
                $pro_kat_name=$rowss['kat_name'];

              
              }


              $bild_select_qry="SELECT * FROM bilder WHERE produkt_id=$produkt_id";
              $bild_select_qry_result=mysqli_query($con, $bild_select_qry);
              


          }

			

		



?>
<h2>Status: <?php if ($status==0) {
	echo "Draft";
}else{
	echo "Published";
} ?></h2>
<form action="" method="post" enctype="multipart/form-data">
	
			<div class="form-group">
		   	<select name="produkt_status" class="form-control">
		   		<option value="0">draft</option>
		   		<option value="1">publish</option>
		   	</select> 
		   
		 </div>

		<div class="form-group">
		   	<select name="produkt_kategorie_id" class="form-control">
		   		<?php 
		   			alle_kategorie();
		   		 ?>
		   	</select> 
		   
		 </div>
	


	
		  <div class="form-group">
		    <label for="exampleInputEmail1">Produckt Name</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Produkt Name" name="produkt_name"  value="<?php if(isset($produkt_name)){echo $produkt_name;} ?>">
		    
		  </div>
		  <h4>Abmessungen</h4>
		  <div class="form-group">
		    <label for="examdpleInputPassword1">Höhe</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="produkt_höhe" value="<?php if(isset($produkt_höhe)){echo $produkt_höhe;} ?>">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Querschnitte variabel von bis</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="produkt_querschnitte" value="<?php if(isset($produkt_querschnitte)){echo $produkt_querschnitte;}else{ echo "";} ?>">
		  </div>
		   <div class="form-group">
		    <label for="exampleInputPassword1">breite</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="produkt_breite" value="<?php if(isset($produkt_breite)){echo $produkt_breite;}else{ echo "";} ?>">
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Produktbeschreibung</label>
		    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="12" name="produkt_beschreibung"><?php if(isset($produkt_beschreibung)){echo $produkt_beschreibung;}else{ echo "";} ?></textarea>
		  </div>

		   <div class="form-group">
			    <label for="exampleFormControlFile1">Produckt Kategorie Bild</label>

			    <img  width="200" height="200" src="img/<?php if(isset($produkt_bild)){echo $produkt_bild;}else{ echo "";} ?>">

			    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="produkt_bild">

			    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="userfile[]" multiple="multiple">

  			</div>

			<hr style="color: red; border:3px black solid; margin-bottom: 10px;">


			<div class="form-group">
			    <label for="exampleFormControlFile1">Produckt Bilder</label>
				<ul class="unstyled, produck-images">

					<?php 

					while ($bilder_rows=mysqli_fetch_assoc($bild_select_qry_result)) {
              	$bild_id=$bilder_rows['bild_id'];
              	$bild_produkt_id=$bilder_rows['produkt_id'];
              	$bild_name=$bilder_rows['bild_name'];

              	echo " <li class='produck-images-list'>
              	<div><img src=img/{$bild_name}><div><a href='produkt.php?source=produkt_bearbeiten&produkt_id=$produkt_id&bild_loschen=$bild_id'>loschen</a></li>";
              }
					
					?>
				</ul>
			    

			    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="userfile[]" multiple="multiple">
				

			    <?php 

			    	if (isset($_GET['bild_loschen'])) {

			    		$bild_loschen_id=$_GET['bild_loschen'];
			    		$loschen_bild_product_id=$_GET['produkt_id'];
			    		$bild_loschen_qry= "DELETE FROM bilder WHERE bild_id=$bild_loschen_id";
			    		mysqli_query($con, $bild_loschen_qry);
			    		header("Location:produkt.php?source=produkt_bearbeiten&produkt_id='{$loschen_bild_product_id}'");
			    	}
			     ?>

  			</div>
  			
			
  			
	
		  <button type="submit" class="btn btn-primary" name="produktanderungen_speichen">sperschen</button>

</form>


<?php 

	if (isset($_POST['produktanderungen_speichen'])) {
			
			$produkt_name =$_POST['produkt_name'];
			$produkt_kategorie_id = $_POST['produkt_kategorie_id'];
			$produkt_höhe=$_POST['produkt_höhe'];
			$produkt_querschnitte=$_POST['produkt_querschnitte'];
			$produkt_breite=$_POST['produkt_breite'];
			$produkt_beschreibung =$_POST['produkt_beschreibung'];
			$produkt_bild=$_FILES['produkt_bild']['name'];
			$produkt_bild_tmp=$_FILES['produkt_bild']['tmp_name'];
			$status=$_POST['produkt_status'];
			//$datum=date('d-m-y');
			move_uploaded_file($produkt_bild_tmp, "img/$produkt_bild");

			if (empty($produkt_bild)) {
    	
		    	$bild_qry="SELECT * FROM produkts WHERE produkt_id={$produkt_id}";
		    	$bild_qry_result=mysqli_query($con, $bild_qry);
		    	while ($bild_row = mysqli_fetch_assoc($bild_qry_result)) {
		    		$produkt_bild =$bild_row['produkt_bild'];
		    	}
		    }


			$produktanderungen_speichen_qry="UPDATE produkts SET produkt_name='{$produkt_name}', produkt_kategorie_id='{$produkt_kategorie_id}', produkt_höhe='{$produkt_höhe}', produkt_querschnitte='{$produkt_querschnitte}', produkt_breite='{$produkt_breite}', produkt_beschreibung='{$produkt_beschreibung}', produkt_bild='{$produkt_bild}', status='{$status}' WHERE produkt_id={$produkt_id}";

				
				

			$produktanderungen_speichen_qry_result=mysqli_query($con, $produktanderungen_speichen_qry);

				if (!$produktanderungen_speichen_qry_result) {
					die("query failed ". mysqli_error($con));
				}else{
					for ($i=0; $i<count($_FILES['userfile']['name']); $i++) { 
					$name=$_FILES['userfile']['name'][$i];
					$temp=$_FILES['userfile']['tmp_name'][$i];

					move_uploaded_file($temp, "img/$name");

					$insert_produkt_bilder_qry= "INSERT INTO bilder(produkt_id, bild_name) VALUES('{$produkt_id}', '{$name}')";


					$insert_produkt_bilder_qry_result=mysqli_query($con, $insert_produkt_bilder_qry);

					if (!$insert_produkt_bilder_qry_result) {
						die("query Failed ".mysqli_error($con));
					}
				}
					header('Location:produkt.php');

			}
	}

 ?>



