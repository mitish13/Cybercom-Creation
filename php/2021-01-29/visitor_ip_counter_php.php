<?php
	$ipFilename = 'ip.txt';
	$countFilename = 'count.txt';

	function hit_count()
	{
		global $ipFilename;
		global $countFilename;

		$ip_address = $_SERVER['REMOTE_ADDR'];
		$ip_file = file($ipFilename);
		foreach ($ip_file as $ip) {
			$ip_single = trim($ip);
			if ($ip_address == $ip_single) {
				$found = true;
				break;
			} else {
				$found = false;
			}
		}

		if ($found == false) {
			
			$handle = fopen($countFilename, 'r');
			$current = fread($handle, filesize($countFilename));
			fclose($handle);

			$current += 1;

			$handle = fopen($countFilename, 'w');
			fwrite($handle, $current);
			fclose($handle);

			$handle = fopen($ipFilename, 'a');
			fwrite($handle, $ip_address."\n");
			fclose($handle);
		}
	}
	hit_count();

	$handle = file($ipFilename);
	$resultIp = '';
	foreach ($handle as $ip) {
		echo $ip.'<br>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Visitor Ip Address Counter</title>
</head>
<body>
	
</body>
</html>