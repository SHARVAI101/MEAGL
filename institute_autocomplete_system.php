<?php

session_start();

include 'dbh.php';

if(isset($_POST['inst']))
{
	$inst=mysqli_real_escape_string($conn,$_POST['inst']);

	$suggestion='';

	$sql="SELECT institute FROM memberstable WHERE institute LIKE '%$inst%'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{	
		$s[]=$row['institute'];
	}
	$s=array_unique($s);//removes duplicate entries from the suggestions' array

	foreach($s as $sug){
		$suggestion.='<p class="institute_suggestions">'.$sug.'</p><hr>';
	}

	echo $suggestion;
}