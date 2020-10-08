<?php
session_start();
//<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 	
//<script type="text/javascript" src="general.js"></script> 
?> 

<?php

include 'dbh.php';
include 'functions.php';

$email=mysqli_real_escape_string($conn,$_POST['payee_email']);
$paypalAccountType=mysqli_real_escape_string($conn,$_POST['paypalAccountType']);
$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

//echo $email.' '.$paypalAccountType.' '.$userId;

/*$sql="UPDATE memberstable SET (paypalEmail=? & paypalAccountCountry=? & verified=?) WHERE id=?";
$stmt= $conn->prepare($sql);
echo $stmt;
$stmt-> bind_param("sddd",$PPEMAIL,$PPACCTYPE,$VERIFIED,$ID);
$PPEMAIL=$email;
$PPACCTYPE=$paypalAccountType;
$VERIFIED=1;
$ID=$userId;
$stmt->execute();*/
//UPDATE `memberstable` SET `verified`=1,`paypalEmail`='elonmusk@gmail.com',`paypalAccountCountry`=1 WHERE `id`=3

$sql="UPDATE memberstable SET verified=1,paypalEmail='$email',paypalAccountCountry='$paypalAccountType' WHERE id='$userId'";
$result=mysqli_query($conn,$sql);


echo "success";