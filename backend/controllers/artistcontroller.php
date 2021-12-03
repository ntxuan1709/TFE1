<?php
if(isset($_GET['act']))
{
	$ctrl 	= $_GET['controller'];
	$id		= isset($_GET['id'])?$_GET['id']:0;	
	include_once "models/".$ctrl.".php";
	$ar		= new Artist();

	switch ($_GET['act']) 
	{
		case 'showall':
		$listartist			= $ar->getBrief();
		include_once "views/".$ctrl."/showall.php";
		break;

		case 'detail':
		$id 				= $_GET['id'];
		$row  				= $ar->getById($id);
		include_once "views/".$ctrl."/detail.php";
		break;

		case 'add':
		include_once "views/".$ctrl."/create.php";
		break;

		case 'insert':
		$name				= $_POST['singername'];
		$picture			= $_POST['picture'];
		$birthday			= $_POST['birthday'];
		$description		= $_POST['description'];
		$viewno 			= $_POST['viewno'];
		if($ar->checkExistName($name)>0)
		{
			$_GET['error']	= "Ca sĩ đã có rồi !";
			include_once "views/".$ctrl."/create.php";
		}else
		{
			$ar->insert([$name,$picture,$birthday,$description,$viewno]);
			$listartist		= $ar->getAll();
			include_once "views/".$ctrl."/showall.php";
		}
		break;

		case 'edit':
		$id 				= $_GET['id'];
		$row  				= $ar->getById($id);
		include_once "views/".$ctrl."/edit.php";
		break;

		case 'update':
		$id 				= $_POST['artistid'];
		$name				= $_POST['singername'];
		$picture			= $_POST['picture'];
		$birthday			= $_POST['birthday'];
		$description		= $_POST['description'];
		$viewno 			= $_POST['viewno'];
		if($ar->checkExistNameId($name,$id)>0)
		{
			$_GET['error']	= "Ca sĩ này đã có rồi !";
			$row 			= ["artistid"=>$id,"singername"=>$name,"picture"=>$picture,"birthday"=>$birthday,"description"=>$description,"viewno"=>$viewno];
			include_once "views/".$ctrl."/edit.php";
		}else
		{
			$ar->update([$name,$picture,$birthday,$description,$viewno,$id]);
			$listartist		= $ar->getAll();
			include_once "views/".$ctrl."/showall.php";
		}			
		break;

		case 'delete':
		$id 				= $_GET['id'];
		$ar->delete($id);
		$listartist			= $ar->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;	

		default:
				# code...
		break;
	}
}

?>