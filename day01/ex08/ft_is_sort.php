#!/usr/bin/php
<?php
	function ft_is_sort($arr)
	{
		$tmp = $arr;
		sort($tmp);
		if ($tmp == $arr)
			return true;
		else
			return false;
	}
?>