<?php
session_start();

include 'dbh.php';

if(isset($_POST['comment']) && isset($_POST['commentId']))
{
	$comment=mysqli_real_escape_string($conn,$_POST['comment']);
	$commentId=mysqli_real_escape_string($conn,$_POST['commentId']);
	$sql="UPDATE commentstable SET comment='$comment' WHERE id='$commentId'";//updating database 
	$result=mysqli_query($conn,$sql);
}
else{	
	header("LOCATION: signup.php");//here we need to develop redirecting back to original page from where the user was sent to the signup page
}
?>
