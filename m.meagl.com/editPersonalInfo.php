<?php 

/*if(isset($_SESSION['id'])){
	echo '<a href="userprofile.php">Back to profile page</a>';
}
else{
	echo '<a href="index.php">Back to home page</a>';
}*/
//session_start();
ob_start();
include 'top.php';
$b=ob_get_contents();
ob_end_clean();

$title = "Settings";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

echo $buffer;
if(isset($_SESSION['id'])){	
	$startTime = microtime(true);
	//include 'top.php';
	include 'dbh.php';
	include_once 'functions.php';
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	$sql5="SELECT profilePictureLocation FROM memberstable WHERE id='$userId'";
	$result5=mysqli_query($conn,$sql5);
	$row5=mysqli_fetch_assoc($result5);
	$ppl='../'.$row5['profilePictureLocation'];
?>

<div class="settings-div">	
	<h1 class="userprofile-tab-heading" style="margin-top:70px;margin-bottom:-70px;width:134px">SETTINGS</h1>

	<div class="setting-heading">

		<a class="setting-link"><h2 class="setting-header" id="update-pic">Update Profile Picture</h2></a>
		<div class="prof-pic-update">
			<img id="prof-pic" src="<?php echo htmlentities($ppl); ?>">
			<form action="" id="updateProfilePicture" method="post" enctype="multipart/form-data">		
				<input type="file" id="profilePicture" name="profilePicture" class="filestyle" data-buttonName="settings-select-pic btn" data-icon="false" data-buttonText="Select a Picture" data-input="false" ></input><br>		
				<input type="submit" value="Update" class="change-pic btn" name="updateProfilePicture"><br>
			</form>
			<p id="updateProfilePictureError" class="error-message" style="width:100px;margin:10px auto 0 auto"></p>		
		</div>	


	    <a class="setting-link"><h2 class="setting-header" id="change-pass">Change Password</h2></a>
	    <div class="change-password">
			<form action="" class="change_password_form" method="post">		
				<input type="password" class="inner-password" id="change_password_textarea_1" placeholder="New Password" name="password1"><br><br>		
				<input type="password" class="inner-password" id="change_password_textarea_2" placeholder="Confirm New Password" name="password2"><br>
				<input type="submit" value="Change Password" name="changePasswordButton" class="change-pass-btn btn">
			</form>

			<p id="changePasswordMessage"></p>
		</div>


		<a class="setting-link"><h2 class="setting-header" id="update-stat">Update Status</h2></a>
		<div class="update-status">
			<?php
			$sql="SELECT userStatus FROM memberstable WHERE id='$userId'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
			$userStatus=$row['userStatus'];
			?>
			<p class="error-message">Max 120 characters.</p>
			<form class="updateUserStatus" action="" method="POST">
				<p id="userStatus"><?php echo $userStatus; ?></p>
				<button id="allowEditUserStatus" class="edit-status btn">Edit Status</button>
				<button id="updateUserStatus" class="btn" style="display:none">Save</button>
			</form>

			<?php

			?>
		</div>


		<a class="setting-link"><h2 class="setting-header" id="select-lang">Select Language</h2></a>
		<div class="language-select-div">
			<form class="chooseMemeViewingLanguage" action="" method="post">
				<?php
				$sql="SELECT viewerId FROM english_meme_viewers WHERE viewerId='$userId'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)!=0){
					echo '<label class="checkbox language-select" style="letter-spacing:1px"><input type="checkbox" name="english" value="english" checked="checked"><span style="position:relative;top:-4px">English</span></label>';
					echo '<img src="EnglishMeme.jpg" class="english-meme">';
				}else{
					echo '<label class="checkbox language-select" style="letter-spacing:1px"><input type="checkbox" name="english" value="english"><span style="position:relative;top:-4px">English</span></label><br>';
					echo '<img src="EnglishMeme.jpg" class="english-meme">';
				}
				?>
				<hr>
				<?php
				$sql="SELECT viewerId FROM hinglish_meme_viewers WHERE viewerId='$userId'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)!=0){
					echo '<label class="checkbox language-select" style="position:relative;"><input type="checkbox" name="hinglish" value="hinglish" checked="checked"><span style="position:relative;top:-4px">Hindi+English</span></label>';
					echo '<img src="HindiMeme.jpg" class="hindi-meme">';
				}else{
					echo '<label class="checkbox language-select" style="position:relative;"><input type="checkbox" name="hinglish" value="hinglish"><span style="position:relative;top:-4px">Hindi+English</span></label><br>';
					echo '<img src="HindiMeme.jpg" class="hindi-meme">';
				}
				?>
				<input type="submit" class="memeLanguageFormSubmit" value="Save" style="margin-left:95px;margin-top:10px;">
			</form>
			<p id="memeLanguageError" class="error-message" style="margin-left:0px;margin-top:0px;"></p>
			<div class="add-height"></div>
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


	

	
</div>
<?php
}
else{
	header("LOCATION: signup.php?lastpage=editPersonalInfo.php");	
}
?>
</div>
</body>
</html>
