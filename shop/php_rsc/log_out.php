<?php

session_start();

require_once '../db_rush00/connection.php';
$db = mysqli_connect($host, $user, $password, $database);

function del_user($db, $login) {
	mysqli_query($db, "DELETE from users WHERE login='$login'");
}

if ($_POST["submit"] === "Delete" && $_SESSION['login'] && $_SESSION['login'] != "admin") {
	del_user($db, $_SESSION['login']);
}

unset($_SESSION);
session_destroy();
header("Location: http://localhost:8100");
?>