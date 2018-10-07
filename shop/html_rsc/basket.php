<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Shop</title>
</head>
<body>

<?php

session_start();
if (!$_SESSION['login'])
  require_once("header.php");
else
  require_once("login_header_other.php");

?>

<main>
    <div class="title">
        <p class="category_title">You have added such items to the basket:</p>
        <div class="products">

      <?php
      session_start();

      $servername = "localhost";
      $username = "root";
      $password = "20081991";
      $dbname = "bd_rush00";
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $sql = "SELECT  * from products";
      $result = mysqli_query($conn, $sql);

      $_SESSION['price'] = 0;
          while($row = mysqli_fetch_array($result))
          {
            $id = $row['id'];
            if(in_array($id,$_SESSION['bas'])) {
            $_SESSION['price'] += $row['price'];
                ?>
                    <div class="pr_item-outer">
                        <div class="pr_item">
                            <div class="pr_text">

                                <h3><?php echo $row["prod_name"];?></h3>
                                <h4>Category: <?php echo $row["category"];?></h4>
                            </div>
                            <img src="<?php echo $row["foto"]; ?>" alt ="box" width="" height="150">
                            <div class="pr_text">
                                <p><small>Price: <?php echo $row["price"];?> UAH</small></p>
                                <p><small>Products left: <?php echo $row["quantity"];?></small></p>
                                <div class="basket"><form method="get" action="basket.php">
                                </form></div>
                            </div>
                        </div>
                    </div>


          <?php }}
          ?>
            </div>
        </div>

    <div class="basket">
      <p>Your order is: <?php echo ($_SESSION['price']) ?></p>
      <form action="buy.php" method="post" >
        <input type="submit" name="submit" value="Make order">
        </form>
    </div>
</main>

<?php require_once("footer.html"); ?>

</body>

