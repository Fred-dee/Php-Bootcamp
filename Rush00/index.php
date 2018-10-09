<?php
header('Content-Type: text/html');
include_once './connect.php';
include_once './includes/functions.php';
if (!isset($_SESSION))
	session_start();
if (empty($_SESSION)) {
	$_SESSION["login"] = "Guest";
	$_SESSION["bucket"] = array();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="author" description="mdilapi" />
		<link rel="stylesheet" type="text/css" href="./css/inc.css" />
		<link rel="stylesheet" type="text/css" href="./css/forms.css" />
	</head>
	<body>
		<?php
		if ($_SESSION["login"] == "Guest")
			include './includes/nav.php';
		else
			include './includes/nav_logged.php';
		?>
		<h1 style="width:100%; text-align: center;">Kicks For Licks!</h1>
		<?php
		$sql = "USE rush01";
		mysqli_query($conn, $sql);
		if (empty($_GET))
			$sql = "SELECT * FROM items";
		else
			$sql = "SELECT * FROM items WHERE category LIKE '%" . $_GET["cat"] . "%'";
		$result = mysqli_query($conn, $sql);
		echo "<div class='wrapper'>";
		echo "\t <div class= 'grid'>";
		while ($row = mysqli_fetch_array($result)) {
			$exp = explode(";", $row["category"]);
			if (!empty($_GET)) {
				if (in_array($_GET["cat"], $exp)) {
					print_img($row);
				}
			} else {
				print_img($row);
			}
		}
		echo "\t</div>";
		echo "</div>";
		?>
	</body>
</html>
