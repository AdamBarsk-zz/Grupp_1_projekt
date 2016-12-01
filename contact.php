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
        <div class="row">
          <div class="col-sm-5 welcome">
            <h2>Kontakt</h2>
            <p id="contact" class="admin">
              <?php
                include('config.php');
                $query = 'SELECT text FROM HELA WHERE id = "contact"';
                $result = mysqli_query($db, $query);
                $row = $result->fetch_row();
                $text = (string)$row[0];
                echo $text;
              ?>
            </p>
            <ul>
              <li class="contact"><a href="#" class="admin" id="contact-adress">
                <?php
                  include('config.php');
                  $query = 'SELECT text FROM HELA WHERE id = "contact-adress"';
                  $result = mysqli_query($db, $query);
                  $row = $result->fetch_row();
                  $text = (string)$row[0];
                  echo $text;
                ?>
              </a></li>
              <li class="contact"><a href="#" class="admin" id="contact-mail">
                <?php
                  include('config.php');
                  $query = 'SELECT text FROM HELA WHERE id = "contact-mail"';
                  $result = mysqli_query($db, $query);
                  $row = $result->fetch_row();
                  $text = (string)$row[0];
                  echo $text;
                ?>
              </a></li>
              <li class="contact"><a href="#" class="admin" id="contact-phone">
                <?php
                  include('config.php');
                  $query = 'SELECT text FROM HELA WHERE id = "contact-phone"';
                  $result = mysqli_query($db, $query);
                  $row = $result->fetch_row();
                  $text = (string)$row[0];
                  echo $text;
                ?>
              </a></li>
            </ul>
          </div>


          <div class="col-sm-6 col-sm-offset-1 welcome">
                <h2>Hitta hit</h2>
                <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJB1nGvW9nf0YRlu8ipR47lLE&zoom=6&key=AIzaSyAGJpYxhLOnZ4PNK96Z8z4SPc6iKR2WPK8&"  allowfullscreen></iframe>
          </div>
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
    <script src="scripts/script_index.js"></script>
</body>

</html>
