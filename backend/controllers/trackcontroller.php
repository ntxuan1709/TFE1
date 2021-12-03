<?php
if(isset($_GET['act']))
{
	$ctrl 	= $_GET['controller'];
	$id 	= isset($_GET['id'])?$_GET['id']:'0';
	include_once("models/".$ctrl.".php");
	include_once("models/category.php");
	include_once("models/composer.php");
	$tr		= new Track();

	switch ($_GET['act']) 
	{
		case 'showall':
		$listtrack			= $tr->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;

		case 'detail':
		$id 				= $_GET['id'];
		$row  				= $tr->getById($id);
		include_once "views/".$ctrl."/detail.php";
		break;				

		case 'add':
		$ca 				= new Category();
		$co 				= new Composer();
		$categories			= $ca->getAll();
		$composers			= $co->getAll();
		include_once "views/".$ctrl."/create.php";
		break;

		case 'insert':
		$name				= $_POST['trackname'];
		$picture			= $_POST['picture'];
		$url				= $_POST['url'];
		$during				= $_POST['during'];
		$description		= $_POST['description'];
		$viewno 			= $_POST['viewno'];
		$composerid			= $_POST['composerid'];
		$categoryid			= $_POST['categoryid'];
		if($tr->checkExistName($name)>0)
		{
			$_GET['error']	= "Bài nhạc đã có rồi !";
			include_once "views/".$ctrl."/create.php";
		}else
		{
			$tr->insert([$name,$picture,$url,$during,$description,$viewno,$composerid,$categoryid]);
			$listtrack		= $tr->getAll();
			include_once "views/".$ctrl."/showall.php";
		}
		break;

		case 'edit':
		$ca 				= new Category();
		$co 				= new Composer();
		$categories			= $ca->getAll();
		$composers			= $co->getAll();
		$id 				= $_GET['id'];
		$row  				= $tr->getById($id);
		include_once "views/".$ctrl."/edit.php";
		break;

		case 'update':
		$id 				= $_POST['trackid'];
		$name				= $_POST['trackname'];
		$picture			= $_POST['picture'];
		$url				= $_POST['url'];
		$during				= $_POST['during'];
		$description		= $_POST['description'];
		$viewno  			= $_POST['viewno'];
		$composerid			= $_POST['composerid'];
		$categoryid			= $_POST['categoryid'];
		if($tr->checkExistNameId($name,$id)>0)
		{
			$_GET['error']	= "Bài hát này đã có rồi !";
			$row 			= ["trackid"=>$id,"trackname"=>$name,"picture"=>$picture,"url"=>$url,"during"=>$during,"description"=>$description,"viewno"=>$viewno,"composerid"=>$composerid,"categoryid"=>$categoryid];
			include_once "views/".$ctrl."/edit.php";
		}else
		{
			$tr->update([$name,$picture,$url,$during,$description,$viewno,$composerid,$categoryid,$id]);
			$listtrack		= $tr->getAll();
			include_once "views/".$ctrl."/showall.php";
		}			
		break;

		case 'delete':
		$id 				= $_GET['id'];
		$tr->delete($id);
		$listtrack			= $tr->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;				

		default:
				# code...
		break;
	}
}



?>