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
	<title>Company List</title>
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
            <form action="add_company.php" method="post">
            <input type="submit" value="Add New Company" class="add_new">
            </form>
            <table>
    <tr>
        <th>ID</th>
        <th>Company</th>
        <th>Branch</th>
        <th>Type</th>
        <th>Contact Number</th>
        <th>Email ID</th>
        <th>Notes</th>
        <th>Delete</th>

    </tr>
            <?php require_once('../dbconnect.php');
  
     $emp_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];
    if ($user_type == 'Admin') {
        $statement = "SELECT * FROM company_db";
    }
    else {
       $statement = "SELECT * FROM company_db WHERE emp_id = '$emp_id'"; 
    }
    
    $run_query = mysqli_query($db_connect,$statement);

if ($run_query->num_rows > 0) {
     while($row = mysqli_fetch_object($run_query)) { ?>
            <tr>
            <td><?php echo $row->C_ID ?></td>
            <td><a href='<?php echo BASE_URL;?>company-module/Device_of_company.php?C_ID=<?php echo $row->C_ID ?>'><?php echo $row->C_Name  ?></a></td>
            <td><?php echo $row->C_Branch  ?></td>
            <td><?php echo $row->C_type  ?></td>
            <td><?php echo $row->contact  ?></td>
            <td><?php echo $row->email  ?></td>
            <td><?php echo $row->notes  ?></td>
            <td><a href="?confirmation=true&id=<?php echo $row->C_ID ?>" style="color: blue; text-decoration: none;">Delete</a></td>
            </tr>
        <?php } 
    }
else {
        echo 'No data found.';
    }   ?>
     <?php if ($confirmation) {
    $confirmquery = "SELECT * FROM company_db WHERE C_ID = '$confirmation'";
    $confirmresult = mysqli_query($db_connect, $confirmquery);
    $confirmdata = mysqli_fetch_object($confirmresult);
    if ($confirmdata) { ?>
        <div class="popup-overlay"></div>
        <div class="popup">
            <h2>Delete Company ID: <?php echo $confirmdata->C_ID ?></h2>
            <a href="<?php echo BASE_URL; ?>company-module/delete_company.php?C_ID=<?php echo $confirmdata->C_ID ?>" class="close-btn">Confirm</a><br><br>
            <a href="?" class="close-btn">Close</a>
        </div>
    <?php }
} ?>
    </table>
        </div>
    </div>
</body>
</html>