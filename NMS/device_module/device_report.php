<?php session_start();

require_once('../config.php');

 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Device Report</title>
    <style type="text/css">
      #device_history {
    display: flex;
    width: 100%;
    text-align: center;
}
#child{
    flex: 1;
    border: 5px inset #b75bde;
    margin: 2%;
    padding: 1%;
}
#rep{
    border: 5px inset #b75bde;
    margin: 2%;
    padding: 1%;
    height: 30%;
}

    </style>
</head>
<body>
 <div id="container">
        <div id="child1">
         <?php require_once('../left-panel-emp.php') ?>
        </div>
        <div id="child2">
        <?php require_once('../header.php') ?>
            
        <?php require_once('../dbconnect.php');
    $device_id = $_GET['id']; 
    $selection = "SELECT id, name, type FROM devices WHERE id = '$device_id'";
    $statement = "SELECT * FROM device_report WHERE id = '$device_id'";
    $run_sel = mysqli_query($db_connect,$selection);
    if ($run_sel) {
    $device = mysqli_fetch_object($run_sel);
}
    $run_query = mysqli_query($db_connect,$statement);
    if ($run_query) {
        $report = mysqli_fetch_object($run_query);
    }
     ?>
      <div id="device_history">
        <div id="child">
            <h3>Device ID</h3><br>
            <?php echo $device->id?>
        </div>
        <div id="child">
            <h3>Device Name</h3><br>
            <?php echo $device->name?>
        </div>
        <div id="child">
            <h3>Device Type</h3><br>
            <?php echo $device->type?>
        </div>
      </div>
      <?php if($report) {?>
    <div style="display: flex;">  
        <div style="flex: 1;">
    <div id="rep">
    <h3>UP & DOWN TIME</h3> 
    <?php 
    $uptime = $report->uptime;
    $time = new DateTime($uptime);
    $hours = $time->format('H');
    $minutes = $time->format('i');
    $seconds = $time->format('s');
    $formattedTime = "{$hours} h {$minutes} m {$seconds} s";
    echo 'Up Time: ' , $formattedTime;?>
    <br>
    <?php $downtime = $report->downtime;
    $time = new DateTime($downtime);
    $hours = $time->format('H');
    $minutes = $time->format('i');
    $seconds = $time->format('s');
    $formattedTime = "{$hours} h {$minutes} m {$seconds} s";
    echo 'Down Time: ' , $formattedTime; ?>
    <br>
    <?php echo 'Downtime events: ', $report->downtime_events , ' incidents'; ?>
    <br>
</div>
<div id="rep">
    <h3>LATENCY & RESPONSE TIMES</h3>
    <?php echo 'AVerage Latency: ', $report->avg_lat , ' ms <br>', 
    'Peak Latency: ', $report->peak_lat , 'ms <br>', 
    'Response Times: Avergae ', $report->response_time, ' for web services <br>';?>
    </div>
    <div id="rep">
        <h3>BANDWIDTH UTILIZATION</h3>
    <?php echo 'Average Utilization: ', $report->avg_util, '% of total bandwidth <br>',
    'Peak Utilization: ', $report->peak_util, '% of total bandwidth <br>',
    'Capacity: ',  $report->tot_bw, ' Mbps total bandwidth ',  $report->avg_bw_used, ' Mbps average used <br>';
    ?>
</div>
</div>
<div style="flex: 1;">
    <div id="rep">
    <h3>NETWORK TRAFFIC ANALYSIS</h3>
    <?php echo 'Traffic Volume: ', $report->traffic_volume ,' GB total data transmitted and received <br>',
    'Traffic Patterns: ', $report->traffic_patterns;?> <br> </div>
    <div id="rep">
    <h3>NETWORK DEVICE PERFORMANCE</h3>
    <?php echo 'Device Health:', $report->dev_health, '% of devices operating within normal parameters <br>
    Interface Statistics: Average utilization at ', $report->inter_avg_util, '%,', $report->error_percent, '% error rate 
    <br>';?></div>
    <div id="rep">
    <h3>INCIDENT AND PROBLEM MANAGEMENT</h3>
    <?php echo 'Incident Summary: ', $report->incident_no, ' incidents, resolved within an average of', $report->avg_resolve_time, ' hour <br>
    MTTR: ', $report->MTTR, ' minutes';
    ?></div>
</div>
    </div>
    <?php }
else echo "No Report Found";
    ?>
    </div>
</div>
</body>
</html>
