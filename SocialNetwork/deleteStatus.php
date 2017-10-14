<?php
    require 'connection.php';
    session_start();
    $status=mysqli_real_escape_string($con,$_POST['status']);
    $sid=$_GET['id'];
    $status_query="delete from allstatus where sid='$sid'";
    $status_query_result=mysqli_query($con,$status_query) or die(mysqli_error($con));
    header('location:profile.php');
?>