<?php
session_start();
//<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 	
//<script type="text/javascript" src="general.js"></script> 
?> 

<?php

include 'dbh.php';
include 'functions.php';

if(isset($_SESSION['id'])){//if user has logged in
	if(isset($_POST['comment']) && isset($_POST['datetime']) && isset($_POST['imageId']) && isset($_POST['numberOfComments']) && isset($_POST['world']) && isset($_POST['sharedWithUserId']) && isset($_POST['sharedWithGroupId']))
	{
		//if user has submitted the comment
		$comment=mysqli_real_escape_string($conn,$_POST['comment']);
		$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);
		$imageId=mysqli_real_escape_string($conn,$_POST['imageId']);
		$username=mysqli_real_escape_string($conn,$_SESSION['username']);
		$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

		$sql11="SELECT profilePictureLocation FROM memberstable WHERE id='$userId'";
		$result11=mysqli_query($conn,$sql11);
		$row11=mysqli_fetch_assoc($result11);
		$ppl=$row11['profilePictureLocation'];

		//getting comment visibility scope
		$world=mysqli_real_escape_string($conn,$_POST['world']);
		$sharedWithUserId=mysqli_real_escape_string($conn,$_POST['sharedWithUserId']);
		$sharedWithGroupId=mysqli_real_escape_string($conn,$_POST['sharedWithGroupId']);

		//$sql="INSERT INTO commentstable (commentForMemeId, commentByUserId, commentByUserName,sharedWithWorld, sharedWithGroupId, sharedWithUserId, likes, numberOfReplies, comment, datetime) VALUES ('$imageId', '$userId', '$username', '$world','$sharedWithGroupId','$sharedWithUserId', 0, 0, '$comment', '$datetime')";
		//$result=mysqli_query($conn,$sql);
		$sql="INSERT INTO commentstable (commentForMemeId, commentByUserId, commentByUserName,sharedWithWorld, sharedWithGroupId, sharedWithUserId, likes, numberOfReplies, comment, datetime) VALUES (?, ?, ?, ?,?,?, ?, ?, ?, ?)";
		$stmt= $conn->prepare($sql);
		$stmt-> bind_param("ddsdddddss",$IID,$UID,$UNM,$W,$SWGI,$SWUI,$UK1,$UK2,$CMT,$DTT);
		$IID=$imageId;
		$UID=$userId;
		$UNM=$username;
		$W=$world;
		$SWGI=$sharedWithGroupId;
		$SWUI=$sharedWithUserId;
		$UK1=0;
		$UK2=0;
		$CMT=$comment;
		$DTT=$datetime;
		$stmt->execute();
		$result=$stmt->get_result();

		$commentId = mysqli_insert_id($conn);//this is done to fetch the id of the comment
		
		$commentDivName="commentdiv".$commentId;

		//increment number of comments in meme_sharing_visibility_table
		//IMPORTANT-//world visibility's number of comments is put in memes table only...but for memes that are sshared in groups or with friends, the number of comments is stored in meme_sharing_visibility_table
		$numberOfComments=$_POST['numberOfComments']+1;
		if($world==0){
			$sql="UPDATE meme_sharing_visibility_table SET numberOfComments=? WHERE imageId=? AND userId=? AND groupId=?";//updating database 
			//$result=mysqli_query($conn,$sql);
			$stmt= $conn->prepare($sql);
			$stmt-> bind_param("dddd",$NOC,$IID,$SWUI,$SWGI);
			$NOC=$numberOfComments;
			$IID=$imageId;
			$SWUI=$sharedWithUserId;
			$SWGI=$sharedWithGroupId;
			$stmt->execute();
			$result=$stmt->get_result();

		}else{
			$sql="UPDATE memestable SET numberOfComments=? WHERE id=?";//world visibility's number of comments is put in memes table only...but for memes that are sshared in groups or with friends, the number of comments is stored in meme_sharing_visibility_table
			//$result=mysqli_query($conn,$sql);
			$stmt= $conn->prepare($sql);
			$stmt-> bind_param("dd",$NOC,$IID);
			$IID=$imageId;
			$NOC=$numberOfComments;
			$stmt->execute();
			$result=$stmt->get_result();
		}
		

		//setting last activity date times
		if($sharedWithGroupId!=0){
			$sql="UPDATE groups_table SET lastActivityDateTime=? WHERE id=?";//updating database 
			//$result=mysqli_query($conn,$sql);
			$stmt= $conn->prepare($sql);
			$stmt-> bind_param("sd",$DTT,$SWGI);
			$DTT=$datetime;
			$SWGI=$sharedWithGroupId;
			$stmt->execute();
			$result=$stmt->get_result();
		}
		if($sharedWithUserId!=0){
			$sql="UPDATE friends_table SET lastActivityDateTime=? WHERE ((sender_user_id=? AND receiver_user_id=?) OR (sender_user_id=? AND receiver_user_id=?))";//updating database 
			//$result=mysqli_query($conn,$sql);
			$stmt= $conn->prepare($sql);
			$stmt-> bind_param("sdddd",$DTT,$SWUI1,$UID1,$UID2,$SWUI2);
			$DTT=$datetime;
			$SWUI1=$sharedWithUserId;
			$UID1=$userId;
			$SWUI2=$sharedWithUserId;
			$UID2=$userId;
			$stmt->execute();
			$result=$stmt->get_result();
		}

		//updating notification
		$sql02="SELECT uploaderId,memetitle FROM memestable WHERE id='$imageId'";//getting image title
		$result02=mysqli_query($conn,$sql02);
		$row02=mysqli_fetch_assoc($result02);
		$memetitle=$row02['memetitle'];
		$uid=$row02['uploaderId'];

		if($uid!=$_SESSION['id']){
			//if the user is commenting on his own meme, then no notification
			date_default_timezone_set('Asia/Kolkata');//setting the timezone
			$datetime=date('Y-m-d H:i:s');			

			$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
			$result01=mysqli_query($conn,$sql01);
			$row01=mysqli_fetch_assoc($result01);
			$senderUsername=$row01['username'];

			if($world==1){
				$notificationString=$senderUsername.' commented on your meme <q>'.$memetitle.'</q> (in the World)';
			}
			else if($sharedWithGroupId!=0){
				$sql="SELECT groupname FROM groups_table WHERE id='$sharedWithGroupId'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$groupname=$row['groupname'];

				$notificationString=$senderUsername.' commented on your meme <q><i>'.$memetitle.'</i>" (in the group <q><i>'.$groupname.'</i><q> in my Meagles)';
			}
			else{
				$notificationString=$senderUsername.' commented on your meme <q><i>'.$memetitle.'</i></q> (in my Meagles)';
			}

			$notificationType="imageComment";
			$notificationLink='imagedisplay.php?id='.$imageId.'&world='.$world.'&uid='.$sharedWithUserId.'&gid='.$sharedWithGroupId.'#'.$commentDivName;

			$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES (?,?,?,?,?,?,?,?)";
			//$result4=mysqli_query($conn,$sql4);
			$stmt= $conn->prepare($sql4);
			$stmt-> bind_param("dddssdsd",$USID,$UID,$NT,$NS,$NL,$UK,$DTT,$CID);
			$USID=$userId;
			$UID=$uid;
			$NT=$notificationType;
			$NS=$notificationString;
			$NL=$notificationLink;
			$UK=0;			
			$DTT=$datetime;
			$CID=$commentId;
			$stmt->execute();
			$result4=$stmt->get_result();
		}
		/*
		//$commentlikesLabel="commentlikes".$commentId;
		?>
		<div class="comment_div comments-dedicated comments" id="commentdiv<?php echo htmlentities($commentId); ?>">
			<a href="userprofile.php?id=<?php echo $uId; ?>">
		    <div class="comment-top">
		        <img src="<?php echo $ppl; ?>" class="notif-dp" id="comment-dp">		                  
		    </div>
		    </a>
		    <p class="real-comment">							
				<span class="username"><a href="userprofile.php?id=<?php echo $uId; ?>"><span id="dedicated-username"><?php echo htmlentities($username); ?></span></a></span>
				<span class="comment" id="comment<?php echo htmlentities($commentId); ?>" contenteditable="false"><?php echo htmlentities($comment); ?></span>
				<br>
				<?php
				//shows/hides reply button on clicking
				echo '<a class="showreplyformbutton action-link reply-link" name="'.htmlentities($commentId).'">Reply</a>';

				//comment like button
				$commentlikesLabel="commentlikes".$commentId;
				
				echo '<a class="likecommentbutton action-link like-link" onclick="commentlikeFunction(\''.htmlentities($commentId).'\',\''.htmlentities($commentlikesLabel).'\');" id="commentlike'.htmlentities($commentId).'" name="'.htmlentities($commentId).'">Like</a>';	
							
				//like button finished
				?>
							
				<span class="likes comment-info" id="commentlikes<?php echo htmlentities($commentId); ?>">Likes: 0</span>
				<span class="numberOfReplies comment-info comment-replies" id="numberOfReplies<?php echo htmlentities($commentId); ?>">Replies: 0</span>
								
				<?php
				echo '<span class="datetime comment-info comment-time">'.getTime($datetime).'</span><br>';//echo is done specifically for this because otherwise, for some reason, date doesnot get displayed -_-' XD
				
				echo '<a class="repliestogglebutton replies" name="'.htmlentities($commentId).'" style="display:none">Replies <span class="glyphicon glyphicon-chevron-down"></span></a>';
				
				
				echo '<button type="submit" class="deletecommentbutton" name="'.htmlentities($commentId).'">Delete comment</button>';	
				echo '<button type="submit" class="editcommentbutton" name="'.htmlentities($commentId).'">Edit comment</button>';//makes the comment editable	
				echo '<button type="submit" class="updatecommentbutton"  name="'.htmlentities($commentId).'" style="display:none">Update comment</button>';//updates the database with the changes to the comment
								
				
				echo '<p id="commentLikeError'.htmlentities($commentId).'"></p>';
				echo '<form method="post" class="replyform" id="replyform'.htmlentities($commentId).'" action="" onsubmit="return postreply();"  style="display:none">
						<input type="hidden" id="commentId'.htmlentities($commentId).'" value="'.htmlentities($commentId).'">
				 		<input type="hidden" id="datetime'.htmlentities($commentId).'" value="'.date('Y-m-d H:i:s').'">
						<textarea class="reply-action form-control text-reply" rows="2" id="replytext'.htmlentities($commentId).'" placeholder="Write reply"></textarea><br>
						<button type="submit" name="'.htmlentities($commentId).'"  class="postreplybutton btn reply-action post-reply">post reply</button>
					  </form>';				
			
							
				?>
				</p>
				<?php
				echo '<div id="allreplies'.htmlentities($commentId).'" class="allreplies" style="display:none">';
		echo '</div>';

		*/
		?>
		<div class="comment_div comments-dedicated comments" id="commentdiv<?php echo htmlentities($commentId); ?>">
			<a href="userprofile.php?id=<?php echo $userId; ?>">
			    <div class="comment-top">
			        <img src="<?php echo $ppl; ?>" class="notif-dp" id="comment-dp">		                  
			    </div>
			</a>
			<p class="real-comment">							
				<span class="username"><a href="userprofile.php?id=<?php echo $userId; ?>"><span id="dedicated-username"><?php echo htmlentities($username); ?></span></a></span>
				<span class="comment" id="comment<?php echo htmlentities($commentId); ?>" contenteditable="false"><?php echo htmlentities(nl2br($comment)); ?></span>
				<br>
				<?php
				//shows/hides reply button on clicking
				echo '<a class="showreplyformbutton action-link reply-link" name="'.htmlentities($commentId).'">Reply</a>';

				//comment like button
				$commentlikesLabel="commentlikes".$commentId;
				
				echo '<a class="likecommentbutton action-link like-link" onclick="commentlikeFunction(\''.htmlentities($commentId).'\',\''.htmlentities($commentlikesLabel).'\');" id="commentlike'.htmlentities($commentId).'" name="'.htmlentities($commentId).'">Like</a>';	
								
				//like button finished
				?>
								
				<span class="likes comment-info" id="commentlikes<?php echo htmlentities($commentId); ?>">Likes: 0</span>
				<span class="numberOfReplies comment-info comment-replies" id="numberOfReplies<?php echo htmlentities($commentId); ?>">Replies: 0</span>
									
				<?php
				echo '<span class="datetime comment-info comment-time">'.getTime($datetime).'</span><br>';//echo is done specifically for this because otherwise, for some reason, date doesnot get displayed -_-' XD
								
				
				//if the comment has been by the user then it will show the delete option
				echo '<div><a class="display-edit"><span class="glyphicon glyphicon-chevron-down"></span></a></div>';
				echo '<div class="edit-panel"><button type="submit" class="deletecommentbutton" name="'.htmlentities($commentId).'">Delete</button><br>';	
				echo '<button type="submit" class="editcommentbutton" name="'.htmlentities($commentId).'">Edit</button>';//makes the comment editable	
				echo '<button type="submit" class="updatecommentbutton"  name="'.htmlentities($commentId).'" style="display:none">Update</button>';//updates the database with the changes to the comment
				echo '</div>';
				
				echo '<p id="commentLikeError'.htmlentities($commentId).'"></p>';
				echo '<form method="post" class="replyform" id="replyform'.htmlentities($commentId).'" action="" onsubmit="return postreply();"  style="display:none">
						<input type="hidden" id="commentId'.htmlentities($commentId).'" value="'.htmlentities($commentId).'">
					 	<input type="hidden" id="datetime'.htmlentities($commentId).'" value="'.date('Y-m-d H:i:s').'">
					 	<textarea class="reply-action form-control text-reply" rows="1" id="replytext'.htmlentities($commentId).'" placeholder="Write reply"></textarea><br>
					 	<button type="submit" name="'.htmlentities($commentId).'"  class="postreplybutton btn reply-action post-reply">Post</button>
					  </form>';				
				
				echo '<a class="repliestogglebutton replies" name="'.htmlentities($commentId).'" style="display:none">Replies <span class="glyphicon glyphicon-chevron-down"></span></a>';
				
								
			?>
			</p>
			<?php
			echo '<div id="allreplies'.htmlentities($commentId).'" class="allreplies" style="display:none"></div>';//we add the comment id of the comment to the end of "allreplies" ..this makes a unique name for every div containing all the replies to a particular meme...the above thing is done so that when we press the "show all replies" button, only the replies for that particular comment shall be shown
		echo '</div>';
		exit;
	}
	
}
else{	
	echo 'not logged in';//here we need to develop redirecting back to original page from where the user was sent to the signup page
}
?>
