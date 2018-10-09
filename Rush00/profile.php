<?php
session_start();
header('Content-Type: text/html');
if (empty($_SESSION)) {
	$_SESSION["login"] = "Guest";
	$_SESSION["bucket"] = array();
}
include_once './connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
		<meta charset="utf-8">
		<meta name="author" description="mdilapi;tasikimu" />
		<link rel="stylesheet" type="text/css" href="./css/inc.css" />
		<link rel="stylesheet" type="text/css" href="./css/forms.css" />
	</head>
		<?php 
	    $username = mysqli_real_escape_string($conn, htmlspecialchars($_SESSION['login']));
		$sql = "SELECT * FROM `users` WHERE username = '$username'";
		if (!($result = mysqli_query($conn, $sql)))
			echo "<h1>Couldnt find the user</h1>";
		else
		{
			$row = mysqli_fetch_array($result);
		}
		?>
		<div class='grid-wrapper'>
			<div class ="cell">
				<h1>Update Information</h1>
				<form action="./update.php" method="POST">
					<div class="form-group">
			 			Name: <input class = "controls"type="text" name="fname" value="<?php echo $row["first_name"]; ?>" required/>
				 	</div>
				 	<div class ="form-group">
						Surname: <input class ="controls" type="text" name="lname" value="<?php echo $row["last_name"]; ?>" required/>
					</div>
					<div class ="form-group">
				 		Email: <input class="controls" type="email" name="email" value="<?php echo $row["email"]; ?>" required/>
				 	</div>
				 	<div class ="form-group">
				 		Password: <input class ="controls" type="password" name="passwd" value="" required/>
					</div>				 
					<input class="controls" name="submit" type="submit" value="Update" />
				</form>
			</div>
			<div class="cell">
				<h1>Delete Account</h1>
				<form action="./update.php" method="POST">
					<div class="form-group">
			 			Name: <input class = "controls"type="text" name="fname" value="<?php echo $row["first_name"]; ?>" disabled required/>
				 	</div>
				 	<div class ="form-group">
						Surname: <input class ="controls" type="text" name="lname" value="<?php echo $row["last_name"]; ?>" disabled required/>
					</div>
					<div class ="form-group">
				 		Email: <input class="controls" type="email" name="email" value="<?php echo $row["email"]; ?>" disabled required/>
				 	</div>
				 	<div class ="form-group">
				 		Password: <input class ="controls" type="password" name="passwd" value="" required/>
					</div>				 
					<input class="controls" name="submit" type="submit" value="Delete" />
				</form>
			</div>
		</div>
		<?php
		if (isset($_GET) && !empty($_GET)) {
				echo "<div class='error_msg'>" . $_GET["err_msg"] . "</div>";
		}
		?>
	</body>
</html>