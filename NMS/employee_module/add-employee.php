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
            <h1>Details of New Employee</h1>

            <label for="emp_id">Employee ID: &nbsp &nbsp &nbsp</label>
            <input type="text" id="emp_id" name="emp_id" required><br><br>

            <label for="first_name">First Name:&nbsp</label>
            <input type="text" id="first_name" name="first_name" required><br><br>
        
            <label for="last_name">Last Type: &nbsp&nbsp</label>
            <input type="text" id="last_name" name="last_name" required><br><br>
        
            <label for="type">Position: &nbsp&nbsp</label>
            <select id="type" name="type">
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
            </select><br><br>

            <label for="contact_number">Contact Number: &nbsp</label>
            <input type="text" id="contact_number" name="contact_number" required><br><br>
        
            <label for="dob">Date of Birth: &nbsp &nbsp &nbsp</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <label for="doj">Date of Joining: &nbsp &nbsp &nbsp</label>
            <input type="date" id="doj" name="doj" required><br><br>

             <label for="email">Email Id: &nbsp &nbsp &nbsp</label>
            <input type="text" id="email" name="email" required><br><br>

             <label for="password">Password: &nbsp &nbsp &nbsp</label>
            <input type="text" id="password" name="password" required><br><br>
        
            <input type="submit" name="save_details" value="Add Employee">

            </div>
            </form>
                        <?php require_once('../dbconnect.php');

if (isset($_POST['save_details'])) {

        $emp_id      = $_POST['emp_id'];
        $first_name      = $_POST['first_name'];
        $last_name       = $_POST['last_name'];
        $contact_number  = $_POST['contact_number'];
        $dob             = $_POST['dob'];
        $doj             = $_POST['doj'];
        $email           = $_POST['email'];
        $password        = md5($_POST['password']);
        $updated_by = $created_by      = $_SESSION['user_id'];
        $updated_date = $created_date    = date('Y-m-d');

        $statement = 'INSERT INTO `users`(`id`, `first_name`, `last_name`, `contact_number`, `dob`, `doj`, `email_id`, `password`, `created_datetime`,`updated_datetime`, `created_by`,`updated_by`) values("'.$emp_id.'","'.$first_name.'","'.$last_name.'","'.$contact_number.'","'.$dob.'","'.$doj.'","'.$email.'","'.$password.'","'.$created_date.'","'.$updated_date.'","'.$created_by.'","'.$created_by.'")';
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