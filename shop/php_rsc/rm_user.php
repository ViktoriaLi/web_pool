<?php

	require_once "../db_rush00/connection.php";
	$db = mysqli_connect($host, $user, $password, $database);

	//var_dump($_GET);
		foreach(array_keys($_GET) as $key)
			$id = $key;
	if ($id && $id != 1) {
		$sql ="DELETE FROM users WHERE id = '$id'";
		mysqli_query($db, $sql);
	}
	header("Location: http://localhost:8100/php_rsc/admin_users.php");
?>