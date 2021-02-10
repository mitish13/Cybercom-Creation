<?php 
session_start();
require('header.php');
require('./database/connection_addPost.php');
if(!isset($_SESSION['login'])){
    if(!$_SESSION['login']){
        header("location:login.php");
    }
}
echo $_SESSION['uid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./css//home_style.css">

</head>
<body>
    
<!-- BLOG POST TABLE  -->

<div id="blog_post">
    <h3>Blog Posts</h3>

    <button name="addPost"><a href="addPost.php" >Add Blog Post</a></button>
    <table id="table">
            <tr>
                <th>POST_ID</th>
                <th>Category Name</th>
                <th>Title</th>
                <th>Published Date</th>
                <th>Actions</th>
               
            </tr>

    <?php
            
            $fetchQue="Select blog_post.id,blog_post.category,blog_post.title,blog_post.published_at from blog_post INNER JOIN user ON user.id=blog_post.uid";
            $result=mysqli_query($link,$fetchQue);
            if(!$result){
                echo "error".mysqli_error($link);
            }
            $numOfRecord=mysqli_num_rows($result);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php
                             $cats=unserialize($row['category']);
                             echo $cats[0].",".$cats[1];
                        ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['published_at'] ?></td>
        
                        <td>
                            <form method="post">
                                <button name="btnEdit" class="btnEdit"  id="<?php echo $row['id']?>">Edit</button>
                                <button name="btnDel" class="btnDel" >Delete</button>
                            </form>
                        </td>

                    </tr>
                    <?php
                }
            }else{
                ?>
                <tr>
                <td colspan="7">No Records Found!!</td>
                </tr>
            <?php } ?>

</div>
<script src="./js/home.js"></script>
</body>
</html>
