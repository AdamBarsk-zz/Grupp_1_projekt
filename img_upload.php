<?php
$target_dir = "images/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo ($target_file, PATHINFO_EXTENSION);

if (isset($_POST["add"])) {

	if (file_exists($target_file)) {
		echo '<link rel="stylesheet" type="text/css" href="styles.css" />';
		echo "<div>
						<p class='failToUpload'>
							Denna bild finns redan!
						</p>
					</div>";
		$uploadOk = 0;
	} else if ($_FILES["fileToUpload"]["size"] >= 4194304) {
			echo "<div>
							<p class='failToUpload'>
								Tyvärr, bilden är för stor. Största tillåtna filstorlek är 4 MB.
							</p>
						</div>";
		$uploadOk = 0;
	} else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			echo "<div>
							<p class='failToUpload'>
								Kontrollera att bilden har en tillåten filändelse: JPG, JPEG, PNG & GIF.
							</p>
						</div>";
		$uploadOk = 0;
	} else if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "<div>
							<p class='uploadSuccess'>
								Bilden har laddats upp.
							</p>
						</div>";
	} else {
			echo "<div>
							<p class='failToUpload'>
								Tyvärr, någonting gick fel. Försök igen!
							</p>
						</div>";
		$uploadOk = 0;
	};
}

$filename = $_POST['delete'];
	if(isset($_POST['delete'])) {
		unlink($filename);
		header('location: http://www.dengladageten.se/gallery.php');
	}
?>
