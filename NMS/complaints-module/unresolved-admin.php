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
             <form action="complaints-admin.php" method="post">
            <input type="submit" value="Resolved complaints" class="add_new">
            </form>
            
            <h1 style="margin-left: 35%;">Unresolved Complaints</h1>
            
            <table>
    <tr>
        <th>ID</th>
        <th>Complaint</th>
        <th>Device Name</th>
        <th>Employee Name</th>
        <th>Date of Complaint</th>
        <th>Mark as Resolved</th>
    </tr>
            <?php require_once('../dbconnect.php');
  
     $emp_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];
    $status="Unresolved";
    
        $statement = "SELECT * FROM complaints_db WHERE status='$status'";
  
    $run_query = mysqli_query($db_connect,$statement);

if ($run_query->num_rows > 0) {
     while($row = mysqli_fetch_object($run_query)) { ?>
            <tr>
            <td><?php echo $row->complaint_id ?></td>
            <td><?php echo $row->issue ?></td>
            <td><?php echo $row->device_name  ?></td>
            <td><?php echo $row->name  ?></td>
            <td><?php echo $row->complaint_date  ?></td>
            <td><a href='<?php echo BASE_URL;?>complaints-module/mark-as-resolved.php?complaint_id=<?php echo $row->complaint_id ?>'>mark as resolved</a></td>
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