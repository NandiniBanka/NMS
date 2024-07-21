<?php
include 'database.php';
if(isset($_POST['submit']))
{
	$first_name = $_POST['uname'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$education = $_POST['education'];
	$chk = "";
	foreach ($education as $chk1) {
		$chk = $chk1.",";
	}
	$sql = "insert into user(first_name,password) values('$first_name','$password')";
	if(mysqli_query($con,$sql))
	{
		echo "<script>alert('new record inserted')</script>";
		echo "<script>window.open('insert.php','_self')</script>";
	}
	else
	{
		echo "error".mysqli_error($con);
	}
	mysqli_close($con);
}