<?php session_start();
require_once('../config.php');

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Launch Complaint</title>
</head>
<body>
<div id="container">
    <div id="child1">
            <?php require_once('../left-panel-emp.php') ?>
        </div>
    <div id="child2">
            <?php require_once('../header.php') ?>
            <form action="" method="post">
            <div class="device_info">
            <h1>Complaint</h1>

            <label for="name">Name: &nbsp &nbsp &nbsp</label>
            <input type="text" id="name" name="name" required><br><br>            

            <label for="email">Email id: &nbsp &nbsp &nbsp</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="device_id">Device ID:&nbsp</label>
            <input type="text" id="device_id" name="device_id" required><br><br>

            <label for="device_name">Device Name: &nbsp&nbsp</label>
            <input type="text" name="device_type" id="device_type" required><br><br>
        
            <label for="device_type">Device Type: &nbsp&nbsp</label>
            <input type="text" name="device_name" id="device_name" required><br><br>
        
            <label for="issue">Issue: &nbsp&nbsp</label>
            <input type="text" id="issue" name="issue" required><br><br>

            <input type="submit" name="save_details" value="Launch Complaint">

            </div>
            </form>
            
        </div>    
    </div>
    <div class="device_info"><?php require_once('../dbconnect.php');
    date_default_timezone_set('Asia/Kolkata');

if (isset($_POST['save_details'])) {

        $device_id      = $_POST['device_id'];
        $device_name      = $_POST['device_name'];
        $device_type  = $_POST['device_type'];
        $name      = $_POST['name'];
        $email             = $_POST['email'];
        $device_name           = $_POST['device_name'];
        $issue           = $_POST['issue'];
        $emp_id = $_SESSION['user_id'];
        $complaint_date =date('Y-m-d');
        $status = "Unresolved";
        $path='complaints-module/complaints-emp.php';
        $url=BASE_URL.$path;


        $statement = 'INSERT INTO `complaints_db`(`name`, `email`, `device_id`, `device_name`, `device_type`, `issue`, `emp_id`, `complaint_date`, `status`) VALUES ("'.$name.'","'.$email.'","'.$device_id.'", "'.$device_name.'","'.$device_type.'","'.$issue.'","'.$emp_id.'","'.$complaint_date.'","'.$status.'")';
        $run_query = mysqli_query($db_connect,$statement);
        if ($run_query) {
            echo "Data saved successfully.";
            header("refresh:3;url=$url");
        } else {
            echo "Data could not be saved, please try again.";
        }

}
?>
</div>
</body>
</html>
