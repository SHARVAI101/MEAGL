<?php

session_start();

include 'dbh.php';
include_once 'functions.php';

if($_POST['groupname']!=''){

	$groupname=mysqli_real_escape_string($conn,$_POST['groupname']);

	//if(!empty($_POST['new_group_user_ids'])) {

	if(!empty($_POST['friends_array'])) {	
		$userId=mysqli_real_escape_string($conn,$_SESSION['id']);//id of the current user
		$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);//for lastActivityDateTime
		$date=mysqli_real_escape_string($conn,$_POST['date']);//for date of creation and date of invitation
		$inviterId=mysqli_real_escape_string($conn,$_POST['inviterId']);
		$inviterUserName=mysqli_real_escape_string($conn,$_POST['inviterUserName']);

		$gpL="defaults/groups_icon.png";

		$sql="INSERT INTO groups_table (groupCreatorId, groupname, lastActivityDateTime, dateOfCreation, numberOfParticipants, groupPicLocation) VALUES ('$userId','$groupname','$datetime','$date', 1, '$gpL')";//1 for the numberOfParticipants is of the group creator himself
		$result=mysqli_query($conn,$sql);
		$groupId=mysqli_insert_id($conn);

		$sql3="INSERT INTO group_participants_table (participantId,groupId,invitationStatus,inviterId,inviterUserName,invitationDate,groupname,participantStatus) VALUES ('$userId','$groupId',1,'$inviterId','self','$date','$groupname',1)";
		$result3=mysqli_query($conn,$sql3);//inserting the group creator's info into the group participants' table

		/*$sql4="INSERT INTO group_admins_table (adminUserId,groupId) VALUES ('$userId','$groupId')";
		$result4=mysqli_query($conn,$sql4);//inserting the group creator's info into the group admins' table
		*/
		$numberOfPendingInvitations=0;		

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

		//making directory
		mkdir("groups/group".$groupId,0777,true);
		mkdir("groups/group".$groupId."/groupPic",0777,true);

		$date=date("d-m-Y", strtotime($_POST['date']));//to change the format of display date
		
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
	}
	else{
		echo "no participants";
	}
}
else{
	echo "no groupname";
}
