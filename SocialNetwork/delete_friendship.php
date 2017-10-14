<?php
    session_start();
    require 'connection.php';
    $user1=$_GET['id1'];
    $user2=$_GET['id2'];
    //sendId=user1 recId=user2;
    $delete_friend_query="delete from friends where (firstId='$user1' and secondId='$user2') or (firstId='$user2' and secondId='$user1')";
    $delete_friend_result=mysqli_query($con,$delete_friend_query) or die(mysqli_error($con));
    
    $url="user.php?id=".$user1;
    //echo $url;
    header("location: $url");
?>