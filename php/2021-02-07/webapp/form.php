<?php 
require ("./Database/connection.php");
include ("header.php");
session_start();
?>

<?php
if($_GET['action']=='create'){
    $_SESSION['action']='create';

}
elseif($_GET['action']=='update'){
    $_SESSION['action']='update';
    $_SESSION['id']=$_GET['id'];
}

?>
<!-- set default values if user has clicked edit button -->
<?php
    if($_GET['action']=="update"){
    $fetchRecord="SELECT * from user WHERE id='$_SESSION[id]'";
    $values=mysqli_query($link,$fetchRecord);
    if(mysqli_num_rows($values)!=0){
    while($row=mysqli_fetch_assoc($values)){
        $setName=$row['Name'];
        $setEmail=$row['Email'];
        $setPhone=$row['Phone'];
        $setTitle=$row['Title'];
    }
    }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form page</title>
    <link rel="stylesheet" href="./CSS/form_style.css">
</head>
<body>
    <noscript>
        JAVASCRIPT IS BLOCKED
    </noscript>
    <div id="formDiv">
    <?php
    if($_GET['action']=='create'){
        
        ?> 
        <h1>Create Contact</h1>
        <?php
    }
    else{
        //Update action
        ?> 
        <h1>Update Contact </h1>
        <?php  
    }
    ?>
    <form action="form.php" method="POST" id="form">
        
       <div class="formField"> <label for="nameUser">Name</label> <br> <input type="text" id="nameUser" placeholder="Enter Name" name="name" value="<?php if(isset($setName))echo $setName;  ?>"><span>*</span> </div> <br>
       <div class="formField"> <label for="emailUser">Email</label> <br> <input id="emailUser" type="text" placeholder="Enter Email" name="email"  value="<?php if(isset($setEmail))echo $setEmail;  ?>"><span>*</span> </div><br>
       <div class="formField">  <label for="phoneUser">Phone</label><br> <input id="phoneUser" type="tel" placeholder="Enter Mobile Number" name="phone"  value="<?php if(isset($setPhone))echo $setPhone;  ?>"><span>*</span></div> <br>
       <div class="formField"> <label for="titleUser">Title</label> <br> <input id="titleUser" type="text" placeholder="Enter title" name="title"  value="<?php if(isset($setTitle))echo $setTitle;  ?>"><span>*</span></div> <br>
      
       <button name='submit'><?php echo $_GET['action'] ?></button>

    </form>
    </div>

    <?php 


    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $title=$_POST['title'];

        $errArray=array();

        //name validation

        if(strlen($name)==0){
            array_push($errArray,"Name can't be empty");            
        }
        else{
             if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            array_push($errArray,"Name is invalid");
        } 
        }  
            //email validation;
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                array_push($errArray,"Email is invalid");
         }
            
         //phone number validation
         if(!preg_match('/^[0-9]{10}+$/',$phone)){
                    array_push($errArray,"phone number is invalid");
        }
                
         //title validation
         if(strlen($title)==0){
            array_push($errArray,"Title can't be empty");            
        }
        else{
             if(!preg_match("/^[a-zA-Z-' ]*$/",$title)){
            array_push($errArray,"Title is invalid");
        } 
        }      

    }
        
    if(isset($errArray)){
        if(count($errArray)==0){
            storeData($name,$email,$phone,$title,$link);
        }
        else{
            foreach($errArray as $error){
                echo "Error: $error<br>";
            }
        }    
 }  
 function storeData($name,$email,$phone,$title,$link){

    if($_SESSION['action']=='create'){
    // insert data into db
        $insertQue="INSERT INTO user(Name,Email,Phone,Title) VALUES('$name','$email','$phone','$title')";
        if($exeQue=mysqli_query($link,$insertQue)){
            header("location:contact.php?msg='create'");
            $_SESSION['msg']="Record successfully created";
        };
        }
        elseif($_SESSION['action']=='update'){
    //update data
        $updateQue="UPDATE user SET Name='$name',Email='$email',Phone='$phone',Title='$title',Created=NOW() WHERE id='$_SESSION[id]'";
        if($exeQue=mysqli_query($link,$updateQue)){
            header("location:contact.php?msg='update'");
            $_SESSION['msg']="Record updated successfully";

        }else{
            echo mysqli_errno($link).mysqli_error($link);
        }        

         }
         else {
             echo "some big issue";
         }

 }
    
    ?>
    <script src="./JS/form_validation.js"></script>
</body>
</html>