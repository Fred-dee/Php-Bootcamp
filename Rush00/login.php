<?php
header('Content-Type: text/html');
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
		<title>Login/Sign up</title>
		<meta name="author" description="mdilapi" />
		<link rel ="stylesheet" type="text/css" href="./css/inc.css" />
		<link rel="stylesheet" type="text/css" href="./css/forms.css" />
	</head>
	<body>
		<?php include_once './includes/nav.php';?>
		<div class="grid-wrapper">
			<div class="cell">
				<h1>Login</h1>
				<form action="./check-login.php" method="POST">
					<div class='form-group'>
						<div class="label">Username:</div>
						<input class="controls" type="text" name="log_uname" placeholder="Username" required minlength="3"/>
					</div>
					<div class='form-group'>
						<div class="label">Password</div>
						<input class="controls" type="password" name="log_pass" placeholder="" required minlength="7"/>
					</div>
					<input class="controls" type="submit" value="Login"/>
				</form>
				<?php
				if (isset($_GET) && !empty($_GET)) {
					if ($_GET["err_id"] == "1"){
						echo "<div class='error_msg'>" . $_GET["err_msg"] . "</div>";
					}
				}
				?>
			</div>
			<div class='cell'>
				<h1>Register</h1>
				<form action="./check-register.php" method="POST">
					<div class = "form-group">
						<div class="label">Username:</div> 
						<input class="controls" type="text" name="reg_uname" placeholder="Username" required minlength="3"/>
					</div>
					<div class = "form-group">
						<div class="label">First Name:</div> 
						<input class="controls" type="text" name="reg_fname" placeholder="John" required/>
					</div>
					<div class = "form-group">
						<div class="label">Last Name:</div> 
						<input class="controls" type="text" name="reg_lname" placeholder="Doe" required/>
					</div>
					<div class = "form-group">
						<div class="label">Email:</div> 
						<input class="controls" type="email" name="reg_email" placeholder="john@doe.com" required/>
					</div>
					<div class = "form-group">
						<div class="label">Password:</div> 
						<input class="controls" type="password" name="reg_pass" placeholder="" required minlength="7"/>
					</div>
					<input class="controls" type="submit" value="Register"/>
				</form>
				<?php
				if (isset($_GET) && !empty($_GET)) {
					if ($_GET["err_id"] == "0"){
						echo "<div class='error_msg'>" . $_GET["err_msg"] . "</div>";
					}
				}
				?>
			</div>
		</div>
	</body>
</html>