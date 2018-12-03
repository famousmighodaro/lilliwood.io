					
					<ul>
						<?php 

							$qry= "SELECT * FROM kat"; 
							$result = mysqli_query($con, $qry);
							while ($rows=mysqli_fetch_assoc($result)) {
								$kat_id=$rows['kat_id'];
								$kat_name = $rows['kat_name'];
								echo "<li><a href='produkte.php?kategorie_id=$kat_id'>{$kat_name}</a></li>";
							}
						 ?>

						
						
						

					</ul>