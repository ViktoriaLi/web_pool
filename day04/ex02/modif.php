<?php
	if ($_POST['submit'] === "OK" && $_POST['login'] && $_POST['oldpw']  && $_POST['newpw'])
	{
		$uns_file = unserialize(file_get_contents("../private/passwd"));
        if (!$uns_file)
        {
            echo "ERROR\n";
            return 0;
        }
		foreach ($uns_file as $key => $value) 
		{
            if ($value['login'] === $_POST['login'] && $value['passwd'] === hash('whirlpool', $_POST['oldpw']))
            {
            	$uns_file[$key]['passwd']  = hash('whirlpool', $_POST['newpw']);
            	file_put_contents('../private/passwd', serialize($uns_file));
            	echo "OK\n";
            	return 0;
            }
        }
        echo "ERROR\n";
        return 0;

         
    }
    else
    	echo "ERROR\n";
?>
