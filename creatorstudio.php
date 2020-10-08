<?php 

	session_start();
    include 'dbh.php';

	$session_value=(isset($_SESSION['id']))?$_SESSION['id']:'';//gets the session id if it is set
	$current_page=$_SERVER['REQUEST_URI'];//gets the current page url
	//echo $current_page;
    //<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
if(isset($_SESSION['id'])){

$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

$sql="SELECT channel,verified FROM memberstable WHERE id='$userId'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if($row['channel']==0)
{
    header("LOCATION: createchannel.php");
}
else
{

if($row['verified']==0)
{
    header("LOCATION: setupchannel.php");
}
else
{

    
?>
<html>
<head>
    <link rel="stylesheet" href="font/flaticon.css"></link>
	<title>Creator Studio</title>
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!--<link rel="icon" type="image/png" href="font/eagle-shield_32.png"></link>-->
    <link rel="icon" type="image/png" href="logo/m_gold.png"></link>

    <link rel="stylesheet" href="Frontend/global.css"></link>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>    

    <!--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
    <script type="text/javascript">
        var sessionId="<?php echo $session_value;?>";
        var currentPage="<?php echo $current_page;?>";
    </script>
    <script type="text/javascript" src="general.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <!--<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>-->
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js"> </script>
</head>

<body style="background-color:#fefefe" >	

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script>//$(document).ready(function(){alert("asd22222222222222");});</script>
    <div class="top-nav container-fluid">
        <nav>
            <?php
            //<i class="flaticon-eagle-shield"></i><h1 style="display:inline;margin-left:30px;">MEAGL</h1>
        	?>
            <a href="index.php"><img style="height:40px;width:130px;margin-top:5px" src="logo/m.png"></a>
            
            <!--<a href="index.php" class="website-name">meagl</a>-->

            <!--<a href="index.php"><img style="height:56px;width:158px;margin-left:-27px;margin-top:-5px" src="logo/m_2.png"></a>-->
           

            <div class="search-box" id="search-box">
                <form class="searchBarForm">
                    <input type="text" placeholder="Search users" class="search form-control" style="font-size:20px;">                   
                </form>

                <form class="searchResultsArrayForm" method="POST" action="usernameSearchResults.php">
                    <input type="hidden" name="resultArray" value="">
                </form>
            </div>

            <div class="wrapper">
                

                <?php
                if(isset($_SESSION['id'])){       
                //echo "yes";
                //<li style="display:inline;float:right;"><a href="userprofile.php?id=<?php echo htmlentities($_SESSION['id']); "><?php echo htmlentities($_SESSION['username']); </a></li>
                $userId=mysqli_real_escape_string($conn,$_SESSION['id']);
                $sql="SELECT profilePictureLocation FROM memberstable WHERE id='$userId'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                $ppl=$row['profilePictureLocation'];
                ?>
                <div class="dp">                    
                    <a href="userprofile.php?id=<?php echo htmlentities($_SESSION['id']); ?>"><img src="<?php echo htmlentities($ppl); ?>" id="dp" class="img-responsive"></a>
                    <!--<a href="userprofile.php?id=<?php //echo htmlentities($_SESSION['id']); ?>"><?php //echo htmlentities($_SESSION['username']); ?></a>-->
                </div>

                <div class="notifications">
                    <p class="notifications-button" id="notifications"  style="cursor:pointer">
                        <span class="glyphicon glyphicon-bell"></span>
                        <span id="notificationsNumber" style="display:none"></span>
                    </p>
                </div>
                <?php
                } 
                else{
                    ?>
                    <?php
                    if($current_page=='/meagl.com/signup.php?lastpage=uploadmeme.php'){
                        echo '<li style="display:inline"><a href="signup.php?lastpage='.htmlentities($current_page).'">Sign Up</a></li>';
                    }else{
                        //echo $current_page;
                        echo '<li style="display:inline" class="error-message"><a href="signup.php">Sign In / Sign Up</a></li>';
                    }
                }
                ?>

                

                <div class="post-a-meme">
                    <!--<a href="#" id="upload"><span class="glyphicon glyphicon-upload"></span></a>-->
                    <a href="uploadmeme.php" id="upload"><span class="glyphicon glyphicon-upload"></span></a>
                </div>        

                <div class="q">
                    <a href="memedevelopersforum.php" class="q-link q-header"><span>Q</span></a>
                </div>
            </div>
        
        </nav>
        <?php
        //echo $_SERVER['PHP_SELF'];
        if(isset($_SESSION['id']))
        {
        ?>
        <div class="user-options">
            <a href="editPersonalInfo.php" class="user-option-link"><h4 class="user-option">Settings</h4></a>
            <a href="logout.php" class="user-option-link outbutton"><h4 class="user-option">Log out</h4></a>
            <!--<form name='logoutForm' method='POST' action='logout.php'>
                <button class='outbutton' >LOG OUT</button>
                <a href="logout.php" class="user-option-link outbutton"><h4 class="user-option">Log out</h4></a>
            </form>-->
        </div>
        <?php
        }
        ?>
    </div>

    
        <?php
        /*<li style="display:inline"><a href="index.php">MEAGL</a></li>
        
        if(isset($_SESSION['id'])){       
        ?>
        <li style="display:inline;float:right;"><a href="userprofile.php?id=<?php echo htmlentities($_SESSION['id']); ?>"><?php echo htmlentities($_SESSION['username']); ?></a></li>
        <?php
        } 
        else{
          
            echo '<li style="display:inline"><a href="login.php">LOGIN</a></li>';

            if($current_page=='/memewebsite_test1/signup.php?lastpage=uploadmeme.php'){
                echo '<li style="display:inline"><a href="signup.php?lastpage='.htmlentities($current_page).'">Sign Up</a></li>';
            }else{
                //echo $current_page;
                echo '<li style="display:inline"><a href="signup.php">Sign Up</a></li>';
            }
        }*/
        ?>
   

    <div class="lower-body">
    <?php
    include 'leftnav.php';
    ?>

    <?php
    /*
    <div style="position:absolute;left:300px;top:100px">
        <?php
        echo 'subscribers<br>';
        $subscribers=array();
        $sql="SELECT subscribedById FROM subscriberstable WHERE uploaderId='$userId' ORDER BY id DESC";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $subscriber=$row['subscribedById'];

            $sql1="SELECT username FROM memberstable WHERE id='$subscriber'";
            $result1=mysqli_query($conn,$sql1);
            $row=mysqli_fetch_assoc($result1);
            echo $subscriber.' '.$row['username'].'<br>';
        }

        ?>
        <br><br>
        
    </div>
    */
    ?>
    
    <div class="creatorstudio-infobox"><br>
        <i class="fas fa-cog" style="height:20px;width:20px;margin-left:18px;color:#1967d2"></i><h1 style="font-size:28px;display:inline;color:#1967d2"> Creator Studio (beta)</h1>
        <hr style="border-color:#cccccc;margin-top:20px">
        
        <div class="subscribers-infobox" style="overflow-y:auto"><br>
            <h1 style="font-size:23px;margin-left:10px;color:#3c4043;display:inline">  Subscribers<p id="more-info-chevron-subscribers" style="cursor:pointer;margin-top:-23px;margin-left:260px">
            <!-- <span class="glyphicon glyphicon-chevron-down"></span> --></p></h1>
            <hr style="border-color:#cccccc;margin-top:19px">
            <?php
            //echo 'subscribers<br>';
            $subscribers=array();
            $sql="SELECT subscribedById FROM subscriberstable WHERE uploaderId='$userId' ORDER BY id DESC";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $subscriber=mysqli_real_escape_string($conn,$row['subscribedById']);

                    $sql1="SELECT username,profilePictureLocation FROM memberstable WHERE id='$subscriber'";
                    $result1=mysqli_query($conn,$sql1);
                    $row=mysqli_fetch_assoc($result1);
                    //echo $subscriber.' '.$row['username'].'<br>';
                    ?>
                    <a href="userprofile.php?id=<?php echo $subscriber; ?>" style="text-align:center;margin-left:80px;font-size:20px;margin-top:300px"><img style="position:absolute;left:35px;height:35px;width:35px;border-radius:50%" src="<?php echo $row['profilePictureLocation']; ?>"><?php echo $row['username']; ?></a><br><br><br>
                    <?php
                }
            }
            else
            {
                ?>
                <p>No subscribers yet</p>
                <?php
            }
            ?>
            
            <!-- <a href="#" style="text-align:center;margin-left:80px;font-size:20px"><img style="position:absolute;left:35px;height:35px;width:35px;border-radius:50%" src="defaults/sharvai.jpg">Sharvai</a> -->
        </div>
        
        <?php

        $userId=mysqli_real_escape_string($conn,$_SESSION['id']);

        $sql="SELECT tipperId,tipAmount,currency FROM tips_table WHERE tipReceiverId='$userId' ORDER BY id DESC";
        $result=mysqli_query($conn,$sql);
        $totalDonations=mysqli_num_rows($result);


        ?>
        <div class="donations-infobox">
            <i class="fas fa-hand-holding-usd" style="height:20px;width:20px;margin-left:10px;margin-top:25px;color:#1967d2"></i><h1 style="font-size:23px;display:inline;margin-left:10px;color:#1967d2;margin-top:70px">Donations</h2><br>

            <hr style="border-color:#cccccc;margin-top:15px">
            <h2 class="donations-info" style="position:absolute">Total Donations : <?php echo $totalDonations; ?></h2><br><br><br>
            <hr style="border-color:#cccccc">
            
            <!-- <h2 class="donations-info" style="margin-left:400px">Money Earned :</h2><br><br> -->
            <h2 class="donations-info" style="width:140px;margin:40px auto 5px auto;display:block">DONATORS <p id="more-info-chevron-donator" style="margin-top:-20px"><!-- <span class="glyphicon glyphicon-chevron-down"></span> --></p></h2><br>
            <div  style="overflow-y:auto;height:auto;max-height:500px;border:1px solid #cccccc;width:270px;margin:-10px auto 0 auto;display:block">
            <br>
            <?php

            if($totalDonations>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $tipperId=mysqli_real_escape_string($conn,$row['tipperId']);
                    $tipAmount=mysqli_real_escape_string($conn,$row['tipAmount']);
                    $currency=mysqli_real_escape_string($conn,$row['currency']);

                    $sql1="SELECT username,profilePictureLocation FROM memberstable WHERE id='$tipperId'";
                    $result1=mysqli_query($conn,$sql1);
                    $row1=mysqli_fetch_assoc($result1);

                    $tipperName=$row1['username'];
                    $tipperPPL=$row1['profilePictureLocation'];

                    ?>
                    <a href="userprofile.php?id=<?php echo $tipperId; ?>" style="text-align:center;margin-left:20px;font-size:20px;margin-top:300px;font-family:'Open Sans'"><img style="margin-left:20px;height:35px;width:35px;border-radius:50%" src="<?php echo $tipperPPL; ?>"> <?php echo $tipperName; ?> <?php echo $currency; ?> <?php echo $tipAmount; ?></a><br><br><br>
                    <?php
                }
            }
            else
            {
                ?>
                 <p style="text-align:center;margin-left:310px;font-size:20px;margin-top:300px;font-family:'Open Sans'">No donations yet!</p>
                <?php
            }

            ?>
            </div>
            <!-- <a href="#" style="text-align:center;margin-left:310px;font-size:20px"><img style="position:absolute;left:270px;height:35px;width:35px;border-radius:50%" src="defaults/sharvai.jpg">Sharvai</a><br><br><br>
            <h2 class="donations-info" style="margin-left:200px">Top Donor of all Time :</h2><br>            -->
            <svg style="position: relative;display: inline;" class="svg-inline--fa fa-check-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
            <svg style="position: relative;display: inline;" class="svg-inline--fa fa-check-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""></svg>
        </div>
    </div>

