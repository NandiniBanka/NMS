<?php
$con = mysqli_connect("localhost","root","","nms");
if(!$con){
	die("Error connecting".mysqli_error($con));
}
?>