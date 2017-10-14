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
            <div class="row">
                <form method="post" action="search.php">
                    <div class="col-xs-9">
                    <div class="form-group">
                        <input type="text" style="padding:20px;" class="form-control" name="userSearched" placeholder="Search users">
                    </div>
                    </div>
                    <div class="col-xs-2">
                    <div class="form-group">
                        <input type="Submit" style="padding:12px;" class="btn btn-primary" value="Search">
                    </div>
                    </div>
                </form>
            </div>
            <table class="table table-bordered table-striped table-responsive">
                <tbody>
                <br>
                <?php
                //print_r($_GET);
                    if(isset($_POST['userSearched'])){ 
                        $name=$_POST['userSearched'];
                        //echo $name;
                        
                        $user_search_query="select name,id from users where name like '%$name%'";
                        //echo $user_search_query;
                        $user_search_result=mysqli_query($con,$user_search_query) or die(mysqli_error($con));
                        $rows_fetched=mysqli_num_rows($user_search_result);
                        if($rows_fetched>0){
                            ?>
                            <tr>
                                <th>Users found-</th>
                            </tr>
                            <?php
                            while($row=mysqli_fetch_array($user_search_result)){
                                $userId=$row['id'];
                                $url="user.php?id=".$userId;
                                ?>
                                <tr>
                                    <td><a href=<?php echo $url ?> ><?php echo $row['name'] ?></a></td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                            <tr>
                                <th>No results found.</th>
                            </tr>
                            <?php
                        }
                        
                    }

                ?>
               </tbody>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br>
        <div class="foot">  <!-- remove class foot -->
            <?php
                //require('footer.php');
            ?>
        </div>
    </body>
</html>