<?php

session_start();

include 'dbh.php';

$replyId=mysqli_real_escape_string($conn,$_POST['replyId']);

if(isset($_SESSION['id'])){

	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	$stmt= $conn->prepare("SELECT replyByUserId FROM answerrepliestable WHERE replyByUserId=? AND id=?");
	$stmt-> bind_param("dd",$UID,$RID);
	$UID=$userId;
	$RID=$replyId;
	$stmt->execute();
	$result00=$stmt->get_result();

	if($row00=mysqli_fetch_assoc($result00)){
		//that means if this user is trying to delete his own answer and not anybody else's

		//reducing the number of replies from the comments table by 1
		//$sql="SELECT replyToAnswerId FROM answerrepliestable WHERE id='$replyId'";
		//$result=mysqli_query($conn,$sql);
		$stmt= $conn->prepare("SELECT replyToAnswerId FROM answerrepliestable WHERE id=?");
		$stmt-> bind_param("d",$RID);
		$RID=$replyId;
		$stmt->execute();
		$result=$stmt->get_result();

		$row=mysqli_fetch_assoc($result);
		$answerId=mysqli_real_escape_string($conn,$row['replyToAnswerId']);

		$numberOfReplies=mysqli_real_escape_string($conn,$_POST['numberOfReplies']);
		//$sql1="UPDATE answerstable SET numberOfReplies='$numberOfReplies' WHERE id='$answerId'";
		//$result1=mysqli_query($conn,$sql1);
		$stmt= $conn->prepare("UPDATE answerstable SET numberOfReplies='$numberOfReplies' WHERE id=?");
		$stmt-> bind_param("d",$AID);
		$AID=$answerId;
		$stmt->execute();
		$result1=$stmt->get_result();

		//deleting the likes for this reply from the replylikestable
		//$sql2="DELETE FROM answerreplylikestable WHERE replyId='$replyId'";
		//$result2=mysqli_query($conn,$sql2);
		$stmt= $conn->prepare("DELETE FROM answerreplylikestable WHERE replyId=?");
		$stmt-> bind_param("d",$RID);
		$RID=$replyId;
		$stmt->execute();
		$result2=$stmt->get_result();

		//now deleting the reply from the repliestable
		//$sql3="DELETE FROM answerrepliestable WHERE id='$replyId'";
		//$result3=mysqli_query($conn,$sql3);
		$stmt= $conn->prepare("DELETE FROM answerrepliestable WHERE id=?");
		$stmt-> bind_param("d",$RID);
		$RID=$replyId;
		$stmt->execute();
		$result2=$stmt->get_result();

		echo 'success';
	}
	else{
		echo 'failure';
	}
}
else{
		echo 'failure';
}