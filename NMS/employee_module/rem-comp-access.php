<?php session_start();

require_once('../config.php');
require_once('../dbconnect.php');
$comp_id = $_GET['id']; 
$statement = "UPDATE company_db SET employee_id = NULL WHERE c_id = '$comp_id'";
if (mysqli_query($db_connect, $statement)) { ?>
<?php   header('location:emp_list.php');
} else {
    echo "Error deleting record: " . mysqli_error($db_connect);
}
?>