<?php
if(isset($_POST['submit'])){
require 'connection.php';
session_start();
extract($_POST);
 $id=$_SESSION['id'];
 $UploadedFileName= $_FILES["UploadImage"]["name"] ;
 $filetype= $_FILES["UploadImage"]["type"] ;
 $upload_directory = "UploadImages/".$UploadedFileName; 
  //echo "fname=".$UploadedFileName;
  //echo "type=".$filetype;
  //echo "uploadDir=".$upload_directory;
  //echo "id".$id;
  move_uploaded_file($_FILES["UploadImage"]["tmp_name"], $upload_directory);
  $qr = "UPDATE users set image='$upload_directory', type='$filetype', ename='$UploadedFileName' where id='$id'";
  $res=mysqli_query($con,$qr) or mysqli_error($con);
  
  if($res){
     echo "image uploaded";
 }else{
     echo "image failed";
     }
}
 
 
        header('location:profile.php');
        
?>
