<?php 
if(isset($_GET['act']))
{
	$ctrl 	= $_GET['controller'];
	$id 	= isset($_GET['id'])?$_GET['id']:0;
	include_once "models/".$ctrl.".php";
	$ca 	= new Category();

	switch ($_GET['act']) 
	{
		case 'showall':
		$listcategory		= $ca->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;

		case 'add':
		include_once("views/".$ctrl."/create.php");
		break;

		case 'insert':
		$name				= $_POST['categoryname'];
		$viewno 			= $_POST['viewno'];
		if($ca->checkExistName($name)>0)
		{
			$_GET['error']	= "Loại này đã có rồi !";
			include_once "views/".$ctrl."/create.php";
		}else
		{
			$ca->insert([$name,$viewno]);
			$listcategory	= $ca->getAll();
			include_once "views/".$ctrl."/showall.php";
		}
		break;

		case 'edit':
		$id 				= $_GET['id'];
		$row  				= $ca->getById($id);
		include_once("views/".$ctrl."/edit.php");
		break;

		case 'update':
		$id 				= $_POST['categoryid'];
		$name				= $_POST['categoryname'];
		$viewno 			= $_POST['viewno'];
		if($ca->checkExistNameId($name,$id)>0)
		{
			$_GET['error']	= "Loại này đã có rồi !";
			$row 			= ["categoryid"=>$id,"categoryname"=>$name,"viewno"=>$viewno];
			include_once "views/".$ctrl."/edit.php";
		}else
		{
			$ca->update([$name,$viewno,$id]);
			$listcategory	= $ca->getAll();
			include_once "views/".$ctrl."/showall.php";
		}				
		break;

		case 'delete':
		$id 				= $_GET['id'];
		if($ca->validateRelation($id)>0)
		{
			$listcategory	= $ca->getAll();
			$GET['error']	= "Loại này đang có tracks không xóa được";
			include_once "views/".$ctrl."/showall.php";
		}else
		{
			$ca->delete($id);
			$listcategory	= $ca->getAll();
			include_once "views/".$ctrl."/showall.php";
		}
		break;			
		
		default:
				# code...
		break;
	}
}
?>