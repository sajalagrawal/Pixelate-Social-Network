<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar"> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" style="font-size:24px;">Pixelate</a>
        </div>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php 
                if(!isset($_SESSION['email'])){
                ?>
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php                            
                }else{
                ?>
                <li><a href="search.php"><span class="glyphicon glyphicon-search"></span> Search Users</a></li>
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                <li><a href="editprofile.php"><span class="glyphicon glyphicon-wrench"></span> Edit profile</a></li>
                <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                
                <?php 
                }
                ?>  
            </ul>
        </div>
    </div>
</nav>