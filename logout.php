<?php session_start();
    if ($_SESSION['user_id']) {
        unset($_SESSION['user_id']);
        session_destroy();
        header('location:INDEX12.php');
    } else {
        header('location:INDEX12.php');
    } 
 ?>