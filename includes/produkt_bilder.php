<?php 

if (isset($_GET['produkt_id'])) {
  if(empty($_GET['produkt_id'])){
     echo "<h1>your field is empty</h1>";
   }else{
  $produkt_anzeigen_id=$_GET['produkt_id'];

  $produkt_anzeigen_qry="SELECT * FROM produkts WHERE produkt_id=$produkt_anzeigen_id";

  $produkt_anzeigen_qry_result=mysqli_query($con, $produkt_anzeigen_qry);

  if (mysqli_num_rows($produkt_anzeigen_qry_result)===0) {
    echo "<h1>Sorry! no such product</h1>"; 
  }else{
    while ($rows=mysqli_fetch_assoc($produkt_anzeigen_qry_result)) {
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

               $rowcount=mysqli_num_rows($select_produkt_kategorie_qry_result);
              

              if($rowcount>0){
                while ($rowss=mysqli_fetch_assoc($select_produkt_kategorie_qry_result)) {
                $pro_kat_id=$rowss['kat_id'];
                $pro_kat_name=$rowss['kat_name'];

              
              }

              $bild_select_qry="SELECT * FROM bilder WHERE produkt_id=$produkt_id";
              $bild_select_qry_result=mysqli_query($con, $bild_select_qry);
            ?>



    

       
                <div class="row" >
                  <div class="col-lg-12 product-display">
                    <div class="col-lg-8 ">
                     
                       <div class="wrapper">
                  <div class="image-gallery">
                    <aside class="thumbnails">
                      
                        <?php 

                          while ($bilder_rows=mysqli_fetch_assoc($bild_select_qry_result)) {
                                  $bild_id=$bilder_rows['bild_id'];
                                  $bild_produkt_id=$bilder_rows['produkt_id'];
                                  $bild_name=$bilder_rows['bild_name'];

                                  echo "<a  class='selected thumbnail' data-big='admin/img/{$bild_name}'>
                                      <div class='thumbnail-image' style='background-image: url(admin/img/{$bild_name})'>
                                      </div>
                                    </a>";
                                }
                         

                        ?>
                        

                       <?php }else{

              echo "<h1>Sorry! no such product</h1>";
            }




              
    }
  }
  
}
}else{
 
}



 ?>
                      
                    </aside>

                    <main class="primary" style="background-image: url('admin/img/<?php echo $produkt_bild; ?>');"></main>
                  </div>

                  </div> 
                        
                 
                    </div>
                    <div class="col-lg-4 product-data" >
                      <h3></h3>
                      
                      <div class="product-details">
                        <h1><?php if(isset($produkt_name)){echo $produkt_name;} ?></h1>
                        <ul>

                          <?php if(isset($produkt_höhe)){echo "<li>Höhe: {$produkt_höhe}</li>" ;} ?>
                          <?php if(isset($produkt_breite)){echo "<li>Breite: {$produkt_breite}</li>" ;} ?>
                          <?php if(isset($produkt_querschnitte)){echo "<li>Querschnitte: {$produkt_querschnitte}</li>" ;} ?>
                          <?php if(isset($pro_kat_name)){echo "<li>Kategorie: {$pro_kat_name}</li>" ;} ?>
                          
                          
                        </ul>
                      </div>

                    </div>
                    
                  </div>
                  <div>
                    
                  <?php if(isset($produkt_beschreibung)){echo "<br>";} ?>
                    <?php if(isset($produkt_beschreibung)){
                    echo "<h4>Beschreibung:</h4><p> {$produkt_beschreibung}</p>" ;} ?>

                    
                
                  </div>
            </div>
