#!/usr/bin/php
<?php
	if ($argc > 1 && is_readable($argv[1]))
	{
		$str = "";
		$file = fopen($argv[1],'r');
		$new = fread($file, 100);
		$str .= $new;
		while ($new == TRUE)
		{
			$new = fread($file, 100);
			$str .= $new;
		}
		fclose($file);
		$tmp = $str;
		$len_text = preg_match_all('/(?:\\<a.*\\>(.*)\\<\\/a)/' ,$tmp, $text_matches);
		for ($i = 0; $i < $len_text; $i++)
			$str = str_replace(($text_matches[1][$i]), strtoupper($text_matches[1][$i]), $str);
		$len_text = preg_match_all('/(?:title\\=\\"(.*)\\")/' ,$tmp, $text_matches);
		for ($i = 0; $i < $len_text; $i++)
			$str = str_replace(($text_matches[1][$i]), strtoupper($text_matches[1][$i]), $str);
		$len_text = preg_match_all('/(?:\\<a.*\\>(.*)\\<img)/' ,$tmp, $text_matches);
		for ($i = 0; $i < $len_text; $i++)
			$str = str_replace(($text_matches[1][$i]), strtoupper($text_matches[1][$i]), $str);
		echo $str;
		echo "\n";
	}
?>