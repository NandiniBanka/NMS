<?php session_start();

require_once('../config.php');
require_once('../dbconnect.php');
$dev_id = $_GET['id']; 
$statement = "UPDATE devices SET employee_id = NULL WHERE id = '$dev_id'";
if (mysqli_query($db_connect, $statement)) { ?>
<?php   header('location:emp_list.php');
} else {
    echo "Error deleting record: " . mysqli_error($db_connect);
}
?>