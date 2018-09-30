<html>
<body>
	<form method="post" action="members_only.php">
		Login: <input type="text" name="login"><br>
		Password: <input type="text" name="password"><br>
	<input type="submit">
</form>

<?php
	if ($_POST["login"] == "zaz" && $_POST["password"] == "jaimelespetitsponeys")
	{
		$file = file_get_contents('../img/42.png');
    	echo "<html><body>\nBonjour Zaz<br />\n<img src='data:image/jpeg;base64,".base64_encode($file)."'>\n</body></html>\n";
	}
	else
	{
		header('HTTP/1.0 401 Unauthorized');
        header('WWW-Authenticate: Basic realm=\'\'Espace membrdes\'\'');
        echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
	}
?>
</body>
</html>
