<?php session_start();
require_once('../config.php');
require_once('../dbconnect.php');

$user = NULL;
$device_id = $_GET['id']; 
$statement = "SELECT * FROM devices WHERE id = '$device_id'";
$run_query = mysqli_query($db_connect,$statement);

if ($run_query) {
    $user = mysqli_fetch_object($run_query);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Edit Device Details</title>
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
            <form action="" method="post">
            <div class="device_info">
            <h1>Details of Device</h1>

            <label for="deviceid">Device ID: &nbsp &nbsp &nbsp</label>
            <input type="text" value="<?php echo $user->id ?>" name="deviceid"  required><br><br>

            <label for="device_name">Device Name:&nbsp</label>
            <input type="text" value="<?php echo $user->name ?>" name="device_name" required><br><br>
        
            <label for="device_type">Device Type: &nbsp&nbsp</label>
            <input type="text" value="<?php echo $user->type ?>" name="device_type" required><br><br>

            <label for="employee_id">Employee ID: &nbsp&nbsp</label>
            <input type="text" value="<?php echo $user->employee_id ?>" name="employee_id" required><br><br>
        
            <label for="company_id">Company ID: &nbsp&nbsp</label>
            <input type="text" value="<?php echo $user->company_id ?>" name="company_id" required><br><br>

            <label for="status">Status: &nbsp &nbsp</label>
            <select name="status">
            <option value="<?php echo $user->status ?>"><?php echo $user->status ?></option>
            <option value="<?php if($user->status=="DOWN"){echo "UP";} else{echo "DOWN";}?>"><?php if($user->status=="DOWN"){echo "UP";} else{echo "DOWN";}?></option>
            </select><br><br>

            <label for="price">Price (in Rs.): &nbsp</label>
            <input type="number" value="<?php echo $user->price ?>" name="price" required><br><br>

            <label for="date_of_sale">Date of Sale: &nbsp &nbsp &nbsp</label>
            <input type="date" value="<?php echo $user->date_of_sale ?>" name="date_of_sale" required><br><br>
        
            <label for="warranty_expires_on">Warranty Expiration: &nbsp &nbsp &nbsp</label>
            <input type="date" value="<?php echo $user->warranty_expires_on ?>" name="warranty_expires_on" required><br><br>
        
            <input type="submit" name="save_details" value="Save Changes">

            </div>
            </form>
            <?php require_once('../dbconnect.php');

if (isset($_POST['save_details'])) {

        $deviceid     = $_POST['deviceid'];
        $name       = $_POST['device_name'];
        $type  = $_POST['device_type'];
        $company_id             = $_POST['company_id'];
        $status      = $_POST['status'];
        $price             = $_POST['price'];
        $warranty_expires_on           = $_POST['warranty_expires_on'];
        $date_of_sale           = $_POST['date_of_sale'];
        $employee_id = $_POST['employee_id'];

       $statement = 'UPDATE `devices` SET 
              `id` = "'.$deviceid.'",
              `name` = "'.$name.'",
              `type` = "'.$type.'",
              `company_id` = "'.$company_id.'",
              `employee_id` = "'.$employee_id.'",
              `date_of_sale` = "'.$date_of_sale.'",
              `price` = "'.$price.'",
              `warranty_expires_on` = "'.$warranty_expires_on.'",
              `status` = "'.$status.'" 
              WHERE `id` = "'.$device_id.'"';
$run_query = mysqli_query($db_connect, $statement);

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