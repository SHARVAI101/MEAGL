<?php

session_start();

include 'dbh.php';

$sender=mysqli_real_escape_string($conn,$_POST['sender']);
$receiver=mysqli_real_escape_string($conn,$_POST['receiver']);

$sql="INSERT INTO friends_table (sender_user_id,receiver_user_id,relation) VALUES ('$sender','$receiver',0)";
$result=mysqli_query($conn,$sql);

$friendrequestId=mysqli_insert_id($conn);

//notification for receiver
$notificationType="friendRequest";

date_default_timezone_set('Asia/Kolkata');//setting the timezone
$datetime=date('Y-m-d H:i:s');		

$sql01="SELECT username FROM memberstable WHERE id='$sender'";
$result01=mysqli_query($conn,$sql01);
$row=mysqli_fetch_assoc($result01);
$senderUsername=$row['username'];

$notification=htmlentities($senderUsername).' has sent you a friend request.';
$notificationLink='userprofile.php?id='.htmlentities($sender);

$sql1="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$sender','$receiver','$notificationType','$notification','$notificationLink',0,'$datetime','$friendrequestId')";
$result1=mysqli_query($conn,$sql1);

echo "success";