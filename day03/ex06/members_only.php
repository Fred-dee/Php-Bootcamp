<?php
if(isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER'] != "zaz" && $_SERVER['PHP_AUTH_PW'] != "Ilovemylittleponey" )
{
	unset($_SERVER['PHP_AUTH_USER']);
	unset($_SERVER['PHP_AUTH_PW']);
}
if (!isset($_SERVER['PHP_AUTH_USER'])){
header('WWW-Authenticate: Basic realm="Members Only"');
header('HTTP/1.0 401 Unauthorized');
echo 'Text to send if user hits Cancel button';
exit;
} else {
	if($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "Ilovemylittleponey")
	{
		
		$file = file_get_contents("../img/42.png");
		echo '<html><body>Hello '.$_SERVER['PHP_AUTH_USER']."<br/>";
		echo '<img src="data:img/png;base_64,'.base64_encode($file).'"></body></html>';
	}
	exit();
}
?>