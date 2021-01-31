<?php
	$content = '';
	if (isset($_POST['submit'])) {
		if(!empty($_POST['content']) && !empty($_POST['find']) && !empty($_POST['replace'])) {
			$content = $_POST['content'];
			$find = explode(",",$_POST['find']);
			$replace = explode(",",$_POST['replace']);
			$content_new = str_ireplace($find, $replace, $content);
			echo "Before Replace Content : ".$content."<br>Find Word : ".$_POST['find']."<br>Replace Word : ".$_POST['replace']."<br>After Replace Content : ".$content_new;
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Find & Replace</title>
</head>
<body>
	<form action="" method="post">
		<br><textarea name="content" rows="6" cols="30"><?php echo $content;?></textarea><br><br>
		<label>Find For (Comma Sepreated for multiple word):</label><br>
		<input type="text" name="find"><br><br>
		<label>Replace For (Comma Sepreated for multiple word):</label><br>
		<input type="text" name="replace"><br><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>