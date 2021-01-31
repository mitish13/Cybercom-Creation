<?php
	$handle = fopen('person.txt', 'w');
	fwrite($handle, "Mitish\n");
	fwrite($handle, "Kunj\n");
	fwrite($handle, "Denish\n");
	fwrite($handle, "Sahil\n");
	fclose($handle);
	echo "Writing Completed on '<b>person.txt</b>'.";
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Filehandling Writing</title>
</head>
<body>
	
</body>
</html>