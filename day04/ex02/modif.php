<?php
	if ($_POST['submit'] === "OK" && $_POST['login'] && $_POST['passwd']){
		if (!file_exists("../private"))
			mkdir("../private/", 0777);
		if (!file_exists("../private"))
			file_put_contents("../private/passwd", 0777);
		else
			$uns_file = unserialize("../private/passwd");
		if (array_search($_POST['login'], $uns_file))
			echo "ERROR\n";
		else
		{
			$new['login'] = $_POST['login'];
            $new['passwd'] = hash('whirlpool', $_POST['passwd']);
            $uns_file[] = $new;
            file_put_contents('../private/passwd', serialize($uns_file));
            echo "OK\n";
		}
    }
    else
    	echo "ERROR\n";
?>
