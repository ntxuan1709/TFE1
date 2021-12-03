<?php
include_once "home/models/categoryModel.php";
$category = new Category();
switch ($_GET['act']) {
	case 'showAll':
		$categoryName = $_GET['categoryName'];
		$id = $category->getIdByNameCategory($_GET['categoryName']);
		$idChill = $category->getCategoryChildrent($id[0]['category_id']);
		$strId = null;
		if (isset($idChill)) {
			$max = count($idChill);
			for ($i = 0; $i < $max; $i++) {
				$strId = $strId . $idChill[$i]['category_id'];
				if ($i == $max - 1) {
				} else {
					$strId = $strId . ", ";
				}
			}
			$listCategory = $category->getListNewView($strId);
		} else {
			$listCategory = $category->getListNewView($id[0]['category_id']);
		}
		if (isset($listCategory)) {
			include_once "home/views/categories/" . $_GET['categoryName'] . ".php";
		} else {
			include_once "home/views/home/notfound.php";
		}
		break;

	case 'category_new':
		if (isset($_GET['categoryName'])) {
			$id = $category->getIdByNameCategory($_GET['categoryName']);
			$listCategoryNew = $category->getListByCategory($id[0]['category_id'], $_GET['id']);
		} else {
			$listCategoryNew = $category->getListByCategory(NULL, $_GET['id']);
		}
		if (isset($listCategoryNew)) {
			include_once "home/views/news/news.php";
		} else {
			include_once "home/views/home/notfound.php";
		}
		break;

	case 'notfound':
		include_once "home/views/home/notfound.php";
		break;

	default:
		break;
}
