<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location: index.php');
    }
    $id=$_SESSION['id'];
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
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript">
        $(function ()
        {
            dothis();
        });
        function dothis()
        {
            alert("ARE YOU SURE YOU WANT TO DDELETE ACCOUNT?");
            $('#delete')[0].click();
        } 
        </script>
        <!-- External CSS file -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
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

            </script>
    </head>
    <body>
        <?php
           require 'header.php';
        ?>
        <div class="container-fluid">
        <br><br><br><br><br><br>
        <!-- start  -->
        <div clas="row" >
        <div class="col-xs-4">
        <div class="panel panel-success">
            <?php
            $id=$_SESSION['id'];
            $username_query="select name from users where id='$id'";
            $username_query_result=mysqli_query($con,$username_query) or die(mysqli_error($con));
            $row=mysqli_fetch_array($username_query_result);
            $username=$row['name'];
            ?>
            <div class="panel-heading">
                <center><h1 style="color:grey;width:300px;"><b><?php echo "Hello <br>".$username."!"?></b></h1></center>
            </div>

            <div class="panel-body">
            <div>
            <ul  style="list-style: none;"> 
                <li> 
                    <?php
                        //require 'connection.php';
                        //session_start();
                        $id=$_SESSION['id'];
                        $query="SELECT image FROM users where id='$id'";
                        $MyPhoto=mysqli_query($con,$query);
                        $row=mysqli_fetch_array($MyPhoto);
                        $imgPath=$row['image'];
                    ?>
        
                    <img src="<?php echo $imgPath;?>" class="img-responsive " height="300" width="300" ><br>
       
                </li>
                <li>
                    <form method="post" action="addimage.php" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <input type='file'  style=" padding:10px;" style="width:300px;" name='UploadImage'>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary btn-lg" style="width:300px;" value="Upload profile pic" name="submit">
                        </div>
                    </form>
                </li>
                <li>
                    <a href="viewrequests.php" class="btn btn-primary btn-lg" style="width:300px;">View requests</a>
                </li>
                <li>
                    <?php
                        $userId=$_SESSION['id']; 
                        //print_r($_SESSION);
                        $url="user.php?id=".$userId;
                    ?>
                    <a href=<?php echo $url ?> class="btn btn-primary btn-lg" style="width:300px;">About me</a>
                </li>
                <li>
                    <a href="friends.php" class="btn btn-primary btn-lg" style="width:300px;">View friends</a>
                </li>
                <li>
                    <?php
                        $userId=$_SESSION['id']; 
                        //print_r($_SESSION);
                        $url2="allChats.php?id=".$userId;
                    ?>
                    <a href=<?php echo $url2 ?>  class="btn btn-primary btn-lg" style="width:300px;">People you chat with</a>
                </li>
                 <li>
                    <a href="deleteaccount.php" id="delete" class="btn btn-primary btn-lg" style="width:300px;">Delete Account</a>
                </li>
            </ul>
            </div>
        </div>
        </div> <!-- end panel -->
        </div> <!-- end col -->
        </div><!-- end row -->
        <div class="row">
            <a href="allaboutyou.php"  class="btn btn-primary  btn-lg" style="width:850px;">All about me</a>
            <br><br>
            <?php 
                $url3="addStatus.php?id=".$id;
            ?>
            <form method="post" action=<?php echo $url3?> >
                    <div class="col-xs-5">
                    <div class="form-group">
                        <input type="text" style="padding:20px;" class="form-control" name="status" placeholder="Type your status here">
                    </div>
                    </div>
                    <div class="col-xs-2">
                    <div class="form-group">
                        <input type="Submit" style="padding:12px;" class="btn btn-primary" value="Add status">
                    </div>
                    </div>
            </form><br><br><br><br>
            <?php
                $status_query="select sid,status,time from allstatus where userid='$id' order by time desc";
                $status_query_result=mysqli_query($con,$status_query) or die(mysqli_error($con));
                $rows_fetched= mysqli_num_rows($status_query_result);
                if($rows_fetched>0){
            ?>
            
                    <p id="autoResize"> My space </p>
                       <?php
                }
                while($row=mysqli_fetch_array($status_query_result)){
                    $url4="deleteStatus.php?id=".$row['sid'];
                    ?>
                    
                <div class="panel-heading">
                    <ul style="list-style: none;">
                            <li><?php echo $row['status']?></li>
                            <li>Date added: <?php echo $row['time']?> &nbsp;&nbsp;
                            <a href=<?php echo $url4?>  class="btn btn-primary">Delete</a></li>
                    </ul>
                    <hr>
                </div>
            <?php
                }
            ?>
        </div>
        <!-- end -->
        <!-- start previous
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <a href="viewrequests.php" class="btn btn-primary btn-block">View requests</a>
                </div>
                <div class="col-xs-4">
                    <?php
                        $userId=$_SESSION['id']; 
                        //print_r($_SESSION);
                        $url="user.php?id=".$userId;
                    ?>
                    <a href=<?php echo $url ?> class="btn btn-primary btn-block">About Me</a>
                </div>
                <div class="col-xs-4">
                    <a href="friends.php" class="btn btn-primary btn-block">View friends</a>
                </div>
            </div>
             <br><br><br><br><br><br>
            <div class="row">
                <div class="col-xs-4">
                    <form method="post" action="addimage.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type='file' class="form-control" style="height:70px; padding:0px;" name='UploadImage'>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-default btn-block" value="Upload profile pic" name="submit">
                        </div>
                        
                    </form>
                </div>  
            </div>
            
        
        <?php
            //require 'connection.php';
            //session_start();
            $id=$_SESSION['id'];
            $query="SELECT image FROM users where id='$id'";
            $MyPhoto=mysqli_query($con,$query);
            $row=mysqli_fetch_array($MyPhoto);
            $imgPath=$row['image'];
        ?>
        <center>
        <img src="<?php echo $imgPath;?>" class="img-responsive " height="300" width="300" >
        </center>
        </div>
         end previous -->
        <div class="foot">  <!-- remove class foot -->
        <?php
            //require('footer.php');
        ?>
        </div>  
        </div> <!-- end of container-fluid -->
    </body>
</html>