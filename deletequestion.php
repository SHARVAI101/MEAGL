<?php

session_start();

include 'dbh.php';

$questionId=mysqli_real_escape_string($conn,$_POST['questionId']);
if(isset($_SESSION['id'])){

	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	$stmt= $conn->prepare("SELECT askerId FROM questionstable WHERE askerId=? AND id=?");
	$stmt-> bind_param("dd",$UID,$QID);
	$UID=$userId;
	$QID=$questionId;
	$stmt->execute();
	$result00=$stmt->get_result();

	if($row00=mysqli_fetch_assoc($result00)){
		//that means if this user is trying to delete his own meme and not anybody else's

		//$sql10="SELECT askerId,memeDestination FROM questionstable WHERE id='$questionId'";
		//$result10=mysqli_query($conn,$sql10);
		$stmt= $conn->prepare("SELECT askerId,memeDestination FROM questionstable WHERE id=?");
		$stmt-> bind_param("d",$QID);
		$QID=$questionId;
		$stmt->execute();
		$result10=$stmt->get_result();

		$row10=mysqli_fetch_assoc($result10);
		$askerId=mysqli_real_escape_string($conn,$row10['askerId']);
		$memeDestination=mysqli_real_escape_string($conn,$row10['memeDestination']);

		//$sql11="DELETE FROM questionstable WHERE id='$questionId'";
		//$result11=mysqli_query($conn,$sql11);
		$stmt= $conn->prepare("DELETE FROM questionstable WHERE id=?");
		$stmt-> bind_param("d",$QID);
		$QID=$questionId;
		$stmt->execute();
		$result11=$stmt->get_result();

		//$_SESSION['memesUploaded']+=1;

		//$sql13="UPDATE memberstable SET numberOfQuestionsAsked=(numberOfQuestionsAsked-1) WHERE id='$askerId'";
		//$result13=mysqli_query($conn,$sql13);
		$stmt= $conn->prepare("UPDATE memberstable SET numberOfQuestionsAsked=(numberOfQuestionsAsked-1) WHERE id=?");
		$stmt-> bind_param("d",$AID);
		$AID=$askerId;
		$stmt->execute();
		$result13=$stmt->get_result();

		//$sql14="DELETE FROM questionlikestable WHERE questionId='$questionId'";
		//$result14=mysqli_query($conn,$sql14);
		$stmt= $conn->prepare("DELETE FROM questionlikestable WHERE questionId=?");
		$stmt-> bind_param("d",$QID);
		$QID=$questionId;
		$stmt->execute();
		$result14=$stmt->get_result();

		//deleting all comments information
		//$sql15="SELECT id FROM answerstable WHERE answerForQuestionId='$questionId'";
		//$result15=mysqli_query($conn,$sql15);
		$stmt= $conn->prepare("SELECT id FROM answerstable WHERE answerForQuestionId=?");
		$stmt-> bind_param("d",$QID);
		$QID=$questionId;
		$stmt->execute();
		$result15=$stmt->get_result();
		while($row15=mysqli_fetch_assoc($result15)){

			$answerId=mysqli_real_escape_string($conn,$row15['id']);

			//$sql111="SELECT answerMemeDestination FROM answerstable WHERE id='$answerId'";
			//$result111=mysqli_query($conn,$sql111);
			$stmt= $conn->prepare("SELECT answerMemeDestination FROM answerstable WHERE id=?");
			$stmt-> bind_param("d",$AID);
			$AID=$answerId;
			$stmt->execute();
			$result111=$stmt->get_result();

			$row111=mysqli_fetch_assoc($result111);
			$answerMemeDestination=mysqli_real_escape_string($conn,$row111['answerMemeDestination']);

			if($answerMemeDestination!=""){
				//deleting the file from the folder
				$realfilepath=realpath($answerMemeDestination);
				unlink($realfilepath);
			}

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
				$replyId=mysqli_real_escape_string($conn,$row3['id']);
				/*$sql4="DELETE FROM replylikestable WHERE replyId='$replyId'";
				$result4=mysqli_query($conn,$sql4);*/

				//$sql121="SELECT replyMemeDestination FROM answerrepliestable WHERE id='$replyId'";
				//$result121=mysqli_query($conn,$sql121);
				$stmt= $conn->prepare("SELECT replyMemeDestination FROM answerrepliestable WHERE id=?");
				$stmt-> bind_param("d",$RID);
				$RID=$replyId;
				$stmt->execute();
				$result121=$stmt->get_result();

				$row121=mysqli_fetch_assoc($result121);
				$replyMemeDestination=mysqli_real_escape_string($conn,$row121['replyMemeDestination']);

				if($replyMemeDestination!=""){
					//deleting the file from the folder
					$realfilepath=realpath($replyMemeDestination);
					unlink($realfilepath);
				}
			}

			//now deleting all the replies for this comment from the repliestable
			//$sql5="DELETE FROM answerrepliestable WHERE replyToAnswerId='$answerId'";
			//$result5=mysqli_query($conn,$sql5);
			$stmt= $conn->prepare("DELETE FROM answerrepliestable WHERE replyToAnswerId=?");
			$stmt-> bind_param("d",$AID);
			$AID=$answerId;
			$stmt->execute();
			$result5=$stmt->get_result();

		}

		if($memeDestination!=""){
			//deleting the file from the folder
			$realfilepath=realpath($memeDestination);
			unlink($realfilepath);
		}


		echo $askerId;
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