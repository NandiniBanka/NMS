<?php
include "../config.php";
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $delete=mysqli_query($db_connect,"DELETE FROM `users` WHERE `id`='$id'");
  header("location:../dashboard.php");
}

?>