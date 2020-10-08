<?php

session_start();

include 'dbh.php';

//this gets the date and time that it was posted
$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);
$question=mysqli_real_escape_string($conn,$_POST['question']);


if(isset($_POST['question']) && $_POST['question']!=''){
//if the question statement box is not empty
	if($_FILES['meme']['size']!=0) {
		//means there is a file selected
		
		$file_size=$_FILES['meme']['size'];//gets size of the file in BYTES
		if($file_size<6000000){//max file size is 6MB
			$file_name=$_FILES['meme']['name'];//gets the name of the meme(that is the name that was there during uploading the meme)
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);//this amazing function gets the extension of the image(meme) file e.g. "jpg","png" without the dot before the extension i.e., ".jpg",".png"..this dot has to be added later on
			if($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "gif" ){
													
				$file_type=$_FILES['meme']['type'];//gets file type
					
				$file_tmp_name=$_FILES['meme']['tmp_name'];//gets the temporary location where the meme is saved before it is moved to the desired directory
				//$category=$_POST['memecategory'];//gets category of the meme
					
				if($file_name){
					
						
					//updating the database table "memberstable" by adding one to the memesUploaded column
						
					$id=mysqli_real_escape_string($conn,$_SESSION['id']);
					$sql="UPDATE memberstable SET numberOfQuestionsAsked=(numberOfQuestionsAsked+1) 
							  WHERE id='$id'";
					$result=mysqli_query($conn,$sql);
				
					//inserting the information of the question into the questionstable
					$username=mysqli_real_escape_string($conn,$_SESSION['username']);
					//$datetime=$_POST['datetime'];
												
					$sql1="INSERT INTO questionstable (askerUsername, askerId, question, likes, datetime, numberOfAnswers) VALUES ('$username', '$id', '$question', 0, '$datetime' , 0)";
					$result1=mysqli_query($conn,$sql1);
					$lastInsertId = mysqli_insert_id($conn);//gets the id of the question that has just been inserted into the questionstable so that the user can be redirected to that page
					
					//here we move the questionmeme to the desired location and change the image name to the title of the meme so that it is simpler to find when it is to be displayed
					$filepath="users/".$_SESSION['username']."/questionMemes/question".$lastInsertId.".$ext";
					move_uploaded_file($file_tmp_name, $filepath);		

					$sql2="UPDATE questionstable SET memeDestination='$filepath' WHERE id='$lastInsertId'";
					$result2=mysqli_query($conn,$sql2);		

					echo $lastInsertId;
				}
					
					
			}
			else{
				echo "wrong file type";
			}
		}
		else{
			echo "file too large";
		}
		
	}
	else{
		echo "no file selected";
	}
}
else{
	echo "no question statement";
}
?>





