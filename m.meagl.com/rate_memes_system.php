<?php
session_start();

include 'dbh.php';

if(isset($_SESSION['id']))
{

	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

	if(isset($_POST['meme_rating']) && isset($_POST['memeId']))
	{
		$memeId=mysqli_real_escape_string($conn,$_POST['memeId']);
		$rating=mysqli_real_escape_string($conn,$_POST['meme_rating']);

		$sql="INSERT INTO pewds_meme_ratings_table (pewds_memeId, score, scored_by_userId) VALUES ('$memeId','$rating','$userId')";
		$result=mysqli_query($conn,$sql);

		//calculating the average
		$total_ratings=0;
		$total_score=0;
		$sql1="SELECT score FROM pewds_meme_ratings_table WHERE pewds_memeId='$memeId'";
        $result1=mysqli_query($conn,$sql1);
        while($row1=mysqli_fetch_assoc($result1)){
            $total_score+=$row1['score'];
            $total_ratings+=1;
        }

        $avg_score=number_format((float)$total_score/$total_ratings,2,'.',',');

        $re=array('memeId'=>$memeId, 'total_ratings'=>$total_ratings, 'avg_score'=>$avg_score, 'user_rating'=>$rating);

        $sql2="UPDATE pewds_memes_table SET score='$avg_score',total_ratings='$total_ratings' WHERE id='$memeId'";
        $result2=mysqli_query($conn,$sql2);

		echo json_encode($re);
	}
}
else
{
	echo 'login error';
}
?>
