<nav class="navbar navbar">
  <div class="container-fluid header">
    <div class="row">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Hem</a></li>

          <?php
            if (isset($_SESSION['admin'])) {
              echo "<li><a href='reservations.php'>Bokningar</a></li>";
            } else {
              echo "<li><a href='booking.php'>Boka</a></li>";
            }
          ?>

          <li><a href="info.php">Information</a></li>
          <li><a href="gallery.php">Galleri</a></li>
          <li><a href="contact.php">Kontakt</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
