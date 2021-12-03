<?php
include_once "home/models/feedbackModel.php";
$feedback = new Feedback;
switch ($_GET['act']) {
	case 'showAll':
		include_once "home/views/home/" . $_GET['controller'] . ".php";
		break;

	case 'insert':
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		$vote = $_POST['vote'];
		$menu_id = $_POST['menu_id'];
		$feedback->insert([$name, $email, $phone, $message, $vote,$menu_id]);
		include_once "?controller=home&act=showAll&lang=" . $_SESSION['lang'];

		break;

	case 'notfound':
		include_once "home/views/" . $_GET['controller'] . "/notfound.php";
		break;

	default:
		break;
}
