<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location: index.php');
    }
    $recId=$_GET['id'];
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
        <style>
           
            
        </style><!-- tbody{
              overflow-y: scroll;      
              height:370px;            
              width:90%;
              position: absolute;
            }  --> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
            $(window).scroll(function() {
              sessionStorage.scrollTop = $(this).scrollTop();
            });

            $(document).ready(function() {
              if (sessionStorage.scrollTop != "undefined") {
                $(window).scrollTop(sessionStorage.scrollTop);
              }
            });

            function autoRefresh_div(){
                var recId=<?php echo $recId ?>;
                //console.log(recId);
                var url2="msgTable.php?id="+recId;
                //console.log(url2);
                $("#autoRef").load(url2);// a function which will load data from other file after x seconds
            }
            setInterval('autoRefresh_div()', 1000); // refresh div after 5 secs
        </script> 
    </head>
    <body>
        <?php
           require 'header.php';
           $recId=$_GET['id'];
           $senderId=$_SESSION['id'];
           $url="message_script.php?id=".$recId;
           
        ?>
        <br><br><br><br><br><br>
        <div class="container">
            <p id="autoResize">CHAT</p>
           <div id="autoRef">
           
           </div>
           <div class="row">
               
                <form method="post" action="<?php echo $url ?>">
                    <div class="col-xs-10">
                    <div class="form-group">
                        <input type="text" style="padding:20px;" class="form-control" name="message" placeholder="Type your message here">
                    </div>
                    </div>
                    <div class="col-xs-2">
                    <div class="form-group">
                        <input type="Submit" style="padding:12px;" class="btn btn-primary" value="Send">
                    </div>
                    </div>
                </form>
            </div>  
        </div>
        <div class="foot">  <!-- remove class foot -->
        <?php
            //require('footer.php');
        ?>
        </div>
    </body>
</html>