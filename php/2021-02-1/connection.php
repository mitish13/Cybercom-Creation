<?php 
$username="root";
$servername="localhost";
$dbname="collage";

@$conn=new mysqli($servername,$username,"",$dbname); //@ is error ignore operator
if($conn->connect_error){ //php has -> in comparation with js . operator
    die("connection failed : ".$conn->connect_error);
}

?>