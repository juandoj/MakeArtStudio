<?php

$dir = $_POST['image_folder'];
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
   $newPics[] = $filename;
}

sort($newPics);

for ($i = 1; $i < sizeof($newPics); ++$i) {

    $paths = $paths . $newPics[$i];
	if ($i < sizeof($newPics)-1){
		$paths = $paths . ',';
	}
}

echo "paths=" . $paths;

?>
