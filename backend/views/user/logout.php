<?php 
	session_start();
	$_SESSION['userid']=null;
	$_SESSION['fullname']=null;
	$_SESSION['picture']=null;
	header('location:login.php');
?>