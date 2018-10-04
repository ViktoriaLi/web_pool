<?php
	function auth($login, $passwd)
	{
		if (!$login || !$passwd)
			return FALSE;
		$uns_file = unserialize(file_get_contents("../private/passwd"));
		if (!$uns_file)
			return FALSE;
		foreach ($uns_file as $key => $value) 
		{
            if ($value['login'] === $login && $value['passwd'] === hash('whirlpool', $passwd))
            	return TRUE;
        }
        return FALSE;
	}
?>
		