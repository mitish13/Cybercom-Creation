<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="php-test";

if($link=mysqli_connect($servername,$username,$password,$dbname)){
   
     $tableQue="CREATE TABLE IF NOT EXISTS user(
        id int PRIMARY KEY AUTO_INCREMENT,
        prefix tinyint,
        -- mr: 0 and ms:1 
        firstname varchar(255),
        lastname varchar(255),
        mobile varchar(255),
        email varchar(255),
        passwordhash varchar(255),
        lastLoginAt datetime,
        information varchar(255),
        createdAt timestamp NOT NULL DEFAULT NOW(),
        updatedAt datetime DEFAULT NOW()

    )";
    if(!$exeQue=mysqli_query($link,$tableQue)){
        die("Error table creation".mysqli_error($link).mysqli_errno($link));

    }
}



?>