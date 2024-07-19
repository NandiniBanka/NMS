<?php require_once('../dbconnect.php');
$statement = "SELECT 
    SUM(CASE WHEN status = 'up' THEN 1 ELSE 0 END) AS up_dev,
    SUM(CASE WHEN status = 'down' THEN 1 ELSE 0 END) AS down_dev
    FROM devices";

$run_query = mysqli_query($db_connect, $statement);
$result = mysqli_fetch_assoc($run_query);

$data = [
    'Active' => $result['up_dev'],
    'Inactive' => $result['down_dev'],
];
$statements = "SELECT 
    AVG(CASE WHEN id like 'SV%' THEN avg_bw_used ELSE NULL END) AS server_bw,
    AVG(CASE WHEN id like 'SW%' THEN avg_bw_used ELSE NULL END) AS switch_bw,
    AVG(CASE WHEN id like 'FW%' THEN avg_bw_used ELSE NULL END) AS firewall_bw,
    AVG(CASE WHEN id like 'RT%' THEN avg_bw_used ELSE NULL END) AS router_bw
    FROM device_report";

$runs_query = mysqli_query($db_connect, $statements);
$results = mysqli_fetch_assoc($runs_query);

$trafficData = [
    'Server'=> $results['server_bw'],
    'Switch'=> $results['switch_bw'],
    'Firewall' => $results['firewall_bw'],
    'Router' => $results['router_bw'],
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard with Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }

        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 63%;
            margin-bottom: 0;
        }

        .chart {
            width: 250px;
            height: 250px;
            margin: 0 50px;
        }

        #trafficBarChart {
            width: 300px; /* Adjust width */
            height: 250px; /* Adjust height */
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <div class="chart">
            <canvas id="myPieChart"></canvas>
        </div>
        <div class="chart">
            <canvas id="trafficBarChart"></canvas>
        </div>
    </div>

    <script>
        const ctxPie = document.getElementById('myPieChart').getContext('2d');
        const pieData = {
            labels: <?php echo json_encode(array_keys($data)); ?>,
            datasets: [{
                data: <?php echo json_encode(array_values($data)); ?>,
                backgroundColor: [
                    'rgba(170, 99, 239, 0.5)',
                    'rgba(300, 200, 235, 0.5)',
                ],
                borderColor: [
                    'rgba(170, 99, 239, 1)',
                    'rgba(303, 200, 235, 1)',
                ],
                borderWidth: 1
            }]
        };

        const pieConfig = {
            type: 'pie',
            data: pieData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                        position: 'right',
                    },
                    title: {
                        display: true,
                        text: 'Devices Active'
                    }
                }
            },
        };

        const myPieChart = new Chart(ctxPie, pieConfig);

        const ctxBar = document.getElementById('trafficBarChart').getContext('2d');
        const barData = {
            labels: <?php echo json_encode(array_keys($trafficData)); ?>,
            datasets: [{
                label: 'Bandwidth Usage (MB)',
                data: <?php echo json_encode(array_values($trafficData)); ?>,
                backgroundColor: 'rgba(170, 162, 235, 0.5)',
                borderColor: 'rgba(170, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        const barConfig = {
            type: 'bar',
            data: barData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 50,
                        title: {
                            display: true,
                            text: 'Bandwidth Usage (MB)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Device Types'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Average Bandwidth Usage'
                    }
                }
            }
        };

        const trafficBarChart = new Chart(ctxBar, barConfig);
    </script>
</body>
</html>
