<?php

session_start();

include 'dbh.php';

$imageId=mysqli_real_escape_string($conn,$_POST['imageId']);
$flagType=mysqli_real_escape_string($conn,$_POST['downvote']);
$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

$sql="UPDATE memestable SET flags=flags+1 WHERE id='$imageId'";
$result=mysqli_query($conn,$sql);

$sql1="INSERT INTO image_flags_table (imageId, flaggerUserId, flagType) VALUES ('$imageId','$userId','$flagType')";
$result1=mysqli_query($conn,$sql1);

echo "success";