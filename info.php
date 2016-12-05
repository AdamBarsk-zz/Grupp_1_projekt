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
				<p id="general-info" class="admin">
					<?php
						include('config.php');
						$query = 'SELECT text FROM HELA WHERE id = "general-info"';
						$result = mysqli_query($db, $query);
						$row = $result->fetch_row();
						$text = (string)$row[0];
						echo $text;
					?>
				</p>
			</article>
			<article class="col-md-5 col-md-offset-1 welcome">
				<h1>Priser</h1>

				<p id="prices" class="admin">
					<?php
						include('config.php');
						$query = 'SELECT price FROM singleroom';
						$result = mysqli_query($db, $query);
						$row = $result->fetch_row();
						$text = (string)$row[0];
						echo "Enkelrum: ".$text." kr per natt<br>";

						$query = 'SELECT price FROM doubleroom';
						$result = mysqli_query($db, $query);
						$row = $result->fetch_row();
						$text = (string)$row[0];
						echo "Dubbelrum: ".$text." kr per natt<br>";

						$query = 'SELECT price FROM familyroom';
						$result = mysqli_query($db, $query);
						$row = $result->fetch_row();
						$text = (string)$row[0];
						echo "Familjerum: ".$text." kr per natt";
					?>
				</p>
			</article>
		</div>
		<div class="row">
			<article class="col-sm-12 welcome">
				<h1>Aktiviteter</h1>
				<div class="col-sm-4">
					<h3 id="activity1-headline" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity1-headline"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</h3>
					<p id="activity1-text" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity1-text"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</p>
					<p id="activity1-time" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity1-time"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</p>
				</div>
				<div class="col-sm-4">
					<h3 id="activity2-headline" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity2-headline"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</h3>
					<p id="activity2-text" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity2-text"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</p>
					<p id="activity2-time" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity2-time"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</p>
				</div>
				<div class="col-sm-4">
					<h3 id="activity3-headline" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity3-headline"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</h3>
					<p id="activity3-text" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity3-text"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</p>
					<p id="activity3-time" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity3-time"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</p>
				</div>
				<div class="col-sm-4  margin-headline">
					<h3 id="activity4-headline" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity4-headline"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</h3>
					<p id="activity4-text" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity4-text"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</p>
					<p id="activity4-time" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity4-time"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</p>
				</div>
				<div class="col-sm-4 margin-headline">
					<h3 id="activity5-headline" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity5-headline"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</h3>
					<p id="activity5-text" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity5-text"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</p>
					<p id="activity5-time" class="admin">
						<?php
							include('config.php');
							$query = 'SELECT text FROM HELA WHERE id = "activity5-time"';
							$result = mysqli_query($db, $query);
							$row = $result->fetch_row();
							$text = (string)$row[0];
							echo $text;
						?>
					</p>
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
