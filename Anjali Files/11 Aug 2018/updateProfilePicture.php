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
if(isset($_SESSION['id'])){
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
}



if($_FILES['profilePicture']['size']!=0) {
	//means there is a file selected
	$file_size=$_FILES['profilePicture']['size'];//gets size of the file in BYTES
	if($file_size<6000000){//max file size is 6MB
		$file_name=$_FILES['profilePicture']['name'];//gets the name of the profilePicture(that is the name that was there during uploading the profilePicture)
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);//this amazing function gets the extension of the image(profilePicture) file e.g. "jpg","png" without the dot before the extension i.e., ".jpg",".png"..this dot has to be added later on
		if($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "gif" ){
			
			$file_type=$_FILES['profilePicture']['type'];//gets file type
			$file_tmp_name=$_FILES['profilePicture']['tmp_name'];//gets the temporary location where the profilePicture is saved before it is moved to the desired directory

			if($file_name){

				//here we move the profilePicture to the desired location and change the image name to profilePicture
				$filepath="users/".$_SESSION['username']."/profilepicture/profilePicture.$ext";
				move_uploaded_file($file_tmp_name, $filepath);	


				//resizing the image
				//list($width, $height) = getimagesize($filepath);
				// Loading the image and getting the original dimensions
				$image = imagecreatefromjpeg($filepath);
				$width=300;
				$orig_width = imagesx($image);
				$orig_height = imagesy($image);

				// Calc the new height
				$height = (($orig_height * $width) / $orig_width);

				// Create new image to display
				$new_image = imagecreatetruecolor($width, $height);

				// Create new image with changed dimensions
				imagecopyresampled($new_image, $image,
					0, 0, 0, 0,
					$width, $height,
					$orig_width, $orig_height);

				if($ext == "jpg" || $ext == "jpeg"){
					if($ext=="jpg")
						imagejpeg($new_image, "users/".$_SESSION['username']."/profilepicture/profilePicture.jpg");
					else
						imagejpeg($new_image, "users/".$_SESSION['username']."/profilepicture/profilePicture.jpeg");
				}
				else if($ext == "png"){
					imagepng($new_image, "users/".$_SESSION['username']."/profilepicture/profilePicture.png");
				}
				else{
					imagegif($new_image, "users/".$_SESSION['username']."/profilepicture/profilePicture.gif");
				}

				$_SESSION['profilePictureLocation']=$filepath;

				$sql="UPDATE memberstable SET profilePictureLocation='$filepath' WHERE id='$userId'";
				$result=mysqli_query($conn,$sql);

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

?>

