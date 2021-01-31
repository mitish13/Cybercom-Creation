<?php
	require 'conf.inc.php';
	foreach ($ip_blocked as $ip) {
		if ($ip == $ip_address) {
			echo "Acess Denied !</br>Your ".$ip." (Ip Address) Blocked ";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Visitor IP</title>
</head>
<body>

</body>
</html>