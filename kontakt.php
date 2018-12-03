<?php include("head.php"); 
?>
<?php include("header.php"); 
?>
    
    <?php include ("nav.php")
     ?>

<div class=" container-fluid main-container">
    <div class="container content">
        <div class="container body">

            <div class="page-header">
                <h1>Kontaktformular
</h1>
            </div>
           
            <div class="row">
            <div class="col-lg-8">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" required name="name">
                      </div>
                    </div>

                     <div class="col-md-6">
                      
                    </div>
                   
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" required name="email">
                      </div>
                    </div>

                    <div class="col-md-6">
                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="subject">Betreff</label>
                        <input id="subject" type="text" class="form-control" required name="betreff">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="message">Nachricht</label>
                        <textarea id="message" class="form-control" required name="nachricht"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <input type="submit" class="submit-btn" value="senden" name="senden">
                    </div>
                  </div>
                </form>
              </section>
            </div>
            <div class="col-lg-4">
              <section class="bar mb-0">
                <h3 class="text-uppercase">Adresse</h3>
                <p class="text-sm">Hoserkirchweg 82<br>41747 Viersen</strong></p>
                <h3 class="text-uppercase">Telefon:</h3>     
                <p><strong>01638505419</strong></p>
                <h3 class="text-uppercase">Email</h3>
                
                <ul class="text-sm">
                  <li><strong><a href="mailto:">info@lilliwood.net</a></strong></li>
                </ul>
              </section>
            </div>
          </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
<?php include ("footer.php") 
?>
<?php include ("script_links.php") 
?>


<?php 


if (isset($_POST['senden'])) {
   $name=$_POST['name'];
   $email=$_POST['email'];
   $betreff=$_POST['betreff'];
   $nachricht=$_POST['nachricht']; 


   $emailTo="finfo@lilliwood.net";
   $emailBody="Kunde Name: $name. \n".
                "kunde Email: {$email} \n\n".
                "Betreff: $betreff \n".$nachricht;

    $headers="From: ".$email;


   mail($emailTo, $betreff, $emailBody, $headers);
   header("Location: index.php");

}

 ?>


















