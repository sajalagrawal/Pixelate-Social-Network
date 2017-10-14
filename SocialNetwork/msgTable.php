<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location: index.php');
    }
    
   
      $recId=$_GET['id'];
      $senderId=$_SESSION['id'];
      $url="message_script.php?id=".$recId;
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
             td{
                font-size:14px;
            }   
            
            table{
             height:370px;              
            }
        </style>
    <body>
<table  class="table table-responsive">
                   <col width="150">
                   <col width="400">
                   <col width="300">
                   
                    <tbody> 
                    <?php
                    $message_query="select * from messages where (sendId='$senderId' and recId='$recId') or (sendId='$recId' and recId='$senderId') order by mid ";
                    $message_query_result=mysqli_query($con,$message_query);
                    $recName_query="select name from users where id='$recId'";
                    $recName_query_result=mysqli_query($con,$recName_query) or die(mysqli_error($con));
                    $recName_row=mysqli_fetch_array($recName_query_result);
                    $recName=$recName_row['name'];
                    while($row=mysqli_fetch_array($message_query_result)){
                       // print_r ($row);
                        $msg=$row['msg'];
                        $sender=$row['sendId'];
                        $reciever=$row['recId'];
                        $time=$row['time'];
                        $mid=$row['mid'];
                        if($sender==$senderId){
                            ?>
                            <tr>
                                <td><?php echo "You"?></td>
                                <td><?php echo $msg?><td>
                                <td><?php echo $time?></td>
                            </tr>
                            <?php
                        }else{
                            ?>
                            <tr style="background:#f1f1f2; ">
                                <td><?php echo $recName?></td>
                                <td><?php echo $msg?><td>
                                <td><?php echo $time?></td>
                            </tr>
                            <?php
                        }
                        
                    }
                ?>
                </tbody></table> 
        
    </body>
</html>