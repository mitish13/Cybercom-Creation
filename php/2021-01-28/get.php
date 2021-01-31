<?php
	$msg = '';
	if(isset($_GET['submit'])){
		$date = $_GET['date'];
	    $month = $_GET['month'];
	    $year = $_GET['year'];
	    if (!empty($date) && !empty($month) && !empty($year)) {
	        $current_date = date_create(date('d-m-Y'));
	        $date_of_birth = date_create($date .'-'. $month .'-'. $year);
	        $age = date_diff($current_date,$date_of_birth)->y;
	        $msg = "Current Date : ".$current_date->format('d-m-Y') ."</br>User Date : ".$date_of_birth->format('d-m-Y')."</br>Age : ".$age."</br>Retirement Age : ".(65 - $age);
		} else {
			$msg = 'All the field required';
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Get</title>
</head>
<body>
	<?php echo $msg; ?>
	<form action="" method="GET">
		</br><label>Enter Date of Birth:</label></br> 
		<label>Date:</label></br>
		<input type="number" name="date"></br>
		<label>Month:</label></br>
		<input type="number" name="month"></br>
		<label>Year:</label></br>
		<input type="number" name="year"></br></br>
		<input type="submit" name="submit">
	</form>
</body>
</html>