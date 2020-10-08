<?php
session_start();
//<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 	
//<script type="text/javascript" src="general.js"></script> 
?> 

<?php

include 'dbh.php';
include 'functions.php';

if(isset($_SESSION['id'])){//if user has logged in
	if(isset($_POST['datetime']) && isset($_POST['questionId']) && isset($_POST['numberOfAnswersActual']))
	{
		if($_FILES['answerMeme']['size']!=0) {
			//if a file is selected
			$file_size=$_FILES['answerMeme']['size'];
			if($file_size<6000000){//max file size is 6MB

				$file_name=$_FILES['answerMeme']['name'];//gets the name of the meme(that is the name that was there during uploading the meme)
				$ext = pathinfo($file_name, PATHINFO_EXTENSION);//this amazing function gets the extension of the image(meme) file e.g. "jpg","png" without the dot before the extension i.e., ".jpg",".png"..this dot has to be added later on
				if($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "gif" ){
					//if user has submitted the comment
					if(isset($_POST['answer'])){
						$answer=mysqli_real_escape_string($conn,$_POST['answer']);
					}
					else{
						$answer="";
					}
					
					$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);
					$questionId=mysqli_real_escape_string($conn,$_POST['questionId']);
					$username=mysqli_real_escape_string($conn,$_SESSION['username']);
					$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

					$file_type=$_FILES['answerMeme']['type'];//gets file type
						
					$file_tmp_name=$_FILES['answerMeme']['tmp_name'];//gets the temporary location where the meme is saved before it is moved to the desired directory
					
					$sql="INSERT INTO answerstable (answerForQuestionId, answerByUserId, answerByUserName, likes, numberOfReplies, answer, datetime) VALUES ('$questionId', '$userId', '$username', 0, 0, '$answer', '$datetime')";
					$result=mysqli_query($conn,$sql);

					$answerId = mysqli_insert_id($conn);//this is done to fetch the id of the comment
					
					$answerMemeName="questionId=".$questionId."answerId=".$answerId;

					//here we move the meme to the desired location and change the image name to the title of the meme so that it is simpler to find when it is to be displayed
					$filepath="users/".$_SESSION['username']."/answerMemes/".$answerMemeName.".$ext";
					move_uploaded_file($file_tmp_name, $filepath);	

					$sql1="UPDATE answerstable SET answerMemeDestination='$filepath' WHERE id='$answerId'";
					$result1=mysqli_query($conn,$sql1);					

					$answerDivName="answerdiv".$answerId;

					//increment number of comments in memestable 
					$numberOfAnswers=mysqli_real_escape_string($conn,$_POST['numberOfAnswersActual'])+1;
					$sql="UPDATE questionstable SET numberOfAnswers='$numberOfAnswers' WHERE id='$questionId'";//updating database 
					$result=mysqli_query($conn,$sql);

					//updating notification
					$sql02="SELECT askerId,question FROM questionstable WHERE id='$questionId'";//getting image title
					$result02=mysqli_query($conn,$sql02);
					$row02=mysqli_fetch_assoc($result02);
					$question=$row02['question'];
					$uid=$row02['askerId'];
					//echo '$question'.$question;
					//echo '$uid'.$uid;
					
					if($uid!=$_SESSION['id']){
						//if the user is commenting on his own meme, then no notification
						date_default_timezone_set('Asia/Kolkata');//setting the timezone
						$datetime=date('Y-m-d H:i:s');			

						$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
						$result01=mysqli_query($conn,$sql01);
						$row01=mysqli_fetch_assoc($result01);
						$senderUsername=$row01['username'];

						$questionForNotification=(strlen($question) > 13) ? substr($question,0,10).'...' : $question;

						$notificationString=htmlentities($senderUsername).' posted an answer for your question "<i>'.htmlentities($questionForNotification).'</i>"';
						$notificationLink='questiondisplay.php?id='.htmlentities($questionId).'#'.htmlentities($answerDivName);
						$notificationType="answer";

						$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$userId','$uid','$notificationType','$notificationString','$notificationLink',0,'$datetime','$answerId')";
						$result4=mysqli_query($conn,$sql4);
					}

					/*
					?>

					
					<div class="answer_div" id="<?php echo htmlentities($answerDivName); ?>"> 
						<pre class="answer" id="answer<?php echo htmlentities($answerId); ?>" contenteditable="false"><?php echo htmlentities($answer); ?></pre>
						<img src="<?php echo htmlentities($filepath); ?>" style="width:300px;height:300px;">
						<p class="username">Posted By:<?php echo htmlentities($username); ?></p>	
						<?php	
						echo '<p class="datetime">'.getTime($datetime).'</p>';//echo is done specifically for this because otherwise, for some reason, date doesnot get displayed -_-' XD
						?>
						<p class="likes" id="answerlikes<?php echo htmlentities($answerId); ?>">Likes: 0</p>			
						<p class="numberOfReplies" id="numberOfReplies<?php echo htmlentities($answerId); ?>">Number of replies: 0</p>
						
						
						
						<button type="submit" class="deletecommentbutton" name="<?php echo htmlentities($answerId); ?>">Delete comment</button>
						
						<?php
						/*<button type="submit" class="editcommentbutton" name="<?php echo $commentId; ?>">Edit comment</button>
						//<button type="submit" class="updatecommentbutton"  name="<?php echo $commentId; ?>" style="display:none">Update comment</button>
							*/				
						/*
						echo '<p id="answerLikeError'.htmlentities($answerId).'"></p>';
          
          
        		        //shows/hides reply button on clicking
        		        echo '<button class="showanswerreplyformbutton" name="'.htmlentities($answerId).'">Reply</button>';    
        		          
        		        echo '<form method="post" class="answerreplyform" id="answerreplyform'.htmlentities($answerId).'" action="" style="display:none">
        		                <input type="hidden" id="answerId'.htmlentities($answerId).'" name="answerId" value="'.htmlentities($answerId).'">
        		                <input type="hidden" id="datetime'.htmlentities($answerId).'" name="datetime" value="'.date('Y-m-d H:i:s').'">
        		                <textarea id="replytext'.htmlentities($answerId).'" name="answerreply" placeholder="Write reply"></textarea><br>
        		                <input type="file" id="answerReplyMeme" name="answerReplyMeme"><br>
        		                <button type="submit" name="'.htmlentities($answerId).'" class="postanswerreplybutton">post reply</button>
        		              </form>';       
        		          
        		        echo '<p id="answerreplyerror'.htmlentities($answerId).'"></p>';

        		        echo '<div id="allanswerreplies'.htmlentities($answerId).'" class="allanswerreplies" style="display:none"></div>';//
						?>
					</div>
					<?php	
					*/
					$sql11="SELECT profilePictureLocation FROM memberstable WHERE id='$userId'";
		            $result11=mysqli_query($conn,$sql11);
		            $row11=mysqli_fetch_assoc($result11);
		            $ppl=$row11['profilePictureLocation'];
					?>
					<div class="answer_div comments-dedicated comments" id="answerdiv<?php echo htmlentities($answerId); ?>">
                    <a href="userprofile.php?id=<?php echo $userId; ?>">
                        <div class="comment-top">
                            <img src="<?php echo $ppl; ?>" class="notif-dp" id="comment-dp">                          
                        </div>
                    </a>
                    <p class="real-comment">
                    <span class="username" id="dedicated-username" style="position:relative;top:0px;"><?php echo $username; ?></span><br>
                    <span class="answer" id="answer<?php echo htmlentities($answerId); ?>" contenteditable="false"><?php echo htmlentities($answer); ?>
                    <br>
                    <?php //pre prints the comment exactly as it has been posted ?>
                    <?php 
                    if($filepath!=''){
                        echo '<img src="'.htmlentities($filepath).'" style="max-width:700px"><br>';
                    }
                    ?>
                    <?php 
                    echo '<span class="datetime comment-info comment-time">'.getTime($datetime).'</span>';//echo is done specifically for this because otherwise, for some reason, date doesnot get displayed -_-' XD
                    ?>

                    <span class="likes comment-info" id="answerlikes<?php echo htmlentities($answerId); ?>" style="margin-left:0px">Likes: 0</span>
                    <span class="numberOfReplies comment-info comment-replies" id="numberOfReplies<?php echo htmlentities($answerId); ?>">Number of replies: 0</span><br>
                    
                    
                    <?php
                    //answer like button
                    $answerlikesLabel="answerlikes".$answerId;
                    
                    echo '<a class="likeanswerbutton action-link like-link-answer" onclick="answerlikeFunction(\''.htmlentities($answerId).'\',\''.htmlentities($answerlikesLabel).'\');" id="answerlike'.htmlentities($answerId).'" name="'.htmlentities($answerId).'">Like</a>';  

                     //shows/hides reply button on clicking
                    echo '<a class="showanswerreplyformbutton action-link reply-link-answer" name="'.htmlentities($answerId).'">Reply</a></p>';    
                    
                    echo '<div><a class="display-edit"><span class="glyphicon glyphicon-chevron-down"></span></a></div>';
                    echo '<div class="edit-panel"><button type="submit" class="deleteanswerbutton delete-button" name="'.htmlentities($answerId).'">Delete answer</button></div>'; 
                                       
                    echo '<p id="answerLikeError'.htmlentities($answerId).'"></p>';
                    echo '<form method="post" class="answerreplyform" id="answerreplyform'.htmlentities($answerId).'" action="" style="display:none">
                            <div class="answer-reply-form"><input type="hidden" id="answerId'.htmlentities($answerId).'" value="'.htmlentities($answerId).'" name="answerId">
                            <input type="hidden" id="datetime'.htmlentities($answerId).'" value="'.date('Y-m-d H:i:s').'" name="datetime">
                            <textarea class="reply-answer-text form-control" rows="2" id="replytext'.htmlentities($answerId).'" placeholder="Write reply" name="answerreply"></textarea>
                            <h4 class="add-image-header" style="margin-top:15px">Add Image: </h4>
                            <input type="file" id="answerReplyMeme" class="filestyle" data-buttonName="reply-small-add btn" data-icon="false" data-buttonText="+" data-input="false"  name="answerReplyMeme"><br>
                            <button type="submit" name="'.htmlentities($answerId).'" class="postanswerreplybutton btn">Post</button>
                            </div>
                          </form>';     
                      
                    /*echo '<button class="includeExternalImageButton" id="includeExternalImageButton'.htmlentities($answerId).'" name="replytext'.htmlentities($answerId).'" style="display:none;top:70px;">Include external image</button>
                          <button class="includeLinkButton" id="includeLinkButton'.htmlentities($answerId).'" name="replytext'.htmlentities($answerId).'" style="display:none;top:90px;">Include link</button></div>';*/
                    
                    
                    echo '<a class="answerrepliestogglebutton replies" name="'.htmlentities($answerId).'" style="display:none">Replies <span class="glyphicon glyphicon-chevron-down"></span></a>';
                    
                    
                    echo '<p id="answerreplyerror'.htmlentities($answerId).'"></p>';
                    echo '<div id="allanswerreplies'.htmlentities($answerId).'" class="allanswerreplies" style="display:none"></div>';
                    echo '</div></div>';

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
			//no image selected as an answer

			if(isset($_POST['answer'])){
				//if user has submitted the comment
				$answer=mysqli_real_escape_string($conn,$_POST['answer']);
				$datetime=mysqli_real_escape_string($conn,$_POST['datetime']);
				$questionId=mysqli_real_escape_string($conn,$_POST['questionId']);
				$username=$_SESSION['username'];
				$userId=$_SESSION['id'];

				$sql="INSERT INTO answerstable (answerForQuestionId, answerByUserId, answerByUserName, likes, numberOfReplies, answer, datetime) VALUES ('$questionId', '$userId', '$username', 0, 0, '$answer', '$datetime')";
				$result=mysqli_query($conn,$sql);
				$answerId = mysqli_insert_id($conn);//this is done to fetch the id of the comment
				$answerDivName="answerdiv".$answerId;
				//increment number of comments in memestable 
				$numberOfAnswers=mysqli_real_escape_string($conn,$_POST['numberOfAnswersActual'])+1;
				$sql="UPDATE questionstable SET numberOfAnswers='$numberOfAnswers' WHERE id='$questionId'";//updating database 
				$result=mysqli_query($conn,$sql);

				//updating notification
				$sql02="SELECT askerId,question FROM questionstable WHERE id='$questionId'";//getting image title
				$result02=mysqli_query($conn,$sql02);
				$row02=mysqli_fetch_assoc($result02);
				$question=mysqli_real_escape_string($conn,$row02['question']);
				$uid=mysqli_real_escape_string($conn,$row02['askerId']);
				//echo '$question'.$question;
				//echo '$uid'.$uid;
					
				
				if($uid!=$_SESSION['id']){
						//if the user is commenting on his own meme, then no notification
						date_default_timezone_set('Asia/Kolkata');//setting the timezone
						$datetime=date('Y-m-d H:i:s');			

						$sql01="SELECT username FROM memberstable WHERE id='$userId'";//getting notification sender's username
						$result01=mysqli_query($conn,$sql01);
						$row01=mysqli_fetch_assoc($result01);
						$senderUsername=$row01['username'];

						$questionForNotification=(strlen($question) > 13) ? substr($question,0,10).'...' : $question;

						$notificationString=htmlentities($senderUsername).' posted an answer for your question "<i>'.htmlentities($questionForNotification).'</i>"';
						$notificationLink='questiondisplay.php?id='.htmlentities($questionId).'#'.htmlentities($answerDivName);
						$notificationType="answer";

						$sql4="INSERT INTO notifications_table (senderId,receiverId,notificationType,notification,notificationLink,viewingStatus,datetime,notificationForEventId) VALUES ('$userId','$uid','$notificationType','$notificationString','$notificationLink',0,'$datetime','$answerId')";
						$result4=mysqli_query($conn,$sql4);
					}
				/*
				?>
				<div class="answer_div" id="<?php echo htmlentities($answerDivName); ?>"> 
					<pre class="answer" id="answer<?php echo htmlentities($answerId); ?>" contenteditable="false"><?php echo htmlentities($answer); ?></pre>
					<p class="username">Posted By:<?php echo htmlentities($username); ?></p>	
					<?php	
					echo '<p class="datetime">'.getTime($datetime).'</p>';//echo is done specifically for this because otherwise, for some reason, date doesnot get displayed -_-' XD
					?>
					<p class="likes" id="answerlikes<?php echo htmlentities($answerId); ?>">Likes: 0</p>			
					<p class="numberOfReplies" id="numberOfReplies<?php echo htmlentities($answerId); ?>">Number of replies: 0</p>
					
					<?php
					echo '<button type="submit" class="deleteanswerbutton" name="'.htmlentities($answerId).'">Delete answer</button>'; 
					/*
					<button type="submit" class="deletecommentbutton" name="<?php echo $commentId; ?>">Delete comment</button>
					<button type="submit" class="editcommentbutton" name="<?php echo $commentId; ?>">Edit comment</button>
					<button type="submit" class="updatecommentbutton"  name="<?php echo $commentId; ?>" style="display:none">Update comment</button>
					*//*

					echo '<p id="answerLikeError'.htmlentities($answerId).'"></p>';
	          
	          
	  		        //shows/hides reply button on clicking
	  		        echo '<button class="showanswerreplyformbutton" name="'.htmlentities($answerId).'">Reply</button>';    
	  		          
	  		        echo '<form method="post" class="answerreplyform" id="answerreplyform'.htmlentities($answerId).'" action="" style="display:none">
	  		                <input type="hidden" id="answerId'.htmlentities($answerId).'" name="answerId" value="'.htmlentities($answerId).'">
	  		                <input type="hidden" id="datetime'.htmlentities($answerId).'" name="datetime" value="'.date('Y-m-d H:i:s').'">
	  		                <textarea id="replytext'.htmlentities($answerId).'" name="answerreply" placeholder="Write reply"></textarea><br>
	  		                <input type="file" id="answerReplyMeme" name="answerReplyMeme"><br>
	  		                <button type="submit" name="'.htmlentities($answerId).'" class="postanswerreplybutton">post reply</button>
	  		              </form>';       
	  		          
	  		        echo '<p id="answerreplyerror'.htmlentities($answerId).'"></p>';
	  		        echo '<div id="allanswerreplies'.htmlentities($answerId).'" class="allanswerreplies" style="display:none"></div>';//
				
				?>
			</div>
				
			<?php
			*/
			$sql11="SELECT profilePictureLocation FROM memberstable WHERE id='$userId'";
            $result11=mysqli_query($conn,$sql11);
            $row11=mysqli_fetch_assoc($result11);
            $ppl=$row11['profilePictureLocation'];
			?>
			<div class="answer_div comments-dedicated comments" id="answerdiv<?php echo htmlentities($answerId); ?>">
              	<a href="userprofile.php?id=<?php echo $userId; ?>">
              	    <div class="comment-top">
              	        <img src="<?php echo $ppl; ?>" class="notif-dp" id="comment-dp">                          
              	    </div>
              	</a>
              	<p class="real-comment">
              	<span class="username" id="dedicated-username" style="position:relative;top:0px;"><?php echo $username; ?></span><br>
              	<span class="answer" id="answer<?php echo htmlentities($answerId); ?>" contenteditable="false"><?php echo $answer; ?>
              	<br>                    
                    
                <?php 
                echo '<span class="datetime comment-info comment-time">'.getTime($datetime).'</span>';//echo is done specifically for this because otherwise, for some reason, date doesnot get displayed -_-' XD
                ?>

                <span class="likes comment-info" id="answerlikes<?php echo htmlentities($answerId); ?>" style="margin-left:0px">Likes: 0</span>
                <span class="numberOfReplies comment-info comment-replies" id="numberOfReplies<?php echo htmlentities($answerId); ?>">Number of replies: 0</span><br>
    	
                <?php
                //answer like button
                $answerlikesLabel="answerlikes".$answerId;
                $answerlikesinnerhtml="Like";
                echo '<a class="likeanswerbutton action-link like-link-answer" onclick="answerlikeFunction(\''.htmlentities($answerId).'\',\''.htmlentities($answerlikesLabel).'\');" id="answerlike'.htmlentities($answerId).'" name="'.htmlentities($answerId).'">'.$answerlikesinnerhtml.'</a>';  


                echo '<a class="showanswerreplyformbutton action-link reply-link-answer" name="'.htmlentities($answerId).'">Reply</a></p>';    

                echo '<div><a class="display-edit"><span class="glyphicon glyphicon-chevron-down"></span></a></div>';
                echo '<div class="edit-panel"><button type="submit" class="deleteanswerbutton delete-button" name="'.htmlentities($answerId).'">Delete answer</button></div>'; 
                                        
                
                    
                //shows/hides reply button on clicking
                
                echo '<p id="answerLikeError'.htmlentities($answerId).'" class="error-message"></p>';
                echo '<form method="post" class="answerreplyform" id="answerreplyform'.htmlentities($answerId).'" action="" style="display:none">
                        <div class="answer-reply-form"><input type="hidden" id="answerId'.htmlentities($answerId).'" value="'.htmlentities($answerId).'" name="answerId">
                        <input type="hidden" id="datetime'.htmlentities($answerId).'" value="'.date('Y-m-d H:i:s').'" name="datetime">
                        <textarea class="reply-answer-text form-control" rows="2" id="replytext'.htmlentities($answerId).'" placeholder="Write reply" name="answerreply"></textarea>
                        <h4 class="add-image-header" style="margin-top:15px">Add Image: </h4>
                        <input type="file" id="answerReplyMeme" class="filestyle" data-buttonName="reply-small-add btn" data-icon="false" data-buttonText="+" data-input="false"  name="answerReplyMeme"><br>
                        <button type="submit" name="'.htmlentities($answerId).'" class="postanswerreplybutton btn">Post</button>
                      	</div>
                      </form>';     
                      
                /*echo '<button class="includeExternalImageButton" id="includeExternalImageButton'.htmlentities($answerId).'" name="replytext'.htmlentities($answerId).'" style="display:none;top:70px;">Include external image</button>
                      <button class="includeLinkButton" id="includeLinkButton'.htmlentities($answerId).'" name="replytext'.htmlentities($answerId).'" style="display:none;top:90px;">Include link</button></div>';*/
                    
                    
                echo '<a class="answerrepliestogglebutton replies" name="'.htmlentities($answerId).'" style="display:none">Replies <span class="glyphicon glyphicon-chevron-down"></span></a>';
                    
                    
                echo '<p id="answerreplyerror'.htmlentities($answerId).'" class="error-message"></p>';
                echo '<div id="allanswerreplies'.htmlentities($answerId).'" class="allanswerreplies" style="display:none"></div>';
            echo '</div></div>';
			exit;
			}	
			
		}
	}
	/*else{
		//this is for debugging
		echo "no data";
	}*/
	
}
else{	
	echo 'not logged in';//here we need to develop redirecting back to original page from where the user was sent to the signup page
}
?>
