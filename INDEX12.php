<?php session_start();

require_once('config.php');

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>includes/css/login.css?v=1.1">
	<title>Login</title>
</head>
<body>
	<!-- css : means cascading style sheet. -->

 <!-- we can apply css in 3 ways -->

 <!-- 01. Inline css -->
<!--  02. In file css -->
<!--  03. External css : separate folder & file -->

<style type="text/css">
		/*#heading {
			background-color: blue; color:white
		}*/
</style>

<!-- css : tags, attributes, class, id, nth element -->
	<div class="container">

<?php require_once('login-submit.php'); ?>

<h1 id="heading">Login Page</h1>
	<form action="" method="post">
		<div>
			<label>Username </label>
			<input type="email" name="user_email" class="input_elements" value="" required>
		</div>

		<div>
			<label>Password </label>
			<input type="password" name="user_password" class="input_elements" value="" required>
		</div>

		<div id="button-container">
			<input type="submit" name="form_submit" id="button" value="Login Now">
		</div>
	</form>
	</div>
</body>
</html>