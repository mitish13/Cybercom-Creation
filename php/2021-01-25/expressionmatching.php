<?php
	//Expression Matching in whitespace

	$string ='Hello I\'m Mitish.';
	if(preg_match('/ /',$string)){
		echo "Whitespace Founded";
	}else{
		echo "Whitespace not Founded";
	}

	echo "<br>";
	//Expression Matching in number

	$string ='Hello I\'m Mitish.';
	if(preg_match('/[0-9]/',$string)){
		echo "Number Founded";
	}else{
		echo "Number not Founded";
	}

	echo "<br>";
	//Expression Matching in letter & whitespace

	$string ='Hello I m Mitish';
	if(preg_match ("/^[a-zA-Z\s]+$/",$string)) {
		echo "Letter & Whitespace Founded";
	}else{
		echo "Letter & Whitespace not Founded";
	}

	echo "<br>";
	//Expression Matching in email

	$string ='agmail.ds';
	if(preg_match ("/^[a-zA-Z0-9]+[@]{1}[a-zA-Z0-9]+[.]{1}[a-zA-Z]{2,3}$/",$string)) {
		echo "Valid Email";
	}else{
		echo "Not valid email";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Expression Matching</title>
</head>
<body>
	
</body>
</html>