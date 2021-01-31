<?php
	$admin_email = 'admin@gmail.com';
	$admin_password = '1234';
	$msg = '';
	if(isset($_POST['submit'])){
	    $name = $_POST['name'];
	    $email = $_POST['email'];
	    $password = $_POST['password'];
	    if (!empty($name) && !empty($email) && !empty($password)) {
	        if ($email == $admin_email && $password == $admin_password) {
				$msg = 'Welcome Admin !';
			} else {
				$msg = 'Welcome User !';
			}
		} else {
			$msg = 'All the field required';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Post</title>
</head>
<body>
	<?php echo $msg; ?>
	<form action="" method="POST">
		</br><label>Name:</label></br>
		<input type="text" name="name"></br>
		<label>Email:</label></br>
		<input type="email" name="email"></br>
		<label>Password:</label></br>
		<input type="password" name="password"></br></br>
		<input type="submit" name="submit">
	</form>
</body>
</html>