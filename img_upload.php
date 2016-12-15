<?php
$target_dir = "images/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo ($target_file, PATHINFO_EXTENSION);

if (isset($_POST["add"])) {

	if (file_exists($target_file)) {
		echo '<link rel="stylesheet" type="text/css" href="styles.css" />';
		echo "<div><p class='failToUpload'> Denna get finns redan! </p></div>";
		$uploadOk = 0;
	} else if ($_FILES["fileToUpload"]["size"] >= 4194304) {
		echo "<div><p class='failToUpload'> Tyvärr, geten är för stor. Högsta mankhöjd är 4 MB.</p></div>";
		$uploadOk = 0;
	} else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
				echo "<div><p class='failToUpload'>Bara getter med efternamn JPG, JPEG, PNG & GIF finns på denna gård.</p></div>";
				$uploadOk = 0;
			} else if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo "<div><p class='uploadSuccess'> Geten: ". "'" . basename ( $_FILES["fileToUpload"]["name"]) . "'" . " har ladddats upp. </p></div>";	
					} else {
						echo "<div><p class='failToUpload'>Tyvärr, geten blev förvirrad på vägen och försvann.</p></div>";
	  				  };
}

$filename = $_POST['delete'];
	if(isset($_POST['delete'])) {
		unlink($filename);
		header('location: http://www.dengladageten.se/gallery.php');
	}
?>
