<?php
	$filename = 'personarr.txt';
	$handle = fopen($filename, 'r');
	$datain = fread($handle, filesize($filename));
	$arrName = explode(',', $datain);
	
	echo "Explode Completed<br>";
	print_r($arrName);
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Explode</title>
</head>
<body>

</body>
</html>