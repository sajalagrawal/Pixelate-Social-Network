<?php
    function checkIfFriends($user1,$user2){
        require 'connection.php';
        
        //checking if user1 and user2 are friends
        $friends_check_query="select fId from friends where firstId='$user1' and secondId='$user2'";
        $friends_check_result=mysqli_query($con,$friends_check_query) or die(mysqli_error());   
        $num_rows=mysqli_num_rows($friends_check_result);
        if($num_rows>=1)return 3; //user1 and user2 are already friends
        $friends_check_query2="select fId from friends where firstId='$user2' and secondId='$user1'";
        $friends_check_result2=mysqli_query($con,$friends_check_query2) or die(mysqli_error());   
        $num_rows2=mysqli_num_rows($friends_check_result2);
        if($num_rows2>=1)return 3; //user1 and user2 are already friends
        
        //checking if user2 has sent request to user1; user2=loggedin user  return 1
        $request_query="select reqId from requests where sendId='$user2' and recId='$user1'";
        $request_query_result=mysqli_query($con,$request_query) or die(mysqli_error($con));
        $num_rows3=mysqli_num_rows($request_query_result);
        if($num_rows3>=1)return 1;
        
        //checking if user1 has sent request to user2; user2=loggedin return 2
        $request_query2="select reqId from requests where sendId='$user1' and recId='$user2'";
        $request_query_result2=mysqli_query($con,$request_query2) or die(mysqli_error($con));
        $num_rows4=mysqli_num_rows($request_query_result2);
        if($num_rows4>=1)return 2;
        
        //no requests and no friendship bw users
        return 0;
    }
?>  