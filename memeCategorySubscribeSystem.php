<?php

session_start();

include 'dbh.php';

if(isset($_SESSION['id'])){
	//this code segment will be executed if the user has logged in
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
	
	$memecategory=mysqli_real_escape_string($conn,$_POST['memecategory']);//the uploader id
	$flag=true;//flag to see if user has already subscribed to an uploader
	$flag1=true;//flag to see if the user is subscribing to himself

	if($memecategory=="Savage"){
		$tableName="savagememessubscriberstable";
	}else if($memecategory=="Sports"){
		$tableName="sportsmemessubscriberstable";
	}else if($memecategory=="Gaming"){
		$tableName="gamingmemessubscriberstable";
	}else if($memecategory=="Comics"){
		$tableName="comicmemessubscriberstable";
	}else if($memecategory=="Celeb"){
		$tableName="celebmemessubscriberstable";
	}else if($memecategory=="College / School"){
		$tableName="collegememessubscriberstable";
	}else if($memecategory=="Politics"){
		$tableName="politicsmemessubscriberstable";
	}else if($memecategory=="Just My Thoughts"){
		$tableName="justmythoughtsmemessubscriberstable";
	}else if($memecategory=="Other"){
		$tableName="othermemessubscriberstable";
	}

	$sql="SELECT totalSubscribers FROM memecategoriestable WHERE memeCategory='$memecategory'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row['totalSubscribers']==mysqli_real_escape_string($conn,$_POST['memeCategorySubscribers'])){
		//now checking if the user is subscribing to someone he has already subscribed before
		$sql= "SELECT subscribedByUserId FROM $tableName WHERE subscribedByUserId='$userId'";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_assoc($result)){
			//that is, if the user has already subscribed to this meme category 

			//here, is the user subscribing actual code
			$memeCategorySubscribers=mysqli_real_escape_string($conn,$_POST['memeCategorySubscribers'])-1;//incrementing number of subscribers
			$sql1="UPDATE memecategoriestable SET totalSubscribers='$memeCategorySubscribers' 
				  WHERE memeCategory='$memecategory'";//updating database 
			$result1=mysqli_query($conn,$sql1);
			//user subscribing info into memeCategorySubscribersTable			
			$sql2="DELETE FROM $tableName WHERE subscribedByUserId='$userId'";
			$result2=mysqli_query($conn,$sql2);

			echo htmlentities($memeCategorySubscribers);//sending back info to allmemes.php
		}
		else{
			//user has not already subscribed

			//here, is the user subscribing actual code
			$memeCategorySubscribers=mysqli_real_escape_string($conn,$_POST['memeCategorySubscribers'])+1;//incrementing number of subscribers
			$sql1="UPDATE memecategoriestable SET totalSubscribers='$memeCategorySubscribers' 
				  WHERE memeCategory='$memecategory'";//updating database 
			$result1=mysqli_query($conn,$sql1);
			//user subscribing info into memecategorysubscriberstable			
			$sql2="INSERT INTO $tableName (subscribedByUserId) VALUES ('$userId')";
			$result2=mysqli_query($conn,$sql2);

			echo htmlentities($memeCategorySubscribers);//sending back info to allmemes.php
		}
	}
	else{
		echo "subs not matching error";
	}
		
}
else{
	echo 'login error';
}

