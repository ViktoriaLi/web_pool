<header class="header">
    <div class="main_title">
        <h1>Welcome to sport equipment online-shop</h1>
    </div>
    <nav class="nav">
    <div class="title">
        <ul>
            <li><a href="../index.php">Main</a></li>
            <li><a href="sportwear.php">Sportwear</a></li>
            <li><a href="tourism.php">Tourism</a></li>
            <li><a href="training.php">Training</a></li>
			<?php if ($_SESSION['login'] === "admin") {?> <li><a href="admin.php">Settings</a></li><?php } ?>
        </ul>
        <form action="../php_rsc/log_out.php" method="post" class="auth">
        Welcome, dear <?php echo ($_SESSION['login']) ?> <input type="submit" name="submit" value="LOGOUT">
            <input type="submit" name="submit" value="Delete">
         <a href="basket.php"><img src="../resource/basket.png" alt ="box" width="" height=25px></a>
        </form>
    </div>
</nav>
</header>
