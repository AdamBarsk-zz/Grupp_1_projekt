<?php session_start(); ?>
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

	<nav class="navbar navbar">
		<div class="container-fluid header">
			<div class="row">
				<!--ONÖDIG? -> div class="col-xs-12">-->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul id="ul-topnav" class="nav navbar-nav">
							<li><a href="index.php">Hem</a></li>
							<li><a href="booking.php">Boka</a></li>
							<li><a href="info.php">Information</a></li>
							<li><a href="gallery.php">Galleri</a></li>
							<li><a href="contact.php">Kontakt</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

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
				<p id="welcome" class="admin">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</article>



			<section class="col-sm-12 calender">
				<div class="row">
					<h3>Boka nu</h3>
				</div>
				<form action="booking.php" class="form-inline" id="booking" autocomplete="off">
					<div class="form-group" id="check-in">
						<label for="check-in-date" class="book-start">Incheckning</label><br />
						<input type="text" class="form-control center-date" id="check-in-date" />
					</div>
					<div class="form-group" id="check-out">
						<label for="check-out-date" class="book-start">Utcheckning</label><br />
						<input type="text" class="form-control center-date" id="check-out-date" />
					</div>
					<div class="form-group">
						<div class="form-group" id="num-double">
							<label for="double-beds" class="book-start">Dubbelrum</label><br />

							<select class="booking-beds form-control" id="double-beds">

								<option>0</option>
								<option selected>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
						<div class="form-group" id="num-single">
							<label for="single-beds" class="book-start">Enkelrum</label><br />

							<select class="booking-beds form-control" id="single-beds">

								<option selected>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div>
					<br />
					<button onclick="bookRooms()" type="submit" id="search" class="btn btn-lg btn-default" style="text-align: center">Sök rum</button>
				</form>
			</section>
		</div>

			<div class="col-sm-4 col-sm-offset-1 welcome">
				<h3>Detta erbjuder vi dig</h3><p id="offer" class="admin">Ad magna proident mollit pariatur aliquip aliquip Lorem duis ut fugiat magna. Voluptate ullamco est est laborum consequat officia excepteur do ullamco consequat sint. Laboris ipsum consectetur mollit nisi dolore consectetur occaecat ad eiusmod eu veniam sunt nisi. Do irure sit elit Lorem enim do labore dolore ullamco dolore esse incididunt laborum ut aliqua. Quis consequat elit adipisicing aliquip ex magna exercitation dolor nostrud duis duis. Ex fugiat tempor ad minim ipsum eiusmod velit do amet. Cillum sint consectetur nisi reprehenderit amet non qui. Ad magna proident mollit pariatur aliquip aliquip Lorem duis ut fugiat magna. Voluptate ullamco est est laborum consequat officia excepteur do ullamco consequat sint. Laboris ipsum consectetur mollit nisi dolore consectetur occaecat ad eiusmod eu veniam sunt nisi. Do irure sit elit Lorem enim do labore dolore ullamco dolore esse incididunt laborum ut aliqua. Quis consequat elit adipisicing aliquip ex magna exercitation dolor nostrud duis duis. Ex fugiat tempor ad minim ipsum eiusmod velit do amet. Cillum sint consectetur nisi reprehenderit amet non qui.</p>
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
		echo '<script>$(".admin").attr("contenteditable", "true");
		  console.log("test");</script>';
	}
?>
</body>
</html>
