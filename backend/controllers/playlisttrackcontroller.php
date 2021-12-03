<?php
	if(isset($_GET['act']))
	{
		$ctrl 	= $_GET['controller'];
		$id		= isset($_GET['id'])?$_GET['id']:0;
		include_once "models/".$ctrl.".php";
		include_once("models/playlist.php");
		include_once("models/track.php");
		$plt		= new Playlisttrack();

		switch ($_GET['act']) 
		{
			case 'showall':
				$playlisttrack	= $plt->getAll();
				include_once "views/".$ctrl."/showall.php";
				break;

			case 'add':
				$pl 				= new Playlist();
				$tr 				= new Track();
				$playlists			= $pl->getAll();
				$tracks				= $tr->getAll();
				include_once "views/".$ctrl."/create.php";
				break;

			case 'insert':
				$playlistid			= $_POST['playlistid'];
				$trackid			= $_POST['trackid'];

				$plt->insert([$playlistid,$trackid]);
				$playlisttrack	= $plt->getAll();
				include_once "views/".$ctrl."/showall.php";
				break;

			case 'edit':
				$pl 				= new Playlist();
				$tr 				= new Track();
				$playlist 			= $pl->getAll();
				$track 				= $tr->getAll();
				include_once "views/".$ctrl."/edit.php";
				break;
				break;

			case 'update':
				$playlistid 	= $_POST['playlistid'];
				$playlistname	= $_POST['playlistname'];
				$userid			= $_POST['userid'];
				$categoryid		= $_POST['categoryid'];

				$pl->update([$playlistid,$playlistname,$userid,$categoryid]);
				$playlisttrack	= $pl->getAll();
				include_once "views/".$ctrl."/showall.php";
				break;

			case 'delete':
				$playlist 		= $pl->delete($id);
				$playlisttrack	= $pl->getAll();
				include_once "views/".$ctrl."/showall.php";
				break;
			
			default:
				# code...
				break;
		}
	}

?>