<?php
	date_default_timezone_set('Asia/Kolkata');
	$time = time();
	echo $time.'<br>';
	echo 'Actual Time : '.date('d m Y H i s a D M Y l F',$time).'<br>';
	echo 'Modified Time : '.date('d m Y H i s a D M Y l F',$time+(60 * 60 * 24 * 365 * 5));
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Timestamp</title>
</head>
<body>

</body>
</html>