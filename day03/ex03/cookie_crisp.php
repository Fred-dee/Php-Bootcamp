<?php
session_start();
if (isset($_GET))
{
//	$inst = $_GET["action"];
//	$name = $_GET["name"];
	if ($_GET['action'] === "set")
	{
	//	$value = $_GET["value"];
		setcookie($_GET['name'], $_GET["value"], time()+60*60*24*30);
	}
	elseif ($_GET["action"] === "del")
	{
		unset($_COOKIE[$name]);
		setcookie($_GET["name"], "delete", time() - 60*60*24*30);
	}
	elseif ($_GET["action"] === "get")
	{
		if (isset($_COOKIE) && isset($_COOKIE[$name]))
		{
			echo $_COOKIE[$name]."\n";
		}
	}
}
?>