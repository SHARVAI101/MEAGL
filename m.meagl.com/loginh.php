<?php

session_start();

include 'dbh.php';
date_default_timezone_set('Asia/Kolkata');//setting the timezone
$datetime=date('Y-m-d H:i:s');

$email=mysqli_real_escape_string($conn,$_POST['email']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
if($email!="" && $pwd!=""){

	if(isset($_POST['lastpage'])){
		$lastpage=$_POST['lastpage'];
		//echo '<script language="javascript">alert("last page ala!!!!!!!!!!!!!="'.$lastpage.')</script>';
	}
	//$sql= "SELECT * FROM memberstable WHERE email='$email' AND pwd='$pwd'";
	//$result=mysqli_query($conn,$sql);

	/*$stmt= $conn->prepare("SELECT * FROM memberstable WHERE email=? AND pwd=?");
	$stmt-> bind_param("ss",$EMAIL,$PWD);
	$EMAIL=$email;
	$PWD=$pwd;
	$stmt->execute();
	$result=$stmt->get_result();*/

	$stmt= $conn->prepare("SELECT * FROM memberstable WHERE email=?");
	$stmt-> bind_param("s",$EMAIL);
	$EMAIL=$email;
	$stmt->execute();
	$result=$stmt->get_result();

	if(!$row=mysqli_fetch_assoc($result)){
		echo "login error";		
	} 
	else{

		$db_pwd=$row['pwd'];

		if(password_verify($pwd, $db_pwd)) {

			$_SESSION['id']=$row['id'];
			$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
			$_SESSION['username']=$row['username'];
			//declaring session variables
			$_SESSION['memesUploaded']=$row['memesUploaded'];
			$_SESSION['numberofSubscribers']=$row['numberofSubscribers'];
			$_SESSION['numberOfQuestionsAsked']=$row['numberOfQuestionsAsked'];
			$_SESSION['profilePictureLocation']=$row['profilePictureLocation'];

			//updating last login
			$sql2="UPDATE memberstable SET lastLoginDateTime='$datetime' WHERE id='$userId'";
			$result2=mysqli_query($conn,$sql2);

			//redirecting to the userprofiles page
			
			//header("Location: userprofile.php");
			if(isset($lastpage)){
				//echo '<script language="javascript">alert("lastpage if")</script>';
				echo htmlentities($lastpage);
			}
			else{
				//echo '<script language="javascript">alert("lastpage else")</script>';
				echo "userprofile.php?id=".$row['id'];
			}
		}
		else
		{
			echo "login error";
		}
	}
}
else{
	echo "not all filled";
}

