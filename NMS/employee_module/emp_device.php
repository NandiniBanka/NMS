<?php session_start();

require_once('../config.php');
$emp_id = $_GET['id']; 
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


            <?php require_once('../dbconnect.php');
     $query = isset($_GET['query']) ? $_GET['query'] : '';
     $query_escaped = mysqli_real_escape_string($db_connect, $query);
   $statement = "SELECT * FROM devices WHERE employee_id = '$emp_id'";
   
    if (!empty($query)) {
                $statement .= " AND (id LIKE '%$query_escaped%' OR name LIKE '%$query_escaped%' OR type LIKE '%$query_escaped%' OR company_id LIKE '%$query_escaped%')";
            }

    
    $run_query = mysqli_query($db_connect,$statement);
    $counting = "SELECT COUNT(id) AS device_count, COUNT(DISTINCT company_id) AS unique_companies FROM devices WHERE employee_id = '$emp_id'";
   $run_count = mysqli_query($db_connect,$counting);
    $result = mysqli_fetch_assoc($run_count);?>
<div style="display: flex;">
    <div style="flex: 1; text-align: center;">
       <?php echo '<h2>No. of Devices Accessed = ' . $result['device_count'] , '</h2>';?>
 <form action="add_device_access.php" method="get">
    <input type="hidden" name="e_id" value="<?php echo $emp_id?>">
            <input type="submit" value="&nbsp Add Device Access &nbsp&nbsp">
            </form>
    </div>        
    <div style="flex: 1; text-align: center;">
<?php echo '<h2> No. of Companies Accessed = ' . $result['unique_companies'] , '</h2>';?>
<form action="add_company_access.php" method="get">
    <input type="hidden" name="e_id" value="<?php echo $emp_id?>">
            <input type="submit" value="Add Company Access">
            </form>
    </div>        
</div>            
<?php echo "<h1>Devices Accessed By Employee with ID $emp_id</h1>"?>
  <table>
    <tr>
        <th>ID</th>
        <th>Device Name</th>
        <th>Device Type</th>
        <th>Company</th>
        <th>Remove Access</th>
    </tr>

  

<?php

 if ($run_query->num_rows > 0) {
     while($row = mysqli_fetch_object($run_query)) { ?>
            <tr>
            <td><?php echo $row->id ?></td>
            <td><?php echo $row->name  ?></td>
            <td><?php echo $row->type  ?></td>
            <td><?php echo $row->company_id  ?></td>
            <td><a href="<?php echo BASE_URL; ?>employee_module/rem-dev-access.php?id=<?php echo $row->id ?>" style="color: blue; text-decoration: none;">Remove</a></td>
            </tr>
            
<?php } 
 } 
else {
        echo 'No data found.';
    }   ?>
 

    </table>
    <?php echo "<h1>Companies Accessed By Employee with ID $emp_id</h1>"?>
     <table>
    <tr>
        <th>Company ID</th>
        <th>Company Name</th>
        <th>Company Branch</th>
        <th>Remove Access</th>
    </tr>
<?php
$statement = "SELECT * FROM company_db WHERE emp_id = '$emp_id'";
   
    if (!empty($query)) {
                $statement .= " AND (id LIKE '%$query_escaped%' OR name LIKE '%$query_escaped%' OR type LIKE '%$query_escaped%' OR company_id LIKE '%$query_escaped%')";
            }

    $run_query = mysqli_query($db_connect,$statement);
 if ($run_query->num_rows > 0) {
     while($row = mysqli_fetch_object($run_query)) { ?>
            <tr>
            <td><?php echo $row->C_ID ?></td>
            <td><?php echo $row->C_Name  ?></td>
            <td><?php echo $row->C_Branch  ?></td>
            <td><a href="<?php echo BASE_URL; ?>employee_module/rem-comp-access.php?id=<?php echo $row->c_id ?>" style="color: blue; text-decoration: none;">Remove</a></td>
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

