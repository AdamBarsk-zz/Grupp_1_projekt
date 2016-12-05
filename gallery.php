<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Galleri</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<script src="http://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato|Pacifico" rel="stylesheet">
</head>

<body>
	<!-- NAVBAR -->
	<?php
		include('nav.php');
	?>

	<!-- GALLERY -->
	<!-- Black overlay in the background when img is zoomed -->
	<div id="black"></div>

	<!--Picture container when img is zoomed -->

	<div id="white">
	</div>


		<!-- The pictures -->
		<div class="container " id="preview">
			<div class="row">
				<div class="col-md-12 picture-gallery">
				<?php
					if (isset($_SESSION['admin'])) {
						echo '<form action="#" method="post" enctype="multipart/form-data" class="form-inline col-sm-12">
								<div class="form-group">
		    						<label for="fileToUpload" style="display: inline-block">Välj get-porträttering att ladda upp:</label>
		    						<input type="file" class="file" name="fileToUpload" id="fileToUpload" style="display: inline-block;">
		    						<button name="delete" class="btn btn-success">Spara</button>
	    						</div>
							</form>';
					}
				?>

					<?php 
						include('img_download.php');
					?>
				</div>
			</div>
		</div>


		<!-- FOOTER -->
	<div id="footer">
<div class="container-fluid footer">
  <div class="row">
    <?php if ($_SESSION['admin']):
      echo "<p class='col-md-1 col-sm-1 footer-text'><a href='logout.php' class='footer-effect'>Logga ut</a></p>";
      ?>
    <?php else:
      echo "<p class='col-md-1 col-sm-1 footer-text'><a href='login.php' class='footer-effect'>Admin</a></p>";
      ?>
    <?php endif; ?>



    <p class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3 footer-text" id="footer-phone">Email:<a href="#" class="footer-effect" id="footer-mail">
      <?php
        include('config.php');
        $query = 'SELECT text FROM HELA WHERE id = "contact-mail"';
        $result = mysqli_query($db, $query);
        $row = $result->fetch_row();
        $text = (string)$row[0];
        echo $text;
      ?>
    </a>
    <?php
      include('config.php');
      $query = 'SELECT text FROM HELA WHERE id = "contact-phone"';
      $result = mysqli_query($db, $query);
      $row = $result->fetch_row();
      $text = (string)$row[0];
      echo "| Tel: ".$text;
    ?>
  </p>
    <div class="col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-2 social-icons">
      <!-- Social Media Logotypes -->
      <a href="">
        <img class="social-logo" src="images/icons/facebook.png" />
      </a>
      <a href="">
        <img class="social-logo" src="images/icons/instagram.png" />
      </a>
      <a href="">
        <img class="social-logo" src="images/icons/twitter.png" />
      </a>
      </div>
    </div>
  </div>
</div>

	<?php
	if (isset($_SESSION['admin'])) {
		echo '<script src="/scripts/script_change.js" type="text/javascript"></script>';
		include('img_upload.php');
	}
	?>
<script src="scripts/script_gallery.js"></script>


</body>

</html>
