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
$sql = "SELECT DISTINCT * from users ";
$result = mysqli_query($db, $sql);

while($row = mysqli_fetch_array($result))
{

?>
<div class="pr_item-outer">
	<div class="pr_item">
			Login: <?php echo $row["password"];?>
		<div class="pr_text">
			Password: <?php echo $row["password"];?><br>
			Status: <?php echo $row["status"];?><br>
			<form method="get" action="rm_user.php"><input class="buy" name="<?php echo $row['id'];?>" type = "submit" value="Remove user"></form>
		</div>
	</div>
</div>

<?php }
?>