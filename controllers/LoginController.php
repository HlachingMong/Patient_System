<?php 

session_start();

require "../model/User.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$username = sanitize($_POST['username']);
	$password = sanitize($_POST['password']);

	if (empty($username) or empty($password)) {
		$_SESSION['msg'] = "Please fill up the form properly";
		header("Location: ../views/login.php");
		exit();
	}
	else {
		$isValid = login($username, $password);

		if ($isValid) {
			header("Location: ../views/home.php");
		}
		else {
			$_SESSION['msg'] = "You have a problem with your id and password";
			header("Location: ../views/login.php");
		}
	}
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}