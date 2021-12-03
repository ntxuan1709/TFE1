<?php 
	session_start();
	require_once "../../libraries/database.php";
	require_once "../../models/user.php";
	//lấy thông tin u và p
	$u=$_POST['username'];
	$p=$_POST['password'];
	if(isset($u) && isset($p))
	{
		$a=new User();
		$user=$a->login($u,$p);
		if($user)
		{
			$_SESSION['userid']=$user['userid'];
			$_SESSION['fullname']=$user['fullname'];
			$_SESSION['picture']=$user['picture'];
			header("location:../../index.php");
		}
		else
		{
			header('location:login.php?error=Đăng nhập sai');
		}
	}else
	{
		header('location:login.php?error=Đăng nhập sai');
	}
?>