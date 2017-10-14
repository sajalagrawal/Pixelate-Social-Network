<?php
    session_start();
    if(isset($_SESSION['email'])){
        header('location: profile.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="shortcut icon" href="img/logo.jpg" />
        <title>Pixelate</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jQuery library -->
        <script src="bootstrap/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Latest compiled and minified javascript -->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- External CSS file -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div class="banner2">
            <?php
            require 'header.php';
            ?>
            <div class="container">
                <br><br><br><br><br>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-8">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <center><h1 style="color:grey;"><b>REGISTER</b></h1></center>
                            </div>
                        
                        <div class="panel-body">
                            <form method="post" action="user_registration_script.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" required="true">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="contact" placeholder="Contact no." required="true">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="dob" onblur="(this.type='text')" onload="(this.type='text')" onpageshow="(this.type='text')" onfocus="(this.type='date')" placeholder="Date of Birth" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="City" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="country" placeholder="Country" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="pincode" placeholder="Pincode" required="true">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-default btn-block" value="Register">
                            </div>
                                <p>Have an account? <a href="login.php">Log in</a></p>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            require('footer.php');
        ?>
    </body>
</html>