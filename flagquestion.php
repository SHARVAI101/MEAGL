<?php

session_start();

include 'dbh.php';

$questionId=mysqli_real_escape_string($conn,$_POST['questionId']);
$flagType=mysqli_real_escape_string($conn,$_POST['downvote']);

$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

$sql="UPDATE questionstable SET flags=flags+1 WHERE id='$questionId'";
$result=mysqli_query($conn,$sql);

$sql1="INSERT INTO question_flags_table (questionId, flaggerUserId, flagType) VALUES ('$questionId','$userId','$flagType')";
$result1=mysqli_query($conn,$sql1);

echo "success";