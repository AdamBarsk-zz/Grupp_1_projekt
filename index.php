<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Den Glada Geten Bed &amp; Breakfast</title>
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
		<div class="row">
			<div class="col-sm-7">
				<article class="col-sm-12 welcome">
					<?php
						if (isset($_SESSION['admin'])) {
							echo "<h1 class='bigr'>Hej Kristin</h1>";
						} else {
					  		echo "<h1 class='bigr'>Den Glada Geten</h1>";
						}
					?>
					<h3>⸻ B&amp;B ⸻</h3>
					<p id="offer" class="admin">
					<?php
						include('config.php');
						$query = 'SELECT text FROM HELA WHERE id = "offer"';
						$result = mysqli_query($db, $query);
						$row = $result->fetch_row();
						$text = (string)$row[0];
						echo $text;
					?>
					</p>
				</article>

				<section class="col-sm-12 calender">
					<div class="row">
						<h3>Boka nu</h3>
					</div>
					<div class="row">
						<form action="booking.php" class="form-inline col-sm-12 textAlignCenter" id="booking" autocomplete="off" method="post">						
							<div class="form-group" id="check-in">
								<label for="check-in-date" class="book-start text-center">Incheckning</label><br />
								<input type="text" class="form-control text-center" id="check-in-date" name="checkin" />
							</div>
							<div class="form-group" id="check-out">
								<label for="check-out-date" class="book-start text-center">Utcheckning</label><br />
								<input type="text" class="form-control text-center" id="check-out-date" name="checkout" />
							</div>
							<div class="form-group">
								<div class="form-group" id="num-double">
									<label for="double-beds" class="book-start">Dubbelrum</label><br />
									<select class="booking-beds form-control" id="double-beds">
										<option>0</option>
										<option selected>1</option>
										<option>2</option>
										<option>3</option>
									</select>
								</div>
								<div class="form-group" id="num-single">
									<label for="single-beds" class="book-start">Enkelrum</label><br />
									<select class="booking-beds form-control" id="single-beds">
										<option selected>0</option>
										<option>1</option>
										<option>2</option>
									</select>
								</div>
								<div class="form-group" id="num-family">
									<label for="family-beds" class="book-start">Familjerum</label><br />
									<select class="booking-beds form-control" id="family-beds">
										<option selected>0</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
									</select>
								</div>
							</div>
							<br />
							<button type="submit" id="search" class="btn btn-lg btn-default">Sök rum</button>
						</form>
					</div>
				</section>
			</div>

			<div class="col-sm-4 col-sm-offset-1 welcome">
				<h3>Kalendarium</h3>
				<h4 id="event1-headline" class="admin">
				<?php
					include('config.php');
					$query = 'SELECT text FROM HELA WHERE id = "event1-headline"';
					$result = mysqli_query($db, $query);
					$row = $result->fetch_row();
					$text = (string)$row[0];
					echo $text;
				?>
				</h4>
				<p id="event1-text" class="admin">
				<?php
					include('config.php');
					$query = 'SELECT text FROM HELA WHERE id = "event1-text"';
					$result = mysqli_query($db, $query);
					$row = $result->fetch_row();
					$text = (string)$row[0];
					echo $text;
				?>
				</p>
				<h4 id="event2-headline" class="admin">
				<?php
					include('config.php');
					$query = 'SELECT text FROM HELA WHERE id = "event2-headline"';
					$result = mysqli_query($db, $query);
					$row = $result->fetch_row();
					$text = (string)$row[0];
					echo $text;
				?>
				</h4>
				<p id="event2-text" class="admin">
				<?php
					include('config.php');
					$query = 'SELECT text FROM HELA WHERE id = "event2-text"';
					$result = mysqli_query($db, $query);
					$row = $result->fetch_row();
					$text = (string)$row[0];
					echo $text;
				?>
				</p>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<?php
		include("footer.php");
	?>

	<script src="scripts/script_index.js"></script>
	<?php
		if (isset($_SESSION['admin'])) {
			echo '<script src="/scripts/script_change.js" type="text/javascript"></script>';
		}
	?>
</body>
</html>
