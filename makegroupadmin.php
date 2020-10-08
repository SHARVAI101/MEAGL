<?php

session_start();

include 'dbh.php';

$groupId=mysqli_real_escape_string($conn,$_POST['groupId']);
$participantId=mysqli_real_escape_string($conn,$_POST['participantId']);

$sql="UPDATE group_participants_table SET participantStatus=1 WHERE participantId='$participantId' AND groupId='$groupId'";
$result=mysqli_query($conn,$sql);

//notification for other participants of the group
date_default_timezone_set('Asia/Kolkata');//setting the timezone
$datetime=date('Y-m-d H:i:s');

$sql1="SELECT participantId,groupname FROM group_participants_table WHERE groupId='$groupId'";
$result1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_assoc($result1)){
	//sending a notification to every other participant of the group
	$pId=$row['participantId'];
	$groupname=$row['groupname'];	

	if($pId==$participantId){
		$notificationString='You are now an admin of the group "<i>'.htmlentities($groupname).'</i>"';
	}
	else{
		$sql2="SELECT username FROM memberstable WHERE id='$participantId'";
		$result2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_assoc($result2);
		$username=$row2['username'];
		
		$notificationString=htmlentities($username).' is now an admin of the group "<i>'.htmlentities($groupname).'</i>"';
	}
	$notificationLink='groupspage.php?id='.htmlentities($groupId);
	$notificationType="makeGroupAdmin";

	//here, senderId is not necessary so it is kept as 0 also, notificationForEventId is not applicable so it is also 0
	$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES (0,'$pId','$notificationType','$notificationString','$notificationLink',0,'$datetime',0)";
	$result4=mysqli_query($conn,$sql4);
}


echo $result;