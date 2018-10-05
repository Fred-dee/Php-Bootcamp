<?php
	function is_wsstring($str)
	{
		$iter = 0;
		while ($str[$iter] == '\t' || $str[$iter] == ' ' || $str[$iter] == '\r' && $str[$iter] != "\0")
			$iter++;
		if ($str[$iter] == "\0")
			return true;
		else
			return false;
	}
	$uname = $_POST["login"]."\0";
	$passwd = $_POST["passwd"]."\0";
	$is_ok = $_POST["submit"]."\0";
	$dir = "../../../private/";
	$file;
	$item = array();
	$db;
	if (is_wsstring($passwd) ||  is_wsstring($uname)  || is_wsstring($is_ok) || is_wsstring($passwd) )
	{
		echo "<b>ERROR\n</b>";
		exit();
	}
	$passwd = hash("sha256", $passwd);
	if (file_exists($dir) == false)
	{	
		echo "<div>Making Dir: ".$dir."</div>\n";
		mkdir($dir, 0777);
	}
	else
		echo $dir;
	if ($file_exists($dir."passwd") == false)
		file_put_contents($dir."passwd", "blank");
	$file = file_get_contents($dir."passwd");
	$db = unserialize($file);
	file_put_contents($dir."passwd", serialize($db));
?>