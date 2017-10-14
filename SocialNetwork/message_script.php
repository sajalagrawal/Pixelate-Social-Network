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
<?php
    session_start();
    require 'connection.php';
    $senderId=$_SESSION['id'];
    $recId=$_GET['id'];
    $message = $_POST['message'];
    if($message != ""){
     $message_query = "INSERT INTO messages(sendId,recId,msg) VALUES('$senderId','$recId','$message')";
     $message_query_result=mysqli_query($con,$message_query) or die(mysqli_error($con));
    }
    $url="chat.php?id=".$recId;
    //echo $url;
    header("location: $url");
?>
