<?php
	if ($_GET["action"] == "set")
	{
		setcookie($_GET["name"], $_GET["value"], time() + (86400 * 30), "/");
	}
	else if ($_GET["action"] == "get")
	{
		if(isset($_COOKIE[$_GET["name"]]))
		{
			echo $_COOKIE[$_GET["name"]];
			echo "\n";
		}
	}
	else if ($_GET["action"] == "del")
	{
		if(!isset($_COOKIE[$_GET["name"]]))
			setcookie($_GET["name"], "", time() - 3600);
	}
?>
