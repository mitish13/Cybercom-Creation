<?php
	$dir = getcwd();
	if ($handle = opendir($dir.'/')) {
		while ($file = readdir($handle)) {
			if ($file != '.' && $file != '..') {
				echo '<a href="'.$dir.'/'.$file.'">'.$file.'</a><br>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Filehandling List All File</title>
</head>
<body>
	
</body>
</html>