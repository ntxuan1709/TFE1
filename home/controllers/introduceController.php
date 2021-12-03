<?php
include_once "home/models/homeModel.php";
switch ($_GET['act']) {
	case 'showAll':
		$introduce 	= new Introduce();
		// list menu
		$listIntroduce = $introduce->getListAll();

		include_once "home/views/home/" . $_GET['controller'] . ".php";
		break;

	case 'notfound':
		include_once "home/views/" . $_GET['controller'] . "/notfound.php";
		break;

	default:
		break;
}
