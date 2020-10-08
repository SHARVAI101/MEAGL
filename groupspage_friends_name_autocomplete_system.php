<?php

session_start();

include 'dbh.php';

if(isset($_POST['friend_name']))
{
	$friend_name=mysqli_real_escape_string($conn,$_POST['friend_name']);
	$groupId=mysqli_real_escape_string($conn,$_POST['groupId']);
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	$suggestion='';

	$sql="SELECT username,id FROM memberstable WHERE username LIKE '%$friend_name%' AND id!='$userId'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{	
		$un[]=$row;
	}
	
	//$un=array_unique($un);//removes duplicate entries from the suggestions' array
	if(isset($un)){
		foreach($un as $u){
			$fid=$u['id'];
			$fname=$u['username'];
			$sql="SELECT id FROM friends_table WHERE ((sender_user_id='$fid' AND receiver_user_id='$userId') OR (sender_user_id='$userId' AND receiver_user_id='$fid')) AND relation=1";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)!=0)
			{
				//$suggestion.= '<input type="checkbox" class="groupInviteCheckbox" name="new_group_user_ids[]" value="'.$fid.'">'.$fname.'<br>';
				$sql00="SELECT invitationStatus FROM group_participants_table WHERE groupId='$groupId' AND participantId='$fid'";
				$result00=mysqli_query($conn,$sql00);
				$row00=mysqli_fetch_assoc($result00);
				if((!isset($row00['invitationStatus'])) || (isset($row00['invitationStatus']) && $row00['invitationStatus']!=0 && $row00['invitationStatus']!=1))
				{
							
					$suggestion.= '<label class="checkbox" style="margin-top:5px;margin-left:10px"><input type="checkbox" class="groupFriendInviteCheckbox" name="new_group_user_ids[]" value="'.htmlentities($fid).'">'.htmlentities($fname).'</label>';
					
				}
			}
		}
	}
	

	echo $suggestion;
}