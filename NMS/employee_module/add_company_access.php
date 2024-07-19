<?php session_start();

require_once('../config.php');
$emp_id = $_GET['e_id'];
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Device List</title>

</head>
<body>
 <div id="container">
        <div id="child1">
         <?php require_once('../left-panel-emp.php') ?>
        </div>
        <div id="child2">
        	<?php require_once('../header.php') ?>
            <form action="" method="get">
            <div class="search">
            <input type="search" name="query" placeholder="Type here to search">
            <input type="submit" value="Search">
            </form>
            </div>
            <br>
            <table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Branch</th>
        <th>Grant Access</th>
    </tr>
            <?php    require_once('../dbconnect.php');
     $query = isset($_GET['query']) ? $_GET['query'] : '';
     $query_escaped = mysqli_real_escape_string($db_connect, $query);
    $userid = $_SESSION['user_id'];
   $statement = "SELECT * FROM company_db WHERE emp_id IS NULL";

    if (!empty($query)) {
                $statement .= " AND (c_id LIKE '%$query_escaped%' OR c_name LIKE '%$query_escaped%' OR c_branch LIKE '%$query_escaped%')";
            }
    
    $run_query = mysqli_query($db_connect,$statement);

if ($run_query->num_rows > 0) {
     while($row = mysqli_fetch_object($run_query)) { ?>
            <tr>
            <td><?php echo $row->C_ID ?></td>
            <td><?php echo $row->C_Name  ?></td>
            <td><?php echo $row->C_Branch  ?></td>
            <td><a href="grant-comp.php?id=<?php echo $row->C_ID ?>&e_id=<?php echo $emp_id ?>" style="color: blue; text-decoration: none;">Grant</a></td>
            </tr>
            
<?php } 
 } 
else {
        echo 'No data found.';
    }   ?>
    </table>
        </div>
    </div>
</body>
</html>