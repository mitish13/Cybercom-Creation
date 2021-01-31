<?php
	$content = '';
	if (isset($_POST['submit'])) {
		if(!empty($_POST['content'])) {
			$content = $_POST['content'];
			$find = array('Miti','Ashik','sandeep','jimish');
			$replace = array('M****','A***k','s*****p','j****h');
			$content_new = str_ireplace($find, $replace, $content);
			echo "Before Replace Content : ".$content."<br>After Replace Content : ".$content_new;
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Word Censoring</title>
</head>
<body>
	<form action="" method="post">
		<br><textarea name="content" rows="6" cols="30"><?php echo $content;?></textarea><br><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>