<div class="small-notifications-column">
    <?php
    if(isset($_SESSION['id']))
    {
        $userId=mysqli_real_escape_string($conn,$_SESSION['id']);
        $sql="SELECT * FROM notifications_table WHERE receiverId='$userId' ORDER BY id DESC";
        $result=mysqli_query($conn,$sql);

        $areThereNotifications=false;
        $notifications_counter=0;
        echo '<div class="small-notifications-body">';
        while($row=mysqli_fetch_assoc($result)){
            $areThereNotifications=true;

            $notification=$row['notification'];
            $notificationId=mysqli_real_escape_string($conn,$row['id']);
            $datetime=$row['datetime'];
            $nL=$row['notificationLink'];

            $senderId=$row['senderId'];
            $sql1="SELECT profilePictureLocation FROM memberstable WHERE id='$senderId'";
            $result1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_assoc($result1);
            $ppL=$row1['profilePictureLocation'];
            if($ppL=='')
            {
                //this means its a group ka notification
                if(preg_match_all('/\d+/', $nL, $numbers))
                {
                    $groupId = end($numbers[0]);
                }
                $sql10="SELECT groupPicLocation FROM groups_table WHERE id='$groupId'";
                $result10=mysqli_query($conn,$sql10);
                $row10=mysqli_fetch_assoc($result10);
                $ppL=$row10['groupPicLocation'];

            }

            $viewingStatus=$row['viewingStatus'];
            if($viewingStatus==0)
            {
                $notifications_counter+=1;
                ?>
                <a href="<?php echo htmlentities($nL); ?>" class="notif-link" id="notification<?php echo htmlentities($notificationId); ?>">    
                    <div class="notif">
                        <img src="<?php echo htmlentities($ppL) ?>" class="small-notif-dp">
                        <p class="small-notif-text"><?php echo $notification; ?></p>                            
                    </div>
                </a>
                <?php

            }
            else
            {
                ?>
                <a href="<?php echo htmlentities($nL); ?>" class="notif-link" id="notification<?php echo htmlentities($notificationId); ?>">    
                    <div class="notif" style="background-color:#EAEAEA">
                        <img src="<?php echo htmlentities($ppL) ?>" class="small-notif-dp">
                        <p class="small-notif-text"><?php echo $notification; ?></p>                            
                    </div>
                </a>
                <?php
            }
        }

        if($areThereNotifications==false){
            echo '<p>No notifications yet!</p>';            
        }else{
            ?>
            <script>thereAreNotifications(<?php echo $notifications_counter; ?>);</script>
            <?php
        }
        echo "</div>";
    }   
    ?>
    </div>

    <?php
}
}
}
else
{
	header("LOCATION: signup.php?lastpage=setupchannel.php");		
}