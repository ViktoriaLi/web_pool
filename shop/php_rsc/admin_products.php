<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../html_rsc/index.css">
    <title>Shop</title>
</head>
<body>
	<form action="../html_rsc/admin.php">
		<input type="submit" name="back" value="Go to website">
	</form>
</body>
<?php

require '../db_rush00/connection.php';

$db = mysqli_connect($host, $user, $password, $database);
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT DISTINCT * from products ";
$result = mysqli_query($db, $sql);

while($row = mysqli_fetch_array($result))
{
	?>
	<div class="pr_item-outer">
		<div class="pr_item">
			<div class="pr_text">

				<h3><?php echo $row["prod_name"];?></h3>
				<h4>Category: <?php echo $row["category"];?></h4>
			</div>
			<img src="<?php echo $row["foto"]; ?>" alt ="box" width="" height="150">
			<div class="pr_text">
				<form method="get" action="change_products.php">
				<p><small>Price: <?php echo $row["price"];?> UAH</small>
					<input type="text" name="price" value="<?php echo $row["price"];?>">
				</p>
				<p><small>Products left: <?php echo $row["quantity"];?></small>
					<input type="text" name="quantity" value="<?php echo $row["quantity"];?>">
				</p>
				<input class="buy" name="<?php echo $row['id'];?>" type = "submit" value="Сonfirm">
				</form>
			</div>
		</div>
	</div>
<?php }
?>

?>