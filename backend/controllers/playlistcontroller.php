<?php
if(isset($_GET['act']))
{
	$ctrl 	= $_GET['controller'];
	$id		= isset($_GET['id'])?$_GET['id']:0;
	include_once("models/".$ctrl.".php");
	include_once("models/user.php");
	include_once("models/category.php");
	$pl		= new Playlist();

	switch ($_GET['act']) 
	{
		case 'showall':
		$listplaylist		= $pl->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;

		case 'detail':
		$id 				= $_GET['id'];
		$row  				= $pl->getById($id);
		include_once "views/".$ctrl."/detail.php";
		break;

		case 'add':
		$us 				= new User();
		$ca 				= new Category();
		$users 				= $us->getAll();
		$categories 		= $ca->getAll();
		include_once "views/".$ctrl."/create.php";
		break;

		case 'insert':				
		$name				= $_POST['playlistname'];
		$viewno 			= $_POST['viewno'];
		$userid				= $_POST['userid'];
		$categoryid			= $_POST['categoryid'];
		if($pl->checkExistName($name)>0)
		{
			$_GET['error']	= "Playlist đã có rồi !";
			include_once "views/".$ctrl."/create.php";
		}else
		{
			$pl->insert([$name,$viewno,$userid,$categoryid]);
			$listplaylist	= $pl->getAll();
			include_once "views/".$ctrl."/showall.php";
		}
		break;

		case 'edit':
		$us 				= new User();
		$ca 				= new Category();
		$users 				= $us->getAll();
		$categories 		= $ca->getAll();
		$id 				= $_GET['id'];
		$row				= $pl->getById($id);
		include_once "views/".$ctrl."/edit.php";
		break;

		case 'update':
		$id 				= $_POST['playlistid'];
		$name				= $_POST['playlistname'];
		$viewno 			= $_POST['viewno'];
		$userid				= $_POST['userid'];
		$categoryid			= $_POST['categoryid'];
		if($pl->checkExistNameId($name,$id)>0)
		{
			$_GET['error']	= "Ca sĩ này đã có rồi !";
			$row 			= ["playlistid"=>$id,"playlistname"=>$name,"viewno"=>$viewno,"userid"=>$userid,"categoryid"=>$categoryid];
			include_once "views/".$ctrl."/edit.php";
		}else
		{
			$pl->update([$name,$viewno,$userid,$categoryid,$id]);
			$listplaylist	= $pl->getAll();
			include_once "views/".$ctrl."/showall.php";
		}			
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
		$pl->delete($id);
		$listplaylist		= $pl->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;	


		default:
				# code...
		break;
	}
}

?>