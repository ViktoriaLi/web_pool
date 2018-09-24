<?php
	if ($argc > 1)
	{
		for($i = 1; $i < $argc; $i++)
		{
			$str = trim($argv[$i]);
			$str = str_word_count($str, 1, "!@#$%^*()-_=+\|'?/.,%6:;<>");
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
		sort($all_arr);
		$j = 0;
		foreach ($all_arr as $str) {
			$all_arr[$j++] = $str;
		}
		foreach ($all_arr as $print) {
			echo "$print\n";
		}
	}
?>