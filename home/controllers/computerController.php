<?php
include_once "home/models/categoryModel.php";
$category = new Category();
switch ($_GET['act']) {
	case 'showAll':
		// list menu
		$listTechnology = $category->getNewView();

		include_once "home/views/categories/" . $_GET['controller'] . ".php";
		break;

	case 'smartphone':
		$idCategory = isset($_GET['id']) ? $_GET['id'] : false;
		$listSmartphone = $category->getListByCategory($idCategory);
		break;

	case 'notfound':
		include_once "home/views/" . $_GET['controller'] . "/notfound.php";
		break;

	default:
		break;
}
