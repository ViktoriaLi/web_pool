#!/usr/bin/php
<?php

	/*$str = "";
	$file = fopen("/var/log/wtmp",'r');
	$new = fread($file, 100);
	$str .= $new;
	while ($new == TRUE)
	{
		$new = fread($file, 100);
		$str .= $new;
	}
	fclose($file);
	$tmp = $str;
	$data = unpack("a256a/a4b/a32c/id/ie/I2f/a256g/i16h", $str);
	echo "\n";*/
    $file = fopen("/var/run/utmp", "r");
    while ($utmpx = fread($file, 628)){
        $unpack = unpack("cchars/nint", $utmpx);
        $array[$unpack['c']] = $unpack;
    }
    ksort($array);

?>