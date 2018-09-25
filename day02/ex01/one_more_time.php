#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$str = $argv[1];
		$arr = preg_split("/\s/", $str);
		$words = count($arr);
		$colons = count(preg_split("/:/", $str));
		if (preg_match("/\s{2,}/", $str) || $words != 5 || $colons != 3)
		{
			echo "Wrong Format\n";
			return 0;
		}
		$time = (preg_split("/:/", $arr[4]));
		if (count($time) != 3)
		{
			echo "Wrong Format\n";
			return 0;
		}
		if (!preg_match("/^([1-9]|[1-2][0-9]|[3][0]|[3][1])$/", $arr[1]))
		{
			echo "Wrong Format\n";
			return 0;
		}
		if (!preg_match("/^([0-9][0-9][0-9][0-9])$/", $arr[3]))
		{
			echo "Wrong Format\n";
			return 0;
		}
		if (!preg_match("/^([0-5][0-9])$/", $time[0]) || !preg_match("/^([0-5][0-9])$/", $time[1]) ||
			!preg_match("/^([0-5][0-9])$/", $time[2]))
		{
			echo "Wrong Format\n";
			return 0;
		}
		if (!preg_match("/^(l|L)undi$/", $arr[0]) && !preg_match("/^(m|M)ardi$/", $arr[0]) &&
			!preg_match("/^(m|M)ercredi$/", $arr[0]) && !preg_match("/^(j|J)eudi$/", $arr[0]) &&
			!preg_match("/^(v|V)endredi$/", $arr[0]) && !preg_match("/^(s|S)amedi$/", $arr[0]) &&
			!preg_match("/^(d|D)imanche$/", $arr[0]))
		{
			echo "Wrong Format\n";
			return 0;
		}
		if (!preg_match("/^(d|D)ecembre$/", $arr[2]) && !preg_match("/^(m|M)ars$/", $arr[2]) &&
			!preg_match("/^(m|M)ai$/", $arr[2]) && !preg_match("/^(j|J)anvier$/", $arr[2]) &&
			!preg_match("/^(n|N)ovembre$/", $arr[2]) && !preg_match("/^(f|F)evrier$/", $arr[2]) &&
			!preg_match("/^(o|O)ctobre$/", $arr[2]) && !preg_match("/^(a|A)vril$/", $arr[2]) &&
			!preg_match("/^(s|S)eptembre$/", $arr[2]) && !preg_match("/^(j|J)uin$/", $arr[2]) &&
			!preg_match("/^(a|A)Aout$/", $arr[2]) && !preg_match("/^(j|J)uillet$/", $arr[2]))
		{
			echo "Wrong Format\n";
			return 0;
		}
		$arr = preg_replace('/(n|N)ovembre/', 'november', $arr);
		$arr = preg_replace('/(d|D)ecembre/', 'december', $arr);
		$arr = preg_replace('/(m|M)ai/', 'may', $arr);
		$arr = preg_replace('/(o|O)ctobre/', 'october', $arr);
		$arr = preg_replace('/(s|S)eptembre/', 'september', $arr);
		$arr = preg_replace('/(a|A)Aout/', 'august', $arr);
		$arr = preg_replace('/(m|M)ars/', 'march', $arr);
		$arr = preg_replace('/(j|J)anvier/', 'january', $arr);
		$arr = preg_replace('/(f|F)evrier/', 'february', $arr);
		$arr = preg_replace('/(a|A)vril/', 'april', $arr);
		$arr = preg_replace('/(j|J)uin/', 'june', $arr);
		$arr = preg_replace('/(j|J)uillet/', 'july', $arr);
		$res = $arr[1].' '.$arr[2].' '.$arr[3].' '.$arr[4];
		$timestamp = strtotime($res); //1072915200
		echo $timestamp;
	}
?>
