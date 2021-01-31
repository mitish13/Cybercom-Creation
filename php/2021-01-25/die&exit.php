<?php
	//Die ,Exit Function Use in if else

	$status = 'Admin';
	//$status = 'Employee';
	if($status !== 'Admin'){
		die('Access Denied');
		//exit('Access Denied');
	}else{
		echo "Welcome Admin...!";
	}
	
	echo "<br>";
	
	//Die ,Exit Function Use in Function
	
	function checkArr($value)
	{
		$key = 0;
		while ($key < count($value)) {
			if(gettype($value[$key]) !== 'integer'){
				//die('Access Denied');
			}
			$key++;
		}
	}
	$arr = [0,1,2,'Mitish',3,4];
	checkArr($arr);

	echo "<br>";

	//Die ,Exit Function Use in database

	//@mysqli_connect("localhost","","") or die('Can\'t connect to database');
	@mysqli_connect("localhost","root","") or die('Can\'t connect to database');
	echo "Database Connected";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Die & Exit</title>
</head>
<body>

</body>
</html>