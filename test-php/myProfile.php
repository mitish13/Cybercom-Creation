<?php 
session_start();
require('header.php');

if(!isset($_SESSION['login'])){
    if(!$_SESSION['login']){
        header("location:login.php");
    }
}
?>