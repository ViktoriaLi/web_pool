#!/usr/bin/php
<?php
	for ($i = 0; $i < 1000; $i++)
	{
		echo !($i%80)&&$i?"\nX":"X";
	}
	echo "\n";
?>