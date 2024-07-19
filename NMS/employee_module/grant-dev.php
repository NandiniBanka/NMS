<?php session_start();

require_once('../config.php');
require_once('../dbconnect.php');
$dev_id = $_GET['id']; 
$emp_id = $_GET['e_id'];
$statement = "UPDATE devices SET employee_id = '$emp_id' WHERE id = '$dev_id'";
if (mysqli_query($db_connect, $statement)) {
 header("Location: add_device_access.php?e_id=" . urlencode($emp_id));
} else {
    echo "Error deleting record: " . mysqli_error($db_connect);
}
?>