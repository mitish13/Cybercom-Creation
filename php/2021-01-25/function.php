<?php

	//Basic Function
	function basic(){
		echo "Mitish";
	}
	basic();

	echo "<br>";

	//Function with arguments
	function withArguments($name){
		echo $name;
	}
	$name = "Mitish";
	withArguments($name);

	echo "<br>";
	
	//Function with return value
	function returnValue($name){
		if($name === 'Mitish'){
			return 1;
		}else{
			return 0;
		}
	}
	if(returnValue($name)){
		echo "Your name is mitish";
	}else{
		echo "You'r not a mitish";
	}

	echo "<br>";
	function addition($number1,$number2){
		return $number1 + $number2;
	}
	function multiplication($number1,$number2){
		return $number1 * $number2;
	}
	echo multiplication(addition(10,15),addition(13,30));

	echo "<br>";
	
	//Function with global value
	function find_name(){
		global $name;
		echo 'You are '.$name;
	}
	find_name();

	echo "<br>";
	function find_ip(){
		global $ip;
		echo 'IP - '.$ip;
	}
	$ip = $_SERVER['REMOTE_ADDR'];
	find_ip();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Function</title>
</head>
<body>

</body>
</html>