<?php

session_start();

include 'dbh.php';

$status=mysqli_real_escape_string($conn,$_POST['status']);
$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
$sql="UPDATE memberstable SET userStatus='$status' WHERE id='$userId'";
$result=mysqli_query($conn,$sql);
echo "success";
