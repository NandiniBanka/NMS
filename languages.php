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
        .languages {
            margin-top: 20px;
        }
        .languages h2 {
            margin-bottom: 20px;
        }
        .languages label, .languages input {
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
        function toggleSpellCheckOptions() {
            var spellCheck = document.getElementById('spell_check');
            var basicSpellCheck = document.getElementById('basic_spell_check');
            var enhancedSpellCheck = document.getElementById('enhanced_spell_check');
            if (spellCheck.checked) {
                basicSpellCheck.style.display = 'block';
                enhancedSpellCheck.style.display = 'block';
            } else {
                basicSpellCheck.style.display = 'none';
                enhancedSpellCheck.style.display = 'none';
            }
        }
        
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
        
        <div class="languages">
            <h2>Languages</h2>
            <button>Reset to default</button>
            
            <label for="language">Language</label>
            <select id="language" name="language">
                <!-- Add language options here -->
            </select>
            
            <label for="spell_check">Spell check</label>
            <input type="checkbox" id="spell_check" name="spell_check" onclick="toggleSpellCheckOptions()">
            
            <label id="basic_spell_check" style="display: none;">
                <input type="checkbox" name="spell_check_option" value="basic" onclick="toggleCheckboxGroup('spell_check_option', this)"> Basic spell check
            </label>
            <label id="enhanced_spell_check" style="display: none;">
                <input type="checkbox" name="spell_check_option" value="enhanced" onclick="toggleCheckboxGroup('spell_check_option', this)"> Enhanced spell check
            </label>
        </div>
    </div>
</div>

</body>
</html>
