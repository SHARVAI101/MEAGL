<?php

session_start();

include 'dbh.php';

$sender=mysqli_real_escape_string($conn,$_POST['sender_user_id']);
$receiver=mysqli_real_escape_string($conn,$_POST['receiver_user_id']);
$sender_username=mysqli_real_escape_string($conn,$_POST['sender_username']);

$sql="UPDATE friends_table set relation=2 WHERE sender_user_id='$sender' && receiver_user_id='$receiver'";
$result=mysqli_query($conn,$sql);

//notification
date_default_timezone_set('Asia/Kolkata');//setting the timezone
$datetime=date('Y-m-d H:i:s');			

$sql01="SELECT username FROM memberstable WHERE id='$receiver'";//getting notification sender's username
$result01=mysqli_query($conn,$sql01);
$row01=mysqli_fetch_assoc($result01);
$receiverUsername=$row01['username'];

$sql02="SELECT id FROM friends_table WHERE sender_user_id='$sender' AND receiver_user_id='$receiver'";
$result02=mysqli_query($conn,$sql02);
$row02=mysqli_fetch_assoc($result02);
$id=$row02['id'];

$notificationString=htmlentities($receiverUsername).' rejected your friend request!';
$notificationLink='userprofile.php?id='.htmlentities($receiver);
$notificationType="rejectFriendRequest";

$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$receiver','$sender','$notificationType','$notificationString','$notificationLink',0,'$datetime','$id')";
$result4=mysqli_query($conn,$sql4);

echo json_encode(array("sender_user_id" => $sender, "sender_username" => $sender_username));