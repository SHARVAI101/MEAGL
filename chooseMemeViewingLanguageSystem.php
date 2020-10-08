<?php
session_start();

include 'dbh.php';

$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

if(isset($_POST['english']) || isset($_POST['hinglish']))
{	
	if(isset($_POST['english'])){
		$english=mysqli_real_escape_string($conn,$_POST['english']);

		$sql="SELECT viewerId FROM english_meme_viewers WHERE viewerId='$userId'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==0){
			$sql="INSERT INTO english_meme_viewers (viewerId) VALUES ('$userId')";
			$result=mysqli_query($conn,$sql);
		}
	}else{
		$sql="SELECT viewerId FROM english_meme_viewers WHERE viewerId='$userId'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)!=0){
			$sql="DELETE FROM english_meme_viewers WHERE viewerId='$userId'";
			$result=mysqli_query($conn,$sql);
		}
	}
	
	if(isset($_POST['hinglish'])){
		$hinglish=mysqli_real_escape_string($conn,$_POST['hinglish']);

		$sql="SELECT viewerId FROM hinglish_meme_viewers WHERE viewerId='$userId'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==0){
			$sql="INSERT INTO hinglish_meme_viewers (viewerId) VALUES ('$userId')";
			$result=mysqli_query($conn,$sql);
		}
	}else{
		$sql="SELECT viewerId FROM hinglish_meme_viewers WHERE viewerId='$userId'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)!=0){
			$sql="DELETE FROM hinglish_meme_viewers WHERE viewerId='$userId'";
			$result=mysqli_query($conn,$sql);
		}
	}

	echo 'success';
}
else{	
	echo "no selection";
}
?>
