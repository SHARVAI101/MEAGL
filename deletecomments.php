<?php

session_start();

include 'dbh.php';

$commentId=mysqli_real_escape_string($conn,$_POST['commentId']);
if(isset($_SESSION['id'])){

	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	//$sql00="SELECT commentByUserId FROM commentstable WHERE commentByUserId='$userId'";
	//$result00=mysqli_query($conn,$sql00);

	$stmt= $conn->prepare("SELECT commentByUserId FROM commentstable WHERE commentByUserId=? AND id=?");
	$stmt-> bind_param("dd",$UID,$CID);
	$UID=$userId;
	$CID=$commentId;
	$stmt->execute();
	$result00=$stmt->get_result();

	if($row00=mysqli_fetch_assoc($result00)){
		//that means if this user is trying to delete his own comment and not anybody else's

		//$sql="DELETE FROM commentstable WHERE id='$commentId'";
		//$result=mysqli_query($conn,$sql);
		$stmt= $conn->prepare("DELETE FROM commentstable WHERE id=?");
		$stmt-> bind_param("d",$CID);
		$CID=$commentId;
		$stmt->execute();
		$result=$stmt->get_result();

		//now deleting all the likes to the comment
		//$sql1="DELETE FROM commentlikestable WHERE commentId='$commentId'";
		//$result1=mysqli_query($conn,$sql1);
		$stmt= $conn->prepare("DELETE FROM commentlikestable WHERE commentId=?");
		$stmt-> bind_param("d",$CID);
		$CID=$commentId;
		$stmt->execute();
		$result1=$stmt->get_result();

		//now deleting all the likes to the replies for this comment
		//$sql3="SELECT id FROM repliestable WHERE replyToCommentId='$commentId'";
		//$result3=mysqli_query($conn,$sql3);
		$stmt= $conn->prepare("SELECT id FROM repliestable WHERE replyToCommentId=?");
		$stmt-> bind_param("d",$CID);
		$CID=$commentId;
		$stmt->execute();
		$result3=$stmt->get_result();

		while($row3=mysqli_fetch_assoc($result3)){	
			$replyId=mysqli_real_escape_string($conn,$row3['id']);
			//$sql4="DELETE FROM replylikestable WHERE replyId='$replyId'";
			//$result4=mysqli_query($conn,$sql4);
			$stmt= $conn->prepare("DELETE FROM replylikestable WHERE replyId=?");
			$stmt-> bind_param("d",$RID);
			$RID=$replyId;
			$stmt->execute();
			$result4=$stmt->get_result();
		}

		//now deleting all the replies for this comment from the repliestable
		//$sql5="DELETE FROM repliestable WHERE replyToCommentId='$commentId'";
		//$result5=mysqli_query($conn,$sql5);
		$stmt= $conn->prepare("DELETE FROM repliestable WHERE replyToCommentId=?");
		$stmt-> bind_param("d",$CID);
		$CID=$commentId;
		$stmt->execute();
		$result5=$stmt->get_result();

		//now reducing the number of comments in memestable
		$numberOfComments=mysqli_real_escape_string($conn,$_POST['numberOfComments'])-1;
		$imageId=mysqli_real_escape_string($conn,$_POST['imageId']);
		//$sql6="UPDATE memestable SET numberOfComments='$numberOfComments' WHERE id='$imageId'";//updating database 
		//$result6=mysqli_query($conn,$sql6);
		$stmt= $conn->prepare("UPDATE memestable SET numberOfComments=? WHERE id=?");//updating database
		$stmt-> bind_param("dd",$NOC,$IID);
		$IID=$imageId;
		$NOC=$numberOfComments;
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