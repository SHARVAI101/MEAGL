<?php

session_start();

include 'dbh.php';

if(isset($_SESSION['id'])){
	//this code segment will be executed if the user has logged in
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
	$username=mysqli_real_escape_string($conn,$_SESSION['username']);
	$likes=mysqli_real_escape_string($conn,$_POST['numberOfLikes']);//incrementing number of likes
	$id=mysqli_real_escape_string($conn,$_POST['id']);//the answer reply id
	$flag=true;//flag to see if user has already liked a reply
	$flag1=true;//flag to see if the user is liking his own reply

	//checking if the person who has posted the reply himself is trying to like it
	$sql3= "SELECT replyByUserId FROM answerrepliestable WHERE id='$id'";
	$result3=mysqli_query($conn,$sql3);
	$row3=mysqli_fetch_assoc($result3);
	if($row3['replyByUserId']==$userId){//searching for userId instead of user name is very efficient(comparing integers is actually super fast compared to searching strings)
		//if user is trying to like his own reply
		//$flag1=false;
		echo 'user reply';//it is the user's own reply that he is trying to like
	}
	else{
		//it is not his own reply
		$uid=$row3['replyByUserId'];//jyachya reply la like kela zatay tyacha id uid ahe
		//now checking if the user is liking a reply that he already has liked before
		
		$sql1= "SELECT likedByUserId FROM answerreplylikestable WHERE likedByuserId='$userId' AND replyId='$id'";
		$result1=mysqli_query($conn,$sql1);
		if($row=mysqli_fetch_assoc($result1)){	
			//this means if the user has already liked the comment
			$likes=$likes-1;

			$sql="UPDATE answerrepliestable SET likes='$likes' WHERE id='$id'";//updating database 
			$result=mysqli_query($conn,$sql);

			//deleting meme liking info into likestable			
			$sql2="DELETE FROM answerreplylikestable WHERE replyId='$id'";
			$result2=mysqli_query($conn,$sql2);

			//decreasing 0.5 point of the replier on account of the undo-like
			$sql3="UPDATE memberstable SET points=points-0.5 WHERE id='$uid'";
			$result3=mysqli_query($conn,$sql3);

			//removing notification from uploader's feed
			$sql4="DELETE FROM notifications_table WHERE receiverId='$uid' AND senderId='$userId' AND notificationType='answerReplyLike' AND notificationForEventId='$id'";
			$result4=mysqli_query($conn,$sql4);

			//echo 'undo like';
			echo htmlentities($likes);
		}
		else{
			//user has not already liked the reply

			//here, is the reply liking actual code
			$likes=$likes+1;
			$sql="UPDATE answerrepliestable SET likes='$likes' WHERE id='$id'";//updating database 
			$result=mysqli_query($conn,$sql);

			//inserting reply liking info into replylikestable			
			$sql2="INSERT INTO answerreplylikestable (replyId, likedByUserId) VALUES ('$id','$userId')";
			$result2=mysqli_query($conn,$sql2);

			//increasing 0.5 point of the replier on account of the undo-like
			$sql3="UPDATE memberstable SET points=points+0.5 WHERE id='$uid'";
			$result3=mysqli_query($conn,$sql3);

			//updating notification
			date_default_timezone_set('Asia/Kolkata');//setting the timezone
			$datetime=date('Y-m-d H:i:s');			

			$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
			$result01=mysqli_query($conn,$sql01);
			$row01=mysqli_fetch_assoc($result01);
			$senderUsername=$row01['username'];

			$sql02="SELECT reply,replyToAnswerId FROM answerrepliestable WHERE id='$id'";
			$result02=mysqli_query($conn,$sql02);
			$row02=mysqli_fetch_assoc($result02);
			$reply=$row02['reply'];
			$answerId=$row02['replyToAnswerId'];

			$sql03="SELECT answerForQuestionId FROM answerstable WHERE id='$answerId'";
			$result03=mysqli_query($conn,$sql03);
			$row03=mysqli_fetch_assoc($result03);
			$questionId=$row03['answerForQuestionId'];

			$replyForNotification=(strlen($reply) > 13) ? substr($reply,0,10).'...' : $reply;
			$replydivname="answerreply_div".$id;

			$notificationString=$senderUsername.' liked your reply "'.$replyForNotification.'"';
			$notificationType="answerReplyLike";
			$notificationLink='questiondisplay.php?id='.$questionId.'#'.$replydivname;

			$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$userId','$uid','$notificationType','$notificationString','$notificationLink',0,'$datetime','$id')";
			$result4=mysqli_query($conn,$sql4);

			echo htmlentities($likes);//sending back info to questiondisplay.php
		}
	}
		
}
else{
	echo 'login error';
}

