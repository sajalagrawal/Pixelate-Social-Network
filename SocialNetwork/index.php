<?php
    session_start();
    if(isset($_SESSION['email'])){
        header ('location:profile.php');
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
    </head><!-- //style="background-color:#f4ebdb;" -->
    <body style="background-color:#f4ebdb;">   // #f1f3ce  ddbc95
        <?php
            require('header.php');
        ?>
        <div class="container-fluid">
            <br><br><br><br><br>
            <div class="row" id="indexBanner watermark">
                <div class="col-xs-4 col-xs-offset-4">
                <center> 
                    <a href="discover.php"><img src="img/logo_reduced.jpg" class="img-responsive img-circle" width="250px" height="250px"></a>
                </center>
                </div>
            </div>
            <div class="row">
                <center>
                    <br>
                    <p style="font-size:30px; color:#2c4a52;"><b>We bring you closer to your loved ones!</b></p>
                    <br>
                </center>
            </div>
            <br><br><br><br><br><br>
            <div class="row">
                <div class="col-xs-4"> <center><img id="image" src="img/harshita.jpg" class="img-responsive img-circle" alt="harshita"  width="150px" height="200px"></center>
                </div>
                <div class="col-xs-4"> <center><img id="image" src="img/sajal.jpg" class="img-responsive img-circle" alt="sajal"  width="150px" height="200px"></center>
                </div>
                <div class="col-xs-4"> <center><img id="image" src="img/rahul.jpg" class="img-responsive img-circle" alt="rahul"  width="150px" height="200px"></center>
                </div>
            </div>
        </div>
        <?php
            require('footer.php');
        ?>
    </body>
</html>