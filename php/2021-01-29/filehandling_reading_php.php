<?php
	$handle = fopen('person.txt', 'r');
	$arrPersonName = fread($handle,filesize('person.txt'));
	print_r($arrPersonName);
	fclose($handle);

	$handle = file('person.txt');
	$resultName = '';
	foreach ($handle as $personName) {
		$resultName .= '<br>'.$personName.',';
	}
	echo rtrim($resultName,',');
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Filehandling Radings</title>
</head>
<body>
	
</body>
</html>