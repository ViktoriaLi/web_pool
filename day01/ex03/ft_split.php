<?php
	function ft_split(string $to_spl)
	{
		if (!$to_spl)
			return NULL;
		$arr = str_word_count($to_spl, 1);
		if (!count($arr))
			return NULL;
		natsort($arr);
		$new_arr = NULL;
		$i = 0;
		foreach ($arr as $str) {
			$new_arr[$i++] = $str;
		}
		return $new_arr;
	}