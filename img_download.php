<?php
$dir = "images/uploads/*";
foreach(glob($dir, GLOB_NOSORT) as $file)   {
	if (isset($_SESSION['admin'])) {
		echo "<form method='post' action='gallery.php' class='form-group image_container'>
				<img class='img-rounded flashy' src='$file' alt='$file'/><br>
				<input name='delete' type='hidden' value='" .$file. "'>
				<button class='btn btn-danger delete_button'>Radera</button>
			  </form>";
	} else {
		echo "<form method='post' action='gallery.php' class='form-group image_container'>
				<img class='img-rounded flashy' src='$file' alt='$file'/>
			  </form>";
	}
}
?>
