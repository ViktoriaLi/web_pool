<?php

session_start();
require_once 'db_rush00/connection.php';
require_once "install.php";

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="html_rsc/index.css">
    <title>Shop</title>
 </head>
 <body>

 <?php
if (!isset($_SESSION['login']))
	$_SESSION['login'] = "";
 if (!($_SESSION['login'])) {

	 require_once("html_rsc/main_header.php");
 }
 else {
	 require_once("html_rsc/login_header.php");
 }

	require_once("html_rsc/main.html");
	require_once("html_rsc/footer.html");
?>
 </body>