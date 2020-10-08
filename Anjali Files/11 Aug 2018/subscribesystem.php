<?php

session_start();

include 'dbh.php';

if(isset($_SESSION['id'])){
	//this code segment will be executed if the user has logged in
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
	
	$uploaderId=mysqli_real_escape_string($conn,$_POST['uploaderId']);//the uploader id
	$flag=true;//flag to see if user has already subscribed to an uploader
	$flag1=true;//flag to see if the user is subscribing to himself

	if($uploaderId==$userId){//searching for userId instead of user name is very efficient(comparing integers is actually super fast compared to searching strings)
		//if user is trying to subscribe to himself
		echo 'uploader sub';//it is himself that he is trying to subscribe
	}
	else{
		//he is not subcribing to himself

		//now checking if the number of subscribers is correct and has not been hacked
		$sql="SELECT numberofSubscribers FROM memberstable WHERE id='$uploaderId'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		if($row['numberofSubscribers']==mysqli_real_escape_string($conn,$_POST['numberofSubscribers'])){

			//now checking if the user is subscribing to someone he has already subscribed before
			/*$sql1= "SELECT * FROM subscriberstable WHERE uploaderId='$uploaderId'";
			$result1=mysqli_query($conn,$sql1);
			while($row=mysqli_fetch_assoc($result1)){
				if($row['subscribedById']==$userId){
					//if user has already subscribed, then flag will become false else loop continues till it ends
					$flag=false;
					break;
				}
			}*/

			$sql1= "SELECT subscribedById FROM subscriberstable WHERE subscribedById='$userId' AND uploaderId='$uploaderId'";
			$result1=mysqli_query($conn,$sql1);
			if($row=mysqli_fetch_assoc($result1)){
				//this means if the user has already subscribed and wants to unsubscribe

				//reducing the number of subscriptions by this user
				$sql0="UPDATE memberstable SET otherChannelSubscriptions=otherChannelSubscriptions-1 WHERE id='$userId'";//updating database 
				$result0=mysqli_query($conn,$sql0);

				//here, is the user un-subscribing actual code
				$numberofSubscribers=mysqli_real_escape_string($conn,$_POST['numberofSubscribers'])-1;//decrementing number of subscribers
				$sql="UPDATE memberstable SET numberofSubscribers='$numberofSubscribers' WHERE id='$uploaderId'";//updating database 
				$result=mysqli_query($conn,$sql);

				//user subscribing info into subscriberstable			
				$sql2="DELETE FROM subscriberstable WHERE subscribedById='$userId'";
				$result2=mysqli_query($conn,$sql2);

				//removing notification from uploader's feed
				$sql4="DELETE FROM notifications_table WHERE receiverId='$uploaderId' AND senderId='$userId' AND notificationType='subscription'";
				$result4=mysqli_query($conn,$sql4);



				echo htmlentities($numberofSubscribers);//sending back info to allmemes.php
			}
			else{
				//user has not already subscribed

				//here, is the user subscribing actual code

				//increasing the number of subscriptions by this user
				$sql0="UPDATE memberstable SET otherChannelSubscriptions=otherChannelSubscriptions+1 WHERE id='$userId'";//updating database 
				$result0=mysqli_query($conn,$sql0);

				//echo $_POST['numberofSubscribers']."<br>";
				$numberofSubscribers=mysqli_real_escape_string($conn,$_POST['numberofSubscribers'])+1;//incrementing number of subscribers
				$sql="UPDATE memberstable SET numberofSubscribers='$numberofSubscribers' 
					  WHERE id='$uploaderId'";//updating database 
				$result=mysqli_query($conn,$sql);

				//user subscribing info into subscriberstable			
				$sql2="INSERT INTO subscriberstable (uploaderId, subscribedById) VALUES ('$uploaderId','$userId')";
				$result2=mysqli_query($conn,$sql2);

				//updating notification
				date_default_timezone_set('Asia/Kolkata');//setting the timezone
				$datetime=date('Y-m-d H:i:s');			

				$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
				$result01=mysqli_query($conn,$sql01);
				$row01=mysqli_fetch_assoc($result01);
				$senderUsername=$row01['username'];
				
				$notificationString=$senderUsername.' subscribed to you!';
				$notificationType="subscription";
				$notificationLink='userprofile.php?id='.$userId;

				$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime) VALUES ('$userId','$uploaderId','$notificationType','$notificationString','$notificationLink',0,'$datetime')";
				$result4=mysqli_query($conn,$sql4);
				
				echo htmlentities($numberofSubscribers);//sending back info to allmemes.php
			}
		}
		else{
			echo "subs not matching error";
		}
	}
		
}
else{
	echo 'login error';
}

