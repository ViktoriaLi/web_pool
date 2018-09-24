<?php
	$stdin = fopen('php://stdin','r');
	echo "Enter a number: ";
	$number = fgets(STDIN);
	while ($number == TRUE)
	{
		
		if ($number == "\n")
			echo "'' is not a number\n";
		else
		{
			$new = intval($number);
			$tmp = strval($new);
			if ($tmp != trim($number))
			{
					$number = trim($number);
					echo "'$number' is not a number\n";
					echo "Enter a number: ";
					$number = fgets(STDIN);
					continue ;
			}
			if (!$new || !is_numeric($new) || ctype_alpha($number))
			{
				$number = trim($number);
				echo "'$number' is not a number\n";
			}
			elseif ($new % 2 == 0)
				echo "The number $new is even\n";
			else
				echo "The number $new is odd\n";
		}
		echo "Enter a number: ";
		$number = fgets(STDIN);
	}
	echo "\n";
	fclose($stdin);
?>