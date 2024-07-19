<?php
require_once('../common/header.php'); 
?>	
<?php require_once('../sidebars/left-sidebar.php') ?>

<div>
	<div class="content">
		<br>
	   <div class="text"><h2> Alert History <h2></div>	
	 
		
		<?php $statement = "SELECT id,email_id,Device_id,Device_Issue,Alert_Status FROM users";

				$run_query = mysqli_query($db_connect,$statement);

				if ($run_query->num_rows>0) { ?>
					<br>
					<table border="1">
						<tr>
							<th>S.No.</th>
							<th>Email Id</th>
					        <th>Device id</th>
                            <th>Device issue</th>
                            <th>Alert Status</th>
							<th>Edit</th>
						</tr>
					<?php 

					$counter = 1;

					while ($row = mysqli_fetch_object($run_query)) { ?>
						<tr>
							<td><?php echo $counter ?></td>
							<td><?php echo $row->email_id  ?></td>
							<td><?php echo $row->Device_id  ?></td>
                            <td><?php echo $row->Device_Issue ?></td>
                            <td><?php echo $row->Alert_Status ?></td>
							<td><a href="employees/sendmail.php?id=<?php echo $row->id ?>" class="btn btn-outline-primary btn" >edit </a></td>
						</tr>
					<?php $counter++; } ?>
					</table>
				<?php } else {
					echo 'No data found.';
				}
		 ?>

	</div>
</div>
<?php require_once('../common/footer.php') ?>
