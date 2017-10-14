<?php
    session_start();
    require 'connection.php';
    $id=$_SESSION['id'];
    $query="delete from users where id='$id'";
    $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
     $query="delete from allaboutyou where uid='$id'";
    $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
     $query="delete from allstatus where userid='$id'";
    $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
     $query="delete from friends where firstId='$id' or secondId='$id'";
    $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
     $query="delete from requests where sendId='$id' or recId='$id'";
    $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
     session_destroy();
     header('location: index.php');
?>