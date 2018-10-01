<?php
	function ft_is_sort(array $tab)
	{
		$tmp = $tab;
		sort($tmp);
		if ($tab == $tmp)
			return TRUE;
		else
			return FALSE;
	}
?>