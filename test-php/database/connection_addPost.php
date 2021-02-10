<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="php-test";

if($link=mysqli_connect($servername,$username,$password,$dbname)){
   
     $tableQue="CREATE TABLE IF NOT EXISTS blog_post(
        id int PRIMARY KEY AUTO_INCREMENT,
        uid int,
        title varchar(255),
        url varchar(255),
        content varchar(255),
        category varchar(255),
        image LONGBLOB,
        published_at datetime,
        created_at timestamp default now(),
        updated_at timestamp default now(),
        FOREIGN KEY (uid) REFERENCES user(id)
    )";
    if(!$exeQue=mysqli_query($link,$tableQue)){
        die("Error table creation".mysqli_error($link).mysqli_errno($link));

    }
}



?>