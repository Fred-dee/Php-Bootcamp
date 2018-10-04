#!/usr/bin/php
<?php
	$unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
	'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
	'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
	'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
	'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y');
	$months = array(
		"janvier" => "01",
		"fevrier" => "02",
		"mars" => "03",
		"avril" => "04",
		"mai" => "05",
		"juin" => "06",
		"juillet" => "07",
		"aout" => "08",
		"septembre" => "09",
		"octobre" => "10",
		"novembre" => "11",
		"decembre" => "12"
	);
	$days = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
	$output;
	$split = array();
	$input;
	$nb;
	$formatted_str;
	date_default_timezone_set("Europe/Paris"); 
	$end_time;

	if ($argc > 1)
	{
		$input = $argv[1];
		$nb = preg_match("/\D+\s\d{1,2}\s\D+\d{4}\s([0-1][0-9]|[2][0-4]):([0-5][0-9]):([0-5][0-9])/", $input);
		if ($nb == 0)
		{
			echo "Wrong Format\n";
			exit();
		}
		$split = preg_split("/\s/", $input);
		$split[0] = strtolower($split[0]);
		$split[2] = strtolower($split[2]);
		$split[2] = $months[$split[2]];
		if ($split[2] == null || array_search($split[0], $days) == false)
		{
			echo "Wrong Format\n";
			exit();
		}
		$formatted_str = $split[2]."/".$split[1]."/".$split[3]." ".$split[4];
		$end_time = strtotime($formatted_str);
		print($end_time."\n");
	}
?>