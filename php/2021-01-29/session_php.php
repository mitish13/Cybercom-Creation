<?php
	session_start();
	if (isset($_SESSION['username'])) {
		echo 'Welcome , '.$_SESSION['username'].'.</br> Your age is '.$_SESSION['age'].'.';
	} else {
		echo "Please Refresh '<b>set_session.php</b>' File.";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Session</title>
</head>
<body>
	
</body>
</html>