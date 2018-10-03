#!/usr/bin/php
<?php

$file;

if ($argc > 1)
{
	$file = file_get_contents($argv[1]);
	$nb = preg_match("/title=\"([a-z |\\s|A-Z]+)\"/",  $file);
	$file = preg_replace_callback("/(title=\")([a-z |\\s|A-Z]+)(\")/",
		function ($matches)
		{
			return($matches[1].strtoupper($matches[2]).$matches[3]);
		}, $file);
	
	//echo "The number of matches is: ".$nb."\n";
	$nb = preg_match("/(<\s*a[^>]*>)(.*?)(<)/",  $file);
	$file = preg_replace_callback("/(<\s*a[^>]*>)(.*?)(<)/",
		function($matches)
		{
			return($matches[1].strtoupper($matches[2]).$matches[3]);
		}, $file);
	echo "The number of matches is: ".$nb."\n";
	echo $file."\n";
}

?>