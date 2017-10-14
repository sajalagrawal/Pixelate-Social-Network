<?php
    session_start();    
    require 'connection.php';   
    $uid=$_SESSION['id'];
    $bio=mysqli_real_escape_string($con,$_POST['bio']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
    $study=mysqli_real_escape_string($con,$_POST['study']);
    $hobbies=mysqli_real_escape_string($con,$_POST['hobbies']);
    $movie=mysqli_real_escape_string($con,$_POST['movie']);
        $language=mysqli_real_escape_string($con,$_POST['language']);
    
    $query="update allaboutyou set bio='$bio',gender='$gender',study='$study',hobbies='$hobbies',movie='$movie',language='$language' where uid='$uid' ";
    mysqli_query($con, $query) or die(mysqli_error($con));
    
    header('location:profile.php');
?>

