<?php
	$ip = $_SERVER['REMOTE_ADDR'];
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$browser = get_browser($user_agent,true);
	$browser_name = $browser['browser'];
	$device_type = $browser['device_type'];
	echo "IP Address : ".$ip."</br>Browser Name : ".$browser_name."</br>Device Type : ".$device_type;
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Visitor Browser</title>
</head>
<body>

</body>
</html>