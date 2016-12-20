<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bokningar</title>
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
			<section class="col-sm-12 calender">

				<div class="row">
					<h2 style="text-align:center">Bokningar</h2>
				</div>

				<div class="row">
					<form action="" style="text-align: center" class="form-inline col-sm-12" id="reservation_search" autocomplete="off" method="post">
						<div class="form-group" id="reservation">
							<label for="reservation-date">Välj ett datum:</label>
							<input type="text" class="form-control center-date" id="reservation-date" name="reservation-date" />
						</div>
            <button id="search-reservation" class="btn btn-default" style="text-align: center;">Sök bokningar</button>
          </form>
				</div>

        <div class="row" style="overflow-x: scroll;">
            <div class="col-sm-12">

              <!-- INCHECKNINGAR -->
              <h3 style="margin-top: 25px;">Incheckningar</h3>

              <table>
                <tr>
                  <th>Checkout</th>
                  <th>ID</th>
                  <th>Bokningsdatum</th>
                  <th>Namn</th>
                  <th>Email</th>
                  <th>Telefon</th>
                  <th>Incheckning</th>
                  <th>Utcheckning</th>
                  <th>Rum</th>
                  <th>Önskemål</th>
                </tr>
								<?php
                  include('config.php');
                  $date = $_POST['reservation-date'];
									$query = "SELECT * FROM Guest AS g JOIN Reservation AS r JOIN Room_type AS rt WHERE g.guest_id = r.guest_id AND r.roomType_id = rt.roomType_id AND r.checkIn = '".$date."'";
									$result = mysqli_query($db, $query);

                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "
    										<tr>
                          <td>Checkout</td>
    											<td>{$row['guest_id']}</td>
    											<td>{$row['dateCreated']}</td>
                          <td>{$row['firstName']} {$row['lastName']}</td>
                          <td>{$row['email']}</td>
                          <td>{$row['phoneNumber']}</td>
    											<td>{$row['checkIn']}</td>
    											<td>{$row['checkOut']}</td>
                          <td>{$row['roomType_id']} ({$row['typeOfRoom']})</td>
                          <td>{$row['requests']}</td>
    										</tr>";
                    }
									} else {
                    echo "<tr><td colspan='10'>Inga resultat hittades</td></tr>";
                  }
								?>
              </table>


              <!-- UTCHECKNINGAR -->
              <h3>Utcheckningar</h3>
              <table>
                <tr>
                  <th>Checkout</th>
                  <th>ID</th>
                  <th>Bokningsdatum</th>
                  <th>Namn</th>
                  <th>Email</th>
                  <th>Telefon</th>
                  <th>Incheckning</th>
                  <th>Utcheckning</th>
                  <th>Rum</th>
                  <th>Önskemål</th>
                </tr>

								<?php
									$query = "SELECT *,
                            GROUP_CONCAT( rt.roomType_id ) AS rumid,
                            GROUP_CONCAT( rt.typeOfRoom ) AS tor
                            FROM Guest AS g
                            JOIN Reservation AS r
                            JOIN Room_type AS rt
                            WHERE g.guest_id = r.guest_id
                            AND r.roomType_id = rt.roomType_id
                            AND r.checkOut = '".$date."'
                            GROUP BY g.guest_id";

                  $result = mysqli_query($db, $query);

                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "
    										<tr>
                          <td>Checkout</td>
    											<td>{$row['guest_id']}</td>
    											<td>{$row['dateCreated']}</td>
                          <td>{$row['firstName']} {$row['lastName']}</td>
                          <td>{$row['email']}</td>
                          <td>{$row['phoneNumber']}</td>
    											<td>{$row['checkIn']}</td>
    											<td>{$row['checkOut']}</td>
                          <td>{$row['rumid']} ({$row['tor']})</td>
                          <td>{$row['requests']}</td>
    										</tr>";
                    }
									} else {
                    echo "<tr><td colspan='10'>Inga resultat hittades</td></tr>";
                  }
								?>
              </table>


              <!-- PÅGÅENDE VISTELSER -->
							<h3>Pågående vistelser</h3>
							<table>
                <tr>
                  <th>Checkout</th>
                  <th>ID</th>
                  <th>Bokningsdatum</th>
                  <th>Namn</th>
                  <th>Email</th>
                  <th>Telefon</th>
                  <th>Incheckning</th>
                  <th>Utcheckning</th>
                  <th>Rum</th>
                  <th>Önskemål</th>
                </tr>


								<?php
									$query = "SELECT * FROM Guest AS g JOIN Reservation AS r JOIN Room_type AS rt WHERE g.guest_id = r.guest_id AND r.roomType_id = rt.roomType_id AND r.checkIn < '".$date."' AND r.checkOut > '".$date."'";

									$result = mysqli_query($db, $query);

                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
  										echo "
    										<tr>
                          <td>Checkout</td>
    											<td>{$row['guest_id']}</td>
    											<td>{$row['dateCreated']}</td>
                          <td>{$row['firstName']} {$row['lastName']}</td>
                          <td>{$row['email']}</td>
                          <td>{$row['phoneNumber']}</td>
    											<td>{$row['checkIn']}</td>
    											<td>{$row['checkOut']}</td>
                          <td>{$row['roomType_id']} ({$row['typeOfRoom']})</td>
                          <td>{$row['requests']}</td>
    										</tr>";
                    }
									} else {
                    echo "<tr><td colspan='10'>Inga resultat hittades</td></tr>";
                  }
								?>
							</table>
            </div>
        </div>

			</section>
		</div>
	</div>

	<!-- FOOTER -->
  <div id="footer">
  <div class="container-fluid footer">
    <div class="row">
      <?php if ($_SESSION['admin']):
        echo "<p class='col-md-1 col-sm-1 footer-text'><a href='logout.php' class='footer-effect'>Logga ut</a></p>";
        ?>
      <?php else:
        echo "<p class='col-md-1 col-sm-1 footer-text'><a href='login.php' class='footer-effect'>Admin</a></p>";
        ?>
      <?php endif; ?>



      <p class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3 footer-text" id="footer-phone">
        <?php
          include('config.php');
          $query = 'SELECT text FROM HELA WHERE id = "contact-mail"';
          $result = mysqli_query($db, $query);
          $row = $result->fetch_row();
          $text = (string)$row[0];
          echo "Email: <a href='mailto:".$text."' class='footer-effect' id='footer-mail'>".$text;
        ?>
      </a>
      <?php
        include('config.php');
        $query = 'SELECT text FROM HELA WHERE id = "contact-phone"';
        $result = mysqli_query($db, $query);
        $row = $result->fetch_row();
        $text = (string)$row[0];
        echo "| Tel: ".$text;
      ?>
    </p>
      <div class="col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-2 social-icons">
        <!-- Social Media Logotypes -->
        <a href="https://www.facebook.com/sharer/sharer.php?u=dengladageten.se">
          <img class="social-logo" src="images/icons/facebook.png" />
        </a>
        <a href="https://twitter.com/home?status=dengladageten.se">
          <img class="social-logo" src="images/icons/twitter.png" />
        </a>
        </div>
      </div>
    </div>
  </div>

	<script src="scripts/script_reservations.js"></script>
</body>

</html>
