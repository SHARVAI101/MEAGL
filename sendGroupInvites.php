<?php

session_start();

include 'dbh.php';
include_once 'functions.php';

if(!empty($_POST['friends_array'])) {	
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);//id of the current user
	$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);//for lastActivityDateTime
	$date=mysqli_real_escape_string($conn,$_POST['date']);//for date of creation and date of invitation
	$inviterId=mysqli_real_escape_string($conn,$_POST['inviterId']);
	$inviterUserName=mysqli_real_escape_string($conn,$_SESSION['username']);
	$groupname=mysqli_real_escape_string($conn,$_POST['groupname']);
	$groupId=mysqli_real_escape_string($conn,$_POST['groupId']);

	$sql="UPDATE groups_table SET lastActivityDateTime='$datetime' WHERE id='$groupId'";
	$result=mysqli_query($conn,$sql);

	$sql="SELECT numberOfPendingInvitations FROM groups_table WHERE id='$groupId'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$numberOfPendingInvitations=$row['numberOfPendingInvitations'];		

	foreach(json_decode($_POST['friends_array']) as $group_userId){
		$group_userId=mysqli_real_escape_string($conn,$group_userId);
		$sql1="INSERT INTO group_participants_table (participantId,groupId,invitationStatus,inviterId,inviterUserName,invitationDate,groupname,participantStatus) VALUES ('$group_userId','$groupId',0,'$inviterId','$inviterUserName','$date','$groupname',0)";
		$result1=mysqli_query($conn,$sql1);
		$numberOfPendingInvitations+=1;

		//notifications for the group participants
		$notificationString=$inviterUserName.' has invited you to the group "<i>'.$groupname.'</i>"';
		$notificationLink='groupspage.php?id='.$groupId;
		$notificationType="groupInvitation";

		$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$inviterId','$group_userId','$notificationType','$notificationString','$notificationLink',0,'$datetime','$groupId')";
		$result4=mysqli_query($conn,$sql4);
	}

	$sql2="UPDATE groups_table SET numberOfPendingInvitations='$numberOfPendingInvitations' WHERE id='$groupId'";
	$result2=mysqli_query($conn,$sql2);		

	echo $numberOfPendingInvitations;
		
}
else{
	echo "no participants";
}
