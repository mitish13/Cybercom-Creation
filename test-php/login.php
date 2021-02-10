<?php
require ("./database/connection_register.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="./css/form_style.css">
</head>
<body>
<?php 
if(isset($_POST['register'])){
    header("location:register.php");

}

if(isset($_POST['login'])){
    $errArray=array();

    $email=$_POST['email'];
    $password=$_POST['password'];

    $emailCheck="Select * from user where email='$email'";
    $result=mysqli_query($link,$emailCheck);
    if(mysqli_num_rows($result)==0){
        array_push($errArray,"Email not registered");
    }else if(mysqli_num_rows($result)==1){
        //check password
        while($row=mysqli_fetch_assoc($result)){
            if(!password_verify($password,$row['passwordhash'])){
               
            
                array_push($errArray,"password wrong!!");
                
            }
            else{
                //successful login

                if(count($errArray)==0){
                    
                logMeIn($row['id']);
             }
            }
        }
    }
}

function logMeIn($id){
        header("location:home.php");
        $_SESSION['login']=true;
        $_SESSION['uid']=$id;
}

if(isset($errArray)){
    if(count($errArray)>0){
        foreach($errArray as $error){
            echo "Error: $error<br>";
        }
    }
    
}

?>

<form action="login.php" method="POST" id="loginform">
<h1>Login</h1>

        <div class="formField"> <label for="emailUser">Email</label> <br> <input id="emailUser" type="text" placeholder="Enter Email" name="email"></div><br>
        <div class="formField"> <label for="passUser">Password</label> <br> <input id="passUser" type="password" placeholder="Enter password" name="password"></div> <br>
       
        <button name='login'>Login</button> <br>
        <button name="register">Register</button>
 
     </form>
</body>
</html>