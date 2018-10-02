#!/usr/bin/php
<?php
$var;
for($y = 0; $y < 10; $y++)
{
	for ($x = 0; $x < 100; $x++)
	{
		$var = $var."x";
	}
	$var = $var."\n";
}
echo $var
?>