<?php //$_GET['id'] has user Id in table
    require 'connection.php';   
    require 'check_if_friends.php';
    session_start();
    if(!isset($_SESSION['email'])){
        header('location:index.php');
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
        <div class="container">
            <br><br><br><br><br>
            <?php 
                $id=$_GET['id'];
                $user_data_query="select * from users where id='$id'";
                $user_data_result=mysqli_query($con,$user_data_query) or die(mysqli_error($con));
                $row=mysqli_fetch_array($user_data_result);
                $name=$row['name'];
                $dob=$row['dob'];
                $city=$row['city'];
                $country=$row['country'];
                $contact=$row['contact'];
                $email=$row['email'];
            ?>
            <div id="dp">
                                <?php
                            //require 'connection.php';
                            //session_start();
                            $id=$_GET['id'];
                            $query="SELECT image FROM users where id='$id'";
                            $MyPhoto=mysqli_query($con,$query);
                            $row=mysqli_fetch_array($MyPhoto);
                            $imgPath=$row['image'];
                        ?>
                        <center>
                        <img src="<?php echo $imgPath;?>" class="img-responsive " height="300" width="300" >
                        </center>
            </div>
            <br><br><br>
            <table class="table table-bordered table-striped table-responsive">
                <col width="40">
                <col width="550">
                <tbody>
                    <tr><td><span class="glyphicon glyphicon-user"></span>  Name:</td><td><?php echo $name ?></td></tr>
                    <tr><td><span class="glyphicon glyphicon-envelope"></span>  Email:</td><td><?php echo $email ?></td></tr>
                    <tr><td><span class="glyphicon glyphicon-earphone"></span>  Wish At:</td><td><?php echo $dob ?></td></tr>
                    <tr><td><span class="glyphicon glyphicon-phone"></span>  Contact:</td><td><?php echo $contact ?></td></tr>

                    <tr><td><span class="glyphicon glyphicon-road"></span>  City:</td><td><?php echo $city ?></td></tr>
                    <tr><td><span class="glyphicon glyphicon-globe"></span>  Country:</td><td><?php echo $country ?></td></tr>
                    
                </tbody>
            </table>
            <?php 
                $user1=$_GET['id'];
                $user2=$_SESSION['id'];
                $url6="chat.php?id=".$user1;
                if($user1==$user2){
                    //can't be friends with himself/herself
                }else if(checkIfFriends($user1,$user2)==0){ //not friends, no requests bw them                    
                    $url="add_request.php?id1=".$user1."&id2=".$user2;
                    ?>
                    <a href="<?php echo $url ?>" class="btn btn-primary" name="add" value="Send request">Send request</a>
                    <a href="<?php echo $url6 ?>" class="btn  btn-primary" name="add" value="Send request">Message</a>
                    <?php
                }else if(checkIfFriends($user1,$user2)==1){  //logged in user has already sent request
                    echo '<a href="#" class=btn btn-block btn-success disabled>Request sent</a>';
                    $url5="delete_request.php?id1=".$user1."&id2=".$user2;
                    ?>
                    <a href="<?php echo $url5 ?>" class="btn btn-primary" name="add" value="Send request">Delete request</a>
                    <a href="<?php echo $url6 ?>" class="btn  btn-primary" name="add" value="Send request">Message</a>
                    <?php
                }else if(checkIfFriends($user1,$user2)==2){  //request came to logged in user
                    $url2="make_friends.php?id1=".$user1."&id2=".$user2;
                    $url3="delete_request.php?id1=".$user1."&id2=".$user2;
                    ?>
                   <a href="<?php echo $url2 ?>" class="btn  btn-primary" name="add" value="Send request">Accept request</a>
                   <a href="<?php echo $url3 ?>" class="btn  btn-primary" name="add" value="Send request">Delete request</a>
                   <a href="<?php echo $url6 ?>" class="btn  btn-primary" name="add" value="Send request">Message</a>
                   <?php
                }else if(checkIfFriends($user1,$user2)==3){  //already friends
                    echo '<a href="#" class=btn btn-block btn-success disabled>You are friends</a>';
                    $url4="delete_friendship.php?id1=".$user1."&id2=".$user2;
                    ?>
                    <a href="<?php echo $url4 ?>" class="btn  btn-primary" name="add" value="Send request">Delete friendship</a>
                    <a href="<?php echo $url6 ?>" class="btn  btn-primary" name="add" value="Send request">Message</a>
                    <?php
                }
                
                ?>
                    <br><br><br>
                    <center>
                     <div class="row">
                          <div class="col-xs-4"> 
                              <img src="img/hobby.jpg" width="150px" height="200px">
                          </div>   
                          <div class="col-xs-4"> 
                              <img src="img/study.jpg" width="150px" height="200px">
                          </div>
                          <div class="col-xs-4"> 
                              <img src="img/hobby1.jpg" width="150px" height="200px">
                          </div>  
                              
                          </div>
                     </div>
                 </center>
                     <br><br> 
            <div class="row">
                <?php
                    $query="select * from allaboutyou where uid='$id'";
                    $result=mysqli_query($con,$query) or die(mysqli_error($con));
                    $row=mysqli_fetch_array($result);
                    $bio=$row['bio'];
                    $gender=$row['gender'];
                    $study=$row['study'];
                    $hobbies=$row['hobbies'];
                    $movie=$row['movie'];
                    $language=$row['language'];
                ?>  
                <center> <h1 style="color:grey;"><ins> DISCOVER ME!!!!!!!!</ins> </h1> </center>
                <div class="col-xs-6 col-xs-offset-4"> 
                    <br><br>
                    <p id="autoResize">  <span class="glyphicon glyphicon-tag"></span>&nbsp;&nbsp; <?php echo "What I Am??    ".$bio ?></p>
                    <p id="autoResize"> <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp; <?php echo "I Am??   ".$gender  ?></p>
                 <p id="autoResize"> <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;<?php echo "Study/Works At??   ".$study  ?></p>
                <p id="autoResize"> <span class="glyphicon glyphicon-tasks"></span> &nbsp;&nbsp;<?php echo "My Hobbies??    ".$hobbies  ?></p>
                 <p id="autoResize"><span class="glyphicon glyphicon-cd"></span>&nbsp;&nbsp; <?php echo "Favorite Movie??   ".$movie ?></p>
                 <p id="autoResize"><span class="glyphicon glyphicon-blackboard"></span>&nbsp;&nbsp; <?php echo "Languages I know??   ".$language  ?></p>
                 </div>
            </div>
                    <br><br>     
            <div class="row">
                 <center> <h1 style="color:grey;"><ins>My Status</ins> </h1> </center>
                <?php
                    if(checkIfFriends($user1,$user2)==3 or $user1==$user2){
                         
                        $status_query="select sid,status,time from allstatus where userid='$user1' order by time desc";
                        $status_query_result=mysqli_query($con,$status_query) or die(mysqli_error($con));
                        $rows_fetched= mysqli_num_rows($status_query_result);
                        if($rows_fetched>0){

                            while($row=mysqli_fetch_array($status_query_result)){
                                $url4="deleteStatus.php?id=".$row['sid'];
                                ?>

                            <div class="panel-heading">
                                <ul style="list-style: none;">
                                        <li><?php echo $row['status']?></li>
                                        <li>Date added: <?php echo $row['time']?> &nbsp;&nbsp;
                                        
                                </ul>
                                <hr>
                            </div>
                <?php
                            }    
                        }
                    }
                ?>
            </div> <!-- end row -->
        </div>
        <div class="foot">
            <?php
                //require('footer.php');
            ?>
        </div>        
    </body>
</html>