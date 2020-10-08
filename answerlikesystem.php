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
	$sql3= "SELECT answerByUserId FROM answerstable WHERE id='$id'";
	$result3=mysqli_query($conn,$sql3);
	$row3=mysqli_fetch_assoc($result3);
	if($row3['answerByUserId']==$userId){//searching for userId instead of user name is very efficient(comparing integers is actually super fast compared to searching strings)
		//if user is trying to like his own comment
		$flag1=false;
		echo 'user answer';//it is the user's own comment that he is trying to like
	}
	else{
		//it is not his own comment
		$uid=$row3['answerByUserId'];
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

		$sql1= "SELECT likedByuserId FROM answerlikestable WHERE likedByuserId='$userId'  AND answerId='$id'";
		$result1=mysqli_query($conn,$sql1);
		if($row=mysqli_fetch_assoc($result1)){			
			//if user has already liked, then flag will become false else loop continues till it ends

			//this means if the user has already liked the comment
			$likes=$likes-1;

			$sql="UPDATE answerstable SET likes='$likes' WHERE id='$id'";//updating database 
			$result=mysqli_query($conn,$sql);

			//deleting meme liking info into likestable			
			$sql2="DELETE FROM answerlikestable WHERE answerId='$id'";
			$result2=mysqli_query($conn,$sql2);

			//decreasing 0.5 point of the answerer on account of the undo-like
			$sql3="UPDATE memberstable SET points=points-0.5 WHERE id='$uid'";
			$result3=mysqli_query($conn,$sql3);

			//removing notification from uploader's feed
			$sql4="DELETE FROM notifications_table WHERE receiverId='$uid' AND senderId='$userId' AND notificationType='answerLike' AND notificationForEventId='$id'";
			$result4=mysqli_query($conn,$sql4);

			//echo 'undo like';
			echo htmlentities($likes);
		}
		else{
			//user has not already liked the comment

			//here, is the comment liking actual code
			$likes=$likes+1;
			$sql="UPDATE answerstable SET likes='$likes' 
				  WHERE id='$id'";//updating database 
			$result=mysqli_query($conn,$sql);

			//inserting comment liking info into commentlikestable			
			$sql2="INSERT INTO answerlikestable (answerId, likedByuserId) VALUES ('$id','$userId')";
			$result2=mysqli_query($conn,$sql2);

			//increasing 0.5 point of the answerer on account of the undo-like
			$sql3="UPDATE memberstable SET points=points+0.5 WHERE id='$uid'";
			$result3=mysqli_query($conn,$sql3);

			//updating notification
			date_default_timezone_set('Asia/Kolkata');//setting the timezone
			$datetime=date('Y-m-d H:i:s');			

			$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
			$result01=mysqli_query($conn,$sql01);
			$row01=mysqli_fetch_assoc($result01);
			$senderUsername=$row01['username'];

			$sql02="SELECT answer,answerForQuestionId FROM answerstable WHERE id='$id'";//getting image title
			$result02=mysqli_query($conn,$sql02);
			$row02=mysqli_fetch_assoc($result02);
			$answer=$row02['answer'];
			$questionId=$row02['answerForQuestionId'];
			$answerDivName="answerdiv".$id;

			$answerForNotification=(strlen($answer) > 13) ? substr($answer,0,10).'...' : $answer;

			$notificationString=$senderUsername.' liked your answer '.$answerForNotification.'"';
			$notificationType="answerLike";
			$notificationLink='questiondisplay.php?id='.$questionId.'#'.$answerDivName;

			$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$userId','$uid','$notificationType','$notificationString','$notificationLink',0,'$datetime','$id')";
			$result4=mysqli_query($conn,$sql4);

			echo htmlentities($likes);//sending back info to imagedisplay.php
		}
	}
		
}
else{
	echo 'login error';
}

