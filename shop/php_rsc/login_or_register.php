<?php
session_start();

require_once '../db_rush00/connection.php';

function log_in($db, $login, $pass)
{
	$result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'");
	$myrow = mysqli_fetch_array($result);
	if (empty($myrow['password'])) {
		echo "User does not exist";
		return FALSE;
	}
	if ($myrow['password'] == $pass) {
		$_SESSION['login'] = $myrow['login'];
		if ($login === "admin")
			header("Location: http://localhost:8100/html_rsc/admin.php");
		else
			header("Location: http://localhost:8100/index.php");
		return TRUE;
	}
	else {
		echo 'Incorrect password';
		return FALSE;
	}
}

function register($db, $login, $pass) {
	$result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'");
	$myrow = mysqli_fetch_array($result);
	if (empty($myrow['id'])) {
		mysqli_query($db, "INSERT INTO users VALUES (NULL, '$login', '$pass', '1')");
		header("Location: http://localhost:8100/index.php");
		return TRUE;
	}
	else {
		echo 'Login already exists';
		return FALSE;
	}
}

$db = mysqli_connect($host, $user, $password, $database);
if (!$_POST["submit"] || !$_POST["login"] || !$_POST["password"])
	echo "Enter login and password";
elseif ($_POST["submit"] === "Log in" && $_POST["login"] && $_POST["password"]) {
	log_in($db, $_POST["login"], $_POST["password"]);
}
elseif ($_POST["submit"] === "Registration" && $_POST["login"] && $_POST["password"]) {
	register($db, $_POST["login"], $_POST["password"]);
}

?>