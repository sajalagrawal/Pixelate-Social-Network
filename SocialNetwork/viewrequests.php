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
            <table class="table table-bordered table-responsive table-striped">
                <tbody>
                    
                    <?php
                        $id=$_SESSION['id'];
                        $friend_request_query="select name,id from users where id IN (Select sendId from requests where recId='$id')";
                        $friend_request_result=mysqli_query($con,$friend_request_query) or die(mysqli_error($con));
                        $rows_fetched= mysqli_num_rows($friend_request_result);
                        if($rows_fetched>0){
                            ?>
                        <p id="autoResize">Friend requests-</p>
                        <!-- <tr><th>Friend requests-</th><th></th><th></th></tr> -->
                            <?php
                            while($row=mysqli_fetch_array($friend_request_result)){
                                $friend=$row['name'];
                                $friendId=$row['id'];
                                $url="user.php?id=".$friendId;
                                $url2="make_friends.php?id1=".$id."&id2=".$friendId;
                                $url3="delete_request.php?id1=".$id."&id2=".$friendId;
                            ?>
                            <tr>
                                <td><a href=<?php echo $url ?> ><?php echo $friend?></a></td>  <!-- add accept button , remove button -->
                                <td><a href="<?php echo $url2 ?>" class="btn btn-block btn-primary">Accept request </td>
                                <td><a href="<?php echo $url3 ?>" class="btn btn-block btn-primary">Delete request</td>
                            </tr>
                            <?php
                            }
                        }else{
                            ?>
                            <!-- <tr><th>No requests found!</th></tr> -->
                            <p id="autoResize">No requests found!</p>
                            <?php
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