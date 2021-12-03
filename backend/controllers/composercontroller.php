<?php
if(isset($_GET['act']))
{
	$ctrl 	= $_GET['controller'];
	$id		= isset($_GET['id'])?$_GET['id']:0;
	include_once("models/".$ctrl.".php");
	$co		= new Composer();

	switch ($_GET['act']) 
	{
		case 'showall':
		$listcomposer		= $co->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;

		case 'detail':
		$id 				= $_GET['id'];
		$row  				= $co->getById($id);
		include_once "views/".$ctrl."/detail.php";
		break;

		case 'add':
		include_once "views/".$ctrl."/create.php";
		break;

		case 'insert':
		$name				= $_POST['composername'];
		$picture			= $_POST['picture'];
		$birthday			= $_POST['birthday'];
		$description		= $_POST['description'];
		$viewno 			= $_POST['viewno'];
		if($co->checkExistName($name)>0)
		{
			$_GET['error']	= "nhạc sĩ đã có rồi !";
			include_once "views/".$ctrl."/create.php";
		}else
		{
			$co->insert([$name,$picture,$birthday,$description,$viewno]);
			$listcomposer	= $co->getAll();
			include_once "views/".$ctrl."/showall.php";
		}
		break;

		case 'edit':
		$id 				= $_GET['id'];
		$row  				= $co->getById($id);
		include_once "views/".$ctrl."/edit.php";
		break;

		case 'update':
		$id 				= $_POST['composerid'];
		$name				= $_POST['composername'];
		$picture			= $_POST['picture'];
		$birthday			= $_POST['birthday'];
		$description		= $_POST['description'];
		$viewno 			= $_POST['viewno'];
		if($co->checkExistNameId($name,$id)>0)
		{
			$_GET['error']	= "Nhạc sĩ này đã có rồi !";
			$row 			= ["composerid"=>$id,"composername"=>$name,"picture"=>$picture,"birthday"=>$birthday,"description"=>$description,"viewno"=>$viewno];
			include_once "views/".$ctrl."/edit.php";
		}else
		{
			$co->update([$name,$picture,$birthday,$description,$viewno,$id]);
			$listcomposer	= $co->getAll();
			include_once "views/".$ctrl."/showall.php";
		}			
		break;

		case 'delete':
		$id 				= $_GET['id'];
		$co->delete($id);
		$listcomposer		= $co->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;

		default:
				# code...
		break;
	}
}

?>