<?php session_start();

require_once('../config.php');

 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Device History</title>
    <style type="text/css">
      #device_history {
    display: flex;
    width: 100%;
    text-align: center;
}
#child{
    flex: 1;
    border: 5px inset #b75bde;
    margin: 2%;
    padding: 1%;
}

    </style>
</head>
<body>
 <div id="container">
        <div id="child1">
         <?php require_once('../left-panel-emp.php') ?>
        </div>
        <div id="child2">
        <?php require_once('../header.php') ?>
            
        <?php require_once('../dbconnect.php');
    $device_id = $_GET['id']; 
    $selection = "SELECT id, name, type FROM devices WHERE id = '$device_id'";
    $statement = "SELECT * FROM device_history WHERE device_id = '$device_id'";
    $run_sel = mysqli_query($db_connect,$selection);
    if ($run_sel) {
    $device = mysqli_fetch_object($run_sel);
}
    $run_query = mysqli_query($db_connect,$statement); ?>

    <div id="device_history">
        <div id="child">
            <h3>Device ID</h3><br>
            <?php echo $device->id?>
        </div>
        <div id="child">
            <h3>Device Name</h3><br>
            <?php echo $device->name?>
        </div>
        <div id="child">
            <h3>Device Type</h3><br>
            <?php echo $device->type?>
        </div>
    </div>

<table>
    <th>Sr No.</th>
    <th>Service</th>
    <th>Price</th>
    <th>Date</th>
    <th>Details</th>
    <th>Comments</th>
   <?php $counter = 1; 
   if ($run_query->num_rows > 0) {
     while($row = mysqli_fetch_object($run_query)) { ?>
            <tr>
            <td><?php echo $counter ?></td>
            <td><?php echo $row->service  ?></td>
            <td><?php echo $row->service_cost  ?></td>
            <td><?php echo $row->service_date  ?></td>
            <td><?php echo $row->details  ?></td>
            <td><?php echo $row->comments  ?></td>
            </tr>
            <?php $counter++; } ?>
           </table> 
        <?php 
    }
else {
        echo 'No data found.';
    }   ?>

        </div>
    </div>
</body>
</html>