<?php session_start();

require_once('../config.php');
$showdetails = isset($_GET['showdetails']) && isset($_GET['id']) ? $_GET['id'] : null;
$confirmation = isset($_GET['confirmation']) && isset($_GET['id']) ? $_GET['id'] : null;
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Device List</title>

</head>
<body>
 <div id="container">
        <div id="child1">
         <?php require_once('../left-panel-emp.php'); ?>
        </div>
        <div id="child2">
        	<?php require_once('../header.php') ?>
            <form action="" method="get">
            <div class="search">
            <input type="search" name="query" placeholder="Type here to search">
            <input type="submit" value="Search">
            </form>
            </div>
            <br>
            <form action="add_device.php" method="post">
            <input type="submit" value="Add Device">
            </form>
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
        <th>Edit</th>
        <th>Delete</th>

    </tr>
            <?php require_once('../dbconnect.php');
    $emp_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];
     $query = isset($_GET['query']) ? $_GET['query'] : '';
     $query_escaped = mysqli_real_escape_string($db_connect, $query);
            
    if ($user_type == 'Admin') {
        $statement = "SELECT * FROM devices";
    }
    else {
       $statement = "SELECT * FROM devices WHERE employee_id = '$emp_id'"; 
    }

    if (!empty($query)) {
                $statement .= " AND (id LIKE '%$query_escaped%' OR name LIKE '%$query_escaped%' OR type LIKE '%$query_escaped%' OR status LIKE '%$query_escaped%' OR date_of_sale LIKE '%$query_escaped%' OR price LIKE '%$query_escaped%' OR warranty_expires_on LIKE '%$query_escaped%')";
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
            <td><a href="?showdetails=true&id=<?php echo $row->id ?>" style="color: blue; text-decoration: none;">View</a></td>
            <td><a href="<?php echo BASE_URL; ?>device_module/edit-device.php?id=<?php echo $row->id ?>" style="color: blue; text-decoration: none;">Edit</a></td>
            <td><a href="?confirmation=true&id=<?php echo $row->id ?>" style="color: blue; text-decoration: none;">Delete</a></td>
            </tr>
            
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
            <a href="?" class="close-btn">Close</a>
        </div>
    <?php }
} ?>
 <?php if ($confirmation) {
    $confirmquery = "SELECT * FROM devices WHERE id = '$confirmation'";
    $confirmresult = mysqli_query($db_connect, $confirmquery);
    $confirmdata = mysqli_fetch_object($confirmresult);
    if ($confirmdata) { ?>
        <div class="popup-overlay"></div>
        <div class="popup">
            <h2>Delete Device ID: <?php echo $confirmdata->id ?></h2>
            <a href="<?php echo BASE_URL; ?>device_module/delete-device.php?id=<?php echo $confirmdata->id ?>" class="close-btn">Confirm</a><br><br>
            <a href="?" class="close-btn">Close</a>
        </div>
    <?php }
} ?>

    </table>
        </div>
    </div>
</body>
</html>