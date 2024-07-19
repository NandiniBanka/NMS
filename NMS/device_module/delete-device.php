<?php session_start();

require_once('../config.php');
require_once('../dbconnect.php');
$device_id = $_GET['id']; 
$statement = "DELETE FROM devices WHERE id = '$device_id'";
if (mysqli_query($db_connect, $statement)) { ?>
<?php   header('location:dl.php');
} else {
    echo "Error deleting record: " . mysqli_error($db_connect);
}
?>