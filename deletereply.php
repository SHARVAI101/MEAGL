<?php

session_start();

include 'dbh.php';

$replyId=mysqli_real_escape_string($conn,$_POST['replyId']);

if(isset($_SESSION['id'])){

	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	$stmt= $conn->prepare("SELECT replyByUserId FROM repliestable WHERE replyByUserId=? AND id=?");
	$stmt-> bind_param("dd",$UID,$RID);
	$UID=$userId;
	$RID=$replyId;
	$stmt->execute();
	$result00=$stmt->get_result();

	if($row00=mysqli_fetch_assoc($result00)){
		//that means if this user is trying to delete his own answer and not anybody else's

		//reducing the number of replies from the comments table by 1
		//$sql="SELECT replyToCommentId FROM repliestable WHERE id='$replyId'";
		//$result=mysqli_query($conn,$sql);
		$stmt= $conn->prepare("SELECT replyToCommentId FROM repliestable WHERE id=?");
		$stmt-> bind_param("d",$RID);
		$RID=$replyId;
		$stmt->execute();
		$result=$stmt->get_result();

		$row=mysqli_fetch_assoc($result);
		$commentId=mysqli_real_escape_string($conn,$row['replyToCommentId']);
		//$sql1="UPDATE commentstable SET numberOfReplies=(numberOfReplies-1) WHERE id='$commentId'";
		//$result1=mysqli_query($conn,$sql1);
		$stmt= $conn->prepare("UPDATE commentstable SET numberOfReplies=(numberOfReplies-1) WHERE id=?");
		$stmt-> bind_param("d",$CID);
		$CID=$commentId;
		$stmt->execute();
		$result1=$stmt->get_result();

		//deleting the likes for this reply from the replylikestable
		//$sql2="DELETE FROM replylikestable WHERE replyId='$replyId'";
		//$result2=mysqli_query($conn,$sql2);
		$stmt= $conn->prepare("DELETE FROM replylikestable WHERE replyId=?");
		$stmt-> bind_param("d",$RID);
		$RID=$replyId;
		$stmt->execute();
		$result2=$stmt->get_result();

		//now deleting the reply from the repliestable
		//$sql3="DELETE FROM repliestable WHERE id='$replyId'";
		//$result3=mysqli_query($conn,$sql3);
		$stmt= $conn->prepare("DELETE FROM repliestable WHERE id=?");
		$stmt-> bind_param("d",$RID);
		$RID=$replyId;
		$stmt->execute();
		$result3=$stmt->get_result(); 

		echo "success";
    }
	else{
		echo "failure";
	}

}else{
	echo "failure";
}