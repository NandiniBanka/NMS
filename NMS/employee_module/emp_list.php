<?php session_start();

require_once('../config.php');
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
         <?php require_once('../left-panel-emp.php') ?>
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
            <form action="add-employee.php" method="post">
            <input type="submit" value="Add Employee">
            </form>
            <table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Position</th>
        <th>Contact Number</th>
        <th>Email Id</th>
        <th>Access</th>
        <th>Delete</th>
    </tr>
            <?php require_once('../dbconnect.php');
     $query = isset($_GET['query']) ? $_GET['query'] : '';
     $query_escaped = mysqli_real_escape_string($db_connect, $query);
    $userid = $_SESSION['user_id'];
   $statement = "SELECT * FROM users WHERE type ='Employee' AND status='Active'";

    if (!empty($query)) {
                $statement .= " AND (id LIKE '%$query_escaped%' OR first_name LIKE '%$query_escaped%' OR last_name LIKE '%$query_escaped%' OR contact_number LIKE '%$query_escaped%' OR email_id LIKE '%$query_escaped%')";
            }
    
    $run_query = mysqli_query($db_connect,$statement);

if ($run_query->num_rows > 0) {
     while($row = mysqli_fetch_object($run_query)) { ?>
            <tr>
            <td><?php echo $row->id ?></td>
            <td><?php echo $row->first_name  ?></td>
            <td><?php echo $row->last_name  ?></td>
            <td><?php echo $row->type  ?></td>
            <td><?php echo $row->contact_number  ?></td>
            <td><?php echo $row->email_id  ?></td>
            <td><a href="<?php echo BASE_URL; ?>employee_module/emp_device.php?id=<?php echo $row->id ?>" style="color: blue; text-decoration: none;">View</a></td>
            <td><a href="?confirmation=true&id=<?php echo $row->id ?>" style="color: blue; text-decoration: none;">Delete</a></td>
            </tr>
            
<?php } 
 } 
else {
        echo 'No data found.';
    }   ?>
 <?php if ($confirmation) {
    $confirmquery = "SELECT * FROM users WHERE id = '$confirmation'";
    $confirmresult = mysqli_query($db_connect, $confirmquery);
    $confirmdata = mysqli_fetch_object($confirmresult);
    if ($confirmdata) { ?>
        <div class="popup-overlay"></div>
        <div class="popup">
            <h2>Delete Employee ID: <?php echo $confirmdata->id ?></h2>
            <a href="<?php echo BASE_URL; ?>employee_module/delete_employee.php?id=<?php echo $confirmdata->id ?>" class="close-btn">Confirm</a><br><br>
            <a href="?" class="close-btn">Close</a>
        </div>
    <?php }
} ?>

    </table>
        </div>
    </div>
</body>
</html>