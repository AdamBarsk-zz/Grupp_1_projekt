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

echo "
<!DOCTYPE html>
<html>
<head>
	<title>Bekräftelse</title>
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' charset='utf-8' />
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' type='text/css' href='styles.css' />
	<script src='http://code.jquery.com/jquery-3.1.1.min.js' integrity='sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=' crossorigin='anonymous'></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>
	<link href='https://fonts.googleapis.com/css?family=Lato|Pacifico' rel='stylesheet'>
</head>
<body>
";

if(isset($_POST['book'])) {

	// Create mail
	include("mail.php");
	mail($to, $subject, $message, $headers);

	// Connect to database
	include("config.php");

	// Save guest once
	$query = "
	INSERT INTO Guest (
	firstName,
	lastName,
	email,
	phoneNumber
	)
	VALUES (
	'$firstname',
	'$lastname',
	'$email',
	'$phonenumber'
	)";

	mysqli_query($db, $query);

	$guestid = mysqli_insert_id($db);

	if ($singlerooms > 0) {

		// Create a reservaton for each room
		for ($i=0; $i < $singlerooms; $i++) {

			// Get vacant room
			$query = "
			SELECT roomType_id
			FROM Room_type
			WHERE typeOfRoom = 'singleroom'
			AND currentlyFree = 1
			LIMIT 1
			";

			// Get room id
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_row($result);
			$roomType_id = $row[0];

			// Insert reservation with room id and guest id
			$query = "
			INSERT INTO Reservation (
			dateCreated,
			checkIn,
			checkOut,
			guest_id,
			requests,
			roomType_id
			)
			VALUES (
			'$currenttime',
			'$checkin',
			'$checkout',
			 $guestid,
			'$requests',
			 $roomType_id
			)";

			mysqli_query($db, $query);

			// Make room occupied
			$query = "
			UPDATE Room_type
			SET currentlyFree = 0
			WHERE roomType_id = $roomType_id;
			";

			mysqli_query($db, $query);
		}
	}
	if ($doublerooms > 0) {

		// Create a reservaton for each room
		for ($i=0; $i < $doublerooms; $i++) {

			// Get vacant room
			$query = "
			SELECT roomType_id
			FROM Room_type
			WHERE typeOfRoom = 'doubleroom'
			AND currentlyFree = 1
			LIMIT 1
			";

			// Get room id
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_row($result);
			$roomType_id = $row[0];

			// Insert reservation with room id and guest id
			$query = "
			INSERT INTO Reservation (
			dateCreated,
			checkIn,
			checkOut,
			guest_id,
			requests,
			roomType_id
			)
			VALUES (
			'$currenttime',
			'$checkin',
			'$checkout',
			 $guestid,
			'$requests',
			 $roomType_id
			)";

			mysqli_query($db, $query);

			// Make room occupied
			$query = "
			UPDATE Room_type
			SET currentlyFree = 0
			WHERE roomType_id = $roomType_id;
			";

			mysqli_query($db, $query);
		}
	}
	if ($familyrooms > 0) {

		// Create a reservaton for each room
		for ($i=0; $i < $familyrooms; $i++) {

			// Get vacant room
			$query = "
			SELECT roomType_id
			FROM Room_type
			WHERE typeOfRoom = 'familyroom'
			AND currentlyFree = 1
			LIMIT 1
			";

			// Get room id
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_row($result);
			$roomType_id = $row[0];

			// Insert reservation with room id and guest id
			$query = "
			INSERT INTO Reservation (
			dateCreated,
			checkIn,
			checkOut,
			guest_id,
			requests,
			roomType_id
			)
			VALUES (
			'$currenttime',
			'$checkin',
			'$checkout',
			 $guestid,
			'$requests',
			 $roomType_id
			)";

			mysqli_query($db, $query);

			// Make room occupied
			$query = "
			UPDATE Room_type
			SET currentlyFree = 0
			WHERE roomType_id = $roomType_id;
			";

			mysqli_query($db, $query);
		}
	}
}

// Navbar
include('nav.php');

echo "
<!-- Content -->
	<div id='bookingdiv' class='container-fluid main-cont'>
		<div class='row'>
			<div class='col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 welcome'>
				<h2 for=' style='text-align:center'>Bekräftelse</h2>
				<form method='post' onsubmit='submit()'>
					<div class='form-group'>
						<label>Incheckningsdatum:</label>
						<p>$checkin</p>
						<input type='hidden' name='checkin' value=' $checkin'>
					</div>
					<div class='form-group'>
						<label>Utcheckningsdatum:</label>
						<p>$checkout</p>
						<input type='hidden' name='checkout' value=' $checkout'>
					</div>
					<div class='form-group'>
						<label>Dubbelrum:</label>
						<p>$doublerooms</p>
						<input type='hidden' name='doublerooms' value=' $doublerooms'>
					</div>
					<div class='form-group'>
						<label>Enkelrum:</label>
						<p>$singlerooms</p>
						<input type='hidden' name='singlerooms' value=' $singlerooms'>
					</div>
					<div class='form-group'>
						<label>Familjerum:</label>
						<p>$familyrooms</p>
						<input type='hidden' name='familyrooms' value=' $familyrooms'>
					</div>
					<div class='form-group'>
						<label>Namn:</label>
						<p>$firstname" . " " . "$lastname</p>
						<input type='hidden' name='firstname' value='$firstname'>
						<input type='hidden' name='lastname' value=' $lastname'>
					</div>
					<div class='form-group'>
						<label>Emailadress:</label>
						<p>$email</p>
						<input type='hidden' name='email' value=' $email'>
					</div>
					<div class='form-group'>
						<label>Telefonnummer:</label>
						<p>$phonenumber</p>
						<input type='hidden' name='phonenumber' value=' $phonenumber'>
					</div>
					<div class='form-group'>
						<label>Önskemål:</label>
						<p>$requests</p>
						<input type='hidden' name='requests' value='$requests'>
					</div>
					<input type='submit' class='btn btn-lg btn-block btn-success' name='book' value='Reservera rum'>
					<a onclick='abort()' type='submit' class='btn btn-lg btn-block btn-danger'>Avbryt bokning</a>
				</div>
			</form>
		</div>
	</div>
</div>";
if (isset($_POST['book'])) {
	echo "
		<div style='display: none;' id='bookeddiv' class='container-fluid main-cont'>
			<div class='row'>
				<div class='col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 welcome'>
					<h1>Tack för din bokning!</h1>
					<p>Du kommer nu att omdirigeras till startsidan</p>
				</div>
			</div>
		</div>
	";
} else {
	echo "
		<div style='display: none;' id='abortdiv' class='container-fluid main-cont'>
		<div class='row'>
			<div class='col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 welcome'>
				<h1>Bokning avbruten</h1>
				<p>Du kommer nu att omdirigeras till startsidan</p>
			</div>
		</div>
	</div>
	";
}

include("footer.php");

if (isset($_SESSION['admin'])) {
	echo "
	<script>
		$('.admin').attr('contenteditable', 'true');
		console.log('test');
	</script>
	";
}

echo "
<script src='scripts/script_confirmation.js'></script>
</body>
</html>
";

?>
