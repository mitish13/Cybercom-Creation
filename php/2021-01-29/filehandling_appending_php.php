<?php
	$msg = '';
	if (isset($_POST['submit'])) {
		if (isset($_POST['name']) && !empty(trim($_POST['name']))) {
			$handle = fopen('person.txt', 'a');
			fwrite($handle, $_POST['name']."\n");
			fclose($handle);
			
			$handle = file('person.txt');
			$resultName = '';
			foreach ($handle as $personName) {
				$resultName .= $personName.',';
			}
			echo rtrim($resultName,',');
		} else {
			$msg = 'Field is required';
		}
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-29 Practice Filehandling Writing</title>
</head>
<body>
	<?php echo $msg; ?>
	
	<form action="" method="post">
		<br><input type="text" name="name" placeholder="Person Name"><br><br>
		<input type="submit" name="submit" >
	</form>
</body>
</html>