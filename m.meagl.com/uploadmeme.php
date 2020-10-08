<?php 

    session_start();
    include 'dbh.php';
    $session_value=(isset($_SESSION['id']))?$_SESSION['id']:'';//gets the session id if it is set
    $current_page=$_SERVER['REQUEST_URI'];//gets the current page url
    //echo $current_page;
    //<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>

if(isset($_SESSION['id']))
{
?>
<html>
<head>
    <link rel="stylesheet" href="font/flaticon.css"></link>
    <title>Upload Meme</title>
    <meta name="theme-color" content="#2980b9" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="An amazing memes' website that combines memes and social media into an epic mixture!">
    <meta name="keywords" content="meme, meagl, fun, savage memes, sports memes, celeb memes, gaming memes, comic memes, college memes, school memes, dank memes">
    
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

<body style="background-color:#fefefe" >    
    <?php //include_once("analyticstracking.php") ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div class="top-nav container-fluid">
        <nav>
            
            <!--<a href="index.php" class="website-name">meagl</a>-->

            <!--<a href="index.php"><img style="height:56px;width:158px;margin-left:-27px;margin-top:-5px" src="logo/m_2.png"></a>-->
            <div class="dropdown">
                <p id="dropdown" style="cursor:pointer">
                    <span class="glyphicon glyphicon-chevron-down" style="color:#b522a8"></span>
                </p>
            </div>

            <?php
            //<i class="flaticon-eagle-shield"></i><h1 style="display:inline;margin-left:30px;">MEAGL</h1>
            if(!isset($_SESSION['id']))
            {
            ?>
                <a href="index.php"><img style="height:30px;width:100px;margin-top:11px;margin-left:25px" src="logo/m.png"></a>
            <?php
            }
            ?>

            <?php
            if(isset($_SESSION['id']))
            {
            ?>
                <div class="search-box" id="search-box">
                    <form class="searchBarForm">
                        <input type="text" placeholder="Q" class="search form-control" id="search-text" style="font-size:20px;">                   
                    </form>

                    <form class="searchResultsArrayForm" method="POST" action="usernameSearchResults.php">
                        <input type="hidden" name="resultArray" value="">
                    </form>
                </div>

                <div class="wrapper">                

                    <div class="notifications">
                        <p class="notifications-button" id="notifications"  style="cursor:pointer">
                            <span class="glyphicon glyphicon-bell"></span>
                            <span id="notificationsNumber" style="display:none"></span>
                        </p>
                    </div>
                    
                    <div class="mobi-wrapper">
                            <a class="mobi-menu"><i class="fa fa-bars" aria-hidden="true"></i></a> 
                    </div>
                </div>
            <?php
            }
            else
            {
            ?>
                <li style="display:inline" class="header-signin"><a href="signup.php">Sign Up | In</a></li>
            <?php
            }
            ?>
        
        </nav>

        <?php
        if(isset($_SESSION['id']))
        {
        ?>
            <div class="mobi-options">
                <h4  class="mobi-option"><a href="uploadmeme.php">Upload</a></h4><hr class="option-hr">
                <a href="userprofile.php?id=<?php echo htmlentities($_SESSION['id']); ?>">
                <h4 class="mobi-option">My Profile</h4></a><hr class="option-hr">
                <a href="editPersonalInfo.php"><h4 class="mobi-option">Settings</h4></a><hr class="option-hr">
                <a href="logout.php"><h4 class="mobi-option">Sign Out</h4></a>
            </div>
        <?php
        }
        ?>
        
    </div>

    <div class="header2">
        <a href="index.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">All</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="savagememes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Savage</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="sportsmemes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Sports</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="celebmemes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Celeb</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="gamingmemes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Gaming</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="comicmemes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Comic</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="college_school_memes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">College / School</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="politics_memes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Politics</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="justmythoughts.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Just my thoughts</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="othermemes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Other</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="memedevelopersforum.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Meme Developers' Forum</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="contact_us.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Contact Us</h2></a>
        <!--<li style="display:inline;float:right;"><a href="uploadmeme.php">Post meme!</a></li>-->
    </div>

    <div class="lower-body">
    <?php


	//include 'dbh.php';

	date_default_timezone_set('Asia/Kolkata');//setting the timezone
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
	?>
    <h1 class="userprofile-tab-heading" style="margin-top:60px;width:210px">UPLOAD MEME</h1>
    <hr>
	<form action="" id="uploadmemeform<?php echo $userId; ?>" method="post" enctype="multipart/form-data" class="upload-form">
		<div class="meme" id="upload-box">
            <input class="title form-control title-input" type="text" placeholder="Enter meme title" name="memeTitle">
            <div class="image upload-image-div">
           		<input type="file" id="meme" name="meme" onchange="readURL(this);" class="filestyle" data-buttonName="upload-btn btn" data-icon="false" data-buttonText="+" data-input="false">
            	<img src="#" class="preview-image" id="previewImage" style="width:100%"/>
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
        <!--<h5 class="proceed"><a class="proceed-link"><i class="fa fa-arrow-circle-right" style="font-size:58px;color:#b522a8" ></i></a></h5>-->
		
		<div class="upload-part-2">
			<h4 class="select-header">Select who you want to share this meme with!</h4>
			<hr style="margin-top:25px;margin-bottom:15px;">			
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
			<p id="uploadmemeerror" class="error-message" style="margin:10px auto;width:200px"></p>
			<button type="submit" name="uploadmeme" class="btn upload-final">UPLOAD</button><br>
		</div>
	</form>
    <hr>
    <div class="rules">
        <div id="rules-heading" style="cursor:pointer">
            <p style="text-align:center;font-size:27px;letter-spacing:1px;margin-top:5px">Rules</p>
        </div>
        <div class="rules-box" style="display:none">
            <hr style="margin-bottom:10px;border-color:#ef22ef">
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
    </div>
	
    <div class="add-height"></div>

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
                        <img src="../<?php echo htmlentities($ppL) ?>" class="small-notif-dp">
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
                        <img src="../<?php echo htmlentities($ppL) ?>" class="small-notif-dp">
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