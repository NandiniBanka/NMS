<?php session_start();

require_once('config.php');

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>Login</title>
</head>
<body>
	<div class="container">
<h1 id="heading">Login</h1>
<form action="" method="post">
	<div  class="input_elements">
		<label>Username</label>
		<input type="email" name="user_email" value="" required>
	</div>
	<br>
    <div class="input_elements">
		<label>Password&nbsp</label>
		<input type="Password" name="user_password" value="" required>
	</div>
	<br>
	<div id="submit">
		<input type="submit" name="form_submit" value="Login Now">
	</div>
</form>
	<p style="margin-left: 35%"> <?php require_once('login-submit.php'); ?></p>
</div>
</body>
</html>
