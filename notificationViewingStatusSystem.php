<?php

session_start();

include 'dbh.php';

$receiverId=mysqli_real_escape_string($conn,$_SESSION['id']);

$sql="UPDATE notifications_table SET viewingStatus='1' WHERE receiverId='$receiverId'";
$result=mysqli_query($conn,$sql);
echo "success";
