<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location: index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="refresh" content="2" >
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
        <?php
           require 'header.php';
        ?>
        <br><br><br><br><br><br>
        <div class="container">
            <p id="autoResize" >People you chat with:</p>
            <table class="table table-responsive table-striped table-bordered">
                <col width="400">
                <tbody>
                     <?php
                     $id=$_SESSION['id'];
                     $allChats_query="(SELECT distinct sendId FROM `messages` WHERE (sendId='$id' or recId='$id'))  UNION (SELECT distinct recId FROM `messages` WHERE (sendId='$id' or recId='$id'))";
                     $allChats_query_result=mysqli_query($con,$allChats_query) or die(mysqli_error($con));
                     $rows_fetched= mysqli_num_rows($allChats_query_result);
                     if($rows_fetched==0){
                         ?>
                        <tr><td>No users here!</td></tr>
                        <?php
                     }else{
                         while($row= mysqli_fetch_array($allChats_query_result)){
                             if($row['sendId']!=$_SESSION['id']){
                             $userId=$row['sendId'];
                             $url="user.php?id=".$row['sendId'];
                             $url2="chat.php?id=".$row['sendId'];
                             $userName_query="select name from users where id='$userId'";
                             $userName_query_result=mysqli_query($con,$userName_query) or die(mysqli_error($con));
                             $row2= mysqli_fetch_array($userName_query_result);
                             $userName=$row2['name'];
                         ?>
                        <tr>
                            <td><a href=<?php echo $url ?> ><?php echo $userName ?> </a></td>
                            <td><a href=<?php echo $url2 ?> class="btn btn-primary btn-block">Message </a></td>
                        </tr>
                        <?php
                            }
                        }
                     }
                     
                     ?>
                </tbody>
            </table>
            
        </div>
        <div class="foot">  <!-- remove class foot -->
        <?php
            //require('footer.php');
        ?>
        </div>
    </body>
</html>