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
        .sidebar ul li a {
            color: white;
            text-decoration: none;
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
            background-color: #8e44ad;
            color: white;
            padding: 10px 20px;
        }
        .header input[type="search"] {
            padding: 5px;
        }
        .header button {
            padding: 5px 10px;
        }
        .appearance {
            margin-top: 20px;
        }
        .appearance h2 {
            margin-bottom: 20px;
        }
        .appearance label, .appearance select, .appearance input {
            display: block;
            margin-bottom: 10px;
        }
        .footer {
            text-align: right;
            margin-top: 50px;
        }
        .footer img {
            width: 150px;
        }
    </style>
    <script>
        function toggleCheckboxGroup(name, value) {
            var checkboxes = document.getElementsByName(name);
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
            value.checked = true;
        }
    </script>
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
        
        <div class="appearance">
            <h2>Appearance</h2>
            <button>Reset to default</button>
            
            <label for="theme">Theme</label>
            <select id="theme" name="theme">
                <option value="light">Light</option>
                <option value="default">System Default</option>
            </select>
            
            <label for="mode">Mode</label>
            <select id="mode" name="mode">
                <option value="device">Device</option>
                <!-- Add other options as necessary -->
            </select>
            
            <label>Show Memory Usage</label>
            <input type="checkbox" name="memory_usage" onclick="toggleCheckboxGroup('memory_usage', this)">
            
            <label>Side Panel</label>
            <input type="checkbox" name="side_panel" value="right" onclick="toggleCheckboxGroup('side_panel', this)"> Show on right
            <input type="checkbox" name="side_panel" value="left" onclick="toggleCheckboxGroup('side_panel', this)"> Show on left
            
            <label for="font_size">Font Size</label>
            <select id="font_size" name="font_size">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
            
            <label for="customize_fonts">Customize Fonts</label>
            <select id="customize_fonts" name="customize_fonts">
                <option value="regular">Regular</option>
                <option value="bold">Bold</option>
                <option value="thin">Thin</option>
            </select>
        </div>
    </div>
</div>

</body>
</html>
