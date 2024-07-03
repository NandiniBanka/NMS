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
            align-items: center;
        }
        .header input[type="search"] {
            padding: 5px;
        }
        .header button {
            padding: 5px 10px;
        }
        .updates {
            margin-top: 20px;
        }
        .updates button {
            padding: 10px;
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
                <li><a href="#">System</a></li>
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
        
        <div class="updates">
            <h2>Updates</h2>
            <p>You are up to date</p>
            <button>Check for Updates</button>
            <div>
                <h3>More Actions</h3>
                <button>Pause updates (For a week)</button>
                <button>Update History</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
