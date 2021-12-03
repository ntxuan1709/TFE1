<?php
include_once "home/models/homeModel.php";
switch ($_GET['act']) {
	case 'showAll':
		$menu 	= new Menu();
		// list menu
		$listMenu = $menu->getListAll();

		include_once "home/views/" . $_GET['controller'] . "/home.php";
		break;

	case 'search':
		// $tr = new Track();
		// $ar = new Artist();


		// $title = $_POST['title'];
		// $title = str_replace('/[^0-9]/', '', $title);
		// $tracks = $tr->search('%'.$title.'%');
		// $artists = $ar->search('%'.$title.'%');


		// include_once "home/views/".$_GET['controller']."/result.php";
		break;

	case 'notfound':
		include_once "home/views/" . $_GET['controller'] . "/notfound.php";
		break;

	default:
		break;
}
