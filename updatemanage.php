<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<form action="" method="POST">
			<div class="title">
				update details
			</div>
			<?php
					require_once('database.php');
					$query = "SELECT * FROM user where id=".$_GET['id']; // Assuming you want to get all users
					$result = mysqli_query($con, $query);
					$user = mysqli_fetch_assoc($result);
			?>
			<div class="form">
				<div class="input_field">
					<label>First Name</label>
					<input type="text" class="input" name="fname" value="<?php echo $user['first_name']?>" required>
				</div>
				<div class="input_field">
					<label>Last Name</label>
					<input type="text" class="input" name="lname" value="<?php echo $user['last_name']?>"required>
				</div>
				<div class="input_field">
					<label>Date of Birth</label>
					<input type="date" class="input" name="dob" value="<?php echo $user['dob']?>"required>
				</div>
				<div class="input_field">
					<label>Contact Number</label>
					<input type="text" class="input" name="phone" value="<?php echo $user['contact_number']?>" required>
				</div>
				<div class="input_field">
					<label>Email Address</label>
					<input type="text" class="input" name="email" value="<?php echo $user['email_id']?>" required>
				</div>
				<div class="input_field">
					<input type="submit" value="Update Details" class="btn" name="update">
				</div>
			</div>
		</form>
	</div>
</body>
</html>
<?php
	if(isset($_POST['update']))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$dob = $_POST['dob'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$query = "UPDATE user set first_name='$fname',last_name='$lname',dob='$dob',contact_number='$phone',email_id='$email'  where id=".$_GET['id'];

		// print_r($query);
		// die();

		$data = mysqli_query($con,$query);
		if($data)
		{
			echo '<script> alert("Data Updated Successfully")</script>';
			?>
			<meta http-equiv = "refresh" content = "2; url = http://localhost/configuration%20module/updateprof.php" />
			<?php
		}
		else
		{
			echo '<script> alert("Data insertion Failed.")</script>';
		}
	}
?>