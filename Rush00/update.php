<?php
session_start();
include_once './connect.php';
if(!empty($_POST) && !empty($_SESSION))
{
	$username = mysqli_real_escape_string($conn, htmlspecialchars($_SESSION["login"]));
	$password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
	$fname = mysqli_real_escape_string($conn, htmlspecialchars($_POST['fname']));
	$lname = mysqli_real_escape_string($conn, htmlspecialchars($_POST['lname']));
	$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));

	$sql = "USE rush01";
	if (mysqli_query($conn, $sql)) {
		$sql = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password' ";
		if (($result = mysqli_query($conn, $sql))) {
			if ($_POST["submit"] == "Delete")
			{
				$sql = "DELETE FROM `users` WHERE username = '$username'";
				if (mysqli_query($conn, $sql))
				{
					unset($_SESSION);
					session_destroy();
					header("location: ./index.php");
				}
			}
			else
			{
				$sql = "UPDATE `users` SET first_name='$fname', last_name='$lname', email='$email' WHERE username = '$username' ";
				if (mysqli_query($conn, $sql))
				{
					$_SESSION["login"] = $username;
					header("location: ./index.php");
				}
			}
		} else {
			$error_msg = urlencode("Couldnt perform action:" . mysqli_error($conn));
			header('Location: ./profile.php?err_msg=' . $error_msg);
		}
	} else {
		$error_msg = urlencode("Couldnt perfrom action:" . mysqli_error($conn));
		header('Location: ./profile.php?err_msg=' . $error_msg);
	}
	mysqli_close($conn);
}
?>