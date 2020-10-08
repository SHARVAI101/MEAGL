<?php
session_start();

include 'dbh.php';

if(isset($_POST['reply']) && isset($_POST['replyId']))
{
	$reply=mysqli_real_escape_string($conn,$_POST['reply']);
	$replyId=mysqli_real_escape_string($conn,$_POST['replyId']);
	$sql="UPDATE repliestable SET reply='$reply' WHERE id='$replyId'";//updating database 
	$result=mysqli_query($conn,$sql);
}
?>
