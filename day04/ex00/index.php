<?php
   session_start();
   if($_GET['login'] != NULL && $_GET['passwd'] != NULL && $_GET['submit'] == "OK")
   {
       $_SESSION['login'] = $_GET['login'];
       $_SESSION['passwd'] = $_GET['passwd'];
   }
?>
<html>
	<head>
		<title>index</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<form action="./index.php" method="GET">
			Username: <input type="text" name="login" value="<?php echo $_SESSION['login']?>" />
			Password: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']?>" />
			<input type="submit" value="OK" />
		</form>
	</body>
</html>