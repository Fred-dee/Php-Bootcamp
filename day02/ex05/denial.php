#!/usr/bin/php
<?php

	$tmp_line;
	$line = "  ";

	$valid_headers=array("", "surname", "name", "mail", "IP", "pseudo");
	if ($argc == 3)
	{
		if (file_exists($argv[1]) == false)
			exit();
		if (array_search($argv[2], $valid_headers) == false)
			exit();
		if (($fp = fopen($argv[1], "r")) == true)
		{	
			$surname = array();
			$name = array();
			$mail = array();
			$IP = array();
			$pseudo = array();
			while (($store = trim(fgets($fp))) != null)
			{
				$tmp = explode(";", $store);
				if ($argv[2] == "name")
					$key = $tmp[0];
				else if ($argv[2] == "surname")
					$key = $tmp[1];
				else if ($argv[2] == "mail")
					$key = $tmp[2];
				else if ($argv[2] == "IP")
					$key = $tmp[3];
				else if ($argv[2] == "pseudo")
					$key = $tmp[4];
				$surname[$key] = $tmp[0];
				$name[$key] = $tmp[1];
				$mail[$key] = $tmp[2];
				$IP[$key] = $tmp[3];
				$pseudo[$key] = $tmp[4];
			}
			while ($line != null && 1)
			{
				echo "Enter your command: ";
				$tmp_line = fgets(STDIN); // reads one line from STDIN
				if ($tmp_line == null)
					exit();
				$line = trim($tmp_line);
				if (stristr("rm -rf", $line) == false)
				{
					try
					{
						eval($line);
					}
					catch(ParseError $e)
					{
						echo $e."\n";
					}
				}
			}
			fclose($fp);
		}
	}
?>