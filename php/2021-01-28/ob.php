<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Output Buffer</title>
</head>
<body>
	<h1>Welcome .!</h1>
</body>
</html>
<?php
	$redirect_page = 'https://www.github.com/mitish13';
	$redirect = false;
	if ($redirect) {
		header('Location: '.$redirect_page); 
	}
	ob_end_flush();
?>