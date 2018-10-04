#!/usr/bin/php
<?php

$file;

if ($argc > 1)
{
	$file = file_get_contents($argv[1]);
	$nb = preg_match("/title=\"(.*?)\"/",  $file);
	$file = preg_replace_callback("/(title=\")(.*?)(\")/",
		function ($matches)
		{
			return($matches[1].strtoupper($matches[2]).$matches[3]);
		}, $file);
	$nb = preg_match("/(<\s*a[^>]*>)(.*?)(<)/",  $file);
	$file = preg_replace_callback("/(<\s*a[^>]*>)(.*?)(<)/",
		function($matches)
		{
			return($matches[1].strtoupper($matches[2]).$matches[3]);
		}, $file);
	echo $file."\n";
}

?>