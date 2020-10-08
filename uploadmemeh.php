<?php

session_start();

include 'dbh.php';
include 'functions.php';

ini_set('max_execution_time', 300); //setting the maximum execution time for mail sending

//this gets the title of the meme
$memeTitle=str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($_POST['memeTitle'] ) );
//this gets the date and time that it was posted
$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);

if(isset($_SESSION['id'])){
	//if the user has logged in 
	if($_FILES['meme']['size']!=0) {
		//means there is a file selected
		if($memeTitle!=''){
			//if the user has entered a title for the meme
			$file_size=$_FILES['meme']['size'];//gets size of the file in BYTES
			if($file_size<6000000){//max file size is 6MB
				$file_name=$_FILES['meme']['name'];//gets the name of the meme(that is the name that was there during uploading the meme)
				$ext = pathinfo($file_name, PATHINFO_EXTENSION);//this amazing function gets the extension of the image(meme) file e.g. "jpg","png" without the dot before the extension i.e., ".jpg",".png"..this dot has to be added later on
				if($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "gif" ){
				
					if(isset($_POST['memecategory']) && $_POST['memecategory']!="selectCategory"){		
						
						//if(isset($_POST['meme_sharing_groupId']) || isset($_POST['meme_sharing_userId']) || isset($_POST['share_meme_with_theWorld']))
						//{

							if(isset($_POST['language']))
							{
								//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
								$file_type=$_FILES['meme']['type'];//gets file type
								
								$file_tmp_name=$_FILES['meme']['tmp_name'];//gets the temporary location where the meme is saved before it is moved to the desired directory
								$category=mysqli_real_escape_string($conn,$_POST['memecategory']);//gets category of the meme
								
								if($file_name){
												
									
									//updating the database table "memberstable" by adding one to the memesUploaded column
									//$_SESSION['memesUploaded']+=1;
									//$memesUploaded=$_SESSION['memesUploaded'];

									$notifications=array();
									
									$id=mysqli_real_escape_string($conn,$_SESSION['id']);
									$sql="UPDATE memberstable SET memesUploaded=(memesUploaded+1) 
										  WHERE id='$id'";
									$result=mysqli_query($conn,$sql);
							
									//inserting the information of the meme into the memestable
									$username=mysqli_real_escape_string($conn,$_SESSION['username']);
									//$datetime=$_POST['datetime'];
									if(isset($_POST['memedescription'])){
										$memeDescription=mysqli_real_escape_string($conn,$_POST['memedescription']);
									}else{
										$memeDescription="No description for this meme!";
									}

									$language=mysqli_real_escape_string($conn,$_POST['language']);

									$sql12="UPDATE memecategoriestable SET totalMemesForThisCategory=(totalMemesForThisCategory+1) WHERE memeCategory='$category'";
									$result12=mysqli_query($conn,$sql12);

									$sql1="INSERT INTO memestable (uploader, uploaderId, memetitle, memeCategory, language, datetime, memeDescription) VALUES ('$username', '$id', '$memeTitle', '$category', '$language', '$datetime' ,'$memeDescription')";
									$result1=mysqli_query($conn,$sql1);
									$memeId = mysqli_insert_id($conn);//gets the id of the meme that has just been inserted into the memestable so that the user can be redirected to that page
									
									//here we move the meme to the desired location and change the image name to the id of the meme so that it is simpler to find when it is to be displayed
									$filepath="users/".mysqli_real_escape_string($conn,$_SESSION['username'])."/memes/".$memeId.".$ext";
									move_uploaded_file($file_tmp_name, $filepath);

									////////////////////////////////////////////////////////////////////////
									//Resizing the image

									$image = imagecreatefromjpeg($filepath);
									$width=600;
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
											imagejpeg($new_image, "users/".mysqli_real_escape_string($conn,$_SESSION['username'])."/memes/".$memeId.".jpg");
										else
											imagejpeg($new_image, "users/".mysqli_real_escape_string($conn,$_SESSION['username'])."/memes/".$memeId.".jpeg");
									}
									else if($ext == "png"){
										imagepng($new_image, "users/".mysqli_real_escape_string($conn,$_SESSION['username'])."/memes/".$memeId.".png");
									}
									else{
										imagegif($new_image, "users/".mysqli_real_escape_string($conn,$_SESSION['username'])."/memes/".$memeId.".gif");
									}

									////////////////////////////////////////////////////////

									$sql12="UPDATE memestable SET memeDestination='$filepath' WHERE id='$memeId'";
									$result12=mysqli_query($conn,$sql12);

									//echo "world=".isset($_POST['share_meme_with_theWorld']);
									//echo "user=".isset($_POST['meme_sharing_userId']);
									//echo "group=".isset($_POST['meme_sharing_groupId']);
									//if(isset($_POST['share_meme_with_theWorld'])){
										//echo "3or1";
										/*if(isset($_POST['meme_sharing_groupId']) || isset($_POST['meme_sharing_userId'])){
											$sql="UPDATE memestable SET visibilityStatus=3 WHERE id='$memeId'";
											$result=mysqli_query($conn,$sql);
										}else{*/
											//echo "1";
											$sql="UPDATE memestable SET visibilityStatus=1 WHERE id='$memeId'";
											$result=mysqli_query($conn,$sql);
										//}

										//notifications for all subscribers
										$sql01="SELECT subscribedById FROM subscriberstable WHERE uploaderId='$id'";
										$result01=mysqli_query($conn,$sql01);
										while($row01=mysqli_fetch_assoc($result01)){
											$subId=$row01['subscribedById'];

											$notificationString=htmlentities($username).' has uploaded a meme "<i>'.htmlentities($memeTitle).'</i>" (from Subscriptions)';
											$notificationType="memeUpload";

											$sub_notification=array();
											$sub_notification['senderId']=$id;
											$sub_notification['receiverId']=$subId;
											$sub_notification['notificationType']=$notificationType;
											$sub_notification['notification']=$notificationString;
											$sub_notification['datetime']=$datetime;
											$sub_notification['notificationForEventId']=$memeId;
											$sub_notification['viewingStatus']=0;
											$sub_notification['notificationLink']='imagedisplay.php?id='.htmlentities($memeId).'&world=1&uid=0&gid=0';

											$notifications[]=$sub_notification;
										}


									//}
									/*else if(isset($_POST['meme_sharing_groupId']) || isset($_POST['meme_sharing_userId'])){
										//echo "2";
										$sql33="UPDATE memestable SET visibilityStatus=2 WHERE id='$memeId'";
										$result33=mysqli_query($conn,$sql33);
									}*/
									
									/*if(isset($_POST['meme_sharing_groupId'])){
										//entering meme shared with group info
										foreach($_POST['meme_sharing_groupId'] as $groupId){
											$sql="INSERT INTO meme_sharing_visibility_table (uploaderId,imageId,userId,groupId,memeUploadDateTime) VALUES ('$id','$memeId','0','$groupId','$datetime')";
											$result=mysqli_query($conn,$sql);
											$sql1="UPDATE groups_table SET lastActivityDateTime='$datetime' WHERE id='$groupId'";
											$result1=mysqli_query($conn,$sql1);

											$sql02="SELECT participantId,groupname FROM group_participants_table WHERE groupId='$groupId' AND participantId!='$id' AND participantStatus!=3 AND invitationStatus=1";
											$result02=mysqli_query($conn,$sql02);
											while($row02=mysqli_fetch_assoc($result02)){
												$pId=$row02['participantId'];
												$groupname=$row02['groupname'];

												$notificationString=htmlentities($username).' has uploaded a meme "<i>'.htmlentities($memeTitle).'</i>" (in the group '.htmlentities($groupname).')';
												$notificationType="memeUpload";

												$p_notification=array();
												$p_notification['senderId']=$id;
												$p_notification['receiverId']=$pId;
												$p_notification['notificationType']=$notificationType;
												$p_notification['notification']=$notificationString;
												$p_notification['datetime']=$datetime;
												$p_notification['notificationForEventId']=$memeId;
												$p_notification['viewingStatus']=0;
												$p_notification['notificationLink']='imagedisplay.php?id='.htmlentities($memeId).'&world=0&uid=0&gid='.htmlentities($groupId);

												$notifications[]=$p_notification;
											}
										}

									}
									if(isset($_POST['meme_sharing_userId'])){
										//entering meme shared with user info
										foreach($_POST['meme_sharing_userId'] as $userId){
											echo $id.'<br>';
											$sql="INSERT INTO meme_sharing_visibility_table (uploaderId,imageId,userId,groupId,memeUploadDateTime) VALUES ('$id','$memeId','$userId','0','$datetime')";
											$result=mysqli_query($conn,$sql);
											$sql1="UPDATE friends_table SET lastActivityDateTime='$datetime' WHERE (sender_user_id='$id' AND receiver_user_id='$userId') OR (sender_user_id='$userId' AND receiver_user_id='$id')";
											$result1=mysqli_query($conn,$sql1);

											$sql03="SELECT * FROM friends_table WHERE ((sender_user_id='$id' AND receiver_user_id='$userId') OR (receiver_user_id='$id' AND sender_user_id='$userId')) AND relation=1";
											$result03=mysqli_query($conn,$sql03);								
					
											while($row03=mysqli_fetch_assoc($result03)){
												
												$senderId=$row03['sender_user_id'];
												$receiverId=$row03['receiver_user_id'];

												if($id==$senderId){
													//means the receiver is the friend
													$pId=$receiverId;
												}else{
													//means the sender is the friend
													$pId=$senderId;												
												}
												
												$notificationString=htmlentities($username).' has uploaded a meme "<i>'.htmlentities($memeTitle).'</i>" (in friends)';
												$notificationType="memeUpload";

												$p_notification=array();
												$p_notification['senderId']=$id;
												$p_notification['receiverId']=$pId;
												$p_notification['notificationType']=$notificationType;
												$p_notification['notification']=$notificationString;
												$p_notification['datetime']=$datetime;
												$p_notification['notificationForEventId']=$memeId;
												$p_notification['viewingStatus']=0;
												$p_notification['notificationLink']='imagedisplay.php?id='.htmlentities($memeId).'&world=0&uid='.htmlentities($pId).'&gid=0';

												$notifications[]=$p_notification;
											}
										}
									}*/

									//removing duplicate entries
									$notifications = removeDuplicateArrayEntry($notifications, 'receiverId');
									$e=array();

									foreach ($notifications as $note) {
										$senderId=$note['senderId'];
										$receiverId=$note['receiverId'];
										$notificationType=$note['notificationType'];
										$notificationString=$note['notification'];
										$notificationLink=$note['notificationLink'];
										$datetime=$note['datetime'];
										$notificationForEventId=$note['notificationForEventId'];
										$viewingStatus=$note['viewingStatus'];

										$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$senderId','$receiverId','$notificationType','$notificationString','$notificationLink',0,'$datetime','$notificationForEventId')";
										$result4=mysqli_query($conn,$sql4);

										//sending notifications to all users that are being notified
										$sqle="SELECT email FROM memberstable WHERE id='$receiverId'";
										$resulte=mysqli_query($conn,$sqle);
										$rowe=mysqli_fetch_assoc($resulte);
										$emailId=$rowe['email'];
										$e[]=$emailId;
										$to      = $emailId;
										$subject = $username.' has just posted a new meme!';
										$message = '<html>
													<body>
														<img src="http://www.meagl.com/logo/m_2.png" style="width:100%; height:auto;"><br>
														<p style="font-size:20px">'.$username.' has just uploaded a new meme! You can check it out right here: <a href="http://www.meagl.com/'.$notificationLink.'"><i>'.$memeTitle.'</i></a></p> 
													</body>
													</html>';
										
										$headers = 'From: MEAGL<support@meagl.com>' . "\r\n" .
										    'Reply-To: support@meagl.com' . "\r\n" .
										    'X-Mailer: PHP/' . phpversion()."\r\n";
										$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";

										//mail($to, $subject, $message, $headers);
									}
									//$address=$memeId.'?world='..'&uid='..'&gid=';//address of the meme to go to
									echo $memeId.'&world=1&uid=0&gid=0';
									//print_r($note);
									
								}

								//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
							}
							else{
								echo 'language not chosen';
							}
						//}
						//else{
						//	echo "meme sharing options not chosen";
						//}
					}
					else{
						echo "category not selected";
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
			echo "no meme title";
		}
	}
	else{
		echo "no file selected";
	}

}
else{
	echo "not logged in";
}
?>





