#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$str = trim($argv[1]);
		$str = str_word_count($str, 1, "!@#$%^*()-_=+\|'?/.,%6012345789:;<>");
		array_push($str, array_shift ($str));
		$i = 0;
		$len = count($str);
		foreach ($str as $print) {
			if ($i == $len - 1)
				echo "$print";
			else
				echo "$print ";
			$i++;
		}
		echo "\n";
	}
?>