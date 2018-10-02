#!/usr/bin/php
<?php
	function ft_is_sort($arr)
	{
		$tmp = $arr;
		sort($tmp);
		return ($tmp == $arr);
	}
?>