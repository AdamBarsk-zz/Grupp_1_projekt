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

  <!-- ADMIN LOGIN -->
	<?php
		include("config.php");

		if (isset ($_POST['username'], $_POST['password'])){

			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = "SELECT username, password FROM Users WHERE username = '".$username."' AND password = '".$password."'";

			$result = mysqli_query($db, $query);

			if(mysqli_num_rows($result) > 0){
				$_SESSION['admin'] = TRUE;
				header('Location: http://www.dengladageten.se');
				exit();
			} else {
				echo '<h1 style="margin-top: 100px !important">Fel användarnamn eller lösenord</h1>';
			}
		}
	?>
	
<div class="container">
  <div class="row">
    <div class="col-sm-12 welcome">
      <h1>Logga in</h1>

      <form action="" method="post" class="form-inline col-sm-12" style="text-align: center">
      <div class="form-group">
        <label for="username" class="book-start">Användarnamn:</label><br/>
        <input type="text" name="username" class="form-control" />
      </div>
      <div class="form-group">
      	<label for="password" class="book-start">Lösenord:</label><br/>
      	<input type="password" name="password" class="form-control" />
      </div>
        <input type="submit" value="Logga in" class="btn btn-default" style="margin-top: 25px"/>
      </form>
    </div>
  </div>
</div>


	<!-- FOOTER -->
<?php
	include("footer.php");
?>
</body>
</html>
