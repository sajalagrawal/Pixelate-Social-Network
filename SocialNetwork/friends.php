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
            <table class="table table-responsive table-striped table-bordered">
                <tbody>
            <?php
                $id=$_SESSION['id'];
                $friend_query1="select name,id from users where id in (select firstId from friends where secondId='$id')";
                $friend_query_result1=mysqli_query($con,$friend_query1);
                $rows_fetched1=mysqli_num_rows($friend_query_result1);
                $friend_query2="select name,id from users where id in (select secondId from friends where firstId='$id')";
                $friend_query_result2=mysqli_query($con,$friend_query2);
                $rows_fetched2=mysqli_num_rows($friend_query_result2);
                
                if($rows_fetched1==0 && $rows_fetched2==0){
                    //no friends
                    ?>
                    <!--<tr><th>No friends found!</th></tr>-->
                    <p  id="autoResize">No friends found!</p>
                    <?php
                }else{
                    ?>
                    <!-- <tr>
                        <td>Your friends-</td> 
                    </tr> -->
                    <p  id="autoResize">Your friends-</p>
                    <?php
                    //ADD unfriend button
                    while($row=mysqli_fetch_array($friend_query_result1)){
                        $friend=$row['name'];
                        $friendId=$row['id'];
                        $url="user.php?id=".$friendId;
                        $url2="delete_friendship.php?id1=".$friendId."&id2=".$id;
                        $url6="chat.php?id=".$friendId;
                        ?>
                        <tr>
                            <td><a href=<?php echo $url ?> ><?php echo $friend?></a></td>
                            
                            <td><a href="<?php echo $url6 ?>" class="btn btn-block btn-primary" name="add" value="Send request">Message</a></td>
                            <td><a href="<?php echo $url2 ?>" class="btn btn-block btn-primary">Delete friendship</td>
                        </tr>
                        <?php
                    }
                    while($row=mysqli_fetch_array($friend_query_result2)){
                        $friend=$row['name'];
                        $friendId=$row['id'];
                        $url="user.php?id=".$friendId;
                        $url2="delete_friendship.php?id1=".$friendId."&id2=".$id;
                        $url6="chat.php?id=".$friendId;
                        ?>
                        <tr>
                            <td><a href=<?php echo $url ?> ><?php echo $friend?></a></td>  
                            
                            <td><a href="<?php echo $url6 ?>" class="btn btn-block btn-primary" name="add" value="Send request">Message</a></td>
                            <td><a href="<?php echo $url2 ?>" class="btn btn-block btn-primary">Delete friendship</td>
                        </tr>
                        <?php
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