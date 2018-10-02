#!/usr/bin/php
<?php
	function my_cmp($str1, $str2)
	{
		$a_low = strtolower($str1);
		$b_low = strtolower($str2);
		$i = 0;
		while (($i < strlen($str1)) && ($i < strlen($str2)))
		{
			if ($a_low[$i] != $b_low[$i])
			{
				if ($a_low[$i] >= 'a' && $a_low[$i] <= 'z')
					return (-1);
				if ($a_low[$i] >= '0' && $a_low[$i] <= '9' && $b_low[$i] >= 'a' && $b_low[$i] <= 'z')
					return (1);
				else if ($a_low[$i] >= '0' && $a_low[$i] <= '9')
					return (-1);
				else if (($a_low[$i] < '0' || ($a_low[$i] > '9' && $a_low[$i] < 'A') || ($a_low[$i] > 'Z' && $a_low[$i] < 'a') || $a_low[$i] > 'z') &&
					($b_low[$i] < '0' || ($b_low[$i] > '9' && $b_low[$i] < 'A') || ($b_low[$i] > 'Z' && $b_low[$i] < 'a') || $b_low[$i] > 'z'))
				{
					if (ord($a_low[$i]) < ord($b_low[$i]))
						return (-1);
					else
						return (1);
				}
				else
					return (1);
			}
			$i++;
		}
	}

	if ($argc > 1)
	{
		for($i = 1; $i < $argc; $i++)
		{
			$str = trim($argv[$i]);
			$str = str_word_count($str, 1, "!@#$%^*()-_=+\|'?/.,%6012345789:;<>");
			if ($i == 1)
				$all_arr = $str;
			else
			{
				foreach ($str as $add) {
					array_push($all_arr, $add);
				}
				
			}
		}
		$len = count($all_arr);
		sort($all_arr, SORT_FLAG_CASE | SORT_STRING);
		$j = 0;
		foreach ($all_arr as $str) {
			$all_arr[$j++] = $str;
		}
		$j = 0;
		foreach ($all_arr as $str) {
			if ($str[0] < 'A' || ($str[0] > 'Z' && $str[0] < 'a') || $str[0] > 'z' )
				array_push($all_arr, array_shift ($all_arr));
		}
		foreach ($all_arr as $str) {
			if ($str[0] < '0' || ($str[0] > '9' && $str[0] < 'A') || ($str[0] > 'Z' && $str[0] < 'a') || $str[0] > 'z')
				{
					array_push($all_arr, $str);
					unset( $all_arr[array_search($str, $all_arr)] );}
		}
		usort($all_arr, "my_cmp");

		foreach ($all_arr as $print) {
			echo "$print\n";
		}
	}
?>
