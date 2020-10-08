<?php
session_start();

include 'dbh.php';
include_once 'functions.php';
//echo "file la pohcla";
if(isset($_SESSION['id'])){//if user has logged in	
	if(isset($_POST['datetime']) && isset($_POST['answerId']) && isset($_POST['numberOfRepliesActual']))
	{
		//echo "all set";
		if($_FILES['answerReplyMeme']['size']!=0) {
			//if a file is selected
			//echo "file selected";
			$file_size=$_FILES['answerReplyMeme']['size'];
			if($file_size<6000000){//max file size is 6MB

				$file_name=$_FILES['answerReplyMeme']['name'];//gets the name of the meme(that is the name that was there during uploading the meme)
				$ext = pathinfo($file_name, PATHINFO_EXTENSION);//this amazing function gets the extension of the image(meme) file e.g. "jpg","png" without the dot before the extension i.e., ".jpg",".png"..this dot has to be added later on
				if($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "gif" ){
					//if user has submitted the comment
					if(isset($_POST['answerreply'])){
						$answerreply=mysqli_real_escape_string($conn,$_POST['answerreply']);
					}
					else{
						$answerreply="";
					}
					//echo "file in";
					//if user has submitted the comment					
					$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);
					$answerId=mysqli_real_escape_string($conn,$_POST['answerId']);
					$username=mysqli_real_escape_string($conn,$_SESSION['username']);
					$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

					$file_type=$_FILES['answerReplyMeme']['type'];//gets file type
						
					$file_tmp_name=$_FILES['answerReplyMeme']['tmp_name'];//gets the temporary location where the meme is saved before it is moved to the desired directory
					
					$sql="INSERT INTO answerrepliestable (replyToAnswerId, replyByUserId, replyByUserName, likes, reply, datetime) VALUES ('$answerId', '$userId', '$username', 0, '$answerreply', '$datetime')";
					$result=mysqli_query($conn,$sql);

					$answerreplyId = mysqli_insert_id($conn);//this is done to fetch the id of the comment
					
					$answerReplyMemeName="answerId=".$answerId."answerreplyId=".$answerreplyId;

					//here we move the meme to the desired location and change the image name to the title of the meme so that it is simpler to find when it is to be displayed
					$filepath="users/".$_SESSION['username']."/answerReplyMemes/".$answerReplyMemeName.".$ext";
					move_uploaded_file($file_tmp_name, $filepath);	

					$sql1="UPDATE answerrepliestable SET replyMemeDestination='$filepath' WHERE id='$answerreplyId'";
					$result1=mysqli_query($conn,$sql1);					

					//$answerDivName="answerdiv".$answerId;

					//increment number of replies in answerstable 
					$numberOfReplies=mysqli_real_escape_string($conn,$_POST['numberOfRepliesActual'])+1;
					$sql="UPDATE answerstable SET numberOfReplies='$numberOfReplies' WHERE id='$answerId'";//updating database 
					$result=mysqli_query($conn,$sql);
										
					//echo '<hr style="border-top: dotted 5px;">';

					$answerreplydivname="answerreply_div".$answerreplyId;

					//updating notification
					$sql02="SELECT answer,answerByUserId,answerForQuestionId FROM answerstable WHERE id='$answerId'";//getting image title
					$result02=mysqli_query($conn,$sql02);
					$row02=mysqli_fetch_assoc($result02);
					$answerByUserId=$row02['answerByUserId'];
					$answerForQuestionId=$row02['answerForQuestionId'];	
					$answer=$row02['answer'];						

					if($answerByUserId!=$_SESSION['id']){
						//if the user is commenting on his own meme, then no notification
						date_default_timezone_set('Asia/Kolkata');//setting the timezone
						$datetime=date('Y-m-d H:i:s');			

						/*$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
						$result01=mysqli_query($conn,$sql01);
						$row01=mysqli_fetch_assoc($result01);
						$senderUsername=$row01['username'];*/
						$senderUsername=$username;

						$answerForNotification=(strlen($answer) > 13) ? substr($answer,0,10).'...' : $answer;
						
						//if($world==1){
						$notificationString=$senderUsername.' replied on your answer "<i>'.$answerForNotification.'</i>"';
						$notificationLink='questiondisplay.php?id='.$answerForQuestionId.'#'.$answerreplydivname;
						//}
						/*else if($sharedWithGroupId!=0){
							$sql="SELECT groupname FROM groups_table WHERE id='$sharedWithGroupId'";
							$result=mysqli_query($conn,$sql);
							$row=mysqli_fetch_assoc($result);
							$groupname=$row['groupname'];

							$notificationString='<a href="userprofile.php?id='.$userId.'">'.$senderUsername.'</a> replied on your comment <a href="imagedisplay.php?id='.$imageId.'&world='.$world.'&uid='.$sharedWithUserId.'&gid='.$sharedWithGroupId.'#'.$replydivname.'">"'.$commentForNotification.'"</a> (in the group <a href="groupspage.php?id='.$sharedWithGroupId.'">"'.$groupname.'"</a> in my Meagles)';
						}
						else{
							$notificationString='<a href="userprofile.php?id='.$userId.'">'.$senderUsername.'</a> replied on your comment <a href="imagedisplay.php?id='.$imageId.'&world='.$world.'&uid='.$sharedWithUserId.'&gid='.$sharedWithGroupId.'#'.$replydivname.'">"'.$commentForNotification.'"</a> (in my Meagles)';
						}*/

						$notificationType="answerReply";

						$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$userId','$answerByUserId','$notificationType','$notificationString','$notificationLink',0,'$datetime','$answerId')";
						$result4=mysqli_query($conn,$sql4);
					}

					/*echo '<div class="answerreply_div" id="'.htmlentities($answerreplydivname).'" style="margin-left: 50px;"> 
						  	<pre class="answerreply" id="reply'.htmlentities($answerreplyId).'" contenteditable="false">'.htmlentities($answerreply).'</pre>
						  	<img src="'.htmlentities($filepath).'" style="height:200px;width:200px;"><br>
						  	<p class="answerreplyUsername">Posted By:'.htmlentities($username).'</p>
						  	<p class="answerreplyDatetime">'.getTime($datetime).'</p>
						  	<p class="answerreplyLikes">Likes: 0</p>	
						  	';					  	
						  

					echo '<button type="submit" class="deleteanswerreplybutton" id="'.htmlentities($answerId).'" name="'.htmlentities($answerreplyId).'">Delete reply</button>';
					      	/*<button type="submit" class="editreplybutton" name="'.$answerreplyId.'">Edit reply</button>
					      	<button type="submit" class="updatereplybutton"  name="'.$answerreplyId.'" style="display:none">Update reply</button>
					      </div>	
						  ';*//*

					echo '</div>';		*/
					$answerreplylikesLabel="answerreplylikes".$answerreplyId;

					$sql5="SELECT profilePictureLocation FROM memberstable WHERE id='$userId'";
                    $result5=mysqli_query($conn,$sql5);
                    $row5=mysqli_fetch_assoc($result5);
                    $replyPPL=$row5['profilePictureLocation'];


					echo '
                        <div class="answerreply_div reply-comment" id="'.htmlentities($answerreplydivname).'" style="margin-left: 50px;">
                          <a href="userprofile.php?id="'.$userId.'">
                            <div class="comment-top">
                                <img src="'.$replyPPL.'" class="notif-dp" id="comment-dp">                          
                            </div>
                          </a>
                          <p class="reply-real-comment">
                          <span class="replyUsername"><a class="answerreplyUsername"><span id="dedicated-username">'.htmlentities($username).'</span></a></span>
                          <span class="answerreply reply" id="answerreply'.htmlentities($answerreplyId).'" contenteditable="false">'.htmlentities($answerreply).'</span></p>
                          <br>';
                    
                    echo '<img src="'.$filepath.'" style="max-width:700px"><br>
                            ';
                    echo '
                          <span class="answerreplyDatetime replyDatetime">'.getTime($datetime).'</span>
                          <span class="answerreplyLikes comment-reply-info" id="answerreplylikes'.htmlentities($answerreplyId).'">Likes: 0</span>';
                                    
                    echo '<a type="button" class="likeanswerreplybutton reply-like-link" onclick="answerreplylikeFunction(\''.htmlentities($answerreplyId).'\',\''.htmlentities($answerreplylikesLabel).'\');" id="answerreplylike'.htmlentities($answerreplyId).'"  name="'.htmlentities($answerreplyId).'">Like</a>
                          <p id="answerreplyLikeError'.htmlentities($answerreplyId).'" class="error-message"></p>';
                                    
                    echo '<button type="submit" class="deleteanswerreplybutton" id="'.htmlentities($answerId).'" name="'.htmlentities($answerreplyId).'">Delete reply</button>';
                                                    
                    echo '</div>';  
					exit;
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
			//without image upload

			if(isset($_POST['answerreply'])){
				$answerreply=mysqli_real_escape_string($conn,$_POST['answerreply']);
				$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);
				$answerId=mysqli_real_escape_string($conn,$_POST['answerId']);
				$username=$_SESSION['username'];
				$userId=$_SESSION['id'];
				
				$sql="INSERT INTO answerrepliestable (replyToAnswerId, replyByUserId, replyByUserName, likes, reply, datetime) VALUES ('$answerId', '$userId', '$username', 0, '$answerreply', '$datetime')";
				$result=mysqli_query($conn,$sql);
				$answerreplyId = mysqli_insert_id($conn);//this is done to fetch the id of the comment
								
				//increment number of replies in answerstable 
				$numberOfReplies=mysqli_real_escape_string($conn,$_POST['numberOfRepliesActual'])+1;
				$sql="UPDATE answerstable SET numberOfReplies='$numberOfReplies' WHERE id='$answerId'";//updating database 
				$result=mysqli_query($conn,$sql);
				//////////////////////////////////////////////
				/*$sql="INSERT INTO repliestable (replyToCommentId, replyByUserId, replyByUserName, likes, reply, datetime) VALUES ('$commentId', '$userId', '$username', 0, '$reply', '$datetime')";
				$result=mysqli_query($conn,$sql);
				$answerreplyId = mysqli_insert_id($conn);//gets the id of the last insertion into the repliestable
				$sql1= "SELECT numberOfReplies FROM commentstable WHERE id='$commentId'";
				$result1=mysqli_query($conn,$sql1);
				$row=mysqli_fetch_assoc($result1);
				$commentReplies=$row['numberOfReplies']+1;
				$sql2="UPDATE commentstable SET numberOfReplies='$commentReplies' WHERE id='$commentId'";//updating database 
				$result2=mysqli_query($conn,$sql2);*/
				//echo '<hr style="border-top: dotted 5px;">';
				$answerreplydivname="answerreply_div".$answerreplyId;

				//updating notification
				$sql02="SELECT answer,answerByUserId,answerForQuestionId FROM answerstable WHERE id='$answerId'";//getting image title
				$result02=mysqli_query($conn,$sql02);
				$row02=mysqli_fetch_assoc($result02);
				$answerByUserId=$row02['answerByUserId'];
				$answerForQuestionId=$row02['answerForQuestionId'];		
				$answer=$row02['answer'];			

				if($answerByUserId!=$_SESSION['id']){
					//if the user is commenting on his own meme, then no notification
					date_default_timezone_set('Asia/Kolkata');//setting the timezone
					$datetime=date('Y-m-d H:i:s');			

					/*$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
					$result01=mysqli_query($conn,$sql01);
					$row01=mysqli_fetch_assoc($result01);
					$senderUsername=$row01['username'];*/
					$senderUsername=$username;

					$answerForNotification=(strlen($answer) > 13) ? substr($answer,0,10).'...' : $answer;
						
					//if($world==1){
					$notificationString=$senderUsername.' replied on your answer "<i>'.$answerForNotification.'</i>"';
					$notificationLink='questiondisplay.php?id='.$answerForQuestionId.'#'.$answerreplydivname;
					//}
					/*else if($sharedWithGroupId!=0){
						$sql="SELECT groupname FROM groups_table WHERE id='$sharedWithGroupId'";
						$result=mysqli_query($conn,$sql);
						$row=mysqli_fetch_assoc($result);
						$groupname=$row['groupname'];

						$notificationString='<a href="userprofile.php?id='.$userId.'">'.$senderUsername.'</a> replied on your comment <a href="imagedisplay.php?id='.$imageId.'&world='.$world.'&uid='.$sharedWithUserId.'&gid='.$sharedWithGroupId.'#'.$replydivname.'">"'.$commentForNotification.'"</a> (in the group <a href="groupspage.php?id='.$sharedWithGroupId.'">"'.$groupname.'"</a> in my Meagles)';
					}
					else{
						$notificationString='<a href="userprofile.php?id='.$userId.'">'.$senderUsername.'</a> replied on your comment <a href="imagedisplay.php?id='.$imageId.'&world='.$world.'&uid='.$sharedWithUserId.'&gid='.$sharedWithGroupId.'#'.$replydivname.'">"'.$commentForNotification.'"</a> (in my Meagles)';
					}*/

					$notificationType="answerReply";

					$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$userId','$answerByUserId','$notificationType','$notificationString','$notificationLink',0,'$datetime','$answerId')";
					$result4=mysqli_query($conn,$sql4);
				}
				/*
				echo '<div class="answerreply_div" id="'.htmlentities($answerreplydivname).'" style="margin-left: 50px;"> 
					  	<pre class="answerreply" id="reply'.htmlentities($answerreplyId).'" contenteditable="false">'.htmlentities($answerreply).'</pre>
					  	<p class="answerreplyUsername">Posted By:'.htmlentities($username).'</p>
					  	<p class="answerreplyDatetime">'.getTime($datetime).'</p>
					  	<p class="answerreplyLikes">Likes: 0</p>
					  ';
					
				echo '<button type="submit" class="deleteanswerreplybutton" id="'.htmlentities($answerId).'" name="'.htmlentities($answerreplyId).'">Delete reply</button>';
					      	/*<button type="submit" class="editreplybutton" name="'.$answerreplyId.'">Edit reply</button>
					      	<button type="submit" class="updatereplybutton"  name="'.$answerreplyId.'" style="display:none">Update reply</button>
					      </div>	
						  ';*//*

				echo '</div>';	*/
				$answerreplylikesLabel="answerreplylikes".$answerreplyId;

				$sql5="SELECT profilePictureLocation FROM memberstable WHERE id='$userId'";
                $result5=mysqli_query($conn,$sql5);
                $row5=mysqli_fetch_assoc($result5);
                $replyPPL=$row5['profilePictureLocation'];

				echo '
                    <div class="answerreply_div reply-comment" id="'.htmlentities($answerreplydivname).'" style="margin-left: 50px;">
                      <a href="userprofile.php?id="'.$userId.'">
                        <div class="comment-top">
                            <img src="'.$replyPPL.'" class="notif-dp" id="comment-dp">                          
                        </div>
                      </a>
                      <p class="reply-real-comment">
                      <span class="replyUsername"><a class="answerreplyUsername"><span id="dedicated-username">'.htmlentities($username).'</span></a></span>
                      <span class="answerreply reply" id="answerreply'.htmlentities($answerreplyId).'" contenteditable="false">'.htmlentities($answerreply).'</span></p>
                      <br>';
                                   
                echo '
                      <span class="answerreplyDatetime replyDatetime">'.getTime($datetime).'</span>
                      <span class="answerreplyLikes comment-reply-info" id="answerreplylikes'.htmlentities($answerreplyId).'">Likes: 0</span>';
                                    
                echo '<a type="button" class="likeanswerreplybutton reply-like-link" onclick="answerreplylikeFunction(\''.htmlentities($answerreplyId).'\',\''.htmlentities($answerreplylikesLabel).'\');" id="answerreplylike'.htmlentities($answerreplyId).'"  name="'.htmlentities($answerreplyId).'">Like</a>
                      <p id="answerreplyLikeError'.htmlentities($answerreplyId).'" class="error-message"></p>';
                                    
                echo '<button type="submit" class="deleteanswerreplybutton" id="'.htmlentities($answerId).'" name="'.htmlentities($answerreplyId).'">Delete reply</button>';
                                                    
                echo '</div>';  
				exit;
			}
		}
	}
	
}
else{	
	echo "not logged in";
	//header("LOCATION: signup.php?lastpage=imagedisplay.php?id=".$imageId);//?lastpage=imagedisplay.php?id="+$imageId);//here we need to develop redirecting back to original page from where the user was sent to the signup page
}
?>
