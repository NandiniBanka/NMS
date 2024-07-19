 <?php session_start();
require_once('../config.php');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Dashboard</title>
    <style type="text/css"> .dashboard .stats {
    display: flex;
    justify-content: space-around;
    flex-direction: row;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.card{
    background:#D9D9D9;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    flex: 1;
    margin: 0 10px;
}</style>
</head>
<body>
 <div id="container">
    <div id="child1">
            <?php require_once('../left-panel-emp.php') ?>
        </div>
        <div id="child2">
        	<?php require_once('../header.php') ;?>
            <div class="search">
            <input type="search" name="form_submit" placeholder="Type here to search">
            </div>
            <section class="dashboard">  
            <div class="stats"> 

            <?php require_once('admin_graphs.php');?>
                <div class="card">
                        <h2>Updates </h2><br>
                        <p>No new updates</p>
                    </div><br><br>
                </div>
                <div class="stats">                   
                    <div class="card">
                    <h2>Devices active:</h2>
                        <p><?php echo $result['up_dev'];?>/<?php echo $result['up_dev'] + $result['down_dev']?> active</p>
                    </div><br>
                    <div class="card">
                    <h2>Average Network Traffic:</h2>
                    <?php $statement = "SELECT AVG(traffic_volume) as net_traf FROM device_report";
                    $run_query = mysqli_query($db_connect, $statement);
                    $results = mysqli_fetch_assoc($run_query); 
                    $net_traf_formatted = number_format($results['net_traf'], 2);?>
                    <p><?php echo $net_traf_formatted; ?> GB</p>
                    </div><br>
                    <div class="card">
                    <h2>Active alerts:</h2>
                        <p>3</p>
                    </div><br>
                </div>
                <div class="stats">
                    <h1 style="align-self: c enter; margin-left: 10px;">Network status:</h1>&nbsp &nbsp
                    <div class="card">
                        <h2>UP</h2>
                        <p><?php echo $result['up_dev'];?></p>
                    </div>
                    <div class="card">
                        <h2>DOWN</h2>
                        <p>3</p>
                    </div>
                    <div class="card">
                        <h2>MAINTANANCE</h2>
                        <p>1</p>
                    </div>
                </div>
            </section>
        </div>
  </div>
</body>
</html>
