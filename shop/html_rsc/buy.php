<?php
session_start();

if ($_SESSION['login'])
	unset($_SESSION['bas']);
header("Location: ".$_SERVER['HTTP_REFERER']);
?>