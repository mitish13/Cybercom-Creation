<?php
require ("connection.php");
?>

<?php 
$id=$_POST['id'];
$delQue="DELETE FROM user WHERE id='$id'";
$result=mysqli_query($link,$delQue);
?>