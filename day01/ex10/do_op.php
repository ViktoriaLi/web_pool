#!/usr/bin/php
<?php
	if ($argc == 4)
	{
		$first = trim($argv[1]);
		$second = trim($argv[2]);
		$third = trim($argv[3]);
		if (($second != "+" && $second != "-" && $second != "*" && $second != "/" && $second != "%")
			|| !is_numeric($first) || !is_numeric($third))
		{
			echo "Incorrect Parameters\n";
			return 0;
		}
		switch ($second)
		{
			case "+":
				echo $first + $third;
				echo "\n";
				break ;
			case "-":
				echo $first - $third;
				echo "\n";
				break ;
			case "*":
				echo $first * $third;
				echo "\n";
				break ;
			case "/":
				echo $first / $third;
				echo "\n";
				break ;
			case "%":
				echo $first % $third;
				echo "\n";
				break ;
		}
	}
	else
		echo "Incorrect Parameters\n";
?>