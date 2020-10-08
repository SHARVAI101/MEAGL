<?php

session_start();

include 'dbh.php';

if(isset($_POST['friend_name']))
{
	$friend_name=mysqli_real_escape_string($conn,$_POST['friend_name']);
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	$suggestion='';

	$sql="SELECT username,id FROM memberstable WHERE username LIKE '%$friend_name%' AND id!='$userId'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{	
		$un[]=$row;
	}
	//print_r($un);
	//$un=array_unique($un);//removes duplicate entries from the suggestions' array
	
	if(isset($un)){
		foreach($un as $u){
			$fid=$u['id'];
			$fname=$u['username'];
			$sql="SELECT id FROM friends_table WHERE ((sender_user_id='$fid' AND receiver_user_id='$userId') OR (sender_user_id='$userId' AND receiver_user_id='$fid')) AND relation=1";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)!=0)
			{
				$suggestion.= '<label class="checkbox" style="margin-left:-10px;margin-top:10px;"><input type="checkbox" class="groupInviteCheckbox" name="new_group_user_ids[]" value="'.$fid.'">'.$fname.'</label>';
			}
		}
	}
	

	echo $suggestion;
}