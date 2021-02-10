<?php 
session_start();
require('header.php');

if(!isset($_SESSION['login'])){
    if(!$_SESSION['login']){
        header("location:login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Category</title>
</head>
<body>
<div id="add_category">
    <h3>Blog Category</h3>

    <button name="addCategory"><a href="addCategory.php" >Add Category</a></button>
</body>
</html>