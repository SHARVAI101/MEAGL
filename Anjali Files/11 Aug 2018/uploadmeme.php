<?php 

	session_start();
    include 'dbh.php';
	$session_value=(isset($_SESSION['id']))?$_SESSION['id']:'';//gets the session id if it is set
	$current_page=$_SERVER['REQUEST_URI'];//gets the current page url
	//echo $current_page;
    //<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
if(isset($_SESSION['id'])){
?>
<html>
<head>
    <link rel="stylesheet" href="font/flaticon.css"></link>
	<title>Upload Meme</title>
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js"> </script>
</head>

<body style="background-color:#1c1c1b" >	

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
            <div class="dropdown">
                <p id="dropdown" style="cursor:pointer">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </p>
            </div>

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
    <div class="header2">
      	<a href="index.php" class="categ-link"><h1 class="categ">All</h1></a>
      	<a href="savagememes.php" class="categ-link"><h1 class="categ">Savage</h1></a>
      	<a href="sportsmemes.php" class="categ-link"><h1 class="categ">Sports</h1></a>
      	<a href="celebmemes.php" class="categ-link"><h1 class="categ">Celeb</h1></a>
      	<a href="gamingmemes.php" class="categ-link"><h1 class="categ">Gaming</h1></a>
      	<a href="comicmemes.php" class="categ-link"><h1 class="categ">Comic</h1></a>
        <a href="college_school_memes.php" class="categ-link"><h1 class="categ">College/School</h1></a>
        <a href="politics_memes.php" class="categ-link"><h1 class="categ">Politics</h1></a>
        <a href="justmythoughts.php" class="categ-link"><h1 class="categ">Just my thoughts</h1></a>
      	<a href="othermemes.php" class="categ-link"><h1 class="categ">Other</h1></a>
      	<a href="memedevelopersforum.php" class="categ-link"><h1 class="categ">Meme Developers' Forum</h1></a>
        <a href="contact_us.php" class="categ-link"><h1 class="categ">Contact Us</h1></a>
        <!--<li style="display:inline;float:right;"><a href="uploadmeme.php">Post meme!</a></li>-->
    </div>

    <div class="lower-body">
    <?php


	//include 'dbh.php';

	date_default_timezone_set('Asia/Kolkata');//setting the timezone
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
	?>
    <div class="rules">
        <h4 style="text-align:center;font-size:27px;letter-spacing:1px">Rules</h4>
        <hr style="margin-top:10px;margin-bottom:10px;border-color:#ef22ef">
        <ul style="padding-left:0px">
            <li class="rule">
                The content posted on Meagl must be ORIGINAL.
                <div class="full-rule">
                    Meagl is a platform that was built to support original content. We take the originality of content very seriously. Content taken from another person and posted here is not allowed be it from meagl.com itself or any other website. You can repost content from other websites as long as they are yours and completely original.
                </div>
                <hr style="margin-top:20px;margin-bottom:0px">
            </li>

            
            <li class="rule">
                Do not post low quality content
                <div class="full-rule">
                    Meagl, as a community, appreciates high quality content. Low quality content has a higher chance of getting downvoted and removed from the platform. Therefore, you must refrain from putting up low quality content in the first place.
                </div>
                <hr style="margin-top:20px;margin-bottom:0px">
            </li>
            <li class="rule">
                No Pornographic content or Nudity is allowed
                <div class="full-rule">
                    We have strict guidelines against pornographic content or nudity. Any user posting content that is pornographic in nature will face stricter regulations on any content posted by him/her in the future.
                </div>
                <hr style="margin-top:20px;margin-bottom:0px">
            </li>
            <li class="rule">
                Racist content is not allowed
                <div class="full-rule">
                    Content that might hurt the sentiments of a certain community or set of people are banned. 
                </div>
            </li>
        </ul>
    </div>
	<form action="" id="uploadmemeform<?php echo $userId; ?>" method="post" enctype="multipart/form-data" class="upload-form">
		<div class="meme">
        <input class="title form-control title-input" type="text" placeholder="Enter meme title" name="memeTitle">
        <div class="image upload-image-div">
       		<input type="file" id="meme" name="meme" onchange="readURL(this);" class="filestyle" data-buttonName="upload-btn btn" data-icon="false" data-buttonText="+" data-input="false">
        	<img src="#" class="preview-image" id="previewImage" style="width:600px"/>
        </div>
        <div class="memecategory_select">
	        <select name="memecategory" class="points meme-categ select-picker styled-select slate">
				<option value="selectCategory" selected>Select meme category</option>
	   			<option value="Sports">Sports</option>
	   			<option value="Gaming">Gaming</option>
	   			<option value="Comics">Comics</option>
	   			<option value="Celeb">Celeb</option>
	   			<option value="Savage">Savage</option>
	   			<option value="College / School">College / School</option>
	   			<option value="Politics">Politics</option>
	   			<option value="Just My Thoughts">Just My Thoughts</option>
	   			<option value="Other">Other</option>
			</select>
		</div>
        
        <h4></h4>
        </div>
        <h5 class="proceed"><a class="proceed-link"><i class="fa fa-arrow-circle-right" style="font-size:58px;color:#b225a8" ></i></a></h5>
		
		<div class="upload-part-2">
			<h4 class="select-header">Select who you want to share this meme with!</h4>
			<hr style="margin-top:25px;margin-bottom:15px;">
			<p id="uploadmemeerror"></p>
			<div class="checkbox selector">
				<label class="select-label"><input type="checkbox" class="allWorldVisibiltyCheckbox" name="share_meme_with_theWorld" value="1"><span style="position:relative;bottom:3.5px">The World: <span style="font-size:15px">Everyone on this website</span></span></label>
			</div>
			<hr style="margin-bottom:5px;">
			<label class="select-header2">My Groups:</label>
			<div class="checkbox group-select">
				<label class="select-label group-header-label"><input type="checkbox" class="allGroupsVisibiltyCheckbox memeSharingCheckbox" name="" value="" style="display:none"><p id="allGroupsCheckboxLabel">All of My Groups</p></label><hr style="margin-top:5px;margin-bottom:0px;border-color:#cccccc;">
				<div class="checkbox lower-group-select">
					<?php
					$areThereGroups=false;//if the user is a part of atleast one group then thiss will become true

					$sql="SELECT groupId,groupname,participantStatus FROM group_participants_table WHERE participantId='$userId'";
					$result=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($result)){
						if($row['participantStatus']!=3){
							//if the user has not exited from the group

							$areThereGroups=true;
							$groupId=$row['groupId'];
							$groupname=$row['groupname'];

							echo '<label class="select-label select-group-label"><input type="checkbox" class="groupVisibilityCheckbox memeSharingCheckbox" name="meme_sharing_groupId[]" value="'.$groupId.'"><span style="position:relative;bottom:3.5px;">'.$groupname.'</span></label><br>';	
						}
					}

					if($areThereGroups==true){			
						echo '<script type="text/javascript">showThisElement("allGroupsVisibiltyCheckbox");</script>';
						echo '<script type="text/javascript">showThisElement("allGroupsCheckboxLabel");</script>';
					}
					else{
						echo '<p class="select-group-label">You are not a part of any group to share this meme with!</p>';
					}

					
					?>
				</div>
			</div>
			<hr style="margin-bottom:10px;">
			<label class="select-header2">My friends:</label>
			<div class="checkbox group-select">
			<label class="select-label group-header-label"><input type="checkbox" class="allFriendsVisibiltyCheckbox memeSharingCheckbox" style="display:none;"><p class="allFriendsCheckboxLabel" style="position:relative;top:-2.5px">All of My Friends</p></label><hr style="margin-top:-5px;margin-bottom:0px;border-color:#cccccc;">
			<div class="checkbox lower-group-select">
			<?php
			//make friends div
			//fetching the friends' list and friend requests
			$sql="SELECT * FROM friends_table WHERE sender_user_id='$userId' OR receiver_user_id='$userId'";
			$result=mysqli_query($conn,$sql);
			
			$friends=false;//variable to check if a user has atleast one friend or not
			
			while($row=mysqli_fetch_assoc($result)){
				
				$sender_user_id=$row['sender_user_id'];
				$receiver_user_id=$row['receiver_user_id'];
				$friend_request_id=$row['id'];
				if($row['relation']==1){
					
					//so the two users are friends ..now checking which one of them is the current user user whose profile is being accessed and which one is his/her friend
					$friends=true;
					if($sender_user_id==$userId){
						//the current user is the sender therfore, his friend is the receiver
						$sql1="SELECT * FROM memberstable WHERE id='$receiver_user_id'";				
						$friend_id=$receiver_user_id;
					}
					else{
						//the current user is the receiver therfore, his friend is the sender
						$sql1="SELECT * FROM memberstable WHERE id='$sender_user_id'";
						$friend_id=$sender_user_id;
					}
					$result1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($result1);
					?>
					<label class="select-label select-group-label"><input type="checkbox" class="friendVisibilityCheckbox memeSharingCheckbox" name="meme_sharing_userId[]" value="<?php echo $row1['id']; ?>"><span style="position:relative;bottom:3.5px"><?php echo $row1['username']; ?></span></label><br>
					<?php	  
				
				}
			}
			if($friends==false){
				echo '<p>You don\'t have any friends to share this meme with!</p> ';
			}else{
				echo '<script type="text/javascript">showThisElement("allFriendsVisibiltyCheckbox");</script>';
				echo '<script type="text/javascript">showThisElement("allGroupsCheckboxLabel");</script>';
			}
			?>
			</div>
			</div>
			<hr>
			<textarea name="memedescription" rows="3" placeholder="Enter meme description." class="meme-description form-control"></textarea><br>
			<input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">

			<hr style="margin-top:5px">
			<label class="select-header2">Choose Language:</label>
			<div class="checkbox language-checkbox">
				<label class="checkbox select-label select-group-label"  style="position:relative;left:20px;margin-top:10px;margin-bottom:5px"><input type="checkbox" class="englishLanguageCheckbox" id="englishLanguageCheckbox" name="language" value="english"><span style="position:relative;top:-3px">English</span></label>
				<label class="checkbox select-label select-group-label"  style="position:relative;left:20px;margin-top:5px;margin-bottom:10px"><input type="checkbox" class="hinglishLanguageCheckbox" id="hinglishLanguageCheckbox" name="language" value="hinglish"><span style="position:relative;top:-3px">Hindi+English</span></label>
			</div>
			<hr>
			<a class="go-back"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<button type="submit" name="uploadmeme" class="btn upload-final"><i class="fa fa-arrow-circle-right" style="font-size:58px;color:#b522a8" ></i></button><br>
		</div>
	</form>
	
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
	/*<input type="checkbox" class="groupInviteCheckbox" name="new_group_user_ids[]" value="<?php echo $row1['id']; ?>"><?php echo $row1['username']; ?>*/
}
else{
	header("LOCATION: signup.php?lastpage=uploadmeme.php");
}
?>
</div>	
</body>
</html>