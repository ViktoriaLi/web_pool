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
        <p class="category_title">Training</p>
        <div class="products">
          
          <?php

    $servername = "localhost";
    $username = "root";
    $password = "20081991";
    $dbname = "bd_rush00";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT  * from products WHERE category = 'Training'";
    $result = mysqli_query($conn, $sql);          

while($row = mysqli_fetch_array($result))
  {
      $id = $row['id'];
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
                  <div class="add_to_basket"><form method="get" action="add_basket.php"><input class="buy" name="<?php echo $row['id'] ?>" type = "submit" value="Add to basket"</input></form></div>
                 </div>
            </div>
          </div>
    <?php }
?>
        </div>
      </div>
    </main>
	<?php require_once("footer.html"); ?>
  </body>

