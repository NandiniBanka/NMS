<?php session_start();

require_once('../config.php');
require_once('../dbconnect.php');
$emp_id = $_GET['id']; 
$statement = "UPDATE users SET status = 'Inactive' WHERE id = '$emp_id'";
if (mysqli_query($db_connect, $statement)) { ?>
<?php   header('location:emp_list.php');
} else {
    echo "Error deleting record: " . mysqli_error($db_connect);
}
?>