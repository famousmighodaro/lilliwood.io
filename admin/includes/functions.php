<?php 

	


	function kategorie_erzeugen(){
	global $con;
	$success="Kategorie erzeugen";
		if (isset($_POST['erzeugen'])){

		  $kat_name = $_POST['kat_name'];
		  if ($kat_name=='') {
		  	echo "Das Feld für den Kategorienamen ist leer";
		  }else{
			  $qry = "INSERT INTO kat(kat_name) VALUES('$kat_name')";
			  $result = mysqli_query($con, $qry);
			  if (!$result) {
			    die("query failed!!! ".mysqli_error($con));
			  }else{
			     header("Location: kategorie.php");
			  }
  

			}
		}
	}

	function alle_kategorie(){
			global $con;
		$qry= "SELECT * FROM kat"; 
		$result = mysqli_query($con, $qry);
		while ($row=mysqli_fetch_assoc($result)) {
			$kat_name = $row['kat_name'];
			$kat_id= $row['kat_id'];

			echo "<option value='$kat_id'>{$kat_name}</option>";
		}
	}

	function alle_kategorien_anzeigen(){
				global $con;
		$qry= "SELECT * FROM kat"; 
		$result = mysqli_query($con, $qry);
		while ($row=mysqli_fetch_assoc($result)) {
			$kat_name = $row['kat_name'];
			$kat_id= $row['kat_id'];
		
			echo "<tr>";
			echo "<td>{$kat_id}</td>";
			echo "<td>{$kat_name}</td>";
			echo " <td><small> <a href='kategorie.php?bearbeiten={$kat_id}'>bearbeiten</a></small> </td> ";
			echo " <td> <small><a href='kategorie.php?loschen={$kat_id}'>löschen</a></small> </td> ";
			echo "</tr>";
		
			}			

 
	}
	function kategory_loschen(){
		global $con;
		if (isset($_GET['loschen'])) {
            $loschen_kat_id=$_GET['loschen'];


            $loschen_kat_qry="DELETE FROM kat WHERE kat_id={$loschen_kat_id}";
            $loschen_kat_result = mysqli_query($con, $loschen_kat_qry);
           
            if (!$loschen_kat_result) {
                die("could not delete cat ". mysqli_error($con));
            }else{
                 header("Location: kategorie.php");
            }
        }
	}



	function produkt_erstellen(){
		global $con;

		
	}
 ?>