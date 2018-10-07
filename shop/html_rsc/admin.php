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
        <p class="category_title">You can edit products and users</p>
        <div class="adm_buttons">
           <span>
              <a href="../php_rsc/admin_products.php"><button>Edit products</button></a>
          </span>


        <span>
              <a href="../php_rsc/admin_users.php"><button>Edit users</button></a>
          </span>
        </div>
    </div>
</main>

<?php require_once("footer.html"); ?>

</body>

