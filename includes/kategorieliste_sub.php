<ul class="products">

<?php 

   

        $kat_produkt_seite="SELECT * FROM produkts WHERE status=1";
        $res=mysqli_query($con, $kat_produkt_seite);

        if (!$res) {
           die("failed ".mysqli_error($con) );
        }
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