    <?php
    session_start();
    require 'connection.php';
    $id=$_SESSION['id'];
    $query="select bio,gender,study,hobbies,movie,language from allaboutyou where uid='$id' ";
    $query_result= mysqli_query($con, $query) or die(mysqli_error($con));
    $arr = mysqli_fetch_array($query_result); 
    //print_r($arr);
    
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
    <body class="banner5">
        <div>
            <?php
            require 'header.php';
            ?>
            <br><br><br><br><br>
            <div class="container">
                <br><br>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-8">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <center><h1  style="color:grey;"><b><i>All About You</i></b></h1></center>
                            </div>
                            <?php
                            
                            ?>
                            <div class="panel-body">
                                <form method="post" action="allaboutyou_script.php">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="bio" value="<?php echo $arr[0]?>" placeholder="Bio" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="gender" value="<?php echo $arr[1]?>" placeholder="Gender" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="study" value="<?php echo $arr[2]?>" placeholder="Study/works At">
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="hobbies" value="<?php echo $arr[3]?>" placeholder="Hobbies" >
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="movie" value="<?php echo $arr[4]?>" placeholder="what is your favorite movie" >
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="language" value="<?php echo $arr[5]?>" placeholder="Languages you know!!">
                                </div>
                                <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-default btn-block" name="submit" value="Done!">
                                </div>
                                
                            </form>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <br>    
        <?php
            //require('footer.php');
        ?>
    </body>
    
</html>    