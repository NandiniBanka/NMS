<?php 
	$db_connect = mysqli_connect('localhost','root','','ispl_internship_2024');
	
	if (!$db_connect) {
		echo "Error in DB connection.";
	}

 ?>