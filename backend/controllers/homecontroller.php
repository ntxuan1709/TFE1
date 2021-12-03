<?php
include_once "models/home.php";
include_once "models/trackartist.php";
include_once "models/composer.php";
include_once "models/artist.php";
include_once "models/user.php";
include_once "models/playlisttrack.php";
switch ($_GET['act']) {

	case 'static':
	$trar = new trackartist();
	$trpl = new playlisttrack();
	$us   = new user();


	$totalpl = $trpl->getTotalPlaylistTrack(['total']);
	$totaltr = $trar->getTotalTrackArist(['total']);
	$totalus = $us->getTotalUser(['total']);
	include_once "views/".$_GET['controller']."/static.php";
	break;
		
	case 'notfound':
	include_once "views/".$_GET['controller']."/notfound.php";
	break;		
	default:
			# code...
	break;
}

?>