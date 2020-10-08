<?php

session_start();

include 'dbh.php';
include_once 'functions.php';

$groupId=mysqli_real_escape_string($conn,$_POST['groupId']);
$inviteId=mysqli_real_escape_string($conn,$_POST['inviteId']);

/*$sql="UPDATE group_participants_table SET invitationStatus=2 WHERE id='$inviteId'";
$result=mysqli_query($conn,$sql);*/

$sql="DELETE FROM group_participants_table WHERE id='$inviteId'";
$result=mysqli_query($conn,$sql);

$sql1="UPDATE groups_table SET numberOfPendingInvitations=numberOfPendingInvitations-1 WHERE id='$groupId'";
$result1=mysqli_query($conn,$sql1);

//notification(for the invite sender)
date_default_timezone_set('Asia/Kolkata');//setting the timezone
$datetime=date('Y-m-d H:i:s');	

$sql01="SELECT inviterId,participantId,groupname FROM group_participants_table WHERE id='$inviteId'";
$result01=mysqli_query($conn,$sql01);
$row01=mysqli_fetch_assoc($result01);
$inviterId=$row01['inviterId'];
$participantId=$row01['participantId'];
$groupname=$row01['groupname'];

$sql02="SELECT username FROM memberstable WHERE id='$participantId'";
$result02=mysqli_query($conn,$sql02);
$row02=mysqli_fetch_assoc($result02);
$participantUsername=$row02['username'];
//echo '$participantUsername='.$participantUsername;

$notificationString=htmlentities($participantUsername).' rejected your invitation to the group "<i>'.$groupname.'</i>".';
$notificationLink='groupspage.php?id='.$groupId;
$notificationType="acceptGroupInvite";

$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$participantId','$inviterId','$notificationType','$notificationString','$notificationLink',0,'$datetime','$groupId')";
$result4=mysqli_query($conn,$sql4);

echo "success";