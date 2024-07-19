<?php session_start();
require_once('../config.php');

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>mark as resolved</title>
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
$complaint_id = $_GET['complaint_id'];
$status = "Resolved";
$resolve_date=date('Y-m-d'); 
$resolve_name=$_SESSION['user_name'];
$resolved_id=$_SESSION['user_id'];
$path='complaints-module/unresolved-admin.php';
$url= BASE_URL .$path;

$statement = 'UPDATE `complaints_db` SET 
              `status` = "'.$status.'",
              `resolved_id`="'.$resolved_id.'",
              `resolve_name`="'.$resolve_name.'",
              `resolve_date`="'.$resolve_date.'"
              WHERE `complaint_id` = "'.$complaint_id.'"';


$run_query = mysqli_query($db_connect, $statement);

        if ($run_query) {
            echo "Data saved successfully.";
            header("refresh:1;url=$url");
        } else {
            echo "Data could not be saved, please try again.";
        }

?></div>
</div>
</body>
</html>
