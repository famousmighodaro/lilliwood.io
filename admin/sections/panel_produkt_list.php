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
              $produkt_kategorie_id = $rows['produkt_Kategorie_id'];
             
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
              echo "<td><small><a href='index.php?source=bearbeiten&produkt_id={$produkt_id}'>bearbeiten</a></small></td>";
              echo "<td><small><a href='index.php?loschen={$produkt_id}'>löschen</a></small></td>";
              echo "<td><small><a href='anzeigen.php?produkt_id={$produkt_id}'>anzeigen</a></small></td>";

              echo "</tr>";

       }


        ?>







      </tr>
    </tbody>
  </table>
</div>
