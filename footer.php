<?php
if ($_SESSION['admin']) {
  echo '<div class="container">
          <div class="row">
            <form method="post" action="" class="col-xs-12 save-button-form">
              <button type="submit" name="save" class="save-button" id="save">Spara</button>
            </form>
          </div>
        </div>';

  echo '<style>
  .save-button {
  	-moz-box-shadow:inset 0px 1px 0px 0px #fbafe3;
  	-webkit-box-shadow:inset 0px 1px 0px 0px #fbafe3;
  	box-shadow:inset 0px 1px 0px 0px #fbafe3;
  	background-color:#ff5bb0;
  	-moz-border-radius:6px;
  	-webkit-border-radius:6px;
  	border-radius:6px;
  	border:1px solid #ee1eb5;
  	display:inline-block;
  	cursor:pointer;
  	color:#ffffff;
  	font-family:Arial;
  	font-size:28px;
  	font-weight:bold;
  	padding:6px 24px;
  	text-decoration:none;
  	text-shadow:0px 1px 0px #c70067;
  }
  .save-button:hover {
  	background-color:#ef027d;
  }
  .save-button:active {
  	position:relative;
  	top:1px;
  }


  .save-button-form {
    text-align: center;
    margin-top: 1vh;
  }
  </style>';
}
?>

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



    <p class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3 footer-text" id="footer-phone">Email:<a href="#" class="footer-effect" id="footer-mail">
      <?php
        include('config.php');
        $query = 'SELECT text FROM HELA WHERE id = "contact-mail"';
        $result = mysqli_query($db, $query);
        $row = $result->fetch_row();
        $text = (string)$row[0];
        echo $text;
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
      <a href="">
        <img class="social-logo" src="images/icons/facebook.png" />
      </a>
      <a href="">
        <img class="social-logo" src="images/icons/instagram.png" />
      </a>
      <a href="">
        <img class="social-logo" src="images/icons/twitter.png" />
      </a>
      </div>
    </div>
  </div>
</div>
