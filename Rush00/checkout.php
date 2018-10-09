<?php
session_start();
include_once './connect.php';
if (isset($_SESSION) && !empty($_SESSION)) {
	if ($_SESSION["login"] == "Guest")
	{
		$error_message = urlencode("Cant checkout without having first loged in. Please login");
		header('Location: ./bucket.php?err_msg='.$error_message);
	}
	$arr = $_SESSION["bucket"];
	foreach ($arr as $key => $value)
	{
		$id = (int)mysqli_real_escape_string($conn, $value["ID"]);
		$user = mysqli_real_escape_string($conn, $_SESSION["login"]);
		$quantity = (int)$arr["quantity"];
		$sql = "INSERT INTO orders (`username`, `ID`, `quantity`) VALUES 
		('$user', '$id', '$quantity')";
		if (!mysqli_query($conn, $sql))
		{
			$error_message = urlencode("Cant checkout Bucket".mysqli_error($conn));
			header('Location: ./bucket.php?err_msg='.$error_message);
		}
	}
	$_SESSION["bucket"] = array();
	mysqli_close($conn);
	header('Location: ./index.php');
}
else
{
	$error_message = urlencode("Cant checkout Bucket: Error unknown");
	header('Location: ./bucket.php?err_msg='.$error_message);
}
?>
