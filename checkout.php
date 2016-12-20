<?php
  session_start();
  include('config.php');
  $id = trim($_POST['id']);
  $query = "DELETE Guest, Reservation FROM Guest INNER JOIN Reservation ON Guest.guest_id = Reservation.guest_id WHERE Guest.guest_id ='".$id."'";
  mysqli_query($db, $query);
?>
