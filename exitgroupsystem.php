<?php

session_start();

include 'dbh.php';

$groupId=mysqli_real_escape_string($conn,$_POST['groupId']);
$userId=mysqli_real_escape_string($conn,$_POST['userId']);//the one who is exiting
$uId=mysqli_real_escape_string($conn,$_SESSION['id']);

$moreThanOneAdmin=false;

$sql0="SELECT participantId FROM group_participants_table WHERE participantStatus=1 AND groupId='$groupId'";
$result0=mysqli_query($conn,$sql0);
while($row0=mysqli_fetch_assoc($result0)){
	//means if there's an admin
	if($row0['participantId']!=$userId){
		$moreThanOneAdmin=true;//that means there is an admin other than this admin...this is because if the user is the sole admin and if he exits then there'll be no admins left which is not right
		//echo "true";
	}
}



$sql="SELECT participantId FROM group_participants_table WHERE participantId='$uId'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_assoc($result)){
	//that means if this user is trying to exit his own group and not trying to hack

	//finding the number of participants left in the group
	$partis=0;
	$sql90="SELECT participantId FROM group_participants_table WHERE (invitationStatus=1 AND (participantStatus=0 OR participantStatus=1) AND groupId='$groupId')";
	$result90=mysqli_query($conn,$sql90);
	while($row90=mysqli_fetch_assoc($result90))
	{
		$partis+=1;//echo '<br>'.$row90['participantId'].'par='.$partis;
	}
	//echo "group=".$groupId.",".$partis.",".$moreThanOneAdmin;
	if($moreThanOneAdmin==true || $partis<=1){
		$sql1="UPDATE groups_table SET numberOfParticipants=numberOfParticipants-1 WHERE id='$groupId'";
		$result1=mysqli_query($conn,$sql1);

		/*$sql="UPDATE group_participants_table SET participantStatus=3 WHERE participantId='$userId' AND groupId='$groupId'";
		$result=mysqli_query($conn,$sql);*/

		//notifications
		date_default_timezone_set('Asia/Kolkata');//setting the timezone
		$datetime=date('Y-m-d H:i:s');			

		$sql01="SELECT username FROM memberstable WHERE id='$userId'";
		$result01=mysqli_query($conn,$sql01);
		$row01=mysqli_fetch_assoc($result01);
		$username=$row01['username'];

		$sql02="SELECT groupname FROM groups_table WHERE id='$groupId'";
		$result02=mysqli_query($conn,$sql02);
		$row02=mysqli_fetch_assoc($result02);
		$groupname=$row02['groupname'];

		$notificationString=$username.' has left the group "<i>'.$groupname.'</i>".';
		$notificationType="exitGroup";
		$notificationLink='groupspage.php?id='.$groupId;

		$sql03="SELECT participantId FROM group_participants_table WHERE groupId='$groupId' AND participantId!='$userId'";
		$result03=mysqli_query($conn,$sql03);
		while($row03=mysqli_fetch_assoc($result03)){
			$pid=$row03['participantId'];		

			$sql="DELETE FROM group_participants_table WHERE participantId='$userId' AND groupId='$groupId'";
			$result=mysqli_query($conn,$sql);

			//here, notificationForEventId is not applicable so it is 0
			$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$userId','$pid','$notificationType','$notificationString','$notificationLink',0,'$datetime',0)";
			$result4=mysqli_query($conn,$sql4);

		}

		echo $result;
	}else{
		//this user is the sole admin..therefore, he'll now have to make some other user the admin first and only then exit the group
		echo "no more admins";
	}
}else{
	echo "hacken";
}
