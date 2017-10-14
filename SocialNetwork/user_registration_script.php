<?php
    require 'connection.php';
    session_start();
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
    $contact=mysqli_real_escape_string($con,$_POST['contact']);
    $dob=mysqli_real_escape_string($con,$_POST['dob']);
    $city=mysqli_real_escape_string($con,$_POST['city']);
    $country=mysqli_real_escape_string($con,$_POST['country']);
    $pincode=mysqli_real_escape_string($con,$_POST['pincode']);
    $duplicate_user_query="select id from users where email='$email'";
    $duplicate_user_query_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_query_result);
    if($rows_fetched>0){
        ?>
        <script>
            window.alert("This Email id already exists in our database!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />
        <?php
    }else{
        $user_registration_query="insert into users(name,email,password,contact,dob,city,country,pincode) values('$name','$email','$password','$contact','$dob','$city','$country','$pincode')";
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        
        $_SESSION['email']=$email;
        $_SESSION['id']=mysqli_insert_id($con);
        $uid=$_SESSION['id'];
        $allabout_query="insert into allaboutyou(uid) values ('$uid')";
        $allabout_query_result=mysqli_query($con,$allabout_query) or die(mysqli_error($con));
        echo "User successfully registered. Redirecting you to your profile...";
        ?>
        <meta http-equiv="refresh" content="1;url=profile.php" />
        <?php
    }
?>