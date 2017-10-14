<?php
    session_start();
    require 'connection.php';
    $user1=$_GET['id1'];
    $user2=$_GET['id2'];
    //sendId=user1 recId=user2;
    $add_request_query="insert into requests(sendId,recId) values('$user2','$user1')";
    $add_request_result=mysqli_query($con,$add_request_query) or die(mysqli_error($con));
    
    $url="user.php?id=".$user1;
    //echo $url;
    header("location: $url");
?>