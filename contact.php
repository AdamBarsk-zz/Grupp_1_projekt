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
            <p id="contact" class="admin">Non duis culpa sint cupidatat aute aliquip aliqua et exercitation ex culpa non qui ad. Cillum mollit elit est eiusmod proident minim et velit. Culpa aliquip eiusmod elit officia quis ex commodo culpa sint elit duis pariatur. Ullamco aute quis sunt et labore ipsum sunt enim exercitation. Ullamco exercitation ipsum reprehenderit id dolor laboris culpa culpa minim id incididunt nulla aliqua qui. Mollit nostrud incididunt ullamco incididunt ad anim qui dolore dolore proident incididunt. Anim in ut sint ad consequat ullamco sit sunt.</p>
            <ul><br><br>
              <li class="contact"><a href="#" class="admin" id="contact-adress">981 94 Riksgränsen, Sverige</a></li>
              <li class="contact"><a href="#" class="admin" id="contact-mail">get@goat.com</a></li>
              <li class="contact"><a href="#" class="admin" id="contact-phone">+46 70 1234567</a></li>
            </ul>
          </div>


          <div class="col-sm-6 col-sm-offset-1 welcome">
                <h2>Hitta hit</h2>
                <iframe width="100%" height="500" frameborder="0" style="border: 0"         src="https://www.google.com/maps/embed/v1/place?key=AIzaSyButmtpXCAGC0yYoDPJsYXbec7PcOM_uYE
                &q=Riksgränsen,sweden&z=5" allowfullscreen>
                </iframe>
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
    <script src="scripts/script_index.js"></script>
</body>

</html>
