<?php session_start();
require_once('../config.php');

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>delete</title>
</head>
<body>
<div id="container">
    <div id="child1">
            <?php require_once('../left-panel-emp.php') ?>
        </div>
    <div id="child2">
            <?php require_once('../header.php') ?>
            <div class="search">
            <input type="search" name="form_submit" placeholder="Type here to search">
            </div>
            <div class="device_info">

<?php 

require_once('../dbconnect.php');
$C_ID = $_GET['C_ID']; 
$statement = "DELETE FROM company_db WHERE C_ID = '$C_ID'";
if (mysqli_query($db_connect, $statement)) { ?>
<?php   header("location:company_list.php");
} else {
    echo "Error deleting record: " . mysqli_error($db_connect);
}
?></div>
</div>
</body>
</html>
