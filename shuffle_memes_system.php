<?php 
session_start();
include 'dbh.php';
include 'functions.php';
//$startTime = microtime(true);
$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

//content uploaded by this user is not displayed on the recommended and the shuffled page..everywhere else, it is displayed
$sql="SELECT * FROM memestable WHERE visibilityStatus=1 AND uploaderId!='$userId'";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
	$row['origin']="world";
	$all_memes[]=$row;
}
//print_r($all_memes);
//fetching friends' upload data
$sql="SELECT * FROM friends_table WHERE sender_user_id='$userId' OR receiver_user_id='$userId'";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
	if($row['sender_user_id']==$userId){
		//means, the receiver is the friend
		$friendId=$row['receiver_user_id'];
		
		$sql1="SELECT * FROM meme_sharing_visibility_table WHERE userId='$userId' AND uploaderId='$friendId'";
		$result1=mysqli_query($conn,$sql1);
		while($row1=mysqli_fetch_assoc($result1)){
			$imageId=$row1['imageId'];
			$sql2="SELECT * FROM memestable WHERE id='$imageId'";
			$result2=mysqli_query($conn,$sql2);
			$row2=mysqli_fetch_assoc($result2);
			$row2['origin']="friends";
			$all_memes[]=$row2;
		}
	}else{
		//means, the sender is the friend
		$friendId=$row['sender_user_id'];
		
		$sql1="SELECT * FROM meme_sharing_visibility_table WHERE userId='$userId' AND uploaderId='$friendId'";
		$result1=mysqli_query($conn,$sql1);
		while($row1=mysqli_fetch_assoc($result1)){
			$imageId=$row1['imageId'];
			$sql2="SELECT * FROM memestable WHERE id='$imageId'";
			$result2=mysqli_query($conn,$sql2);
			$row2=mysqli_fetch_assoc($result2);
			$row2['origin']="friends";
			$all_memes[]=$row2;
		}
	}

}
//print_r($all_memes);
//fetching groups data
$sql="SELECT groupId FROM group_participants_table WHERE participantId='$userId' AND invitationStatus=1 AND participantStatus!=3";
$result=mysqli_query($conn,$sql);
$total_likes=0;
$total_memes=0;
while($row=mysqli_fetch_assoc($result)){
	$groupId=$row['groupId'];
	$memeNotPresent=true;//if the meme that we're trying to extract is already present in the friends' memes array, this variable will be false
	$sql1="SELECT imageId FROM meme_sharing_visibility_table WHERE groupId='$groupId' AND uploaderId!='$userId'";
	$result1=mysqli_query($conn,$sql1);
	while($row1=mysqli_fetch_assoc($result1)){
		$imageId=$row1['imageId'];
		foreach($all_memes as $fm){
			if($fm['id']==$imageId){
				$memeNotPresent=false;
				break;
			}
		}
		if($memeNotPresent==true){
			$sql2="SELECT * FROM memestable WHERE id='$imageId'";
			$result2=mysqli_query($conn,$sql2);
			$row2=mysqli_fetch_assoc($result2);
			$row2['origin']="groups";
			//$groups_memes[]=$row2;
			$all_memes[]=$row2;
			$total_likes+=$row2['likes'];
			$total_memes+=1;
		}
		
	}
}

shuffle($all_memes);//in-built in php
//echo '<div id="shuffled_content_div">';
//echo "shufflepage";print_r($all_memes);
$_SESSION['index_page_shuffled_counter']=0;
$_SESSION['shuffled_memes_array']=$all_memes;
$numberOfMemesInShuffled=count($all_memes);	
loadMorefunction($all_memes,$numberOfMemesInShuffled,'index_page_shuffled_counter','shuffled',"donthideform");

