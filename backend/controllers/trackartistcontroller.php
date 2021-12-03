<?php
if(isset($_GET['act']))
{
	$ctrl 	= $_GET['controller'];
	$id		= isset($_GET['id'])?$_GET['id']:0;	
	include_once "models/".$ctrl.".php";
	include_once("models/artist.php");
	include_once("models/track.php");
	$ta		= new TrackArtist();

	switch ($_GET['act']) 
	{
		case 'showall':
		$listtrackartist	= $ta->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;

		case 'add':
		$ar 				= new Artist();
		$tr 				= new Track();
		$artists			= $ar->getAll();
		$tracks				= $tr->getAll();
		include_once "views/".$ctrl."/create.php";
		break;

		case 'insert':
		$artistid			= $_POST['artistid'];
		$trackid			= $_POST['trackid'];
		$ta->insert([$artistid,$trackid]);
		$listtrackartist	= $ta->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;

		case 'edit':
		$id 				= $_GET['id'];
		$row  				= $ta->getById($id);
		include_once "views/".$ctrl."/edit.php";
		break;

		case 'update':
		$id 				= $_POST['artistid'];
		$trackid			= $_POST['trackid'];
		$ta->update([$trackid,$id]);
		$listartist			= $ta->getAll();
		include_once "views/".$ctrl."/showall.php";			
		break;

		case 'delete':
		$id 				= $_GET['id'];
		$ta->delete($id);
		$listtrackartist	= $ta->getAll();
		include_once "views/".$ctrl."/showall.php";
		break;	

		default:
				# code...
		break;
	}
}

?>