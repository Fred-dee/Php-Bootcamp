#!/usr/bin/php
<?php
	$ret = array();
	$i = 1;
	$var;
	$j = 0;

	while ($i < $argc)
	{
		$var = strtok($argv[$i], " ");
		while ($var !== false)
		{
			$ret[$j++] = $var;
			$var = strtok(" ");
		}
		$i++;
	}
	sort($ret);
	$i = 0;
	while ($i < $j)
	{
		echo $ret[$i++]."\n";
	}
	
?>