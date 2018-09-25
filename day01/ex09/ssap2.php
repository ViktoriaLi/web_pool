#!/usr/bin/php
<?php
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
		foreach ($all_arr as $print) {
			echo "$print\n";
		}
	}
?>
