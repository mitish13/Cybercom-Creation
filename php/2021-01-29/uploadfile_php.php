<?php
	$msg = '';
	if(isset($_POST['submit'])){
		if (!empty($_FILES['uploadfile'])) {
	    	$file_name = $_FILES['uploadfile']['name'];
	    	if ($file_name) {
	    		$file_ext = pathinfo($file_name,PATHINFO_EXTENSION);
	    		$file_type = $_FILES['uploadfile']['type'];
	    		if ( ($file_ext == 'jpg' OR $file_ext == 'jpeg' OR $file_ext == 'png') && ($file_type == 'image/jpg' OR $file_type == 'image/jpeg' OR $file_type == 'image/png') ) {
	    			$file_size = $_FILES['uploadfile']['size'];
	    			if ($file_size < 100000) {
	    				$file_temp_name = $_FILES['uploadfile']['tmp_name'];
	    				if (move_uploaded_file($file_temp_name, $file_name)) {
	    					$msg = 'File Uploaded Sucessfully !';
	    				} else {
	    					$msg = 'Something went wrong !';
	    				}
	    			} else {
	    				$msg = 'File Uploaded Less than 1 MB !';
	    			}
	    		} else {
	    			$msg = 'Please Uploaded .jpg , .jpeg , .png File!';
	    		}
	    	} else {
	    		$msg = 'File Must Required !';
	    	}
	    } else {
	    	$msg = 'File Must Required !';
	    }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>2021-01-28 Practice Upload File</title>
</head>
<body>
	<?php echo $msg; ?>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="uploadfile"><br><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>