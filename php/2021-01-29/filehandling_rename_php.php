<?php
	$old_filename = 'rename.txt';
	$ext = pathinfo($old_filename,PATHINFO_EXTENSION);
	$new_filename = time().'.'.$ext;
	if (!file_exists($old_filename)) {
		$handle = fopen($old_filename, 'w');
		fclose($handle);
	}
	if (rename($old_filename, $new_filename)) {
		echo "'<b>".$old_filename."</b>' is rename to '<b>".$new_filename."</b>'";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Filehandling Rename</title>
</head>
<body>
	
</body>
</html>