<?php require_once(dirname(__DIR__).'/common/header.php') ?>
<?php if (isset($_POST['user_id'])) { ?> 
<center><h1>View employee's details</h1></center>

<div>
	<div class="left-sidebar">
<?php require_once(BASE_DIR.'/sidebars/left-sidebar.php') ?>
	</div>
	<div class="content">
		<a href="<?php echo BASE_URL ?>/employees/list.php" class="btn">Go Back</a>

<div class= "form-container">

	<?php $statement = "SELECT * from users where id=".$_GET['id'];
			$run_query = mysqli_query($db_connect,$statement);

			if ($run_query) {
				$user = mysqli_fetch_object($run_query);
	 ?>
	<div>
		<label>First Name</label> : <?php echo $user->first_name ?>
	</div>

	<div>
		<label>Last Name</label> : <label><?php echo $user->last_name ?></label>
	</div>

	<div>
		<label>Contact Number</label> : <label><?php echo $user->contact_number ?></label>
	</div>

	<div>
		<label>DOB</label> : <label><?php echo date('d-M-Y',strtotime($user->dob)) ?></label>
	</div>

	<div>
		<label>DOJ</label> : <label><?php echo date('d-M-Y',strtotime($user->doj)) ?></label>
	</div>

	<div>
		<label>Email</label> : <label><?php echo $user->email_id ?></label>
	</div>
	<div> </div>
<?php } else {
	echo "Data not found.";
} ?>
</div>
</div>
</div>
<?php require_once(BASE_DIR.'/common/footer.php');

} else {

header('location:'.BASE_URL.'INDEX12.php');

}
