#!/usr/bin/php
<?php
	$tmp;
	$hold;
	$ret = array();
	$i = 0;
	$j = 0;

	if ($argc > 1)
	{
		$tmp = strtok($argv[1], " ");
		$hold = $tmp;
		while ($hold !== false)
		{
			$hold = strtok(" ");
			$ret[$i++] = $hold;
		}
		while ($j < $i - 1)
		{
			echo $ret[$j++]." ";
		}
		echo $tmp."\n";
	}
?>