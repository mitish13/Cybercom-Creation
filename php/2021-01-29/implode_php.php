<?php
	$filename = 'personarr.txt';
	
	$handle = fopen($filename, 'r');
	$datain = fread($handle, filesize($filename));
	fclose($handle);

	$arrName = explode(',', $datain);
	$string = implode(' / ', $arrName);

	echo "Implode Completed<br>".$string;
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Implode</title>
</head>
<body>

</body>
</html>