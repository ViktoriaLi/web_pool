<?php
	if ($_GET["action"] === "set")
		setcookie($_GET["name"], $_GET["value"], time() + (60 * 60 * 24 * 30), "/");
	else if ($_GET["action"] === "get" && $_COOKIE[$_GET["name"]])
	{
		echo $_COOKIE[$_GET["name"]];
		echo "\n";
	}
	else if ($_GET["action"] === "del")
		setcookie($_GET["name"], "", time() - 3600);
?>
