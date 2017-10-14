<?php
    session_start();
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
    <style>
        .btn{
            padding:15px;
        }
    </style>
    <body style="background-color:#ddbc95;"> 
    
        <?php
            require 'header.php';
            ?>
        <br><br><br> <br><br><br>
        <div class="container">
                
                <div class="row">
                    <div class="col-xs-4 ">
                        <center>
                        <img src="img/chat512.png" class="img-responsive img-circle" width="250px" height="250px">
                        </center>
                    </div>    
                    <div class="col-xs-4">
                        <center>
                        <img src="img/logo_reduced.jpg" class="img-responsive img-circle" width="250px" height="250px">
                        </center>
                    </div>
                    <div class="col-xs-4 ">
                        <center>
                        <img src="img/chat23.png" class="img-responsive img-circle" width="250px" height="250px">
                        </center>
                    </div>  
                
                    
                </div>  
            <br><br><br><br>
                <div class="row">
                    <div class="col-xs-2 ">
        
             <a href="#" class="btn btn-primary btn-block" > CHAT HERE </a> 
            <br><br><br> <br><br><br>
             <a href="#" class="btn btn-primary btn-block"> SHARE HERE </a> 
            <br><br><br> <br><br><br>
            <a href="#" class="btn btn-primary btn-block"> KNOW OTHERS </a> 
           
                    </div>
                    <div class="col-xs-8">
                        <img src="img/wmark1.jpg">
                    </div>
            <div class="col-xs-2">
                <center>
             <a href="#" class="btn btn-primary btn-block"> MAKE FRIENDS </a> 
            <br><br><br> <br><br><br>
             <a href="#" class="btn btn-primary btn-block"> INVITE </a> 
            <br><br><br> <br><br><br>
            <a href="#" class="btn btn-primary btn-block"> INTERACT </a> 
                </center>
                    </div>
                    
                </div>
            <br><br><br><br>
            <div class=""row>
                <p><i><b> HI GUYS HERE AT PIXELATE WE PROVIDE YOU AN INTERFACE TO INTERACT SOCIALLY AND STAY CONNECTED WITH THE WORLD..!!YOU CAN SHARE YOUR EXPERIENCES WITH YOUR FRIENDS AND KNOW THEIRS AND MOST IMPORTANTLY YOU CAN MAKE FRIENDS ONLINE AND SEARCH USER WORLDWIDE!!SO HURRY UP GUYS REGISTER HERE</b></i></p>
            </div>
                
        </div>
          
        
        <br><br><br><br><br><br><br><br>
        <div class="foot">
            <?php
               //require('footer.php');
            ?>
        </div>
    </body>
    
</html>    