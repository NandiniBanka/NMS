<?php
require_once('database.php');
$query = "SELECT * FROM user LIMIT 1"; // Assuming you want to get the first user
$result = mysqli_query($con, $query);
$row = mysqli_fetch_object($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuration Settings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
        }
        .sidebar {
            background-color: #9b59b6;
            width: 200px;
            padding: 20px;
            height: 100vh;
        }
        .sidebar h2, .sidebar ul {
            color: #fff;
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .sidebar ul li {
            margin: 20px 0;
        }
        .content {
            flex-grow: 1;
            background-color: #fff;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            background-color: #9b59b6;
            color: white;
            /*align-items: center;*/
            padding: 10px 20px;
        }
        .header input[type="search"] {
            padding: 5px;
        }
        .header button {
            padding: 5px 10px;
        }
        .autofill {
            margin-top: 20px;
        }
        .autofill h2 {
            margin-bottom: 20px;
        }
        .autofill img {
            vertical-align: middle;
            margin-right: 10px;
        }
        .footer {
            text-align: right;
            margin-top: 50px;
        }
        .footer img {
            width: 150px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Settings</h2>
        <ul>
            <li><a href="configuration.php">Your Profile</a></li>
            <li><a href="autofill_and_password.php">Autofill and passwords</a></li>
            <li><a href="#">Performance</a></li>
            <li><a href="appearance.php">Appearance</a></li>
            <li><a href="languages.php">Languages</a></li>
            <li><a href="updates.php">Updates</a></li>
            <li><a href="system.php">System</a></li>
            <li><a href="#">Reset settings</a></li>
        </ul>   
    </div>
    <div class="content">
        <div class="header">
            <div>
                <input type="search" placeholder="Search">
                <button>Search</button>
            </div>
            <div>
                <button>🔔</button>
                <button>Logout</button>
            </div>
        </div>
    
        <div class="autofill">
            <h2>Autofill and passwords</h2>
            <div>
                <!-- <img src="path/to/your/profile_icon.png" alt="Profile Icon" width="40"> -->
                <span><?php echo $row ? $row->first_name." ".$row->last_name : ""?></span><br>
                <span>Signed in to <?php echo $row ? $row->email_id : ""?></span>
            </div>
            <div>
                <p>Manage Your Saved Passwords</p>
                <p>Addresses</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
