<?php
require 'connection.php';
session_start();
$id=$_SESSION['id'];
/*
$name = $_POST["name"];
$contact = $_POST["contact"];
$dob = $_POST["dob"];
$city = $_POST["city"];
$country = $_POST["country"];
 */
$name=mysqli_real_escape_string($con,$_POST['name']);
$contact=mysqli_real_escape_string($con,$_POST['contact']);
$dob=mysqli_real_escape_string($con,$_POST['dob']);
$city=mysqli_real_escape_string($con,$_POST['city']);
$country=mysqli_real_escape_string($con,$_POST['country']);

$query="update users set name='$name',contact='$contact',dob='$dob',city='$city',country='$country' where id='$id' ";

        mysqli_query($con, $query) or die(mysqli_error($con));
        header('location:profile.php');
?>


