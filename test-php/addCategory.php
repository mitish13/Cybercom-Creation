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
    <title>Add category</title>
</head>
<body>
    <br><br><br>
    <div id="addCategory">
<form action="addPost.php" method="POST" id="addPostForm">
    
        <div class="formField"> <label for="title">Title: </label>  <input id="title" type="text" name="title"></div> <br>
        <div class="formField"> <label for="content">Content: </label> <textarea name="content" id="content" cols="30" rows="10"></textarea></div> <br>

        <div class="formField"> <label for="url">URL : </label>  <input id="url" type="url" name="url"></div> <br>
        
       
        <div class="formField"> <label for="image">Image : </label>  <input id="image" type="file"  name="image"></div> <br>

        <button name='submit'>Submit</button> <br>
 
     </form>
</body>
</div>
</html>