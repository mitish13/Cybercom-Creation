<?php
	$msg = '';
	if (isset($_GET['date']) && isset($_GET['month']) && isset($_GET['year'])) {
		$date = htmlentities($_GET['date']);
		$month = htmlentities($_GET['month']);
		$year = htmlentities($_GET['year']);
		if (!empty($date) && !empty($month) && !empty($year)) {
			$msg = "Date Of Birth : ".$date.'-'.$month.'-'.$year;
		} else {
			$msg = 'All the field required';
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Html Entities</title>
</head>
<body>
	<?php echo $msg; ?>
	<form action="" method="GET">
		</br><label>Enter Date of Birth:</label></br> 
		<label>Date:</label></br>
		<input type="text" name="date"></br>
		<label>Month:</label></br>
		<input type="text" name="month"></br>
		<label>Year:</label></br>
		<input type="text" name="year"></br></br>
		<input type="submit" name="submit">
	</form>
</body>
</html>