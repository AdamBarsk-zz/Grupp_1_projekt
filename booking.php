<?php

session_start();

include("config.php");


$query = "SELECT price FROM Room_type WHERE typeOfRoom = 'singleroom'";
$result = mysqli_query($db, $query);
$row = $result->fetch_row();
$singlePrice = (string)$row[0];

$query = "SELECT price FROM Room_type WHERE typeOfRoom = 'doubleroom'";
$result = mysqli_query($db, $query);
$row = $result->fetch_row();
$doublePrice = (string)$row[0];

$query = "SELECT price FROM Room_type WHERE typeOfRoom = 'familyroom'";
$result = mysqli_query($db, $query);
$row = $result->fetch_row();
$familyPrice = (string)$row[0];

$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$action = '';
$redirect = true;


if (isset($_POST['submit'])) {
	$_SESSION['booking'] = $_POST;



	$singlerooms = $_POST['singlerooms'];
	$doublerooms = $_POST['doublerooms'];
	$familyrooms = $_POST['familyrooms'];
	$checkin = $_POST['checkin'];
	$checkout = $_POST['checkout'];


	$query = "SELECT * FROM Reservation AS r JOIN Room_type AS rt WHERE r.roomType_id = rt.roomType_id AND rt.typeOfRoom = 'doubleroom' AND r.checkOut >= '".$checkin."' AND r.checkIn < '".$checkout."'";
	$bookedDoubleRooms = mysqli_query($db, $query);

	$query = "SELECT * FROM Reservation AS r JOIN Room_type AS rt WHERE r.roomType_id = rt.roomType_id AND rt.typeOfRoom = 'singleroom' AND r.checkOut >= '".$checkin."' AND r.checkIn < '".$checkout."'";
	$bookedSingleRooms = mysqli_query($db, $query);

	$query = "SELECT * FROM Reservation AS r JOIN Room_type AS rt WHERE r.roomType_id = rt.roomType_id AND rt.typeOfRoom = 'familyroom' AND r.checkOut >= '".$checkin."' AND r.checkIn < '".$checkout."'";
	$bookedFamilyRooms = mysqli_query($db, $query);

	function checkFamilyRooms() {
		GLOBAL $bookedFamilyRooms;
		GLOBAL $familyrooms;
		switch ($familyrooms) {
			case 1:
				if (mysqli_num_rows($bookedFamilyRooms) < 3) {
					header('Location: confirmation.php');
				} else {
					echo '<h1>INTE TILLRÄCKLIGT MÅNGA FAMILJERUM</h1>';
				}
				break;
			case 2:
				if (mysqli_num_rows($bookedFamilyRooms) < 2) {
					header('Location: confirmation.php');
				} else {
					echo '<h1>INTE TILLRÄCKLIGT MÅNGA FAMILJERUM</h1>';
				}
				break;
			case 3:
				if (mysqli_num_rows($bookedFamilyRooms) < 1) {
					header('Location: confirmation.php');
				} else {
					echo '<h1>INTE TILLRÄCKLIGT MÅNGA FAMILJERUM</h1>';
				}
				break;
			default:
					echo '<h1>fffffuuuuu</h1>';
		}
	}

	function checkSingleRooms() {

		GLOBAL $bookedSingleRooms;
		GLOBAL $singlerooms;
		switch ($singlerooms) {
			case 1:
				if (mysqli_num_rows($bookedSingleRooms) < 2) {
					checkFamilyRooms();
				} else {
					echo '<h1>INTE TILLRÄCKLIGT MÅNGA ENKELRUM</h1>';
				}
				break;
			case 2:
				if (mysqli_num_rows($bookedSingleRooms) < 1) {
					checkFamilyRooms();
				} else {
					echo '<h1>INTE TILLRÄCKLIGT MÅNGA ENKELRUM</h1>';
				}
				break;
			default:
					checkFamilyRooms();
		}
	}

	function checkDoubleRooms() {

		GLOBAL $bookedDoubleRooms;
		GLOBAL $doublerooms;
		switch ($doublerooms) {
			case 1:
				if (mysqli_num_rows($bookedDoubleRooms) < 3) {
					checkSingleRooms();
				} else {
					echo '<h1>INTE TILLRÄCKLIGT MÅNGA DUBBELRUM</h1>';
				}
				break;
			case 2:
				if (mysqli_num_rows($bookedDoubleRooms) < 2) {
					checkSingleRooms();
				} else {
					echo '<h1>INTE TILLRÄCKLIGT MÅNGA DUBBELRUM</h1>';
				}
				break;
			case 3:
				if (mysqli_num_rows($bookedDoubleRooms) < 1) {
					checkSingleRooms();
				} else {
					echo '<h1>INTE TILLRÄCKLIGT MÅNGA DUBBELRUM</h1>';
				}
				break;
			default:
					checkSingleRooms();
		}
	}
 checkDoubleRooms();

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Bokning</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<script src="http://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato|Pacifico" rel="stylesheet">
</head>

<body>
	<!-- NAVBAR -->
	<?php
		include('nav.php');
	?>

	<!-- Content -->
	<div class="container main-cont">
		<div class="row">
			<section class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 calender">

				<div class="row">
					<h2 style="text-align:center">Gästinformation</h2>
				</div>

				<form data-toggle="validator" role="form" action="<?php echo $action; ?>" method="post" autocomplete="off" class="form-inline booking" id="bookingForm">

					<!-- Formulär -->
					<div class="row">
						<div class="form-group">
							<label class="control-label">Incheckning:</label><br />
							<input class="form-control" id="checkin" name="checkin" type="text">
						</div>

						<div class="form-group">
							<label class="control-label">Utcheckning:</label><br />
							<input class="form-control" id="checkout" name="checkout" type="text">
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label class="control-label">Dubbelrum:</label><br />
							<input id="doublerooms" class="form-control rooms" type="number" name="doublerooms" value="1" min="0" max="3">
						</div>

						<div class="form-group">
							<label class="control-label">Enkelrum:</label><br />
							<input id="singlerooms" class="form-control rooms" type="number" name="singlerooms" value="0" min="0" max="2">
						</div>

						<div class="form-group">
							<label class="control-label">Familjerum:</label><br />
							<input id="familyrooms" class="form-control rooms" type="number" name="familyrooms" value="0" min="0" max="3">
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label class="control-label" for="">Förnamn:</label><br />
							<input class="form-control" id="firstname" name="firstname" type="text" placeholder="Ange förnamn">
						</div>

						<div class="form-group">
							<label class="control-label" for="">Efternamn:</label><br />
							<input class="form-control" id="lastname" name="lastname" type="text" placeholder="Ange efternamn">
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label class="control-label" for="email">Emailadress:</label><br />
							<input class="form-control" id="email" name="email" placeholder="Ange email">
						</div>

						<div class="form-group">
							<label class="control-label" for="phonenumber">Telefonnummer:</label><br />
							<input class="form-control" id="phonenumber" type="tel" placeholder="Ange telefonnummer" name="phonenumber">
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<label for="requests">Önskemål:</label><br>
							<textarea class="form-control" id="requests" name="requests" rows="3" cols="30" placeholder="T.ex barnsäng, extra kudde, etc"></textarea>
						</div>
					</div>

					<div id="errors"></div>

					<div style="margin-top: 1vh">
						<p id="price" style='font-size: 2rem; font-weight: bold;'><p>
					</div>

					<div class="row">
						<div class="form-group">
							<input class="btn btn-lg btn-block btn-default" onclick="bookRooms()" name="submit" type="submit" value="Reservera rum">
						</div>
					</div>
				</form>
			</section>
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
	<script src="scripts/script_booking.js"></script>
	<?php
	echo "<script>

		$(document).ready(calcPrice);
		$('.rooms').change(calcPrice);
		$('#checkin').change(calcPrice);
		$('#checkout').change(calcPrice);

		function calcNights() {
			var day = 1000 * 60 * 60 * 24;

			var checkin = Date.parse($('#checkin').val());
			var checkout = Date.parse($('#checkout').val());

			return Math.round((checkout - checkin) / day);
		}

	 	function calcPrice() {
			numNights = calcNights();

	    var singleTot = $singlePrice * $('#singlerooms').val() * numNights;
	    var doubleTot = $doublePrice * $('#doublerooms').val() * numNights;
	    var familyTot = $familyPrice * $('#familyrooms').val() * numNights;

	    var totalPrice = singleTot + doubleTot + familyTot;

			$('#price').html('Ditt pris: ' + totalPrice + ' kr');
	};

	</script>
	";
?>
</body>
</html>
