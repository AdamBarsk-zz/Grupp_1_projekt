<?php 

session_start();

$currenttime = date("Y-m-d h:i:s");
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$doublerooms = $_POST['doublerooms'];
$singlerooms = $_POST['singlerooms'];
$familyrooms = $_POST['familyrooms'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$requests = $_POST['requests'];

include("mail.php");

if(isset($_POST['book'])) {
	mail($to, $subject, $message, $headers);
	include("config.php");
	$query = "INSERT INTO bookings (
	book_date,
	check_in_date,
	check_out_date,
	single_rooms_amount,
	double_rooms_amount,
	family_rooms_amount,
	first_name,
	last_name,
	email,
	phone_number,
	requests )
	VALUES (
	'$currenttime',
	'$checkin',
	'$checkout',
	'$singlerooms',
	'$doublerooms',
	'$familyrooms',
	'$firstname',
	'$lastname',
	'$email',
	'$phonenumber',
	'$requests' )";
	mysqli_query($db, $query);
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
	<?php
	include('nav.php');
	?>

	<!-- Content -->
	<div id="bookingdiv" class="container-fluid main-cont">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 welcome">
				<h2 for="" style="text-align:center">Bekräftelse</h2>
				<form>
					<div class="form-group">
						<label>Incheckningsdatum:</label>
						<p><?php echo "$checkin"; ?></p>
					</div>
					<div class="form-group">
						<label>Utcheckningsdatum:</label>
						<p><?php echo "$checkout"; ?></p>
					</div>
					<div class="form-group">
						<label>Dubbelrum:</label>
						<p><?php echo "$doublerooms"; ?></p>
					</div>
					<div class="form-group">
						<label>Enkelrum:</label>
						<p><?php echo "$singlerooms"; ?></p>
					</div>
					<div class="form-group">
						<label>Familjerum:</label>
						<p><?php echo "$familyrooms"; ?></p>
					</div>
					<div class="form-group">
						<label>Namn:</label>
						<p><?php echo "$firstname.$lastname"; ?></p>
					</div>
					<div class="form-group">
						<label>Emailadress:</label>
						<p><?php echo "$email"; ?></p>
					</div>
					<div class="form-group">
						<label>Telefonnummer:</label>
						<p><?php echo "$phonenumber"; ?></p>
					</div>
					<div class="form-group">
						<label>Önskemål:</label>
						<p><?php echo "$requests"; ?></p>
					</div>
					<a type="submit" class="btn btn-lg btn-block btn-success" name="book" onclick="submit()">Reservera rum</a>
					<a onclick="abort()" type="submit" class="btn btn-lg btn-block btn-danger">Avbryt bokning</a>
				</div>
			</form>
		</div>
	</div>
</div>

<div style="display: none;" id="bookeddiv" class="container-fluid main-cont">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 welcome">
			<h1>Tack för din bokning!</h1>
			<p>Du kommer nu att omdirigeras till startsidan</p>
		</div>
	</div>
</div>
<div style="display: none;" id="abortdiv" class="container-fluid main-cont">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 welcome">
			<h1>Bokning avbruten</h1>
			<p>Du kommer nu att omdirigeras till startsidan</p>
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
