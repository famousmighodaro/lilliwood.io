
    <form class="px-4 py-3" action="" method="post">
    <div class="form-group">
      <label for="Kategorie">Wählen</label>
      <?php 
        if (isset($_GET['bearbeiten'])) {

            $get_kat_id_bearbeiten = $_GET['bearbeiten'];

            $query = "SELECT * FROM kat WHERE kat_id=$get_kat_id_bearbeiten";
             $select_kat_bearbeiten= mysqli_query($con, $query);

             while ($row = mysqli_fetch_assoc($select_kat_bearbeiten)) {
                 $kat_id = $row['kat_id'];
                 $kat_name = $row['kat_name'];
       
        ?>

     <input type="text" name="speichern_kat_name" id="kategorieName" class="form-control" placeholder="neuer Name" value="<?php if(isset($kat_name)){echo $kat_name; }?>">

       <?php    } }  ?>


        <?php //////////////update query

    if (isset($_POST['speichern'])) {
    $speichern_kat_name=$_POST['speichern_kat_name'];
    $speichern_kat_name_qry="UPDATE kat SET kat_name='{$speichern_kat_name}' WHERE kat_id={$get_kat_id_bearbeiten}";
    $speichern_kat_name_result = mysqli_query($con, $speichern_kat_name_qry);
    
    if (!$speichern_kat_name_result) {
        die("could not update cat ". mysqli_error($con));
        }else{
                header("Location: kategorie.php");
                }
            }
  
     ?>
    </div>
    <button type="submit" class="btn" name="speichern">speichern</button>
  </form>
  <div class="dropdown-divider"></div>
