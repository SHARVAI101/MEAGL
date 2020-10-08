<?php
session_start();

include 'dbh.php';
include_once 'functions.php';

if(isset($_SESSION['id'])){//if user has logged in	
	if(isset($_POST['reply']) && isset($_POST['datetime']) && isset($_POST['commentId']))
	{
		//if user has submitted the comment
		$reply=mysqli_real_escape_string($conn,$_POST['reply']);
		$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);
		$commentId=mysqli_real_escape_string($conn,$_POST['commentId']);
		$username=mysqli_real_escape_string($conn,$_SESSION['username']);
		$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

		$sql="INSERT INTO repliestable (replyToCommentId, replyByUserId, replyByUserName, likes, reply, datetime) VALUES ('$commentId', '$userId', '$username', 0, '$reply', '$datetime')";
		$result=mysqli_query($conn,$sql);
		$replyId = mysqli_insert_id($conn);//gets the id of the last insertion into the repliestable

		$sql1= "SELECT comment,commentByUserId,commentForMemeId,numberOfReplies,sharedWithWorld,sharedWithUserId,sharedWithGroupId FROM commentstable WHERE id='$commentId'";
		$result1=mysqli_query($conn,$sql1);
		$row=mysqli_fetch_assoc($result1);
		$commentReplies=$row['numberOfReplies']+1;
		$imageId=$row['commentForMemeId'];
		$comment=$row['comment'];
		$world=$row['sharedWithWorld'];
		$sharedWithUserId=$row['sharedWithUserId'];
		$sharedWithGroupId=$row['sharedWithGroupId'];
		$uid=$row['commentByUserId'];

		$sql2="UPDATE commentstable SET numberOfReplies='$commentReplies' WHERE id='$commentId'";//updating database 
		$result2=mysqli_query($conn,$sql2);

		//echo '<hr style="border-top: dotted 5px;">';

		$replydivname="reply_div".$replyId;

		//updating notification
		$sql02="SELECT uploaderId,memetitle FROM memestable WHERE id='$imageId'";//getting image title
		$result02=mysqli_query($conn,$sql02);
		$row02=mysqli_fetch_assoc($result02);
		$memetitle=$row02['memetitle'];		

		if($uid!=$_SESSION['id']){
			//if the user is commenting on his own meme, then no notification
			date_default_timezone_set('Asia/Kolkata');//setting the timezone
			$datetime=date('Y-m-d H:i:s');			

			$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
			$result01=mysqli_query($conn,$sql01);
			$row01=mysqli_fetch_assoc($result01);
			$senderUsername=$row01['username'];

			$commentForNotification=(strlen($comment) > 13) ? substr($comment,0,10).'...' : $comment;
			$commentDivName="commentdiv".$commentId;

			if($world==1){
				$notificationString=htmlentities($senderUsername).' replied on your comment "<i>'.$commentForNotification.'</i>" (in the World)';
			}
			else if($sharedWithGroupId!=0){
				$sql="SELECT groupname FROM groups_table WHERE id='$sharedWithGroupId'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$groupname=$row['groupname'];

				$notificationString=htmlentities($senderUsername).' replied on your comment "<i>'.htmlentities($commentForNotification).'</i>" (in the group "<i>'.htmlentities($groupname).'</i>" in my Meagles)';
			}
			else{
				$notificationString=htmlentities($senderUsername).' replied on your comment "<i>'.htmlentities($commentForNotification).'</i>" (in my Meagles)';
			}
			$notificationLink='imagedisplay.php?id='.htmlentities($imageId).'&world='.htmlentities($world).'&uid='.htmlentities($sharedWithUserId).'&gid='.htmlentities($sharedWithGroupId).'#'.htmlentities($replydivname);
			$notificationType="commentReply";

			$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$userId','$uid','$notificationType','$notificationString','$notificationLink',0,'$datetime','$commentId')";
			$result4=mysqli_query($conn,$sql4);
		}

		/*echo '<div class="reply_div" id="'.htmlentities($replydivname).'" style="margin-left: 50px;"> 
			  	<pre class="reply" id="reply'.htmlentities($replyId).'" contenteditable="false">'.htmlentities($reply).'</pre>
			  	<p class="replyUsername">Posted By:'.htmlentities($username).'</p>
			  	<p class="replyDatetime">'.getTime($datetime).'</p>htmlentities(
			  	<p class="replyLikes">Likes: 0</p>

			  	<button type="submit" class="deletereplybutton" id="'.htmlentities($commentId).'" name="'.htmlentities($replyId).'">Delete reply</button>
		      	<button type="submit" class="editreplybutton" name="'.htmlentities($replyId).'">Edit reply</button>
		      	<button type="submit" class="updatereplybutton"  name="'.htmlentities($replyId).'" style="display:none">Update reply</button>
		      </div>	
			  ';*/
		$sql5="SELECT profilePictureLocation FROM memberstable WHERE id='$userId'";
		$result5=mysqli_query($conn,$sql5);
		$row5=mysqli_fetch_assoc($result5);
		$replyPPL=$row5['profilePictureLocation'];

		$replylikesLabel="replylikes".$replyId;

		
		/*
		echo '
			<div class="reply_div reply-comment" id="'.htmlentities($replydivname).'">
				<a href="userprofile.php?id='.$userId.'">
				<div class="reply-comment-top">
					<img src="'.$replyPPL.'" class="notif-dp" id="comment-dp">
				</div>
				</a> 
				<p class="reply-real-comment">
					<span class="replyUsername"><a href="userprofile.php?id='.$userId.'"><span id="dedicated-username">'.htmlentities($username).'</span></a></span>
					<span class="reply" id="reply'.htmlentities($replyId).'" contenteditable="false">'.htmlentities($reply).'</span>
					<br>
					<a type="submit" class="likereplybutton reply-like-link" onclick="replylikeFunction(\''.htmlentities($replyId).'\',\''.htmlentities($replylikesLabel).'\');" id="replylike'.htmlentities($replyId).'"  name="'.htmlentities($replyId).'">Like</a>
					<span id="replyLikeError'.htmlentities($replyId).'"></span>
							                    
					<span class="replyLikes comment-reply-info" id="replylikes'.htmlentities($replyId).'">Likes: 0</span>
					<span class="replyDatetime">'.getTime($datetime).'</span>
				</p>
				';
				
		echo '<button type="submit" class="deletereplybutton" id="'.htmlentities($commentId).'" name="'.htmlentities($replyId).'">Delete reply</button>';
		echo '<button type="submit" class="editreplybutton" name="'.htmlentities($replyId).'">Edit reply</button>';//makes the reply editable	
		echo '<button type="submit" class="updatereplybutton"  name="'.htmlentities($replyId).'" style="display:none">Update reply</button>';//updates the database with the changes to the reply
				
		echo '</div>';	
		*/

		echo '
			<div class="reply_div reply-comment" id="'.htmlentities($replydivname).'">
				<a href="userprofile.php?id='.$userId.'">
					<div class="reply-comment-top">
						<img src="'.$replyPPL.'" class="notif-dp" id="comment-dp">
					</div>
				</a> 
				<p class="reply-real-comment">
					<span class="replyUsername"><a href="userprofile.php?id='.$userId.'"><span id="dedicated-username">'.htmlentities($username).'</span></a></span>
					<span class="reply" id="reply'.htmlentities($replyId).'" contenteditable="false">'.htmlentities($reply).'</span>
					<br>
					<a type="submit" class="likereplybutton reply-like-link" onclick="replylikeFunction(\''.htmlentities($replyId).'\',\''.htmlentities($replylikesLabel).'\');" id="replylike'.htmlentities($replyId).'"  name="'.htmlentities($replyId).'">Like</a>
					<span id="replyLikeError'.htmlentities($replyId).'"></span>
							                    
					<span class="replyLikes comment-reply-info" id="replylikes'.htmlentities($replyId).'">Likes: 0</span>
					<span class="replyDatetime">'.getTime($datetime).'</span>
				</p>
				';

			echo '<div><a class="display-edit"><span class="glyphicon glyphicon-chevron-down"></span></a></div>';
			echo '<div class="edit-panel"><button type="submit" class="deletereplybutton" id="'.htmlentities($commentId).'" name="'.htmlentities($replyId).'">Delete</button><br>';
			echo '<button type="submit" class="editreplybutton" name="'.htmlentities($replyId).'">Edit</button>';//makes the reply editable	
			echo '<button type="submit" class="updatereplybutton"  name="'.htmlentities($replyId).'" style="display:none">Update</button>';//updates the database with the changes to the reply
			echo '</div>';
										  	
		echo '</div>';	
		exit;
	}
	
}
else{	
	echo "not logged in";
	//header("LOCATION: signup.php?lastpage=imagedisplay.php?id=".$imageId);//?lastpage=imagedisplay.php?id="+$imageId);//here we need to develop redirecting back to original page from where the user was sent to the signup page
}
?>
