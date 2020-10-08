<!-- Side navigation -->

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "Lato", sans-serif;
}


@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}



</style>
</head>
<body>
    <div class="sidenav" style="padding-top:80px">
        <ul style="margin:0px;padding:0px">
            <li>
                <a href="index.php" style="text-align: center"><i class="fas fa-home"></i> Home</a><br>
            </li>
            <li>
                <?php
                if(isset($_SESSION['id']))
                {
                    $sql="SELECT channel FROM memberstable WHERE id='$userId'";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);

                    if($row['channel']==1)
                    {
                        ?>
                        <a href="creatorstudio.php"><button type="submit" class="creatorstudio-btn" style="font-size:22px;margin-top:0px">Creator Studio</button></a><br>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a href="createchannel.php"><button type="submit" class="creatorstudio-btn" style="font-size:22px;margin-top:0px">Create Channel</button></a><br>      
                        <?php
                    }
                }
                else
                {
                    ?>
                    <a href="createchannel.php"><button type="submit" class="creatorstudio-btn" style="font-size:22px;margin-top:0px">Create Channel</button></a><br>      
                    <?php
                }
                ?>
            </li>
            <li>
                <a href="uploadmeme.php" style="font-size:20px;margin-top:17px;"><i class="fas fa-upload"></i> Upload Meme</a><br>
            </li>
            <li>
                <a href="memedevelopersforum.php" style="font-size:20px;margin-top:17px;margin-bottom:10px"><i class="fab fa-quora"></i> Meme Developers' Forum</a>
            </li>
            <hr style="border-color:#e3e4e5"><br>
            <li>
                <p class="sidebar-heading" style="font-size:20px;text-align: center">MEME CATEGORIES</p>
            </li>
            <li>
                <ul style="margin:0px;padding:0px">
                    <div class="dropdown-content" style="display:none">
                        <li>
                            <a href="savagememes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25;width:25;border-radius:50%" src="defaults/savage.png"> Savage</a>
                        </li>
                        <li>
                            <a href="sportsmemes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/sports.png"> Sports</a>
                        </li>
                        <li>
                            <a href="celebmemes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/celeb.png"> Celeb</a>
                        </li>
                        <li>
                            <a href="gamingmemes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/gaming.png"> Gaming</a>
                        </li>
                        <li>
                            <a href="comicmemes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/comic.png"> Comic</a>
                        </li>
                        <li>
                            <a href="college_school_memes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/college.png"> College/School</a>
                        </li>
                        <li>
                            <a href="politics_memes" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/politics.png"> Politics</a>
                        </li>
                        <li>
                            <a href="justmythoughts.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/justmythoughts.png"> Just My Thoughts</a>
                        </li>
                        <li>
                            <a href="othermemes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/other.png"> Other</a>
                        </li>                        
                    </div> 
                </ul>                
            </li>
            <li>
                <p id="more-info-chevron" style="cursor:pointer"><span class="glyphicon glyphicon-chevron-down"></span></p>
            </li>
            <hr style="border-color:#e3e4e5"><br>
            <p class="sidebar-heading" style="font-size:20px;text-align: center">SUBSCRIPTIONS</p>
            <li>
                <ul style="margin:0px;padding:0px">
                    <?php
                    if(isset($_SESSION['id']))
                    {
                        ?>
                        <div class="left-nav-subscriptions-div" style="display:none">
                            <?php
                            $userId=$_SESSION['id'];
                            $subscriptions=array();
                            $sql="SELECT uploaderId FROM subscriberstable WHERE subscribedById='$userId' ORDER BY id DESC";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0)
                            {                
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $uploader=mysqli_real_escape_string($conn,$row['uploaderId']);

                                    $sql1="SELECT username,profilePictureLocation FROM memberstable WHERE id='$uploader'";
                                    $result1=mysqli_query($conn,$sql1);
                                    $row=mysqli_fetch_assoc($result1);
                                    echo '<li><a href="userprofile.php?id='.$uploader.'" style="text-align:left;font-family:\'Open Sans\'"><img src="'.$row['profilePictureLocation'].'" style="position:relative;width:40px;height:40px;border-radius:50%"> '.$row['username'].'</a></li>';
                                }
                            }
                            else
                            {
                                ?>
                                <li><p style="text-align:center;padding-left:10px;padding-right:10px">NO MEME CHANNELS SUBSCRIBED TO YET</p></li>
                                <?php
                            }

                            ?>
                        </div>

                        <p id="more-info-chevron-sub" style="cursor:pointer">
                        <span class="glyphicon glyphicon-chevron-down"></span></p>
                        <?php

                    }
                    else
                    {
                        ?>
                        <li><p style="text-align:center;padding-left:10px;padding-right:10px">SUBSCRIBE TO YOUR FAVORITE MEME-CHANNELS</p></li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            <hr style="border-color:#e3e4e5">
            <li>
                <a href="contact_us.php" style="font-size:20px;margin-top:0px"><i class="fab fa-whatsapp"></i> Contact Us</a><br>
            </li>
            <li>
                <p style="font-size:15px;margin-top:0px;font-family:'Open Sans';text-align:center;padding-bottom:15px">&copy; MEAGL 2018 <3</p>
            </li>
        </ul>
        <?php
        /*
        <ul style="margin:0px;padding:0px">
            <li>
                <a href="index.php" style="text-align: center"><i class="fas fa-home"></i> Home</a><br>
            </li>
            <li>
                <?php
                if(isset($_SESSION['id']))
                {
                    $sql="SELECT channel FROM memberstable WHERE id='$userId'";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);

                    if($row['channel']==1)
                    {
                        ?>
                        <a href="creatorstudio.php"><button type="submit" class="creatorstudio-btn"><h3 style="font-size:22px;margin-top:7px">Creator Studio</button></a><br>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a href="createchannel.php"><button type="submit" class="creatorstudio-btn"><h3 style="font-size:22px;margin-top:7px">Create Channel</button></a><br>      
                        <?php
                    }
                }
                else
                {
                    ?>
                    <a href="createchannel.php"><button type="submit" class="creatorstudio-btn"><h3 style="font-size:22px;margin-top:7px">Create Channel</button></a><br>      
                    <?php
                }
                ?>
            </li>
            <li>
                <a href="uploadmeme.php" style="font-size:20px;margin-top:17px;"><i class="fas fa-upload"></i> Upload Meme</a><br>
            </li>
            <li>
                <a href="memedevelopersforum.php" style="font-size:20px;margin-top:17px;margin-bottom:10px"><i class="fab fa-quora"></i> Meme Developers' Forum</a>
            </li>
            <hr style="border-color:#e3e4e5"><br>
            <li>
                <p class="sidebar-heading" style="font-size:20px;text-align: center">MEME CATEGORIES</p>
            </li>
            <li>
                <ul style="margin:0px;padding:0px">
                    <div class="dropdown-content" style="display:none">
                        <li>
                            <a href="savagememes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25;width:25;border-radius:50%" src="defaults/savage.png"> Savage</a>
                        </li>
                        <li>
                            <a href="sportsmemes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/sports.png"> Sports</a>
                        </li>
                        <li>
                            <a href="celebmemes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/celeb.png"> Celeb</a>
                        </li>
                        <li>
                            <a href="gamingmemes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/gaming.png"> Gaming</a>
                        </li>
                        <li>
                            <a href="comicmemes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/comic.png"> Comic</a>
                        </li>
                        <li>
                            <a href="college_school_memes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/college.png"> College/School</a>
                        </li>
                        <li>
                            <a href="politics_memes" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/politics.png"> Politics</a>
                        </li>
                        <li>
                            <a href="justmythoughts.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/justmythoughts.png"> Just My Thoughts</a>
                        </li>
                        <li>
                            <a href="othermemes.php" class="dropdown-menu-item" style="text-align:left;font-family:'Open Sans'"><img style="position:relative;height:25px;width:25px;border-radius:50%" src="defaults/other.png"> Other</a>
                        </li>                        
                    </div> 
                </ul>                
            </li>
            <li>
                <p id="more-info-chevron" style="cursor:pointer"><span class="glyphicon glyphicon-chevron-down"></span></p>
            </li>
            <hr style="border-color:#e3e4e5"><br>
            <p class="sidebar-heading" style="font-size:20px;text-align: center">SUBSCRIPTIONS</p>
            <li>
                <ul style="margin:0px;padding:0px">
                    <?php
                    if(isset($_SESSION['id']))
                    {
                        ?>
                        <div class="left-nav-subscriptions-div" style="display:none">
                            <?php
                            $userId=$_SESSION['id'];
                            $subscriptions=array();
                            $sql="SELECT uploaderId FROM subscriberstable WHERE subscribedById='$userId' ORDER BY id DESC";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0)
                            {                
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $uploader=mysqli_real_escape_string($conn,$row['uploaderId']);

                                    $sql1="SELECT username,profilePictureLocation FROM memberstable WHERE id='$uploader'";
                                    $result1=mysqli_query($conn,$sql1);
                                    $row=mysqli_fetch_assoc($result1);
                                    echo '<li><a href="userprofile.php?id='.$uploader.'" style="text-align:left;font-family:\'Open Sans\'"><img src="'.$row['profilePictureLocation'].'" style="position:relative;width:40px;height:40px;border-radius:50%"> '.$row['username'].'</a></li>';
                                }
                            }
                            else
                            {
                                ?>
                                <li><p style="text-align:center;padding-left:10px;padding-right:10px">NO MEME CHANNELS SUBSCRIBED TO YET</p></li>
                                <?php
                            }

                            ?>
                        </div>

                        <p id="more-info-chevron-sub" style="cursor:pointer">
                        <span class="glyphicon glyphicon-chevron-down"></span></p>
                        <?php

                    }
                    else
                    {
                        ?>
                        <li><p style="text-align:center;padding-left:10px;padding-right:10px">SUBSCRIBE TO YOUR FAVORITE MEME-CHANNELS</p></li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            <hr style="border-color:#e3e4e5">
            <li>
                <a href="contact_us.php" style="font-size:20px;margin-top:0px"><i class="fab fa-whatsapp"></i> Contact Us</a><br>
            </li>
            <li>
                <p style="font-size:15px;margin-top:0px;font-family:'Open Sans';text-align:center;padding-bottom:15px">&copy; MEAGL 2018 <3</p>
            </li>
        </ul>
        */
        ?>
        
        <!--<a href="#"><h2 style="font-size:20px;margin-top:-5px"><i class="fas fa-home"></i> Home</h2></a><br>-->

        
        <!--<button type="submit" class="creatorstudio-btn"><h3 style="font-size:22px;margin-top:7px">Creator Studio</button><br>-->
      
        
        
        
        
        
        

        
        <!-- <div class="dropdown-content" style="display:none">
            <a href="savagememes.php" class="dropdown-menu-item" style="text-align:left;margin-left:40px"><img style="position:absolute;left:35px;height:25;width:25;border-radius:50%" src="defaults/savage.png"> Savage</a>
            <a href="sportsmemes.php" class="dropdown-menu-item" style="text-align:left;margin-left:40px"><img style="position:absolute;left:35px;height:25px;width:25px;border-radius:50%" src="defaults/sports.png"> Sports</a>
            <a href="celebmemes.php" class="dropdown-menu-item" style="text-align:left;margin-left:40px"><img style="position:absolute;left:35px;height:25px;width:25px;border-radius:50%" src="defaults/celeb.png"> Celeb</a>
            <a href="gamingmemes.php" class="dropdown-menu-item" style="text-align:left;margin-left:40px"><img style="position:absolute;left:35px;height:25px;width:25px;border-radius:50%" src="defaults/gaming.png"> Gaming</a>
            <a href="comicmemes.php" class="dropdown-menu-item" style="text-align:left;margin-left:40px"><img style="position:absolute;left:35px;height:25px;width:25px;border-radius:50%" src="defaults/comic.png"> Comic</a>
            <a href="college_school_memes.php" class="dropdown-menu-item" style="text-align:left;margin-left:40px"><img style="position:absolute;left:35px;height:25px;width:25px;border-radius:50%" src="defaults/college.png"> College/School</a>
            <a href="politics_memes" class="dropdown-menu-item" style="text-align:left;margin-left:40px"><img style="position:absolute;left:35px;height:25px;width:25px;border-radius:50%" src="defaults/politics.png"> Politics</a>
            <a href="justmythoughts.php" class="dropdown-menu-item" style="text-align:left;margin-left:40px"><img style="position:absolute;left:35px;height:25px;width:25px;border-radius:50%" src="defaults/justmythoughts.png"> Just My Thoughts</a>
            <a href="othermemes.php" class="dropdown-menu-item" style="text-align:left;margin-left:40px"><img style="position:absolute;left:35px;height:25px;width:25px;border-radius:50%" src="defaults/other.png"> Other</a>
        </div> -->

        

        
        

        
        

        

        

        
    </div>
    