<?php
if(isset($_GET['act']))
{
	include_once("models/".$_GET['controller'].".php");
	$u = new User();
	switch ($_GET['act']) {
		case 'showall':
		$listuser 	= $u->getAll();
		include_once "views/".$_GET['controller']."/showall.php";
		break;
		case 'details':
		$row 		= $u->getById($_GET['userid']);
		include_once "views/".$_GET['controller']."/details.php";
		break;
		default:
				# code...
		break;
	}
}


?>