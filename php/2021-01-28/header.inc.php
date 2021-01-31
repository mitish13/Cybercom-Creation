<?php 
	$script_name = $_SERVER['SCRIPT_NAME'];
	echo "<pre>";
	print_r($_SERVER);
	echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Server</title>
</head>
<body>
	<form action="<?php echo $script_name;?>" method="post">
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>