#!/usr/bin/php
<?php
	for ($i = 0; $i <= 12; $i++)
	{
		for ($j = 0; $j < 80; $j++)
		{
			echo $symb = 'X';
			if ($i == 12 && $j == 39)
				break;
		}
		echo "\n";
	}
?>