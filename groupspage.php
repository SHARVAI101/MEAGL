<?php 
ob_start();
include 'top.php';
$b=ob_get_contents();
ob_end_clean();

$title = "Group Image Sharing";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

echo $buffer;

//$startTime = microtime(true);
include 'dbh.php';
include_once 'functions.php';

date_default_timezone_set('Asia/Kolkata');//setting the timezone

$groupId=mysqli_real_escape_string($conn,$_GET['id']);

$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

$sql10="SELECT participantStatus FROM group_participants_table WHERE groupId='$groupId' AND participantId='$userId'";
$result10=mysqli_query($conn,$sql10);
if(mysqli_num_rows($result10)!=0){
	//only if the user belongs to the group will its info be shown never otherwise

	//group invite request bar
	?>
	<div>
		<?php
		$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
		$groupInvites=false;//false if the user has no group invites and true if the user does have group invites
			

		$sql="SELECT id,invitationDate,inviterUserName,inviterId,groupname FROM group_participants_table WHERE (participantId='$userId' AND invitationStatus=0 AND groupId='$groupId')";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)!=0){
			$row=mysqli_fetch_assoc($result);
			$groupInvites=true;

			$inviteId=$row['id'];
			$date=$row['invitationDate'];//for date of invitation
			$inviterId=$row['inviterId'];
			$inviterUserName=$row['inviterUserName'];
			$groupname=$row['groupname'];

			//<p>Date of creation: <?php echo $date; </p>
			?>
			<div class="group-invitation">
				<p class="invitation-prompt" id="invitation-prompt">You have an invite request pending from this group.</p>			
				<p id="acceptOrRejectGroupInvite<?php echo htmlentities($inviteId); ?>"></p>
				<form class="acceptGroupInviteForm" id="acceptGroupInviteForm<?php echo htmlentities($inviteId); ?>" method="post" action="">
					<input type="hidden" name="groupId" value="<?php echo htmlentities($groupId); ?>">	
					<input type="hidden" name="inviteId" value="<?php echo htmlentities($inviteId); ?>">					
					<input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
					<button type="submit" class="btn accept text-success" value="Accept Invitation"><span class="glyphicon glyphicon-ok"></span></button>
				</form>
				<form class="rejectGroupInviteForm" id="rejectGroupInviteForm<?php echo htmlentities($inviteId); ?>" method="post" action="">
					<input type="hidden" name="groupId" value="<?php echo htmlentities($groupId); ?>">						
					<input type="hidden" name="inviteId" value="<?php echo htmlentities($inviteId); ?>">
					<button type="submit" class="btn reject text-danger" value="Reject Invitation"><span class="glyphicon glyphicon-remove"></span></button>
				</form>
			</div>
			<?php				
		}
		?>
	</div>
	<?php

	$sql1="SELECT * FROM groups_table WHERE id='$groupId'";
	$result1=mysqli_query($conn,$sql1); 					
	$row1=mysqli_fetch_assoc($result1);

	$groupname=$row1['groupname'];
	$gpl=$row1['groupPicLocation'];
	$numberOfParticipants=$row1['numberOfParticipants'];
	$numberOfPendingInvitations=$row1['numberOfPendingInvitations'];
	$datetime=$row1['lastActivityDateTime'];
	$date=date("d-m-Y", strtotime($row1['dateOfCreation']));//to change the format of display date

	?>
	
	<div class="group" id="<?php echo htmlentities($groupId); ?>">
		<a class="group-dp-link"><img id="group_dp" src="<?php echo $gpl; ?>"></a>
		<h3 class="group-name"><a class="group-name" href="groupspage.php?id=<?php echo htmlentities($groupId); ?>"><?php echo htmlentities($groupname); ?></a></h3>
		<p class="last-active">Last Active: <?php echo getTime($datetime); ?></p>
		<p class="created">Created: <?php echo htmlentities($date); ?></p>	
		<hr>
		<p class="groupNumberOfParticipants">Participants: <?php echo htmlentities($numberOfParticipants); ?></p>
		<?php 
		$sql="SELECT invitationStatus FROM group_participants_table WHERE groupId='$groupId' AND participantId='$userId'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		//echo $row['participantStatus'];
		if($row['invitationStatus']==1){
			//that is, if the user has not already exited the group and hasn't accepted it
			?>
			<p class="exitGroupMessageLabel"></p>
			<form class="exitGroupForm" id="exitGroupForm<?php echo htmlentities($userId); ?>" method="post" action="">
				<input type="hidden" name="groupId" value="<?php echo htmlentities($groupId); ?>">	
				<input type="hidden" name="userId" value="<?php echo htmlentities($userId); ?>">						
				<input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
				<input type="submit" value="Exit Group" class="btn exit-btn">
			</form>
			<?php
		}
		?>
		<div class="group_participants">
		<?php
		//$userId=$_SESSION['id'];
		$currentUserIsAdmin=false;
		//echo $userId;
		$sql1="SELECT participantId FROM group_participants_table WHERE (groupId='$groupId' AND participantStatus=1 AND participantId='$userId')";
		$result1=mysqli_query($conn,$sql1);
		if($all_admins=mysqli_fetch_assoc($result1)){
			//echo "ADMIN HAI BRO";
			$currentUserIsAdmin=true;
			//$currentUserIsMember=1;
		}
		else{
			//$currentUserIsMember=1;
		}
		//if he is an admin 
		//print_r($all_admins);

		$sql="SELECT participantId,participantStatus FROM group_participants_table WHERE groupId='$groupId' AND participantStatus!=3 AND invitationStatus=1";
		$result=mysqli_query($conn,$sql);

		while($row=mysqli_fetch_assoc($result)){
			$participantId=$row['participantId'];
			$participantStatus=$row['participantStatus'];
			if($participantId==$_SESSION['id']){
				$currentUserIsMember=1;
			}

			$sql1="SELECT username FROM memberstable WHERE id='$participantId'";
			$result1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_assoc($result1);

			$username=$row1['username'];
			echo '<div class="group-member" id="groupMember'.htmlentities($participantId).'">';
				echo '<p class="participant-name"><a href="userprofile.php?id='.htmlentities($participantId).'" style="color:black">'.htmlentities($username).'</a>';
				if($participantStatus==1){
					//that means the user is an admin
					echo '<span style="display:inline;"> (admin)</span></p>';
				}else{
					//if the participant is not an admin
					//but if the current user is the admin..then he has the power to make others admins
					echo '<span id="groupAdminLabel'.htmlentities($participantId).'" style="display:none"> (admin)</span></p>';
					if($currentUserIsAdmin==true){
						echo '<form class="makeGroupAdminForm" id="makeGroupAdminForm'.htmlentities($participantId).'" method="post" action="">
								<input type="hidden" name="participantId" value="'.htmlentities($participantId).'">
								<input type="hidden" name="groupId" value="'.htmlentities($groupId).'">							
								<input type="submit" class="btn make-admin-btn" value="Make Admin">
							</form>';
					}	
				}

			echo '</div>';

		}

		?>		
	</div>
	<p id="numberOfPendingInvitations">Pending Invitations: <?php echo htmlentities($numberOfPendingInvitations); ?></p>
	
	<hr>
	<div class="group-invite-div">
		<?php
		$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
		$sql="SELECT participantStatus FROM group_participants_table WHERE participantId='$userId' AND groupId='$groupId'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		if($row['participantStatus']==1)
		{
			//if the user is an admin
			?>
			<h4 class="invite-header">Invite users</h4>				
			<h5 class="group-name-header-1" id="invite-prompt" style="padding-left:5px;margin-top:8px;padding-right:2px">Send invites:</h5> 
			<form class="sendGroupInvitesForm">
				<input class="group_input" type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
				<input class="group_input" type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
				<input class="group_input" type="hidden" name="inviterId" value="<?php echo htmlentities($userId); ?>">
				<input class="group_input" type="hidden" name="groupname" value="<?php echo htmlentities($groupname); ?>">
				<input type="hidden" id="groupId" name="groupId" value="<?php echo $groupId; ?>">
				<?php
				//make friends div
				//fetching the friends' list and friend requests
				$sql="SELECT id,sender_user_id,receiver_user_id,relation FROM friends_table WHERE sender_user_id='$userId' OR receiver_user_id='$userId'";
				$result=mysqli_query($conn,$sql);
				
				$friends=false;//variable to check if a user has atleast one friend or not
				?>				
				<input type="text" class="friend-prompt form-control" id="friends_name_form" placeholder="Friend's name" style="width:180px;margin-top:0px;margin-left:4px">
				<div class="friend-list checkbox setPosition">
					<div id="groupspage_friends_names_autocomplete_suggestions">		
					<?php
					$counter=0;
					while($row=mysqli_fetch_assoc($result)){
						
						$sender_user_id=mysqli_real_escape_string($conn,$row['sender_user_id']);
						$receiver_user_id=mysqli_real_escape_string($conn,$row['receiver_user_id']);
						$friend_request_id=mysqli_real_escape_string($conn,$row['id']);
						if($row['relation']==1){
							//so the two users are friends ..now checking which one of them is the current user user whose profile is being accessed and which one is his/her friend
							$friends=true;
							if($sender_user_id==$userId){
								//the current user is the sender therfore, his friend is the receiver
								$sql1="SELECT username FROM memberstable WHERE id='$receiver_user_id'";				
								$friend_id=$receiver_user_id;
							}
							else{
								//the current user is the receiver therfore, his friend is the sender
								$sql1="SELECT username FROM memberstable WHERE id='$sender_user_id'";
								$friend_id=$sender_user_id;
							}
							$result1=mysqli_query($conn,$sql1);
							$row1=mysqli_fetch_assoc($result1);

							$sql00="SELECT invitationStatus FROM group_participants_table WHERE groupId='$groupId' AND participantId='$friend_id'";
							$result00=mysqli_query($conn,$sql00);							
							$row00=mysqli_fetch_assoc($result00);
							//echo "friend=".$friend_id.",invvi=".$row00['invitationStatus']."ps=".$row00['participantStatus'];
							if(/*(isset($row00['invitationStatus']) && $row00['invitationStatus']>1) || (isset($row00['invitationStatus']) && $row00['invitationStatus']==1 && $row00['participantStatus']==3) ||*/ (!isset($row00['invitationStatus'])) || (isset($row00['invitationStatus']) && $row00['invitationStatus']!=0 && $row00['invitationStatus']!=1))
							{	
								if($counter==0)
								{
								?>
								<label class="checkbox" style="margin-top:5px;margin-left:10px;"><input type="checkbox" class="groupFriendInviteCheckbox" name="new_group_user_ids[]" value="<?php echo htmlentities($friend_id); ?>"><?php echo htmlentities($row1['username']); ?></label>
								<?php
								}
								else{
								?>
								<label class="checkbox" style="margin-top:5px;margin-left:10px;"><input type="checkbox" class="groupFriendInviteCheckbox" name="new_group_user_ids[]" value="<?php echo htmlentities($friend_id); ?>"><?php echo htmlentities($row1['username']); ?></label>
								<?php
								}
								$counter+=1;// for proper margin-top on the first friend's name		
							}	
									
						}					
					}
					?>
					</div>
				</div>
				<?php
				if($friends==false){
					echo '<p class="friends">You can\'t make a Meme Share Group if you don\'t have friends!</p> ';
				}	
				else{
					?>
					<button class="btn group_input" type="submit">Invite <span class="glyphicon glyphicon-chevron-right"></span></button>
					<?php
				}					
				?>
			</form>	
			<br>
			<br>		
			<p class="group_input" id="invitationSendingOutput"></p>
		
			<?php
		}
		?>	
	</div>

	</div>
	
	
	

	<div class="right-container-group">
		<?php
		
		if(isset($currentUserIsMember)){

			?>
			<div class="quick-view">
		      	<h3 class="quick-view-header"> <a>Quick view<span class="glyphicon glyphicon-chevron-right" style="font-size:17px;top:-1px"></span></a></h3>

		      	<?php
				$sql100="SELECT imageId FROM meme_sharing_visibility_table WHERE groupId='$groupId' ORDER BY id DESC ";
				$result100=mysqli_query($conn,$sql100);
				while($row100=mysqli_fetch_assoc($result100)){
					$imageId=mysqli_real_escape_string($conn,$row100['imageId']);
					//MEME UPLOAD DATA ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

					$sql= "SELECT memeDestination,likes FROM memestable WHERE id='$imageId'";
					$result=mysqli_query($conn,$sql);
					//printing all the memes one by one
					
					while($row=mysqli_fetch_assoc($result)){

						$quickview_array[]=$row;
					}
				}

				if(isset($quickview_array)){
					$arraysize=count($quickview_array);
				}else{
					$arraysize=0;
				}
				
				if($arraysize!=0)
				{
					usort($quickview_array, function ($a, $b) {
					    if($b['likes']<$a['likes']){
					    	return -1;
					    }else if($b['likes']>$a['likes']){
					    	return 1;
					    }else{
					    	return 0;
					    }
					});
				}
				//print_r($quickview_array);
				
				if($arraysize!=0)
				{

					$counter=1;
					
					foreach($quickview_array as $qa){

						if($counter<=8){
							echo '<img class="quickview-img" id="'.$counter.'" src="'.$qa['memeDestination'].'">';
							$counter+=1;
						}else{
							break;
						}									

					}
					$counter=1;
					?>
					<div class="cover-quick-view" id="cover-quick-view" style="display:none">
						<div class="quick-viewer" style="display:none">
							<h3 class="quick-viewer-header">Quick View</h3>
							<?php
							foreach($quickview_array as $qa){
								
								if($counter<=8){
									?>
									<div class="qv_image" id="qv_image<?php echo $counter; ?>" style="display:none">
										<?php

										if($counter>1)
									    {
									    	?>
									    	<button class="prev-img" id="prev-img<?php echo $counter; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
									    	<?php
									    }
									    ?>
									    <img src="<?php echo $qa['memeDestination']; ?>" id="quick-viewer-img<?php echo $counter; ?>" class="quick-viewer-img">
									    <?php
									    if($counter<8)
									    {
									    	?>
									    	<button class="next-img" id="next-img<?php echo $counter; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
									    	<?php
									    }	
									    ?>
									</div>
									<?php				    
									$counter+=1;
								}else{
									break;
								}	
							}	
							?>
						</div>
					</div>
				
			      	<!--<img class="quickview-img" src="https://fm.cnbc.com/applications/cnbc.com/resources/img/editorial/2014/07/25/101867402-mark-cuban.1910x1000.jpg">-->
			    <?php 
			    }
			    else{
					echo '<p class="error-message">No memes to display.</p>';
				} 
				?>	
		    </div>
		    
		    <div class="group-memes">
		
	    	<?php
			$sql100="SELECT imageId FROM meme_sharing_visibility_table WHERE groupId='$groupId' ORDER BY id DESC ";
			$result100=mysqli_query($conn,$sql100);
			while($row100=mysqli_fetch_assoc($result100)){
				$imageId=mysqli_real_escape_string($conn,$row100['imageId']);
				//echo $imageId;
				$sql= "SELECT * FROM memestable WHERE id='$imageId'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$all_memes[]=$row;
				//printing all the memes one by one
			}

			if(isset($all_memes))
			{

			foreach($all_memes as $row){	
				//while($row=mysqli_fetch_assoc($result)){

					$imagelocation=$row['memeDestination'];
					$memetitle=$row['memetitle'];
					$uploader=$row['uploader'];
					//obtaining user id and number of subscribers
					$uploaderId=$row['uploaderId'];
					$sql1= "SELECT * FROM memberstable WHERE id='$uploaderId'";
					$result1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($result1);
					$numberofSubscribers=$row1['numberofSubscribers'];
					//subscribers obtained
					$imageId=mysqli_real_escape_string($conn,$row['id']);
					$likesLabel="likes".$imageId;
					$datetime=$row['datetime'];
					$numberOfFlags=$row['flags'];
					//subscribe
					$subscribeLabel="subscribers".$uploaderId;
					$numberOfLikes=$row['likes'];//obtains the likes for this particular meme
					$subscribeToUserInnerHtml="Subscribe";
					if(isset($_SESSION['id'])){
						//echo '<script language="javascript">alert("im in 1")</script>';
						$sql6= "SELECT subscribedById FROM subscriberstable WHERE uploaderId='$uploaderId'";
						$result6=mysqli_query($conn,$sql6);
						while($row6=mysqli_fetch_assoc($result6)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
							if($row6['subscribedById']==$_SESSION['id']){
								//echo '<script language="javascript">alert("im in 2")</script>';
								$subscribeToUserInnerHtml="Unsubscribe";
							}
						}
					}
					
					//$numberOfComments=$row['numberOfComments'];
					$sql100="SELECT numberOfComments FROM meme_sharing_visibility_table WHERE imageId='$imageId' AND userId=0 AND groupId='$groupId'";
					$result100=mysqli_query($conn,$sql100);
					$row100=mysqli_fetch_assoc($result100);
					$numberOfComments=$row100['numberOfComments'];
					$numberOfCommentsLabel="comments".$imageId;


					$likesinnerhtml="Like";
					if(isset($_SESSION['id'])){
						$sql2= "SELECT likedByuserId FROM likestable WHERE imageId='$imageId'";
						$result2=mysqli_query($conn,$sql2);
						while($row2=mysqli_fetch_assoc($result2)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
							if($row2['likedByuserId']==$_SESSION['id']){
								$likesinnerhtml="Undo Like";
							}
						}
					}
					$likeErrorLabel="Error".$imageId;
					$likeButtonId="like".$imageId;
					//subscribers for the meme category
					$memecategory=$row['memeCategory'];//gets the meme category
					$sql4="SELECT totalSubscribers FROM memecategoriestable WHERE memeCategory='$memecategory'";
					$result4=mysqli_query($conn,$sql4);
					while($row4=mysqli_fetch_assoc($result4)){
						$memeCategorySubscribers=$row4['totalSubscribers'];//stores the total number of subscribers for this meme category
					}
					$memeCategorySubscribersLabel="categorySubscribe".$memecategory;
					
					$subscribeToMemeCategoryInnerHtml="Subscribe";
					if($memecategory=="Savage"){
						$tableName="savagememessubscriberstable";
						$category_link="savagememes.php";
					}else if($memecategory=="Sports"){
						$tableName="sportsmemessubscriberstable";
						$category_link="sportsmemes.php";
					}else if($memecategory=="Gaming"){
						$tableName="gamingmemessubscriberstable";
						$category_link="gamingmemes.php";
					}else if($memecategory=="Comics"){
						$tableName="comicmemessubscriberstable";
						$category_link="comicmemes.php";
					}else if($memecategory=="Celeb"){
						$tableName="celebmemessubscriberstable";
						$category_link="celebmemes.php";
					}else if($memecategory=="College / School"){
						$tableName="collegememessubscriberstable";
						$category_link="college_school_memes.php";
					}else if($memecategory=="Politics"){
						$tableName="politicsmemessubscriberstable";
						$category_link="politics_memes.php";
					}else if($memecategory=="Just My Thoughts"){
						$tableName="justmythoughtsmemessubscriberstable";
						$category_link="justmythoughts.php";
					}else if($memecategory=="Other"){
						$tableName="othermemessubscriberstable";
						$category_link="othermemes.php";
					}
					if(isset($_SESSION['id'])){
						$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
						//echo '<script language="javascript">alert("im in 1")</script>';
						$sql6= "SELECT subscribedByUserId FROM $tableName WHERE subscribedByUserId='$userId'";
						$result6=mysqli_query($conn,$sql6);
						if($row6=mysqli_fetch_assoc($result6)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
							//echo '<script language="javascript">alert("im in 2")</script>';
							$subscribeToMemeCategoryInnerHtml="Unsubscribe";
						
						}
					}
					//echo $subscribeToMemeCategoryInnerHtml;
					/*echo '<a href="imagedisplay.php?id='.htmlentities($imageId).'&world=0&uid=0&gid='.htmlentities($groupId).'"><h1>'.htmlentities($memetitle).'</h1></a>
						 <a href="imagedisplay.php?id='.htmlentities($imageId).'&world=0&uid=0&gid='.htmlentities($groupId).'"><img src="'.htmlentities($imagelocation).'" style="width:200px;height:200px;"></a>
						 <h2>Uploaded by:<a href="userprofile.php?id='.htmlentities($uploaderId).'">'.htmlentities($uploader).'</a></h2>
						 
						 <button type="submit" onclick="subscribeFunction(\''.htmlentities($imageId).'\',\''.htmlentities($uploaderId).'\',\''.htmlentities($subscribeLabel).'\',\''.htmlentities($uploader).'\');" name="subscribe'.htmlentities($uploaderId).'">'.htmlentities($subscribeToUserInnerHtml).' to '.htmlentities($uploader).'</button>
			 			 <p id="'.htmlentities($subscribeLabel).'" name="'.htmlentities($subscribeLabel).'">Number of Subscribers:'.htmlentities($numberofSubscribers).'</p>
						 
						 <button type="submit" class="likeimagebutton" onclick="imagelikeFunction(\''.htmlentities($imageId).'\',\''.htmlentities($likesLabel).'\',\''.htmlentities($likeErrorLabel).'\',\''.htmlentities($likeButtonId).'\');" id="like'.htmlentities($imageId).'" name="like'.htmlentities($imageId).'">'.htmlentities($likesinnerhtml).'</button>
						 <p name="'.htmlentities($likesLabel).'">Likes:'.htmlentities($numberOfLikes).'</p>
						 <p>Meme Category: '.htmlentities($memecategory).'</p>
						 <p id="'.htmlentities($memeCategorySubscribersLabel).'" name="'.htmlentities($memeCategorySubscribersLabel).'">Number of Subscribers for '.htmlentities($memecategory).' memes category:'.htmlentities($memeCategorySubscribers).'</p>
						 <button type="submit" onclick="memeCategorySubscribeFunction(\''.htmlentities($imageId).'\',\''.htmlentities($memecategory).'\',\''.htmlentities($memeCategorySubscribersLabel).'\');" name="subscribecategory'.htmlentities($memecategory).'">'.htmlentities($subscribeToMemeCategoryInnerHtml).' to '.htmlentities($memecategory).'</button>
					 					 					 				 
						 <p id="'.htmlentities($numberOfCommentsLabel).'">Number of Comments:'.htmlentities($numberOfComments).'</p>
						 <p class="datetime">'.getTime($datetime).'</p>
						 
						 <p name="Error'.htmlentities($imageId).'"></p>
						 <hr>
						 <br>
						 ';*/

					//flag button
					$displayFlagButton=false;
					$flaggedByCurrentUser=false;
					//echo "ITHE";
					if(isset($_SESSION['id'])){
						if($_SESSION['id']!=$uploaderId){//the user who uploads the image himself can't flag it - -' XD
							$userId=$_SESSION['id'];

							$sql7="SELECT flaggerUserId FROM image_flags_table WHERE imageId='$imageId' AND flaggerUserId='$userId'";
							$result7=mysqli_query($conn,$sql7);
							
							if($row7=mysqli_fetch_assoc($result7)){				
								//echo "FLAG KELAY";
								$flaggedByCurrentUser=true;
							}
							else{
								//if this user has not flagged this image already
								//echo "FLAG NAHI KELAY!!";
								$displayFlagButton=true;
								$flagButtonId="flagbutton".$imageId;
							}
							
						}
					}

					if($numberOfFlags<3)
					{	
						echo '<div class="meme centering meme-box'.$imageId.'"  id="meme-box'.$imageId.'">
							 	<a href="imagedisplay.php?id='.$imageId.'&world=0&uid=0&gid='.$groupId.'" target="_blank"><h1 class="title">'.$memetitle.'</h1></a>';
						/*if($load_more_type=="recommended")
						{
						echo 	'<h1 class="origin" style="color:#9A12B3">'.$originLabel.'</h1>';
						}*/
						echo    '<a href="imagedisplay.php?id='.$imageId.'&world=0&uid=0&gid='.$groupId.'" target="_blank"><img class="image" src="'.$imagelocation.'"></a>
							 	<h1 class="points" name="'.$likesLabel.'">'.$numberOfLikes.' likes</h1>
							 	<h1 class="comments" id="'.$numberOfCommentsLabel.'">'.$numberOfComments.' Comments</h1>
							 	<div class="category_1">
							 	<h1  align="right" style="font-size:17px;" class="category">Category: <a href="'.$category_link.'" style="color:#9A12B3">'.$memecategory.'</a>
							 		
							 	</h1></div>
							 	';


						if($displayFlagButton==true){
							//echo "in";
							echo '<input type="image" class="flagimagebutton flag" name="'.$imageId.'" id="imageFlagButton'.$imageId.'" style="display:inline" alt="Downvote"></input>';
							echo '<p id="flagimage'.$imageId.'"></p>';
							
						}else{
							if($flaggedByCurrentUser==true){
								echo '<p>You have flagged this image!</p>';
							}
							else{
								echo '<p></p>';//this is for CSS debugging..if this is not done tthen everything collapses in the meme box
							}
							
						}

							 //echo '<a href="#"><img src="https://image.freepik.com/iconos-gratis/comentario-de-chat-discurso-burbuja-oval-con-lineas-de-texto_318-70514.jpg" class="comment"></a>';

							 echo '<a href="imagedisplay.php?id='.htmlentities($imageId).'&world=0&uid=0&gid='.$groupId.'#Error'.htmlentities($imageId).'" target="_blank"><img src="https://image.freepik.com/iconos-gratis/comentario-de-chat-discurso-burbuja-oval-con-lineas-de-texto_318-70514.jpg" class="comment"></a>';

							 //this is for proper styling of the subscribe button
							 if($subscribeToUserInnerHtml=="Subscribe")
							 {
								if($numberofSubscribers>=100)
				                {
				                    echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:72px">'.$numberofSubscribers.'</p>';
				                	echo '<button type="submit" style="letter-spacing:2px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
				                }
				                else if($numberofSubscribers<100&&$numberofSubscribers>10)
				                {
				                    echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:52px">'.$numberofSubscribers.'</p>';
				                    echo '<button type="submit" style="letter-spacing:2px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
				                }
				                else if($numberofSubscribers<=10)
				                {
				                    echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:32px">'.$numberofSubscribers.'</p>';
				                    echo '<button type="submit" style="letter-spacing:2px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
				                }
				             }else if($subscribeToUserInnerHtml=="Unsubscribe"){		             	
				             	if($numberofSubscribers>=100)
				                {
				                    echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:72px">'.$numberofSubscribers.'</p>';
				                    echo '<button type="submit" style="letter-spacing:-0.7px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
				                }
				                else if($numberofSubscribers<100&&$numberofSubscribers>10)
				                {
				                    echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:52px">'.$numberofSubscribers.'</p>';
				                    echo '<button type="submit" style="letter-spacing:-0.7px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
				                }
				                else if($numberofSubscribers<=10)
				                {
				                    echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:32px;">'.$numberofSubscribers.'</p>';
				                    echo '<button type="submit" style="letter-spacing:-0.7px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
				                }
				             }

							 //echo $subscribeToUserInnerHtml;
							 //echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'">'.$numberofSubscribers.'</p>';

							 //echo '<button type="submit" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';		 	 
							 	
				 			 						 
							//echo' 	<button type="submit" class="likeimagebutton upvote" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'" style="background:url(https://image.freepik.com/free-icon/like-hand-symb6l-for-social-media-interface_318-30403.jpg)">'.$likesinnerhtml.'</button>';
							if($likesinnerhtml=="Like"){
								echo' 	<input type="image" class="likeimagebutton upvote like-button'.$imageId.'" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'" src="icons/undo_like_icon.jpg"></input>';
								//https://image.freepik.com/free-icon/like-hand-symb6l-for-social-media-interface_318-30403.jpg--like button url
							}else{
								echo' 	<input type="image" class="likeimagebutton upvote like-button'.$imageId.'" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'" src="icons/like_icon.jpg"></input>';
								//http://www.vox.com.my/vox/resources/user_1/512.png---like icon url
							}
							 	

							echo '<div class="posted-by"><h1 align="right" style="font-size:17px">posted by:<a href="userprofile.php?id='.$uploaderId.'" style="color:#9A12B3;">'.$uploader.'</a></h1></div>
							 	
							 	';

							/*echo '<p id="'.$memeCategorySubscribersLabel.'" name="'.$memeCategorySubscribersLabel.'">Number of Subscribers for '.$memecategory.' memes category:'.$memeCategorySubscribers.'</p>
							<button type="submit" onclick="memeCategorySubscribeFunction(\''.$imageId.'\',\''.$memecategory.'\',\''.$memeCategorySubscribersLabel.'\');" name="subscribecategory'.$memecategory.'">'.$subscribeToMemeCategoryInnerHtml.' to '.$memecategory.'</button>';*/

						 					 					 				 
							/*echo '
							 	<p class="datetime">'.getTime($datetime).'</p>

							 	

							 	<p name="Error'.$imageId.'"></p>

							 
							 
							 ';*/

						//echo "display=".$displayFlagButton;
						
						echo '</div>';
						echo '<p name="Error'.$imageId.'" class="error-message"></p>';
						?>

						<div class="flag-message flag-message<?php echo $imageId; ?>" id="flag-message<?php echo $imageId; ?>" style="display:none">
							<p id="flag-p">Downvoting helps Meagl remove low quality or pornographic content. You could tell us more about why you downvoted this meme:</p>
							<form class="flag-form" name="<?php echo $imageId; ?>" method="POST" action="">
								<input type="hidden" name="imageId" value="<?php echo $imageId; ?>">
		  						<input type="radio" name="downvote" value="low-quality" checked> Low Quality Content<br>
								<input type="radio" name="downvote" value="pornographic"> Pornographic<br>
								<input type="radio" name="downvote" value="racist"> Racist/abusive<br>
								<input type="radio" name="downvote" value="plagiarism"> Plagiared<br> 
								<input type="radio" name="downvote" value="other"> Other <br> 
								<button type="submit" class="btn flag-submit" name="<?php echo $imageId; ?>">Submit</button>
							</form> 
							

						</div>

						<div class="flag-message final-flag-message final-flag-message<?php echo $imageId; ?>" id="final-flag-message<?php echo $imageId; ?>" style="display:none;height:60px;font-size:20px;">
							<p id="flag-p" style="left:40px;letter-spacing:0.5px;">Thank you for reporting low quality content to Meagl.</p>
						</div>		 
					
					<?php	
					}
					//}	//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
					//echo"finiah";
			}	
			}//if(isset(allmemes)) closed
			else{
				echo '<p class="error-message">No memes to display.</p>';
			}
		}
		?>
		</div>
	</div>

	<hr>
	<div class="change-group-pic">
		<form class="updateGroupPicForm" method="post" enctype="multipart/form-data" action="">				
			<input type="hidden" name="groupId" value="<?php echo htmlentities($groupId); ?>">	
			<input type="file" id="groupPic" class="filestyle" data-buttonName="full-change-pic btn" data-icon="false" data-buttonText="Select Picture" data-input="false" name="groupPic"><br>
			<button type="submit" class="final-change btn">Update</button>
			<button class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></button>
		</form>
		<img class="full-display" id="full-display" src="<?php echo htmlentities($gpl); ?>">
		<p id="updateGroupPicError"></p>
	</div>
	<hr>
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
//echo "Time:  " . number_format(( microtime(true) - $startTime), 10) . " Seconds\n";
?>
</div>
</body>
</html>