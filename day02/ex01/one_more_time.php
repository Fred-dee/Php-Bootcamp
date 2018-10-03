#!/usr/bin/php
<?php
	$output;
	$input;
	$nb;
	if ($argc > 1)
	{
		$input = $argv[1];
		$nb = preg_match("/\D+\s\d{1,2}\s\D+\d{4}\s([0-1][0-9]|[2][0-4]):([0-5][0-9]):([0-5][0-9])/", $input);
		
	}
?>