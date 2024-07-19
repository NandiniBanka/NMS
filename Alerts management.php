<?php session_start();

require_once('common/header.php'); 
if (isset($_SESSION['user_id'])) 
?>
<?php require_once('sidebars/left-sidebar.php') ?>
<?php require_once('common/body(alert).php') ?>
