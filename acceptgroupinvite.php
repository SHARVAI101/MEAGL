<?php

session_start();

include 'dbh.php';
include_once 'functions.php';

$groupId=mysqli_real_escape_string($conn,$_POST['groupId']);
$inviteId=mysqli_real_escape_string($conn,$_POST['inviteId']);
$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);

$sql="UPDATE group_participants_table SET invitationStatus=1 WHERE id='$inviteId'";
$result=mysqli_query($conn,$sql);

$sql1="UPDATE groups_table SET numberOfParticipants=numberOfParticipants+1,numberOfPendingInvitations=numberOfPendingInvitations-1,lastActivityDateTime='$datetime' WHERE id='$groupId'";
$result1=mysqli_query($conn,$sql1);

$sql2="SELECT groupname,numberOfParticipants,numberOfPendingInvitations,groupPicLocation FROM groups_table WHERE id='$groupId'";
$result2=mysqli_query($conn,$sql2);
$row=mysqli_fetch_assoc($result2);

$groupname=$row['groupname'];
$numberOfParticipants=$row['numberOfParticipants'];
$numberOfPendingInvitations=$row['numberOfPendingInvitations'];
//$datetime=$row['lastActivityDateTime'];
$gpL=$row['groupPicLocation'];

//notification(for the invite sender)
$sql01="SELECT inviterId,participantId FROM group_participants_table WHERE id='$inviteId'";
$result01=mysqli_query($conn,$sql01);
$row01=mysqli_fetch_assoc($result01);
$inviterId=$row01['inviterId'];
$participantId=$row01['participantId'];
//echo "inviterId=".$inviterId;
//echo '$participantId='.$participantId;

$sql02="SELECT username FROM memberstable WHERE id='$participantId'";
$result02=mysqli_query($conn,$sql02);
$row02=mysqli_fetch_assoc($result02);
$participantUsername=$row02['username'];
//echo '$participantUsername='.$participantUsername;

$notificationString=$participantUsername.' accepted your invitation to the group '.$groupname.'.';
$notificationLink='groupspage.php?id='.$groupId;
$notificationType="acceptGroupInvite";

$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$participantId','$inviterId','$notificationType','$notificationString','$notificationLink',0,'$datetime','$groupId')";
$result4=mysqli_query($conn,$sql4);

?>
<div class="meagl">
	<a href="groupspage.php?id=<?php echo htmlentities($groupId); ?>"><span class="spanner"></span>
	<img src="<?php echo $gpL; ?>" class="meagl-dp">
	<p class="meagl-username"><?php echo htmlentities($groupname); ?></p>
	<p class="last-activity">Last Activity: <?php echo getTime($datetime); ?></p>
	</a>
</div> 
<?php 
exit;