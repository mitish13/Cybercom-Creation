<?php 
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$ip_blocked = array('127.0.0.1','121.121.121.121','::1');

	$host = $_SERVER['HTTP_HOST'];
	$request_type = $_SERVER['REQUEST_SCHEME'];
	$images = $request_type.'://'.$host.'/CyberCom Practice Folder/CybercomCreation-Html/Practice/2021-01-08/Image/';
?>