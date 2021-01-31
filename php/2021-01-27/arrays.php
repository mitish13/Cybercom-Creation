<?php
	echo "<pre>";
	
	//Array
	echo "<h3>~ Single Dimension Array ~</h3>";
	$person = array('Mitish','Kunj','Sandeep','Sumit');
	print_r($person);
	echo "<br>";
	array_push($person,'Hafiz');
	print_r($person);
	echo "<br>";
	array_pop($person);
	print_r($person);
	echo "<br>";
	$person[4] = 'Hafiz';
	print_r($person);
	echo "<br>";
	unset($person[4]);
	print_r($person);
	echo "<br>";

	//Associative Array
	echo "<h3>~ Associative Array ~</h3>";
	$person = array('Mitish'=>54,'Kunj'=>48,'Sandeep'=>12,'Sumit'=>44);
	print_r($person);
	echo "<br>";
	$person += ['Hafiz' => 55];
	print_r($person);
	echo "<br>";
	array_pop($person);
	print_r($person);
	echo "<br>";
	$person = array_merge($person,array('Hafiz' => 55));
	print_r($person);
	echo "<br>";
	unset($person['Hafiz']);
	print_r($person);
	echo "<br>";
	foreach ($person as $key => $value) {
		echo $key.' => '.$value.'<br>';
	}
	echo $person['Sumit'];
	echo "<br>";

	//Multi Dimension Array
	echo "<h3>~ Multi Dimension Array ~</h3>";
	$person = array('Mitish' => array(
							'Firstname' => 'Mitish',
							'Lastname' => 'Karia', 
							'Eno.' => 54),
					'Kunj' => array(
							'Firstname' => 'Kunj',
							'Lastname' => 'Patel', 
							'Eno.' => 48),
					'Jemish' => array(
							'Firstname' => 'Sandeep',
							'Lastname' => 'kapadiya', 
							'Eno.' => 12),
					'Sumit' => array(
							'Firstname' => 'Sumit',
							'Lastname' => 'Waliya', 
							'Eno.' => 44));
	print_r($person);
	echo "<br>";
	foreach ($person as $parent_key => $parent_value) {
		echo '<strong>'.$parent_key.'</strong><br>';
		foreach ($parent_value as $child_key =>$child_value ) {
			echo '&nbsp;&nbsp;&nbsp;'.$child_key.' => '.$child_value.'<br>';
		}
	}
	echo "<br>";
	$person = array_merge($person,array('Hafiz' => array(
													'Firstname' => 'Hafiz',
													'Lastname' => 'Shaikh', 
													'Eno.' => 55)));
	print_r($person);
	echo "<br>";
	array_pop($person['Hafiz']);
	print_r($person);
	echo "<br>";
	unset($person['Hafiz']['Firstname']);
	print_r($person);
	echo "<br>";
	unset($person['Hafiz']);
	print_r($person);
	echo "<br>";
	array_pop($person);
	print_r($person);

?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-27 Practice Array</title>
</head>
<body>

</body>
</html>