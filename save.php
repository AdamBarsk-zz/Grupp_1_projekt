<?php
  session_start();
  include('config.php');
  $editor = trim($_POST['data']);
  $id = trim($_POST['id']);
  $query = "UPDATE HELA SET text = '".$editor."' WHERE id = '".$id."'";
  echo $query;
  mysqli_query($db, $query);
?>
