<?php
    require 'connection.php';   
    session_start();
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
    $id=$_SESSION['id'];
    $query="select name,contact,dob,city,country from users where id='$id' ";
    $result=  mysqli_query($con, $query);
    $arr = mysqli_fetch_array($result);
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
    <body class="banner12">  
        <?php
            require 'header.php';
        ?>
        <div >
            <br><br><br><br><br>
             <div class="container">
                 <br><br>
             <div clas="row" >
                    <div class="col-xs-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <center><h1 style="color:grey;"><b>EDIT PROFILE</b></h1></center>
                            </div>
                            
                            <div class="panel-body">
                            <form method="post" action="editprofile_script.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="<?php echo $arr[0]?>" placeholder="Name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact" value="<?php echo $arr[1]?>" placeholder="Contact" >
                            </div>
                                <div class="form-group">
                                <input type="text" class="form-control" name="dob" value="<?php echo $arr[2]?>" placeholder="Date of birth" >
                            </div>
                                <div class="form-group">
                                <input type="text" class="form-control" name="city" value="<?php echo $arr[3]?>" placeholder="City" >
                            </div>
                                <div class="form-group">
                                <input type="text" class="form-control" name="country" value="<?php echo $arr[4]?>" placeholder="Country" >
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-default btn-block" value="EDIT">
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
             </div>
             </div>
        </div>
        <br><br><br>
        <?php
            //require('footer.php');
        ?>
    </body>
</html>
                                