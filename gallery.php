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
		include('img_upload.php');
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
						include('img_download.php');
					?>
				</div>
			</div>
		</div>


		<!-- FOOTER -->
	<?php
		include('footer.php');
	?>

	<?php
	if (isset($_SESSION['admin'])) {
		echo '<script src="/scripts/script_change.js" type="text/javascript"></script>';
	}
	?>

<script src="scripts/script_gallery.js"></script>

</body>
</html>
