<?php session_start();

require_once('../config.php');
require_once('../dbconnect.php');
$comp_id = $_GET['id']; 
$emp_id = $_GET['e_id'];
$statement = "UPDATE company_db SET emp_id = '$emp_id' WHERE C_ID = '$comp_id'";
if (mysqli_query($db_connect, $statement)) {
 header("Location: add_company_access.php?e_id=" . urlencode($emp_id));
} else {
    echo "Error deleting record: " . mysqli_error($db_connect);
}
?>