#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$str = trim($argv[1]);
		if (!strpbrk($str, '+-*/%') || ($str[0] < '0' && $str[0] > '9' && $str[0] != ' ') || 
			(strpbrk($str, '+-*%/')[1] < '0' && strpbrk($str, '+-*%/')[1] > '9'
				&& strpbrk($str, '+-*%/')[1] != ' '))
		{
			echo "Syntax Error\n";
			return 0;
		}
		$counter = 0;
		if (strrchr($str, '+'))
			$counter++;
		if (strrchr($str, '-'))
			$counter++;
		if (strrchr($str, '*'))
			$counter++;
		if (strrchr($str, '/'))
			$counter++;
		if (strrchr($str, '%'))
			$counter++;
		if ($counter != 1)
		{
			echo "Syntax Error\n";
			return 0;
		}
		if (strrchr($str, '+') != strstr($str, '+') || 
			strrchr($str, '*') != strstr($str, '*') || strrchr($str, '/') != strstr($str, '/') || 
			strrchr($str, '%') != strstr($str, '%'))
		{
			echo "Syntax Error\n";
			return 0;
		}

		if (strrchr($str, '+'))
		{
			$first = substr($str, 0, strrchr($str, '+'));
			$first = trim($first);
			$second = substr($str, strrchr($str, '+') + 1);
			$second = trim($second);
			echo $first + $second;
			echo "\n";
		}
		if (strrchr($str, '-'))
		{
			$first = substr($str, 0, strrchr($str, '-'));
			$first = trim($first);
			$second = substr($str, strrchr($str, '-') + 1);
			$second = trim($second);
			echo $first - $second;
			echo "\n";
		}
		if (strrchr($str, '*'))
		{
			$first = substr($str, 0, strpos($str, '*') + 1);
			$first = trim($first);
			$second = substr($str, strpos($str, '*') + 1);
			$second = trim($second) - 0;
			echo $first * $second;
			echo "\n";
		}
		if (strrchr($str, '/'))
		{
			$first = substr($str, 0, strpos($str, '/') + 1);
			$first = trim($first);
			$second = substr($str, strpos($str, '/') + 1);
			$second = trim($second);
			echo $first / $second;
			echo "\n";
		}
		if (strrchr($str, '%'))
		{
			$first = substr($str, 0, strpos($str, '%') + 1);
			$first = trim($first);
			$second = substr($str, strpos($str, '%') + 1);
			$second = trim($second);
			echo $first % $second;
			echo "\n";
		}
	}
	else
		echo "Incorrect Parameters\n";
?>