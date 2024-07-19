<?php session_start();
require_once('../config.php');
$showdetails = isset($_GET['showdetails']) && isset($_GET['id']) ? $_GET['id'] : null;

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Devices</title>
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
            <br><div class="device_info"><h1>Devices of <?php require_once('../dbconnect.php'); 
            $C_ID = $_GET['C_ID']; 
  
         $statement = "SELECT * FROM company_db WHERE C_ID = '$C_ID'";
    
    $run_query = mysqli_query($db_connect,$statement);

if ($run_query->num_rows > 0) {
     while($row = mysqli_fetch_object($run_query)) { ?>
            
            <?php echo $row->C_Name ?>       <?php } 
    }?></h1></div>
        <table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Status</th>
        <th>Date of Sale</th>
        <th>Price</th>
        <th>Warranty Expiration</th>
        <th>Details</th>
    </tr>
            <?php 
            $emp_id = $_SESSION['user_id'];
            $user_type = $_SESSION['user_type'];
            $C_ID = $_GET['C_ID']; 
  
    if ($user_type == 'Admin') {
        $statement = "SELECT * FROM devices WHERE company_id='$C_ID'";
    }
    else {
       $statement = "SELECT * FROM devices WHERE employee_id = '$emp_id' AND company_id = '$C_ID'"; 
    }
    $run_query = mysqli_query($db_connect,$statement);

if ($run_query->num_rows > 0) {
     while($row = mysqli_fetch_object($run_query)) { ?>
            <tr>
            <td><?php echo $row->id ?></td>
            <td><?php echo $row->name  ?></td>
            <td><?php echo $row->type  ?></td>
            <td><?php echo $row->status  ?></td>
            <td><?php echo $row->date_of_sale  ?></td>
            <td><?php echo $row->price  ?></td>
            <td><?php echo $row->warranty_expires_on  ?></td>
            <td><a href="?showdetails=true&id=<?php echo $row->id;?>&C_ID=<?php echo $C_ID;?>" style="color: blue; text-decoration: none;">View</a></td>            </tr>
        <?php } 
    }
else {
        echo 'No data found.';
    }   ?>
    <?php if ($showdetails) {
    $detailsquery = "SELECT * FROM devices WHERE id = '$showdetails'";
    $detailsresult = mysqli_query($db_connect, $detailsquery);
    $detailsdata = mysqli_fetch_object($detailsresult);
    if ($detailsdata) { ?>
        <div class="popup-overlay"></div>
        <div class="popup">
            <h2>Details for Device ID: <?php echo $detailsdata->id ?></h2>
            <a href="<?php echo BASE_URL; ?>device_module/device_history.php?id=<?php echo $detailsdata->id ?>" class="details-btn">View History</a><br><br>
            <a href="<?php echo BASE_URL; ?>device_module/device_report.php?id=<?php echo $detailsdata->id ?>" class="details-btn">View Report</a><br><br>
            <a href="?C_ID=<?php echo $C_ID?>" class="close-btn">Close</a>
        </div>
    <?php }
} ?>
    </table>
        </div>
    </div>
</body>
</html>