#!/usr/bin/php
<?php

$var;

if ($argc == 2)
{
	$var = strtok($argv[1], " ");
	while ($var !== false)
	{
		echo $var;
		$var = strtok(" ");
		if ($var !== false)
			echo " ";
	}
}
echo "\n";

?>