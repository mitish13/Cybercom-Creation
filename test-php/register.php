<?php 
require ('./database/connection_register.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="./css//form_style.css">
</head>
<body>
    <noscript>
        script disabled
    </noscript>
<form action="register.php" method="POST" id="registerform">
        <h1>Register</h1>
        <label for="prefix">Prefix</label> 
        <select name="prefix" id="prefix">
            <option value="mr">Mr.</option>
            <option value="ms">Ms.</option>
        </select>
           
        <br>
        <div class="formField"> <label for="fname">First Name: </label>  <input id="fname" type="text" name="fname"></div> <br>
        <div class="formField"> <label for="lname">Last Name: </label>  <input id="lname" type="text" name="lname"></div> <br>
        <div class="formField"> <label for="email">Email: </label>  <input id="email" type="email" name="email"></div> <br>
        <div class="formField"> <label for="mobile">Mobile Number: </label>  <input id="mobile" type="tel" name="mobile"></div> <br>
        <div class="formField"> <label for="password">Password: </label>  <input id="password" type="password" name="password"></div> <br>
        <div class="formField"> <label for="cpassword">Confirm Password: </label>  <input id="cpassword" type="password" name="cpassword"></div> <br>
        <div class="formField"> <label for="information">Information: </label> <textarea name="information" id="information" cols="30" rows="10"></textarea></div> <br>

        <div class="formField"> <input type="checkbox" name="checkbox" id="checkbox">Hereby, I accept terms and conditions</div> <br>

        <button name='submit'>Submit</button> <br>
 
     </form>
     <script src="./js/register.js"></script>
<!-- php validation -->
<?php 
if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $information=$_POST['information'];
        $checkbox=isset($_POST['checkbox'])?$_POST['checkbox']:"";

        echo "$checkbox";
        $errArray=array();

        //name validation
        if($_POST['prefix']=="ms"){
            $prefix=1;
        }
        else{
            $prefix=0;
        }

        if(strlen($fname)==0){
            array_push($errArray,"First name can't be empty");            
        }

        else{
             if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
            array_push($errArray,"First name is invalid");
        }
        }
        if(strlen($lname)==0){
            array_push($errArray,"Last name can't be empty");            
        }

        else{
             if(!preg_match("/^[a-zA-Z-' ]*$/",$lname)){
            array_push($errArray,"Last name is invalid");
        }
        }
        
        
        //email validation;
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                array_push($errArray,"Email is invalid");
         }else {
            $checkemailQue="SELECT * from user where email='$email' ";
            $result=mysqli_query($link,$checkemailQue);
            if(mysqli_num_rows($result)>0){
                array_push($errArray,"Email is already exist");
                
            } 
              
         }
            
         //Mobile number validation
         if(!preg_match('/^[0-9]{10}+$/',$mobile)){
                    array_push($errArray,"Mobile number is invalid");
        }
                
         //password validation
         if(strlen($password)<6){
            array_push($errArray,"Password can't be lesser than 6 characters");            
        }  

        //confirm password validation
        if($password!==$cpassword){
            array_push($errArray,"Password is not matching");            

        }
        else{
            $passwordHash=password_hash($password,PASSWORD_BCRYPT);
        }
        
        if(strlen($information)==0){
            array_push($errArray,"Information can't be empty");            

        }
        
        if(!$checkbox){
            array_push($errArray,"Please check the box to proceed");            

        }
    }
    if(isset($errArray)){
        if(count($errArray)==0){
                storeData($link,$prefix,$fname,$lname,$mobile,$email,$passwordHash,$information);
        }
        else{
            foreach($errArray as $error){
                echo "Error: $error<br>";
            }
        
        }
    }

    
 
 function storeData($link,$prefix,$fname,$lname,$mobile,$email,$passwordHash,$information){

    
    // insert data into db
        $insertQue="INSERT INTO user(prefix,firstname,lastname,mobile,email,passwordhash,information) VALUES('$prefix','$fname','$lname','$mobile','$email','$passwordHash','$information')";
        if($exeQue=mysqli_query($link,$insertQue)){
            header("location:login.php");

        }else{
            echo "Errrorrr storing data, error: ".mysqli_error($link)." ErrorCode: ".mysqli_errno($link);
        };
        

 }
    
    ?>

</body>
</html>