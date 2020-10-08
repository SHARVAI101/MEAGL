<?php

session_start();

include 'dbh.php';

if($_POST['password1']===$_POST['password2'])
{
	$pwd=mysqli_real_escape_string($conn,$_POST['password1']);
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	$pwd=password_hash($pwd, PASSWORD_DEFAULT);

	$sql="UPDATE memberstable SET pwd='$pwd' WHERE id='$userId'";
	$result=mysqli_query($conn,$sql);

	echo "success";
}
else
{
	echo 'passwords dont match';
}