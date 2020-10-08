<?php 

	session_start();
    include 'dbh.php';
	$session_value=(isset($_SESSION['id']))?$_SESSION['id']:'';//gets the session id if it is set
	$current_page=$_SERVER['REQUEST_URI'];//gets the current page url
	//echo $current_page;
    //<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
if(isset($_SESSION['id']))
{

$userId=$_SESSION['id'];
$sql="SELECT verified FROM memberstable WHERE id='$userId'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if($row['verified']==0)
{
?>
<html>
<head>
    <link rel="stylesheet" href="font/flaticon.css"></link>
	<title>Setup Channel</title>

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

        <div class="set-up-channel">
            <?php


        	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

        	$sql="SELECT channel FROM memberstable WHERE id='$userId'";
        	$result=mysqli_query($conn,$sql);
        	$row=mysqli_fetch_assoc($result);

        	if($row['channel']==0)
        	{
        		$sql="UPDATE memberstable SET channel=1 WHERE id='$userId'";
        		$result=mysqli_query($conn,$sql);
        		$row=mysqli_fetch_assoc($result);
        		//means if the channel is not created by the user
        		//echo 'no channel';
        		/*
        		?>
        		<script type="javascript">
        			alert("hi");
        		</script>
        		<?php*/
        	}
        	else
        	{
        		//echo 'channel created';
        	}

            ?>
            <br><br><br>
            <h1 style="margin-top:-110px;color:#b225a8;text-align:center">Setup Channel</h1><br>
            <p style="text-align:center;font-size:19px;color:#747474">To enable earning Tips and gaining access to the Creator's Studio, you need to enter your PayPal account information below.</p>
            <div class="set-up-email"><br>
                <p style="font-size:23px;text-align:center;color:green"><b>Important</b></p>
                <p style="text-align:center;font-size:16px;color:green">Note, your PayPal account needs to be a Business and Verified Account</p><br><br>
            </div><br><br>
            <form class="setupPayPalInfo">
                    <p style="text-align:center;font-size:16px">Input Paypal Business Email:</p><input style="margin-left:270px;border:1px solid #969696" type="email" name="payee_email" required ><br><br>
                    <p style="text-align:center;font-size:16px">Paypal Account Country</p><br>
                    <select name="paypalAccountType" style="cursor:pointer;margin-top:-30px;margin-left:225px;border:1px solid #969696" required>
                        <option value="1">United States</option>
                        <option value="2">India</option>
                        <option value="3">Other Countries</option>
                    </select>
                    <button class="setupPayPalInfoButton" id="setupPayPalInfoButton" type="submit">Setup Account</button>
            </form>
            
            <p class="setup_channel_message" style="display:none"></p>
        </div>
        
    <?php
}
else
{
    header("LOCATION: creatorstudio.php");       
}

}
else
{
	header("LOCATION: signup.php?lastpage=setupchannel.php");		
}