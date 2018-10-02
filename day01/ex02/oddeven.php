#!/usr/bin/php
<?php
	$line = "ererre";
	while (1 && $line != NULL)
	{
		echo "Enter a number: ";
		$line = trim(fgets(STDIN)); // reads one line from STDIN
		if (is_numeric($line))
		{
			if ($line % 2 == 0)
			{
				echo "The number ".$line." is even\n";
			}
			else
			{
				echo "The number ".$line." is odd\n";
			}
		}
		else
		{
			if (!($line == NULL))
				echo "'".$line."' is not a number\n";
		}
	}
?>