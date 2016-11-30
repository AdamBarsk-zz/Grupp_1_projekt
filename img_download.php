<?php
$dir = "uploads/*";
foreach(glob($dir) as $file)   {   
	echo "<img class='img-rounded flashy' src='$file' alt='$file'/>";   
}
?>