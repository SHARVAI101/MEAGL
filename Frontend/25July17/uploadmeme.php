<?php
include 'top.php';

if(isset($_SESSION['id'])){
	include 'dbh.php';

	date_default_timezone_set('Asia/Kolkata');//setting the timezone
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
	?>
	<form action="" id="uploadmemeform<?php echo $userId; ?>" method="post" enctype="multipart/form-data" class="upload-form">
		<div class="meme">
        <input class="title form-control title-input" type="text" placeholder="Enter meme title" name="memeTitle">
        <div class="image upload-image-div">
       		<input type="file" id="meme" name="meme" onchange="readURL(this);" class="filestyle" data-buttonName="upload-btn btn" data-icon="false" data-buttonText="+" data-input="false">
        	<img src="#" class="preview-image" id="previewImage" />
        </div>
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

        
        <h4></h4>
        </div>
        <h5 class="proceed"><a class="proceed-link"><i class="fa fa-arrow-circle-right" style="font-size:58px;color:#b522a8" ></i></a></h5>
		
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
			<h4>Choose Language:</h4>
			<div class="checkbox" style="position:relative;left:20px">
				<input type="checkbox" class="englishLanguageCheckbox" id="englishLanguageCheckbox" name="language" value="english">English<br>
				<input type="checkbox" class="hinglishLanguageCheckbox" id="hinglishLanguageCheckbox" name="language" value="hinglish">Hindi+English<br>
			</div>
			<hr>
			<a class="go-back"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<button type="submit" name="uploadmeme" class="btn upload-final"><i class="fa fa-arrow-circle-right" style="font-size:58px;color:#b522a8" ></i></button><br>
		</div>
	</form>
	<p id="uploadmemeerror"></p>
	<?php	  
	/*<input type="checkbox" class="groupInviteCheckbox" name="new_group_user_ids[]" value="<?php echo $row1['id']; ?>"><?php echo $row1['username']; ?>*/
}
else{
	header("LOCATION: signup.php?lastpage=uploadmeme.php");
}
?>
	
</body>
</html>