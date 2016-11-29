<?php session_start(); ?>
<!DOCTYPE html>
<html>
<body>
  <h1>Logga in-get-ing</h1>

  <form action="" method="post">
    <label for="username">Användarnamn:</label>
    <input type="text" name="username" />

  	<label for="password">Lösenord:</label>
  	<input type="password" name="password" />

    <input type="submit" value="Logga in" />
  </form>

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
        echo "<h1>Wrong username and/or password.</h1>";
      }
    }
  ?>

</body>
</html>
