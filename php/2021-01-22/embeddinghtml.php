<?php
	$var1 = 'Mitish';
	$var2 = 'Karia';
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-22 Practice Embedding Html</title>
</head>
<body>
	<input type="text" name="name" value="<?php echo $var1;?>"></br>
	<input type="text" name="name" value="<?php echo $var1.' '.$var2;?>">
</body>
</html>