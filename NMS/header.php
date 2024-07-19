<?php 
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    .header {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        background-color: #D4BEF0;
        padding: 7px;
    }
    .header img {
        margin-right: 10px;
    }
    </style>
</head>
<body>
    <div class="header">
        <form action="<?php echo BASE_URL?>/login/logout.php" method="post">
            <input type="submit" name="form_submit" value="Log Out">
        </form>
    </div>
</body>
</html>