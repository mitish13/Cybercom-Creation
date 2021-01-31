<?php
	if (isset($_COOKIE['username'])) {
		echo 'Welcome , '.$_COOKIE['username'].'.</br> Your age is '.$_COOKIE['age'].'.';
	} else {
		echo "Please Refresh '<b>set_cookies.php</b>' File.";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Cookies</title>
</head>
<body>
	
</body>
</html>