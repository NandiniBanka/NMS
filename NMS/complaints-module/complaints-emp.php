<?php session_start();
require_once('../config.php');

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Complaints</title>
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
            <br>
            <form action="launch_complaint.php" method="post">
            <input type="submit" value="New Complaint" class="add_new">
            </form>
            <table>
    <tr>
        <th>ID</th>
        <th>Complaint</th>
        <th>Device Name</th>
        <th>Date of Complaint</th>
        <th>Date of resolution</th>

    </tr>
            <?php require_once('../dbconnect.php');
  
     $emp_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];
    
       $statement = "SELECT * FROM complaints_db WHERE emp_id = '$emp_id'"; 
    
    
    $run_query = mysqli_query($db_connect,$statement);

if ($run_query->num_rows > 0) {
     while($row = mysqli_fetch_object($run_query)) { ?>
            <tr>
            <td><?php echo $row->complaint_id ?></td>
            <td><?php echo $row->issue  ?></td>
            <td><?php echo $row->device_name  ?></td>
            <td><?php echo $row->complaint_date  ?></td>
            <td><?php echo $row->resolve_date  ?></td>
            </tr>
        <?php } 
    }
else {
        echo 'No data found.';
    }   ?>
    </table>
        </div>
    </div>
</body>
</html>