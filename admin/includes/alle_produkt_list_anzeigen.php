<div class="table-responsive">
  <table class="table">
    <thead class="thead">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Categorie</th>
        <th scope="col">Name</th>
        <th scope="col">Höhe</th>
        <th scope="col">Breite</th>
        <th scope="col">Querschnitte</th>
        <th scope="col">Beschreibung</th>
        <th scope="col">Bild</th>
        <th scope="col">Datum</th>
        <th scope="col">Status</th>
        <th scope="col">bearbeiten</th>
        <th scope="col">löschen</th>
      </tr>
    </thead>
    <tbody>
      
       <?php 

       $alle_produkt_anzeigen_qry="SELECT * FROM produkts";

       $alle_produkt_anzeigen_qry_result=mysqli_query($con, $alle_produkt_anzeigen_qry);
       while ($rows=mysqli_fetch_assoc($alle_produkt_anzeigen_qry_result)) {
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

              echo "<tr>";

              echo "<td>{$produkt_id}</td>";

              $select_produkt_kategorie_qry="SELECT * FROM kat WHERE kat_id=$produkt_kategorie_id";
              $select_produkt_kategorie_qry_result=mysqli_query($con, $select_produkt_kategorie_qry);
              while ($rowss=mysqli_fetch_assoc($select_produkt_kategorie_qry_result)) {
                $pro_kat_id=$rowss['kat_id'];
                $pro_kat_name=$rowss['kat_name'];

               echo "<td>{$pro_kat_name}</td>";
              }

              echo "<td>{$produkt_name}</td>";
              echo "<td>{$produkt_höhe}</td>";
              echo "<td>{$produkt_breite}</td>";
              echo "<td>{$produkt_querschnitte}</td>";
              echo "<td>{$produkt_beschreibung}</td>";
              echo "<td><img width='100' src=img/{$produkt_bild}></td>";
              echo "<td>{$datum}</td>";
              if ($status==0 || $status=="") {
              echo "<td>draft</td>";
              }else{
                echo "<td>published</td>";
              }
              echo "<td><small><a href='produkt.php?source=produkt_bearbeiten&produkt_id={$produkt_id}'>bearbeiten</a></small></td>";
              echo "<td><small><a href='' data-toggle='modal' data-target='#exampleModalCenter'>löschen</a></small></td>";
              echo "<td><small><a href='produkt.php?source=produkt_anzeigen&produkt_id={$produkt_id}'>anzeigen</a></small></td>";

              echo "</tr>";

       }


        ?>


      <?php 

        if (isset($_GET['loschen'])) {
          $loschen_produkt_id=$_GET['loschen'];
          echo "<h1>{$loschen_produkt_id}</h1>";

              $loschen_produkt_qry="DELETE FROM produkts WHERE produkt_id={$loschen_produkt_id}";
              $loschen_produkt_qry_result=mysqli_query($con, $loschen_produkt_qry);

              if (!$loschen_produkt_qry_result) {
                die("Query failed ". mysqli_error($con));
              }

              header('Location:produkt.php');

          }



        


       ?>




      </tr>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Produkt löschen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Sind Sie sicher, dass Sie dieses Produkt löschen möchten?
      </div>
      <div class="modal-footer">
        <a type="" class="menu btn" data-dismiss="modal">Nein</a>
        <a type="" class="menu btn" href='produkt.php?loschen=<?php echo $produkt_id ?>'>Ja</a>
      </div>
    </div>
  </div>
</div>
