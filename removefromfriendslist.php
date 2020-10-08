<?php

session_start();

include 'dbh.php';

$friend_request_id=mysqli_real_escape_string($conn,$_POST['friend_request_id']);

$sql="DELETE FROM friends_table WHERE id='$friend_request_id'";
$result=mysqli_query($conn,$sql);

echo "success";