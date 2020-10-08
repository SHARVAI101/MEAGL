<?php

session_start();

include 'dbh.php';

$answerId=mysqli_real_escape_string($conn,$_POST['answerId']);
if(isset($_SESSION['id'])){

	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	$stmt= $conn->prepare("SELECT answerByUserId FROM answerstable WHERE answerByUserId=? AND id=?");
	$stmt-> bind_param("dd",$UID,$AID);
	$UID=$userId;
	$AID=$answerId;
	$stmt->execute();
	$result00=$stmt->get_result();

	if($row00=mysqli_fetch_assoc($result00)){
		//that means if this user is trying to delete his own answer and not anybody else's

		//$sql="DELETE FROM answerstable WHERE id='$answerId'";
		//$result=mysqli_query($conn,$sql);
		$stmt= $conn->prepare("DELETE FROM answerstable WHERE id=?");
		$stmt-> bind_param("d",$AID);
		$AID=$answerId;
		$stmt->execute();
		$result=$stmt->get_result();

		//now deleting all the likes to the comment
		//$sql1="DELETE FROM answerlikestable WHERE answerId='$answerId'";
		//$result1=mysqli_query($conn,$sql1);
		$stmt= $conn->prepare("DELETE FROM answerlikestable WHERE answerId=?");
		$stmt-> bind_param("d",$AID);
		$AID=$answerId;
		$stmt->execute();
		$result1=$stmt->get_result();

		//now deleting all the likes to the replies for this comment
		//$sql3="SELECT id FROM answerrepliestable WHERE replyToAnswerId='$answerId'";
		//$result3=mysqli_query($conn,$sql3);
		$stmt= $conn->prepare("SELECT id FROM answerrepliestable WHERE replyToAnswerId=?");
		$stmt-> bind_param("d",$AID);
		$AID=$answerId;
		$stmt->execute();
		$result3=$stmt->get_result();

		while($row3=mysqli_fetch_assoc($result3)){	
			$replyId=$row3['id'];
			//$sql4="DELETE FROM answerreplylikestable WHERE replyId='$replyId'";
			//$result4=mysqli_query($conn,$sql4);
			$stmt= $conn->prepare("DELETE FROM answerreplylikestable WHERE replyId=?");
			$stmt-> bind_param("d",$RID);
			$RID=$replyId;
			$stmt->execute();
			$result4=$stmt->get_result();
		}

		//now deleting all the replies for this comment from the repliestable
		//$sql5="DELETE FROM answerrepliestable WHERE replyToAnswerId='$answerId'";
		//$result5=mysqli_query($conn,$sql5);
		$stmt= $conn->prepare("DELETE FROM answerrepliestable WHERE replyToAnswerId=?");
		$stmt-> bind_param("d",$AID);
		$AID=$answerId;
		$stmt->execute();
		$result5=$stmt->get_result();

		//now reducing the number of comments in questionstable
		$numberOfAnswers=mysqli_real_escape_string($conn,$_POST['numberOfAnswers'])-1;
		$questionId=mysqli_real_escape_string($conn,$_POST['questionId']);
		//$sql6="UPDATE questionstable SET numberOfAnswers='$numberOfAnswers' WHERE id='$questionId'";//updating database 
		//$result6=mysqli_query($conn,$sql6);
		$stmt= $conn->prepare("UPDATE questionstable SET numberOfAnswers=? WHERE id=?");
		$stmt-> bind_param("dd",$NOA,$AID);
		$NOA=$numberOfAnswers;
		$AID=$answerId;
		$stmt->execute();
		$result6=$stmt->get_result();

		echo "success";
	}
	else{
		echo "failure";
	}
}
else{
		echo "failure";
}