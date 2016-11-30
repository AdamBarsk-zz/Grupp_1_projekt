<?php
$dir = "uploads/*";
foreach(glob($dir) as $file)   {   
	echo "<img style='width:100px;' src='$file' alt='$file'/>";   
}
?>