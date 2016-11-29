<?php
  session_start();
  include('config.php');
  $editor = $_POST['data'];
  $id = $_POST['id'];
  $query = "UPDATE HELA SET text = '".$editor."' WHERE id = '".$id."'";
  mysqli_query($db, $query);
  echo $query;
  header("Refresh:2");
?>
