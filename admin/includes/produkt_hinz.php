
<?php 

/*
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
			echo "success";

		}
}
*/

?>
<form action="produkt.php?source=vorschau" method="post" enctype="multipart/form-data">
		<div class="form-group">
		   	<select name="produkt_kategorie_id" class="form-control">
		   		<?php 
		   			alle_kategorie();
		   		 ?>
		   	</select> 
		   
		 </div>
	


	
		  <div class="form-group">
		    <label for="exampleInputEmail1">Produckt Name</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Produkt Name" name="produkt_name">
		    
		  </div>
		  <h4>Abmessungen</h4>
		  <div class="form-group">
		    <label for="examdpleInputPassword1">Höhe</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="produkt_höhe">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Querschnitte variabel von bis</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="produkt_querschnitte">
		  </div>
		   <div class="form-group">
		    <label for="exampleInputPassword1">breite</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="produkt_breite">
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Produktbeschreibung</label>
		    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="12" name="produkt_beschreibung"></textarea>
		  </div>

		   <div class="form-group">
			    <label for="exampleFormControlFile1">Produckt Kategorie Bild</label>
			    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="produkt_bild">
  			</div>


  			<div class="form-group">
			    <label for="exampleFormControlFile1">Produckt Bilder</label>

			    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="userfile[]" multiple="multiple">

  			</div>

	
		  <button type="submit" class="btn btn-primary" name="erstellen">erstellen</button>

</form>

