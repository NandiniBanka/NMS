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
                <li><a href="#">System</a></li>
                <li><a href="#">Reset settings</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="header">
                <div class="profile">
                    <img src="profile.png" alt="Profile Picture" width="40" height="40">
                    <span>SANYAM SHARMA</span>
                </div>
                <div class="logout">LOGOUT</div>
            </div>
            <h1>CONFIGURATION</h1>
            <div class="profile-info">
                <h2>Your Profile</h2>
                <p>Signed in to sanyam@indovisionservices.in</p>
                <div class="profile-actions">
                    <a href="#">Manage Your Profile</a>
                    <a href="#">Customise Your Profile</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
