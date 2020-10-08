<?php

session_start();

include 'dbh.php';

if(isset($_SESSION['id'])){
	//this code segment will be executed if the user has logged in
	$userId=$_SESSION['id'];
	$username=$_SESSION['username'];
	$likes=mysqli_real_escape_string($conn,$_POST['numberOfLikes']);//incrementing number of likes
	$id=mysqli_real_escape_string($conn,$_POST['id']);//the comment id
	$flag=true;//flag to see if user has already liked a comment
	$flag1=true;//flag to see if the user is liking his own comment

	//checking if the person who has uploaded the comment himself is trying to like it
	$sql3= "SELECT * FROM commentstable WHERE id='$id'";
	$result3=mysqli_query($conn,$sql3);
	$row3=mysqli_fetch_assoc($result3);
	if($row3['commentByUserId']==$userId){//searching for userId instead of user name is very efficient(comparing integers is actually super fast compared to searching strings)
		//if user is trying to like his own comment
		$flag1=false;
		echo 'user comment';//it is the user's own comment that he is trying to like
	}
	else{
		//it is not his own comment
		$uid=$row3['commentByUserId'];
		//now checking if the user is liking a comment that he already has liked before
		/*$sql1= "SELECT * FROM commentlikestable WHERE likedByUserId='$id'";
		$result1=mysqli_query($conn,$sql1);
		while($row=mysqli_fetch_assoc($result1)){
			if($row['']==$userId){
				//if user has already liked, then flag will become false else loop continues till it ends
				$flag=false;
				break;
			}
		}*/

		$sql1= "SELECT likedByuserId FROM commentlikestable WHERE likedByuserId='$userId' AND commentId='$id'";
		$result1=mysqli_query($conn,$sql1);
		if($row=mysqli_fetch_assoc($result1)){			
			//if user has already liked, then flag will become false else loop continues till it ends

			//this means if the user has already liked the comment
			$likes=$likes-1;

			$sql="UPDATE commentstable SET likes='$likes' WHERE id='$id'";//updating database 
			$result=mysqli_query($conn,$sql);

			//deleting meme liking info into likestable			
			$sql2="DELETE FROM commentlikestable WHERE commentId='$id'";
			$result2=mysqli_query($conn,$sql2);

			//decreasing 0.5 point of the commenter on account of the undo-like
			$sql3="UPDATE memberstable SET points=points-0.5 WHERE id='$uid'";
			$result3=mysqli_query($conn,$sql3);

			//removing notification from uploader's feed
			$sql4="DELETE FROM notifications_table WHERE receiverId='$uid' AND senderId='$userId' AND notificationType='commentLike' AND notificationForEventId='$id'";
			$result4=mysqli_query($conn,$sql4);

			//echo 'undo like';
			echo htmlentities($likes);
		}
		else{
			//user has not already liked the comment

			//here, is the comment liking actual code
			$likes=$likes+1;
			$sql="UPDATE commentstable SET likes='$likes' 
				  WHERE id='$id'";//updating database 
			$result=mysqli_query($conn,$sql);

			//inserting comment liking info into commentlikestable			
			$sql2="INSERT INTO commentlikestable (commentId, likedByuserId) VALUES ('$id','$userId')";
			$result2=mysqli_query($conn,$sql2);

			//increasing 0.5 point of the commenter on account of the undo-like
			$sql3="UPDATE memberstable SET points=points+0.5 WHERE id='$uid'";
			$result3=mysqli_query($conn,$sql3);

			//updating notification
			date_default_timezone_set('Asia/Kolkata');//setting the timezone
			$datetime=date('Y-m-d H:i:s');			

			$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
			$result01=mysqli_query($conn,$sql01);
			$row01=mysqli_fetch_assoc($result01);
			$senderUsername=$row01['username'];

			$sql02="SELECT comment,commentForMemeId,sharedWithWorld,sharedWithUserId,sharedWithGroupId FROM commentstable WHERE id='$id'";//getting image title
			$result02=mysqli_query($conn,$sql02);
			$row02=mysqli_fetch_assoc($result02);
			$comment=$row02['comment'];
			$world=$row02['sharedWithWorld'];
			$sharedWithUserId=$row02['sharedWithUserId'];
			$sharedWithGroupId=$row02['sharedWithGroupId'];
			$imageId=$row02['commentForMemeId'];
			$commentDivName="commentdiv".$id;

			$commentForNotification=(strlen($comment) > 13) ? substr($comment,0,10).'...' : $comment;

			$notificationString=$senderUsername.' liked your comment "'.$commentForNotification.'"';
			$notificationType="commentLike";
			$notificationLink='imagedisplay.php?id='.$imageId.'&world='.$world.'&uid='.$sharedWithUserId.'&gid='.$sharedWithGroupId.'#'.$commentDivName;

			$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$userId','$uid','$notificationType','$notificationString','$notificationLink',0,'$datetime','$id')";
			$result4=mysqli_query($conn,$sql4);
			
			echo htmlentities($likes);//sending back info to imagedisplay.php
		}
	}
		
}
else{
	echo 'login error';
}

