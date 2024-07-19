<?php require_once('../config.php');
require_once('../dbconnect.php');
if (isset($_POST['form_submit'])) {

		$user_email    = $_POST['user_email'];
		$user_password = $_POST['user_password'];
	

		$statment = 'select id,password,type, first_name, last_name from users where email_id = "'.$user_email.'"';
		$query = mysqli_query($db_connect,$statment);

		 if ($query->num_rows>0) {
		 	
		 	$user = mysqli_fetch_object($query);
		 	$encypted_password = $user->password;
		 	$User_id = $user->id;
		 	$user_type = $user->type;
		 	$user_name = $user->first_name . ' ' . $user->last_name;

		 	if ($user_password == $encypted_password) {
		 		$_SESSION['user_id']    = $User_id;
		 		$_SESSION['user_email'] = $user_email;
		 		$_SESSION['user_type'] = $user_type;
		 		$_SESSION['user_name'] = $user_name;
		 		if ($user_type == 'Admin') {
		 			header('location:../dashboard-frontend/admin_dashboard.php');
		 		} else {
		 		header('location:../dashboard-frontend/emp_dashboard.php');
		 	    }
		 	
		 	} else {
		 		echo "Invalid login credentials, please try again.";
		 	}

		 } else {
		 	echo "Error No user found related to email : ".$user_email;
		 }

	} ?>
