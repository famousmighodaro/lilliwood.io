<?php include "head.php"; ?>
<form action="" method="post" enctype="multipart/form-data">
  Send these files:<br />
  <input name="userfile[]" type="file"  multiple="multiple" /><br />
  
  <input type="submit" value="Send files" name="submit"/>
</form>




<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <img class="d-block w-100" src="img/slide1.jpg" alt="First slide">
      </div>
      <div class="modal-footer">
       <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
      </div>
    </div>
  </div>
</div>








<div id="carouselExampleControls" class="carousel" data-ride="carousel" style="width: 400px; height: 400px;">
  <div class="carousel-inner">
    <div class="carousel-item active" data-toggle="modal" data-target="#exampleModalCenter">
      <img class="d-block w-100" src="img/slide1.jpg" alt="First slide">
    </div>
    <div class="carousel-item" data-toggle="modal" data-target="#exampleModalCenter">
      <img class="d-block w-100" src="img/slide2.jpg?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
    </div>
    <div class="carousel-item" data-toggle="modal" data-target="#exampleModalCenter">
      <img class="d-block w-100" src="img/slide4.jpg"?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<?php 


if (isset($_POST['submit'])) {

	$filename=$_FILES['userfile']['name'];
	$filenameTmp=$_FILES['userfile']['tmp_name'];
	$filetype=$_FILES['userfile']['type'];

	

	
	for ($i=0; $i<count($filename); $i++) { 
		$name=$_FILES['userfile']['name'][$i];
		$temp=$_FILES['userfile']['tmp_name'][$i];

		move_uploaded_file($temp, "img/$name");

		$qry="INSERT INTO images(name, image) VALUES('$name', '$temp')";


		$re=mysqli_query($con, $qry);

		if (!$re) {
			die("query Failed ".mysqli_error($con));
		}
	}
	
}





 ?>










<div class="wrapper">
<div class="image-gallery">
  <aside class="thumbnails">
    <a href="#" class="selected thumbnail" data-big="http://placekitten.com/420/600">
      <div class="thumbnail-image" style="background-image: url(http://placekitten.com/420/600)"></div>
    </a>
    <a href="#" class="thumbnail" data-big="http://placekitten.com/450/600">
      <div class="thumbnail-image" style="background-image: url(http://placekitten.com/450/600)"></div>
    </a>
    <a href="#" class="thumbnail" data-big="http://placekitten.com/460/700">
      <div class="thumbnail-image" style="background-image: url(http://placekitten.com/460/700)"></div>
    </a>
  </aside>

  <main class="primary" style="background-image: url('http://placekitten.com/420/600');"></main>
</div>

</div>

<div class="container">
	<div class="row">
<div class="row">
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                         alt="Another alt text">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="https://images.pexels.com/photos/158971/pexels-photo-158971.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.pexels.com/photos/158971/pexels-photo-158971.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                         alt="Another alt text">
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="https://images.pexels.com/photos/305070/pexels-photo-305070.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.pexels.com/photos/305070/pexels-photo-305070.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                         alt="Another alt text">
                </a>
            </div>
         </div>
</div>
</div>


<?php include ("footer.php") ?>

<?php include ("script_links.php") ?>

<script type="text/javascript">
	let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });
</script>