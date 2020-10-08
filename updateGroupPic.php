<?php 
session_start();
include 'dbh.php';
include_once 'functions.php';
/*if(isset($_SESSION['id'])){
	echo '<a href="userprofile.php">Back to profile page</a>';
}
else{
	echo '<a href="index.php">Back to home page</a>';
}*/
$startTime = microtime(true);
if(isset($_POST['groupId'])){

	if(isset($_SESSION['id'])){
		$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
	}

	$groupId=mysqli_real_escape_string($conn,$_POST['groupId']);


	if($_FILES['groupPic']['size']!=0) {
		//means there is a file selected
		$file_size=$_FILES['groupPic']['size'];//gets size of the file in BYTES
		if($file_size<6000000){//max file size is 6MB
			$file_name=$_FILES['groupPic']['name'];//gets the name of the groupPic(that is the name that was there during uploading the groupPic)
			$ext = pathinfo($file_name, PATHINFO_EXTENSION);//this amazing function gets the extension of the image(groupPic) file e.g. "jpg","png" without the dot before the extension i.e., ".jpg",".png"..this dot has to be added later on
			if($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "gif" ){
				
				$file_type=$_FILES['groupPic']['type'];//gets file type
				$file_tmp_name=$_FILES['groupPic']['tmp_name'];//gets the temporary location where the groupPic is saved before it is moved to the desired directory

				if($file_name){
					//here we move the groupPic to the desired location and change the image name to groupPic
					$filepath="groups/group".$groupId."/groupPic/groupPic.$ext";
					move_uploaded_file($file_tmp_name, $filepath);	

					$sql6="UPDATE groups_table SET groupPicLocation='$filepath' WHERE id='$groupId'";
					$result6=mysqli_query($conn,$sql6);
					echo $filepath;
				}

			}
			else{
				echo "wrong file type";
			}
		}else{
			echo "file too large";
		}
	}else
	{
		echo "no file selected";
	}
}

?>

