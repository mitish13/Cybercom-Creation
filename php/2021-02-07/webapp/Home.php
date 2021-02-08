<?php 
include "header.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="./CSS/home_style.css">
</head>
<body>
<div id="home">
<h1>Welocome to home page</h1><br><br>
<h3>Number of records in database: <span id="rec"> <?php echo $_SESSION['numOfRec'] ?></span></h3>
</div>
</body>
</html>