<?php
	function ft_is_sort(array $tab)
	{
		if ($tab)
		{
			$tmp = $tab;
			sort($tmp);
			if ($tab == $tmp)
				return TRUE;
			else
				return FALSE;
		}
	}
?>