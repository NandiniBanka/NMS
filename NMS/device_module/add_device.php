<?php session_start();
require_once('../config.php');

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Add New Device</title>
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
            <h1>Details of New Device</h1>

            <label for="device_id">Device ID: &nbsp &nbsp &nbsp</label>
            <input type="text" id="device_id" name="device_id" required><br><br>

            <label for="device_name">Device Name:&nbsp</label>
            <input type="text" id="device_name" name="device_name" required><br><br>
        
            <label for="device_type">Device Type: &nbsp&nbsp</label>
            <input type="text" id="device_type" name="device_type" required><br><br>
        
            <label for="company_id">Company ID: &nbsp&nbsp</label>
            <input type="text" id="company_id" name="company_id" required><br><br>

            <label for="price">Price (in Rs.): &nbsp</label>
            <input type="number" id="price" name="price" required><br><br>
        
            <label for="warranty_expires_on">Warranty Expiration: &nbsp &nbsp &nbsp</label>
            <input type="date" id="warranty_expires_on" name="warranty_expires_on" required><br><br>
        
            <input type="submit" name="save_details" value="Add Device">

            </div>
            </form>
            <?php require_once('../dbconnect.php');

if (isset($_POST['save_details'])) {

        $id      = $_POST['device_id'];
        $name       = $_POST['device_name'];
        $type  = $_POST['device_type'];
        $company_id             = $_POST['company_id'];
        $price             = $_POST['price'];
        $warranty_expires_on           = $_POST['warranty_expires_on'];
        $date_of_sale = date('Y-m-d');

        $statement = 'INSERT INTO `devices`(`id`, `name`, `type`, `company_id`, `price`, `warranty_expires_on`, `date_of_sale`) values("'.$id.'","'.$name.'","'.$type.'","'.$company_id.'","'.$price.'","'.$warranty_expires_on.'","'.$date_of_sale.'")';
        $run_query = mysqli_query($db_connect,$statement);

        if ($run_query) {
            echo "Data saved successfully.";
        } else {
            echo "Data could not be saved, please try again.";
        }

}
?>
        </div>    
    </div>
</body>
</html>