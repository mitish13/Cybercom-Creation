<?php
	if (isset($_POST['submit'])) {
		$random_number_max = getrandmax();
		$random_number_min = 0;
		$random_number = rand();
		$random_number_1 = rand(1,10);
		echo "Maximum Random Number Limit : ".$random_number_max."<br>Minimum Random Number Limit : ".$random_number_min."<br>Generate Random Number : ".$random_number."<br>Generate Random Number ( 1 to 10 ) : ".$random_number_1;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Random Number</title>
</head>
<body>
	<form action="" method="post">
		<input type="submit" name="submit" value="Click to Generate Random Number">
	</form>
</body>
</html>