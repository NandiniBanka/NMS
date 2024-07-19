<?php session_start();
require_once('../config.php');

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Add New Company</title>
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
            <h1>Details of New Company</h1>

            <label for="C_ID">Company ID: &nbsp &nbsp &nbsp</label>
            <input type="text" id="C_ID" name="C_ID" required><br><br>            

            <label for="C_Name">Company Name: &nbsp &nbsp &nbsp</label>
            <input type="text" id="C_Name" name="C_Name" required><br><br>

            <label for="C_Branch">Branch:&nbsp</label>
            <input type="text" id="C_Branch" name="C_Branch" required><br><br>
        
            <label for="C_type">Company Type: &nbsp&nbsp</label>
            <select name="C_type" id="C_type">
                <option value="Customer">Customer</option>
                <option value="Vendor">Vendor</option>
                <option value="Both">Both</option>
            </select><br><br>
        
            <label for="contact">Contact number: &nbsp&nbsp</label>
            <input type="text" id="contact" name="contact" required><br><br>

            <label for="email">Email id: &nbsp</label>
            <input type="email" id="email" name="email" required><br><br>
        
            <label for="notes">Notes: &nbsp &nbsp &nbsp</label>
            <input type="text" id="notes" name="notes" ><br><br>
        
            <input type="submit" name="save_details" value="Add Company">

            </div>
            </form>
            
        </div>    
    </div>
    <div class="device_info"><?php require_once('../dbconnect.php');

if (isset($_POST['save_details'])) {

        $C_Name      = $_POST['C_Name'];
        $C_Branch       = $_POST['C_Branch'];
        $C_type  = $_POST['C_type'];
        $contact             = $_POST['contact'];
        $email             = $_POST['email'];
        $notes           = $_POST['notes'];
        $C_ID           = $_POST['C_ID'];

        $statement = 'INSERT INTO `company_db`(`C_Name`, `C_Branch`, `C_type`, `contact`, `email`, `notes`, `C_ID`) values("'.$C_Name.'","'.$C_Branch.'","'.$C_type.'","'.$contact.'","'.$email.'","'.$notes.'","'.$C_ID.'")';
        $run_query = mysqli_query($db_connect,$statement);

        if ($run_query) {
            echo "Data saved successfully.";
        } else {
            echo "Data could not be saved, please try again.";
        }

}
?>
</div>
</body>
</html>
