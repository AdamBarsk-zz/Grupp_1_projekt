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
  	-moz-box-shadow:inset 0px 1px 0px 0px #d9fbbe;
  	-webkit-box-shadow:inset 0px 1px 0px 0px #d9fbbe;
  	box-shadow:inset 0px 1px 0px 0px #d9fbbe;
  	background-color:#b8e356;
  	-moz-border-radius:6px;
  	-webkit-border-radius:6px;
  	border-radius:6px;
  	border:1px solid #83c41a;
  	display:inline-block;
  	cursor:pointer;
  	color:#ffffff;
  	font-family:Arial;
  	font-size:15px;
  	font-weight:bold;
  	padding:6px 24px;
  	text-decoration:none;
  	text-shadow:0px 1px 0px #86ae47;
  }
  .save-button:hover {
  	background-color:#a5cc52;
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



    <p class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3 footer-text admin" id="footer-phone">Email: <a href="#" class="footer-effect admin" id="footer-mail">get@goat.com</a> +70 1234567</p>
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
