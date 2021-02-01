<?php
require 'connection.php';

?>
<!-- insert into table_name(f_name,l_name,mobile_num,email) Values () -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert data from html form into mysql database</title>
</head>
<body>
    <form action="insert.php">
        <input type="text" name="fname" placeholder="first name">
        <input type="text" name="lname" placeholder="last name">
        <input type="number" name="mnumber" placeholder="Mobile Number">
        <input type="text" name="email" placeholder="email-id">    

        <button type="submit">Submit</button>
    </form>
<?php
 $f_name=$_GET['fname'];
 $l_name=$_GET['lname'];
 $number=$_GET['mnumber'];
 $email=$_GET['email'];
//create query
$sql="INSERT INTO CE (f_name,l_name,mobile_num,email) VALUES ($f_name,$l_name,$number,$email)";
if($conn->query($sql)){
    echo "Record added successfully";
}
else{
    echo "Error: ".$conn->error;
}





?>
</body>
</html>