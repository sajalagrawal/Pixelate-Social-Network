<?php
    session_start();
    require 'connection.php';
    $user1=$_GET['id1'];
    $user2=$_GET['id2'];
    //sendId=user1 recId=user2;
    $delete_request_query="delete from requests where (sendId='$user1' and recId='$user2') or (sendId='$user2' and recId='$user1')";//
    $delete_request_result=mysqli_query($con,$delete_request_query) or die(mysqli_error($con));
    
    $url="user.php?id=".$user1;
    //echo $url;
    header("location: $url");
?>