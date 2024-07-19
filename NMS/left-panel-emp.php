<?php 
require_once('config.php');
$user_type = $_SESSION['user_type'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    .left-panel{
    margin-bottom: 30px;
    margin-left: 20px;
    width: 80%;
    font-size: 150%;
    padding: 5px;
    }
    </style>
    <title>Add New Device</title>
</head>
<body>
    <img src="<?php echo BASE_URL?>/profile.png" class="profile"> <br> <br>
    <?php if ($user_type == 'Admin') { ?><form action="<?php echo BASE_URL?>/dashboard-frontend/admin_dashboard.php" method="post"><?php }else{ ?>
    <form action="<?php echo BASE_URL?>/dashboard-frontend/emp_dashboard.php" method="post"><?php }?>
    <input type="submit" value="Dashboard" class="left-panel"><br></form>
    <form action="<?php echo BASE_URL?>/device_module/dl.php" method="post"><input type="submit" value="Devices" class="left-panel"></form>
    <form action="<?php echo BASE_URL?>/company-module/company_list.php" method="post"><input type="submit" value="Company list" class="left-panel"><br></form>
    <form action="<?php echo BASE_URL?>/alerts management.php" method="post"><input type="submit" value="Alerts" class="left-panel"><br></form></form>
    <?php if ($user_type == 'Admin') { ?><form action="<?php echo BASE_URL?>/complaints-module/complaints-admin.php" method="post"><?php }else{ ?>
    <form action="<?php echo BASE_URL?>/complaints-module/complaints-emp.php" method="post"><?php }?>
    <input type="submit" value="Complaints" class="left-panel"><br></form>
    <?php if ($user_type == 'Admin') { ?><form action="<?php echo BASE_URL?>/employee_module/emp_list.php" method="post"><input type="submit" value="Employee Access" class="left-panel"><br></form><?php }?>
    <input type="submit" value="Settings" class="left-panel"><br>
</body>
</html>