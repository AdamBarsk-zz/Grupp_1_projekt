<?php session_start(); ?>
<?php
$inCheck = $_POST['checkin'];
$outCheck = $_POST['checkout'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$to = $_POST['email'];
$subject = "Från Den Glada Geten";

$headers = "From: get@goat.com\r\n";
$headers .= "Reply-To: get@goat.com\r\n";
$headers .= "Return-Path: get@goat.com\r\n";
$headers .= "Content-type: text/html; charset=UTF-8";

$message = <<<EMAIL
"Hej $firstname . " " . $lastname!

Du har nu bokat in dig hos oss.
Datum: $inCheck till $outCheck

Tack för din bokning!"
EMAIL;


if($_POST) {
	mail($to, $subject, $message, $headers);
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Bekräftelse</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<script src="http://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato|Pacifico" rel="stylesheet">
</head>

<body>
	<!-- NAVBAR -->
	<nav class="navbar navbar">
		<div class="container-fluid header">
			<div class="row">
				<div class="col-xs-12">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul id="ul" class="nav navbar-nav">
							<li><a id="a" href="index.php">Hem</a></li>
							<li><a id="a2" href="booking.php">Boka</a></li>
							<li><a href="info.php">Information</a></li>
							<li><a id="a3" href="gallery.php">Galleri</a></li>
							<li><a id="a4" href="info.php">Kontakt</a></li>
						</ul>
					</div>
				</div>
			</div>
	</nav>

	<!-- Content -->
	<div class="container-fluid main-cont">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 welcome">
				<h2 for="" style="text-align:center">Bekräftelse</h2>
				<form>
					<div class="form-group">
						<label>Incheckningsdatum:</label>
						<p></p>
					</div>
					<div class="form-group">
						<label>Utcheckningsdatum:</label>
						<p></p>
					</div>
					<div class="form-group">
						<label>Dubbelrum:</label>
						<p></p>
					</div>
					<div class="form-group">
						<label>Enkelrum:</label>
						<p></p>
					</div>
					<div class="form-group">
						<label>Familjerum:</label>
						<p></p>
					</div>
					<div class="form-group">
						<label>Namn:</label>
						<p></p>
					</div>
					<div class="form-group">
						<label>Emailadress:</label>
						<p></p>
					</div>
					<div class="form-group">
						<label>Telefonnummer:</label>
						<p></p>
					</div>
					<div class="form-group">
						<label>Önskemål:</label>
						<p></p>
					</div>
					<a href="index.php" type="submit" class="btn btn-lg btn-block btn-success">Reservera rum</a>
					<a href="index.php" type="submit" class="btn btn-lg btn-block btn-danger">Avbryt bokning</a>
				</div>
			</form>
		</div>
	</div>
	</div>

	<!-- FOOTER -->
<?php
	include("footer.php");
?>
<?php
	if (isset($_SESSION['admin'])) {
		echo '<script>$(".admin").attr("contenteditable", "true");
		  console.log("test");</script>';
	}
?>
	<script src="scripts/script_confirmation.js"></script>
</body>

</html>
