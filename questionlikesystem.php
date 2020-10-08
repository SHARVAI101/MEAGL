<?php

session_start();

include 'dbh.php';

if(isset($_SESSION['id'])){
	//this code segment will be executed if the user has logged in
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
	$username=mysqli_real_escape_string($conn,$_SESSION['username']);
	$likes=mysqli_real_escape_string($conn,$_POST['numberOfLikes']);//incrementing number of likes
	$id=mysqli_real_escape_string($conn,$_POST['id']);//the question id
	//$flag=true;//flag to see if user has already liked a meme
	$flag1=true;//flag to see if the user is liking his own meme
	//$flag2=false;//flag to see if he has not uploaded a single meme

	//checking if the person who has asked the question himself is trying to like it
	$sql3= "SELECT askerId FROM questionstable WHERE id='$id'";
	$result3=mysqli_query($conn,$sql3);
	$row3=mysqli_fetch_assoc($result3);
	if($row3['askerId']==$userId){//searching for userId instead of user name is very efficient(comparing integers is actually super fast compared to searching strings)
		//if user is trying to like his own meme
		echo 'user question';//it is the user's own meme that he is trying to like
	}
	else{
		//it is not his own meme(for $flag1)
		$uid=$row3['askerId'];
		//now checking if the user is liking a meme that he already has liked before
		/*$sql1= "SELECT * FROM likestable WHERE imageId='$id'";
		$result1=mysqli_query($conn,$sql1);
		while($row=mysqli_fetch_assoc($result1)){
			if($row['likedByuserId']==$userId){
				//if user has already liked, then flag will become false else loop continues till it ends
				$flag=false;
				break;
			}
		}*/

		$sql1= "SELECT likedByUserId FROM questionlikestable WHERE likedByUserId='$userId' AND questionId='$id'";
		$result1=mysqli_query($conn,$sql1);
		if($row=mysqli_fetch_assoc($result1)){			
			//if user has already liked, then flag will become false else loop continues till it ends

			//this means if the user has already liked the question and wishes to undo his like
			$likes=$likes-1;

			$sql="UPDATE questionstable SET likes='$likes' WHERE id='$id'";//updating database 
			$result=mysqli_query($conn,$sql);

			//deleting meme liking info into likestable			
			$sql2="DELETE FROM questionlikestable WHERE questionId='$id'";
			$result2=mysqli_query($conn,$sql2);

			//decreasing 1 point of the asker on account of the undo-like
			$sql3="UPDATE memberstable SET points=points-1 WHERE id='$uid'";
			$result3=mysqli_query($conn,$sql3);

			//removing notification from uploader's feed
			$sql4="DELETE FROM notifications_table WHERE receiverId='$uid' AND senderId='$userId' AND notificationType='questionLike' AND notificationForEventId='$id'";
			$result4=mysqli_query($conn,$sql4);

			//echo 'undo like';
			echo htmlentities($likes);
		}
		else{
			//user has not already liked the meme

			//here, is the meme liking actual code
			$likes=$likes+1;
			$sql="UPDATE questionstable SET likes='$likes' 
				  WHERE id='$id'";//updating database 
			$result=mysqli_query($conn,$sql);

			//inserting meme liking info into likestable			
			$sql2="INSERT INTO questionlikestable (questionId, likedByUserId) VALUES ('$id','$userId')";
			$result2=mysqli_query($conn,$sql2);

			//increasing 1 point of the asker on account of the like
			$sql3="UPDATE memberstable SET points=points+1 WHERE id='$uid'";
			$result3=mysqli_query($conn,$sql3);

			//updating notification
			date_default_timezone_set('Asia/Kolkata');//setting the timezone
			$datetime=date('Y-m-d H:i:s');			

			$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
			$result01=mysqli_query($conn,$sql01);
			$row01=mysqli_fetch_assoc($result01);
			$senderUsername=$row01['username'];

			$sql02="SELECT question FROM questionstable WHERE id='$id'";//getting image title
			$result02=mysqli_query($conn,$sql02);
			$row02=mysqli_fetch_assoc($result02);
			$question=$row02['question'];
			$questionForNotification=(strlen($question) > 13) ? substr($question,0,10).'...' : $question;

			$notificationString=$senderUsername.' liked your question "<i>'.$questionForNotification.'</i>".';
			$notificationLink='questiondisplay.php?id='.$id;
			$notificationType="questionLike";

			$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$userId','$uid','$notificationType','$notificationString','$notificationLink',0,'$datetime','$id')";
			$result4=mysqli_query($conn,$sql4);

			echo htmlentities($likes);//sending back info to allmemes.php
		}
	}
		
}
else{
	echo 'login error';
}

