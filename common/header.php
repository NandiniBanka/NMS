<?php //session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once(dirname(__DIR__).'/config.php') ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>includes/css/style.css?v=2">
 <div class="col">
        <div class="rightside">
            <div class="container">
                <img class="notification1" alt="" src="../images/notifications.png"/>
                <form action="logout.php" method="post">
			    <input type="submit" name="logout"  class="logoutb" value="Logout">
		         </form>
            </div>
            <div class="container2">
                  <div class="searchm">
                  <input type="search" name="search" class="searchht" placeholder="search">
                  <button type="button" class="searchht">Search</button><br></div>
             </div>
           


            </div>
        </div>
</head>
