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
    <body class="banner4">
        <div>
            <?php
            require 'header.php';
            ?>
            <br><br><br><br><br>
            <div class="container">
                <br><br><br><br>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-8">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                            <center><h1  style="color:grey;"><b>LOGIN</b></h1></center>
                            </div>
                            <div class="panel-body">
                            <form method="post" action="user_loginscript.php">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="true">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" required="true">
                                </div>
                                <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-default btn-block" name="submit" value="Login">
                                </div>
                                <p>Not yet registered? <a href="signup.php">Register here</a></p>
                            </form>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
        <?php
            require('footer.php');
        ?>
    </body>
    
</html>    