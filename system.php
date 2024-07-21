<!-- <?php
$con = mysqli_connect("localhost","root","","nms");
if(!$con){
	die("Error connecting".mysqli_error($con));
}
$query = "SELECT * FROM `system` LIMIT 1"; // Assuming you want to get the first user
$result = mysqli_query($con, $query);
$row = mysqli_fetch_object($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration</title>
    <style>
        /*body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #9370DB;
            padding: 15px;
            color: white;
            height: 100vh;
        }
        .sidebar h2 {
            font-size: 24px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .header {
            background-color: #9370DB;
            padding: 10px;
            color: white;
            text-align: center;
        }
        .search {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .search input {
            padding: 10px;
            margin-right: 10px;
        }
        .specifications {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 20px;
        }*/
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
            flex: 0.25;
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
        .search{
        	display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #8e44ad;
            color: white;
            padding: 10px 20px;
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
            <div class="search">
                <input type="text" placeholder="Search">
                <button>Logout</button>
            </div>
            <div class="specifications">
                <?php
				require_once('database.php');
				$query = "SELECT * FROM system_specs WHERE device_id = 'specific_device_id'";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_assoc($result);
				?>
				<!DOCTYPE html>
				<html>
				<!-- Include the same HTML structure as above here, replacing static text with PHP variables -->

				<p><strong>Device name:</strong> <?php echo $row['device_name']; ?></p>
				<p><strong>Processor:</strong> <?php echo $row['processor']; ?></p>
				<p><strong>Installed RAM:</strong> <?php echo $row['installed_ram']; ?></p>
				<p><strong>Device ID:</strong> <?php echo $row['device_id']; ?></p>
				<p><strong>Product ID:</strong> <?php echo $row['product_id']; ?></p>
				<p><strong>System type:</strong> <?php echo $row['system_type']; ?></p>
				<p><strong>Edition:</strong> <?php echo $row['edition']; ?></p>
				<p><strong>Version:</strong> <?php echo $row['version']; ?></p>
				<p><strong>Installed on:</strong> <?php echo $row['installed_on']; ?></p>
				<p><strong>OS build:</strong> <?php echo $row['os_build']; ?></p>
				<p><strong>Experience:</strong> <?php echo $row['experience']; ?></p>
                <button>Copy</button>
            </div>
        </div>
    </div>
</body>
</html> -->