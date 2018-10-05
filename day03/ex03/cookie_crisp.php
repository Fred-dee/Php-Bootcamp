<?php
if ($_GET != NULL)
{
	if ($_GET['action'] === "set")
	{
		if ($_GET["name"] != NULL)
			setcookie($_GET['name'], $_GET["value"], time()+60*60*24*30);
	}
	elseif ($_GET["action"] === "del")
	{
		$_COOKIE[$_GET["name"]] = NULL;
		setcookie($_GET["name"], "delete", time() - 60*60*24*30);
	}
	elseif ($_GET["action"] === "get")
	{
		if ($_COOKIE[$_GET["name"]] != NULL)
		{
			echo $_COOKIE[$_GET["name"]]."\n";
		}
	}
}
?>