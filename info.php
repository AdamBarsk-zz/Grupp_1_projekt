<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<script src="http://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato|Pacifico" rel="stylesheet">
</head>

<body>

	<!-- NAVBAR -->
	<?php
		include('nav.php');
	?>

	<!-- CONTENT -->
	<div class="container">
		<div class="" id="sizeCheck">

			<article class="col-md-6 welcome">
				<h1>Information</h1>
				<p id="generellt" class="admin">Den glada geten ligger beläget i det natursköna området Tjärnholmen i Norrbotten. Utöver smakfullt inredda rum finns även aktiveter att boka in under din vistelse. Gården är en gammal släktgård, som 2005 gjordes om till b&b och har sedan dess lockat
					besökare från hela Sverige och även världen. På den glada geten har vi två ”husgetter”, Gösta och Selma, som håller till i en liten hage alldeles bredvid gårdshuset. Kring gården finns även trevliga vandringsslingor och vågar min sig på ett dopp
					i älven kan man boka bastu på den glada geten efter det svalkande doppet.</p>
			</article>
			<article class="col-md-5 col-md-offset-1 welcome">
				<h1>Priser</h1>

				<p id="priser" class="admin">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</article>
		</div>
		<div class="row">
			<article class="col-sm-12 welcome">
				<h1>Events</h1>
				<div class="col-sm-4">
					<h3 id="activity1-headline" class="admin">Getmatning</h3>
					<p id="activity1-text" class="admin">Bokningsbar aktivitet som innefattar mat till Gösta och Selma och kort information om getskötsel.</p>
					<p id="activity1-time" class="admin">Tidsåtgång: ca 30 min</p>
				</div>
				<div class="col-sm-4">
					<h3 id="activity2-headline" class="admin">Getklappning</h3>
					<p id="activity2-text" class="admin">Gå in i hagen och klappa getterna! Personal från glada geten följer med och ser till att du kommer nära både Gösta och Selma, och vid rätt tid på året även lammen.</p>
					<p id="activity2-time" class="admin">Tidsåtgång: ca 30 min</p>
				</div>
				<div class="col-sm-4">
					<h3 id="activity3-headline" class="admin">Skogspromenad</h3>
					<p id="activity3-text" class="admin">Guidad vandring runt området för den som är nyfiken på lite mer lokalkännedom.</p>
					<p id="activity3-time" class="admin">Tidsåtgång: ca 2 timmar.</p>
				</div>

			</article>
		</div>
	</div>

	<!-- FOOTER -->
<?php
	include("footer.php");
?>
<?php
if (isset($_SESSION['admin'])) {
	echo '<script src="/scripts/script_change.js" type="text/javascript"></script>';
}
?>
	<script src="scripts/script_info.js"></script>
</body>

</html>
