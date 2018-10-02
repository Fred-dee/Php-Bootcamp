#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$i = 0;
		$ret = array();
		$var = strtok($str, " ");
		while ($var !== false)
		{
			$ret[$i] = $var;
			$var = strtok(" ");
			$i++;
		}
		return $ret;
	}
?>