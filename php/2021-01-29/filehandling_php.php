<?php
	$filename = 'person.txt';
	if (file_exists($filename)) {
		echo "'<b>".$filename."</b>' Already Exists<br>";
	} else {
		echo "'<b>".$filename."</b>' Not Exists<br>";
	}

	$filename = 'something.txt';
	if (file_exists($filename)) {
		echo "'<b>".$filename."</b>' Already Exists<br>";
	} else {
		echo "'<b>".$filename."</b>' Not Exists<br>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Filehandling Check File</title>
</head>
<body>
	
</body>
</html>