<?php
	//Word Count
	echo "<b>String Word Count</b></br>";
	$string ='Hello I\'m Mitish.!@';
	$string_word_count = str_word_count($string);
	echo $string_word_count.'<br>';
	$string_word_count = str_word_count($string,1);
	print_r($string_word_count);
	echo '<br>';
	$string_word_count = str_word_count($string,2);
	print_r($string_word_count);
	echo '<br>';
	$string_word_count = str_word_count($string,0,'!.@');
	echo $string_word_count.'<br>';
	$string_word_count = str_word_count($string,1,'.@!');
	print_r($string_word_count);
	echo '<br>';
	$string_word_count = str_word_count($string,2,'@!.');
	print_r($string_word_count);
	echo '<br>';

	//String Shuffle
	echo "<b>String Shuffle</b></br>";
	$string ='abcdefghijklmnopqrstuvwxyz0123456789';
	$string_shuffled = str_shuffle($string);
	echo $string_shuffled.'<br>';
	$string_shuffled = substr(str_shuffle($string), 0,6);
	echo $string_shuffled.'<br>';
	$string_shuffled = substr(str_shuffle($string), 0,strlen($string)/2);
	echo $string_shuffled.'<br>';

	//String Reverse
	echo "<b>String Reverse</b></br>";
	$string ='abcdefghijklmnopqrstuvwxyz0123456789';
	$string_reverse = strrev($string);
	echo $string_reverse.'<br>';
	$string='Hello I\'m Smit.';
	$string_reverse = strrev($string);
	echo $string_reverse.'<br>';

	//Check Similarity
	echo "<b>String Similarity</b></br>";
	$string_one = 'Hello I\'m Smit Shah.I\'m Devloper.';
	$string_two = 'Hello I\'m Smit Shah.I\'m Designer.';
	similar_text($string_one, $string_two,$result);
	echo $result.'<br>';

	//String Length
	echo "<b>String Length</b></br>";
	$string_length = strlen($string);
	echo $string_length.'<br>';
	if($string_length < 25){
		echo 'String is lessthan 25 Character<br>';
	}else{
		echo 'String is greaterthan 25 Character<br>';
	}

	//String Slash
	echo "<b>String Slash</b></br>";
	$string = 'This is a " " string.';
	$string_slashes = addslashes($string);
	echo $string_slashes.'<br>';
	$string = 'This is a " Hello " string.';
	$string_slashes = addslashes($string);
	echo $string_slashes.'<br>';

	//String Htmlentitity
	echo "<b>String Html Entity</b></br>";
	$string = 'This is a <img src="add.jpg"> string.';
	$string_entities = htmlentities(addslashes($string));
	echo $string_entities.'<br>';


?>
<!DOCTYPE html>
<html>
<head>
	<title>String</title>
</head>
<body>

</body>
</html>