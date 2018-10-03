#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$in_str = $argv[1];
		$out = preg_replace('!\s+!', ' ', $in_str);
		echo $out;
	}
?>