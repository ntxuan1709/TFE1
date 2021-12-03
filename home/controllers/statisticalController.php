<?php
include_once "home/models/statisticalModel.php";
switch ($_GET['act']) {
	case 'showAll':
		$category = new Category();
		$listCategory = $category->getListByCategory(NULL,NULL);
		include_once "home/views/home/" . $_GET['controller'] . ".php";

		break;

	case 'notfound':
		include_once "home/views/" . $_GET['controller'] . "/notfound.php";
		break;

	default:
		break;
}
