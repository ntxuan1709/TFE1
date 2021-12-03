<?php
include_once "home/models/categoryModel.php";
$category = new Category();
switch ($_GET['act']) {
	case 'showAll':
		// list menu
		$id = $category->getIdByNameCategory($_GET['controller']);
		$listSmartphone = $category->getListByCategory($id[0]['category_id']);
		include_once "home/views/categories/" . $_GET['controller'] . ".php";
		break;

	case 'notfound':
		include_once "home/views/" . $_GET['controller'] . "/notfound.php";
		break;

	default:
		break;
}
