<?php
	if ($_POST['submit'] == "OK" && $_POST['login'] && $_POST['passwd'])
	{
		if (!file_exists("../private/"))
			mkdir("../private/", 0744);
		if (!file_exists("../private/passwd"))
			file_put_contents("../private/passwd", NULL);
		$uns_file = unserialize(file_get_contents("../private/passwd"));
		if ($uns_file)
		{
			 foreach ($uns_file as $key => $value) {
                if ($value['login'] === $_POST['login'])
                {
                	echo "ERROR1\n";
                	return 0;
                }
            }
		}
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
    	echo "ERROR2\n";
?>
