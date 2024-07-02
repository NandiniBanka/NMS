<?php require_once('dbconnect.php');
if (isset($_POST['form_submit'])) {

		$user_email    = $_POST['user_email'];
		$user_password = $_POST['user_password'];
	

		$statment = 'select id,password,type from users where email_id = "'.$user_email.'"';
		$query = mysqli_query($db_connect,$statment);

		 if ($query->num_rows>0) {
		 	
		 	$user = mysqli_fetch_object($query);
		 	$encypted_password = $user->password;
		 	$User_id = $user->id;
		 	$user_type = $user->type;

		 	if ($user_password == $encypted_password) {
		 		$_SESSION['user_id']    = $User_id;
		 		$_SESSION['user_email'] = $user_email;
		 		if ($user_type == 'Admin') {
		 			header('location:admin_dashboard.php');
		 		} else {
		 		header('location:emp_dashboard.php');
		 	    }
		 	
		 	} else {
		 		echo "Invalid login credentials, please try again.";
		 	}

		 } else {
		 	echo "Error No user found related to email : ".$user_email;
		 }

	} ?>
