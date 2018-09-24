<?php
	function ft_is_sort(array $tab)
	{
		$tmp = $tab;
		sort($tmp);
		if ($tab == $tmp)
			echo "The array is sorted\n";
		else
			echo "The array is not sorted\n";
	}
?>