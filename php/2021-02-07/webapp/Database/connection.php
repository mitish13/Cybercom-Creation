<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="CRUD-webapp";

if($link=mysqli_connect($servername,$username,$password,$dbname)){
   
     $tableQue="CREATE TABLE IF NOT EXISTS user(
        id int PRIMARY KEY AUTO_INCREMENT,
        Name varchar(255),
        Email varchar(255),
        Phone varchar(255),
        Title varchar(255),
        Created timestamp NOT NULL DEFAULT NOW()
    )";
    if(!$exeQue=mysqli_query($link,$tableQue)){
        echo "Error table creation".mysqli_error($link).mysqli_errno($link);

    }
}



?>