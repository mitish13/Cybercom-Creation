<?php 
session_start();
require ('./database/connection_addPost.php');
require('header.php');


if(!isset($_SESSION['login'])){
    if(!$_SESSION['login']){
        header("location:login.php");
    }
}
?>

<?php 


if($_GET['action']=='create'){
    $_SESSION['action']='create';

}
elseif($_GET['action']=='update'){
    $_SESSION['action']='update';
    $_SESSION['id']=$_GET['id'];
}

if($_GET['action']=="update"){
    $fetchRecord="SELECT * from blog_post WHERE id='$_SESSION[id]'";
    $values=mysqli_query($link,$fetchRecord);
    if(mysqli_num_rows($values)!=0){
    while($row=mysqli_fetch_assoc($values)){
        $settitle=$row['title'];
        $setcontent=$row['content'];
        $seturl=$row['url'];
        $setpub=$row['published_at'];
        $category=serialize($row['category']);
           $image=$row['image'];
           ?> 
           <h2>Edit Blog Post</h2>
           
           <?php 
    }
    }}else{
        ?>
            <h2>Add new blog post</h2>
 
        <?php 
        

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new blog post</title>
</head>
<body>
    <div id="addPost">

        
        <noscript>
        script disabled
    </noscript>
    <form action="addPost.php" method="POST" id="addPostForm">
        
        <div class="formField"> <label for="title">Title: </label>  <input id="title" type="text" value="<?php if(isset($settitle))echo $settitle;  ?>" name="title"></div> <br>
        <div class="formField"> <label for="content">Content: </label> <textarea  name="content" id="content" cols="30" rows="10">

        <?php if(isset($setcontent))echo $setcontent;  ?>
        </textarea>
    
        
    </div> <br>

        <div class="formField"> <label for="url">URL : </label>  <input id="url" value="<?php if(isset($seturl))echo $seturl;  ?>" type="url" name="url"></div> <br>
        
        <div class="formField"> <label for="publish">Published At: </label>  <input id="publish" type="datetime-local" name="publish"></div> <br>
       
        <div class="formField"> <label > Category <br></label>
                                <input type="checkbox" name="category[]" value="lifestyle">Lifestyle <br>
                                <input type="checkbox" name="category[]" value="health" >Health <br>
                                <input type="checkbox" name="category[]" value="education"> Education <br>
                                <input type="checkbox" name="category[]" value="music">Music <br>
        </div>
        <div class="formField"> <label for="image">Image : </label>  <input value="<?php if(isset($setimage))echo $setimage;  ?>"  id="image" type="file"  name="image"></div> <br>

        <button name='submit'>Submit</button> <br>
 
     </form>
    </div>

    <!-- php validation -->
<?php 

if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $content=$_POST['content'];
        $url=$_POST['url'];
        $publishedAt=$_POST['publish'];
        $image=$_POST['image'];
        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        );
        
        $imageInfo=explode('.',$image);
        $imageExtension=strtolower(end($imageInfo));
        
        $categoryArray=array();


        
        if(isset($_POST['category'])){
        foreach($_POST['category'] as $eachCategory){
            array_push($categoryArray,$eachCategory);
        }}
        
        $errArray=array();

        //title validation

        if(strlen($title)==0){
            array_push($errArray,"Title can't be empty");            
        }

        //content validatiion

        if(strlen($content)==0){
            array_push($errArray,"Content can't be empty");            
        }

        
        
        
    //     //url validation;
        if(!filter_var($url,FILTER_VALIDATE_URL)){
                array_push($errArray,"Url is invalid");
         }else {
            $checkeURlQue="SELECT * from blog_post where url='$url' ";
            $result=mysqli_query($link,$checkeURlQue);
            if(mysqli_num_rows($result)>0){
                array_push($errArray,"url is already exist");
                
            } 
              
         }
            
    //      //published validation
         
                
    //      category validation
         if(count($categoryArray)==0){
            array_push($errArray,"Please select atleast one category");            
        }  

        //Image  validation
        if (! in_array($imageExtension, $allowed_image_extension)) {
        array_push($errArray,"Check image file ");

    }

    } 
    if(isset($errArray)){
        if(count($errArray)==0){
            echo "good"; 
             storeData($link,$title,$content,$url,$publishedAt,$categoryArray,$image);
        }
        else{
            foreach($errArray as $error){
                echo "Error: $error<br>";
            }
        
        }
    }

    
 
 function storeData($link,$title,$content,$url,$publishedAt,$categoryArray,$image){
    //image setting
    $serialize=serialize($categoryArray);
    // insert data into db
        $insertQue="INSERT INTO blog_post(uid,title,url,content,category,image,published_at) VALUES('$_SESSION[uid]','$title','$url','$content','$serialize','$image','$publishedAt')";
        if($exeQue=mysqli_query($link,$insertQue)){
            header("location:home.php");
        }else{
            echo "Errrorrr storing data, error: ".mysqli_error($link)." ErrorCode: ".mysqli_errno($link);
        };
        

 }
 
    ?>
<script src="./js/addPost.js"></script>
</body>
</html>