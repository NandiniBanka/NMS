<?php
require_once('database.php');
$query = "SELECT * FROM user"; // Assuming you want to get all users
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #9b59b6;
            color: white;
            padding: 20px;
            /*flex: 0.25;*/
        }
        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .content {
            flex: 1;
            background-color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #8e44ad;
            color: white;
            padding: 10px 20px;
        }
        .profile {
            display: flex;
            align-items: center;
        }
        .profile img {
            border-radius: 50%;
            margin-right: 10px;
        }
        .profile span {
            font-size: 16px;
        }
        .logout {
            cursor: pointer;
        }
        .content h1 {
            margin-top: 0;
        }
        .content .profile-info {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
        }
        .content .profile-info h2 {
            margin: 0;
            font-size: 18px;
        }
        .content .profile-info p {
            margin: 10px 0 0;
        }
        .content .profile-actions a {
            display: block;
            margin: 10px 0;
            color: #333;
            text-decoration: none;
        }
        .table-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            background-color: white;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th, td {
            text-align: left;
        }
        h2 {
            text-align: center;
            background-color: transparent; /* Ensure no background color */
            padding: 10px;
            margin-top: 0;
        }
        mark {
            background-color: transparent; /* Override mark styling */
            color: inherit;
        }
    </style>
</head>
<body>
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
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
            ?>
                <h2>Displaying USER Data</h2>
                <div class="table-container">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>DOB</th>
                            <th>DOJ</th>
                            <th>Status</th>
                            <th>Operation</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['first_name']."</td>
                                    <td>".$row['last_name']."</td>
                                    <td>".$row['email_id']."</td>
                                    <td>".$row['contact_number']."</td>
                                    <td>".$row['dob']."</td>
                                    <td>".$row['doj']."</td>
                                    <td>".$row['status']."</td>
                                    <td><a href='updatemanage.php?id=".$row['id']."'>Update</a></td>
                                </tr>";
                        }
                        ?>
                    </table>
                </div>
            <?php
            } else {
                echo "<p>No data found</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
