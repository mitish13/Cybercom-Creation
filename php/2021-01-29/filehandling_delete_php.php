<?php
	$filename = 'person.txt';
	if (file_exists($filename)) {
		if (unlink($filename)) {
			echo "'<b>".$filename."</b>' Deleted<br>";
		} else {
			echo "'<b>".$filename."</b>' Error<br>";
		}
	} else {
		echo "'<b>".$filename."</b>' Already Deleted<br>";
	}

	$filename = 'something.txt';
	if (file_exists($filename)) {
		if (unlink($filename)) {
			echo "'<b>".$filename."</b>' Deleted<br>";
		} else {
			echo "'<b>".$filename."</b>' Error<br>";
		}
	} else {
		echo "'<b>".$filename."</b>' Already Deleted<br>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Filehandling Delete</title>
</head>
<body>
	
</body>
</html>