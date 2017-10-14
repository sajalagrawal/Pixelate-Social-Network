<?php
    require 'connection.php';
    session_start();
    $status=mysqli_real_escape_string($con,$_POST['status']);
    $userId=$_GET['id'];
    if($status!=''){
        $status_query="insert into allstatus(userid,status) values('$userId','$status')";
        $status_query_result=mysqli_query($con,$status_query) or die(mysqli_error($con));
    }
    header('location:profile.php');
?>