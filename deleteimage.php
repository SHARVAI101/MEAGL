<?php

session_start();

include 'dbh.php';

$imageId=mysqli_real_escape_string($conn,$_POST['imageId']);
if(isset($_SESSION['id'])){

	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	$stmt= $conn->prepare("SELECT uploaderId FROM memestable WHERE uploaderId=? AND id=?");
	$stmt-> bind_param("dd",$UID,$IID);
	$UID=$userId;
	$IID=$imageId;
	$stmt->execute();
	$result00=$stmt->get_result();

	if($row00=mysqli_fetch_assoc($result00)){
		//that means if this user is trying to delete his own meme and not anybody else's

		//$sql10="SELECT uploaderId,memeDestination,memeCategory FROM memestable WHERE id='$imageId'";
		//$result10=mysqli_query($conn,$sql10);
		$stmt= $conn->prepare("SELECT uploaderId,memeDestination,memeCategory FROM memestable WHERE id=?");
		$stmt-> bind_param("d",$IID);
		$IID=$imageId;
		$stmt->execute();
		$result10=$stmt->get_result();
		$row10=mysqli_fetch_assoc($result10);
		$uploaderId=mysqli_real_escape_string($conn,$row10['uploaderId']);
		$memeDestination=mysqli_real_escape_string($conn,$row10['memeDestination']);
		$memeCategory=mysqli_real_escape_string($conn,$row10['memeCategory']);

		//$sql11="DELETE FROM memestable WHERE id='$imageId'";
		//$result11=mysqli_query($conn,$sql11);
		$stmt= $conn->prepare("DELETE FROM memestable WHERE id=?");
		$stmt-> bind_param("d",$IID);
		$IID=$imageId;
		$stmt->execute();
		$result11=$stmt->get_result();

		//$_SESSION['memesUploaded']+=1;

		//$sql12="UPDATE memecategoriestable SET totalMemesForThisCategory=(totalMemesForThisCategory-1) WHERE memeCategory='$memeCategory'";
		//$result12=mysqli_query($conn,$sql12);
		$stmt= $conn->prepare("UPDATE memecategoriestable SET totalMemesForThisCategory=(totalMemesForThisCategory-1) WHERE memeCategory=?");
		$stmt-> bind_param("s",$MC);
		$MC=$memeCategory;
		$stmt->execute();
		$result12=$stmt->get_result();		

		//$sql13="UPDATE memberstable SET memesUploaded=(memesUploaded-1) WHERE id='$uploaderId'";
		//$result13=mysqli_query($conn,$sql13);
		$stmt= $conn->prepare("UPDATE memberstable SET memesUploaded=(memesUploaded-1) WHERE id=?");
		$stmt-> bind_param("d",$UID);
		$UID=$uploaderId;
		$stmt->execute();
		$result13=$stmt->get_result();

		//$sql14="DELETE FROM likestable WHERE imageId='$imageId'";
		//$result14=mysqli_query($conn,$sql14);
		$stmt= $conn->prepare("DELETE FROM likestable WHERE imageId=?");
		$stmt-> bind_param("d",$IID);
		$IID=$imageId;
		$stmt->execute();
		$result14=$stmt->get_result();

		//deleting all comments information
		//$sql15="SELECT id FROM commentstable WHERE commentForMemeId='$imageId'";
		//$result15=mysqli_query($conn,$sql15);
		$stmt= $conn->prepare("SELECT id FROM commentstable WHERE commentForMemeId=?");
		$stmt-> bind_param("d",$IID);
		$IID=$imageId;
		$stmt->execute();
		$result15=$stmt->get_result();
		while($row15=mysqli_fetch_assoc($result15)){

			$commentId=mysqli_real_escape_string($conn,$row15['id']);

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

		}

		//deleting the file from the folder
		$realfilepath=realpath($memeDestination);
		unlink($realfilepath);

		echo $uploaderId;
	}
	else
	{
		echo 'failure';
	}
}
else
{
	echo "failure";
}
