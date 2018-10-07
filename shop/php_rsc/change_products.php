<?php

require_once "../db_rush00/connection.php";
$db = mysqli_connect($host, $user, $password, $database);

var_dump($_GET);

if (is_numeric($_GET['price']) && is_numeric($_GET['quantity']) && $_GET['price'] > 0 && $_GET['price'] < 100000 && $_GET['quantity'] > 0 && $_GET['quantity']) {
	$sql = "SELECT DISTINCT * from products ";
	$result = mysqli_query($db, $sql);

	var_dump($_GET);

	foreach (array_keys($_GET) as $key)
		$id = $key;
	$price = $_GET['price'];
	$quantity = $_GET['quantity'];
	$sql = "UPDATE products SET price='$price' WHERE id='$id'";
	mysqli_query($db, $sql);
	$sql = "UPDATE products SET quantity='$quantity' WHERE id='$id'";
	mysqli_query($db, $sql);
}

header("Location: http://localhost:8100/php_rsc/admin_products.php");

?>