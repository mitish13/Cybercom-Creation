<?php
	
	//String Length
	echo "<h3>~ String Length ~</h3>";
	$string = "Hello I'm Mitish Karia.";
	$string_length = strlen($string);
	echo $string_length.'<br>[';
	for ($i=0;$i<$string_length;$i++) {
		echo '<strong>'.$string[$i]."</strong>=>".$i.',';
	}
	echo "]<br>";

	//String Position
	echo "<h3>~ String Position ~</h3>";
	$offset = 0;
	$find = 'S';
	$find_length = strlen($find);
	while (($string_position = strpos($string, $find,$offset)) !== false) {
		echo '<strong>'.$find.'</strong> find at '.$string_position.'<br>';
		$offset = $string_position + $find_length;
	}

	//Sub String Replace
	echo "<h3>~ Sub String Replace ~</h3>";
	$string_new = substr_replace($string, 'Smit',10,4);
	echo $string_new.'</br>';

	//String Replace
	echo "<h3>~ String Replace ~</h3>";
	$string_find = array('S','t');
	$string_replace = array('A','');
	$string_new = str_replace($string_find,$string_replace,$string);
	echo $string_new.'<br>';

	//String Transform
	echo "<h3>~ String Transform ~</h3>";
	if(isset($_POST['submit'])){
		$string_transform = $_POST['name'];
		$string_transform_upper = strtoupper($string_transform);
		$string_transform_lower = strtolower($string_transform);

		echo "Original String is :-".$string_transform.'<br>';
		echo "Upper Case String is :-".$string_transform_upper.'<br>';
		echo "Lower Case String is :-".$string_transform_lower;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-27 Practice String</title>
</head>
<body>
	<form action="" method="post">
		<label>Transform String to Upper & Lower :-</label>
		<input type="text" name="name" placeholder="Enter a string"><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>