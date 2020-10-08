
<?php
ob_start();
include 'top.php';
include 'leftnav.php';
$b=ob_get_contents();
ob_end_clean();

$title = "Questions Page";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

echo $buffer;
//<a href="allmemes.php">Back to all memes</a>
include 'dbh.php';
include_once 'functions.php';

//$startTime = microtime(true);

$questionId=mysqli_real_escape_string($conn,$_GET['id']);
//echo '<script language="javascript">alert("'.$questionId.'");</script>';
$sql="SELECT * FROM questionstable WHERE id='$questionId'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$question=$row['question'];
//$questionTitle=$row['questionTitle'];
$datetime=$row['datetime'];
$memeDestination=$row['memeDestination'];
$askerUsername=$row['askerUsername'];
$askerId=$row['askerId'];
$questionId=$row['id'];
$numberOfFlags=$row['flags'];
$likes=$row['likes'];
$questionlikesinnerhtml="Like";

if(isset($_SESSION['id'])){
    //echo '<script language="javascript">alert("im in 1")</script>';
    $sql2= "SELECT likedByUserId FROM questionlikestable WHERE questionId='$questionId'";
    $result2=mysqli_query($conn,$sql2);
    while($row2=mysqli_fetch_assoc($result2)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
      if($row2['likedByUserId']==$_SESSION['id']){
          //echo '<script language="javascript">alert("im in 2")</script>';
          $questionlikesinnerhtml="Undo Like";
      }
    }
}
$likesLabel="questionlikes".$questionId;
$numberOfAnswersLabel="answers".$questionId;
$numberOfAnswers=$row['numberOfAnswers'];
///number of views part
$numberOfViews=mysqli_real_escape_string($conn,$row['views']);
//IMPORTANT:::while the user base of our website is small, the views is calculated per session only(this is to encourage our website's users)...but as the number of users increase..for example wwhen we reach about 1 lakh users, there will be a views table just like the likestable where the data for the questionId and the viewer's id shall be stored so that for 1 user only 1 view shall be registered..but then youll have to think of what to do for users who have not logged in 
//echo "session value=".($_SESSION['viewed'.$questionId]);
if(!isset($_SESSION['viewed'.$questionId])){
    //if the user in the current session has not viewed this question 
    //then increment the number of views for him
    $numberOfViews+=1;
    $sql11="UPDATE questionstable SET views='$numberOfViews' WHERE id='$questionId'";
    $result11=mysqli_query($conn,$sql11);
    $_SESSION['viewed'.$questionId]="viewed";
}
//echo "number of views after=".$numberOfViews;

//flag button
$displayFlagButton=false;
$flaggedByCurrentUser=false;
//echo "ITHE";
if(isset($_SESSION['id'])){
    if($_SESSION['id']!=$askerId){//the user who uploads the image himself can't flag it - -' XD
        $userId=mysqli_real_escape_string($conn,$_SESSION['id']);

        $sql7="SELECT flaggerUserId FROM question_flags_table WHERE questionId='$questionId' AND flaggerUserId='$userId'";
        $result7=mysqli_query($conn,$sql7);
        
        if($row7=mysqli_fetch_assoc($result7)){             
            //echo "FLAG KELAY";
            $flaggedByCurrentUser=true;
        }
        else{
            //if this user has not flagged this image already
            //echo "FLAG NAHI KELAY!!";
            $displayFlagButton=true;
            $flagButtonId="flagbutton".$questionId;
        }
        
    }
}

if($numberOfFlags<5){

    echo '<div class="dedicated-question" style="margin-left:320px">';
     if(isset($_SESSION['id'])){
                if($_SESSION['id']==$askerId){
                    echo '<button type="submit" class="deletequestionbutton" name="'.htmlentities($questionId).'"><i class="fa fa-times" aria-hidden="true"></i></button>
                          ';
                }
            }
                        echo '<h1 class="q-header">Q</h1>
                        <p class="question-title">'.$question.'<span class="question-by">-posted by <a href="userprofile.php?id='.htmlentities($askerId).'">'.htmlentities($askerUsername).'</a></span></p>
                        
                        <img src="'.$memeDestination.'" class="meme" id="question-image"><br>
                        <h5 class="question-likes" name="'.htmlentities($likesLabel).'">'.htmlentities($likes).' likes</h5>
                        
                        
                        <h6 class="question-time"><i>- '.getTime($datetime).'</i></h6> <br> ';

        if($displayFlagButton==true){
            //echo "in";
            //echo '<input type="image" class="flagimagebutton flag" name="'.$imageId.'" id="imageFlagButton'.$imageId.'" style="display:inline" src="icons/flag_icon.jpg"> Downvote</input>';
            echo '<input type="image" class="flagquestionbutton flag question-action" name="'.$questionId.'" id="questionFlagButton'.$questionId.'" alt="Downvote"></input>';
            echo '<p id="flagquestion'.$questionId.'"></p>';                    
        }else{
            if($flaggedByCurrentUser==true){
                echo '<p class="error-message">You have flagged this question!</p>';
            }
            else{
                echo '<p></p>';//this is for CSS debugging..if this is not done tthen everything collapses in the meme box
            }
                    
        }

             echo '<h6 class="question-time"><i>- '.getTime($datetime).'</i></h6> <br> ';
                        
        echo   '<button type="submit" class="likequestionbutton question-action" onclick="questionlikeFunction(\''.htmlentities($questionId).'\',\''.htmlentities($likesLabel).'\');" id="questionlike'.htmlentities($questionId).'" name="questionlike'.htmlentities($questionId).'">'.$questionlikesinnerhtml.'</button>';           
                        
            echo '<p id="Error'.htmlentities($questionId).'" name="Error'.htmlentities($questionId).'"></p>   
            </div>';
            /*if(isset($_SESSION['id'])){
                if($_SESSION['id']!=$askerId){
                    echo '<div class="question-like-div">
                    <p>
                    <button type="submit" class="likequestionbutton dedicated-question-like" onclick="questionlikeFunction(\''.htmlentities($questionId).'\',\''.htmlentities($likesLabel).'\');" id="questionlike'.htmlentities($questionId).'" name="questionlike'.htmlentities($questionId).'">'.$questionlikesinnerhtml.'</button>
                    </div>';
                }
            }*/
            echo '<div class="fame-box">
                    <h5 class="answers-count dedicated-answers-count" id="'.htmlentities($numberOfAnswersLabel).'">'.htmlentities($numberOfAnswers).' answers</h5>
                    <hr style="left:320px;margin-top:0px;margin-bottom:0px">
                    <h5 class="views-count dedicated-views-count">'.htmlentities($numberOfViews).' views</h5>
                </div>';
            
           

            /*if($displayFlagButton==true){
                echo '<p id="flagquestion'.htmlentities($questionId).'" class="error-message"></p>';
                echo '<button type="submit" class="flagquestionbutton" name="'.htmlentities($questionId).'" id="questionFlagButton'.htmlentities($questionId).'">Flag question!</button>';
            }else{
                if($flaggedByCurrentUser==true){
                    echo '<p class="error-message">You have flagged this question!</p>';
                }
                
            }*/
    ?>
    <div class="flag-message flag-question-message<?php echo $questionId; ?>" id="flag-question-message<?php echo $questionId; ?>" style="display:none">
        <p id="flag-p">Downvoting helps Meagl remove low quality, racist or pornographic content. You could tell us more about why you downvoted this meme:</p>
        <br><br><form class="flag-question-form" name="<?php echo $questionId; ?>" method="POST" action="">
            <input type="hidden" name="questionId" value="<?php echo $questionId; ?>">
            <input type="radio" name="downvote" value="pornographic"> Pornographic<br>
            <input type="radio" name="downvote" value="racist"> Racist/abusive<br>
            <input type="radio" name="downvote" value="plagiarism"> Plagiarism<br> 
            <input type="radio" name="downvote" value="other"> Other <br> 
            <button type="submit" class="btn flag-submit" name="<?php echo $questionId; ?>">Submit</button>
        </form> 
                        

    </div>

    <div class="flag-message final-flag-message final-question-flag-message<?php echo $questionId; ?>" id="final-question-flag-message<?php echo $questionId; ?>" style="display:none;height:60px;font-size:20px;">
        <p id="flag-p" style="left:40px;letter-spacing:0.5px;">Thank you for reporting low quality content to Meagl.</p>
    </div>
    <form method="post" action="" enctype="multipart/form-data" id="answerform<?php echo htmlentities($questionId); ?>" name="answerform" style="margin-top:85px;margin-left:320px;width:600px;border-top:solid 1px #ccc;border-bottom:solid 1px #ccc">
        <div class="answer-form">
            <input type="hidden" id="questionId" name="questionId" value="<?php echo htmlentities($questionId); ?>">
            <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <textarea class="form-control" rows="3" id="answer" name="answer" placeholder="Write an answer. You can either just write an answer or even attach an image if you wish to."></textarea><br>
            
            <?php
            if(isset($_SESSION['id'])){  
            //show the postcomment button only if the user has signed in      
            ?>
            <h4 class="add-image-header" style="margin-top:-3px;margin-left: 200px">Add Image: </h4>
            <input style="margin-left: 220px" type="file" id="answerMeme" class="filestyle" data-buttonName="small-add btn" data-icon="false" data-buttonText="+" data-input="false" name="answerMeme">
            <br><br>
            <button type="submit" class="postanswerbutton btn">Post</button>
            <?php
            }     
            ?>
        </div>
        
    </form>


    <p id="answerformuploaderror"></p>

    <div class="comment-section" id="dedicated-comment-section">
    <div class="allanswers" id="allanswers">
        <?php
        
        $sql= "SELECT * FROM answerstable ORDER BY id DESC";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        { 
            $answerForQuestionId=$row['answerForQuestionId'];
            if($answerForQuestionId==$questionId){
                $username=$row['answerByUserName'];
                $answer=$row['answer'];
                $datetime=$row['datetime'];
                $likes=$row['likes'];
                $numberOfReplies=$row['numberOfReplies'];
                $answerId=$row['id'];
                $answerByUserId=mysqli_real_escape_string($conn,$row['answerByUserId']);
                $answerMemelocation=$row['answerMemeDestination'];

                $sql11="SELECT profilePictureLocation FROM memberstable WHERE id='$answerByUserId'";
                $result11=mysqli_query($conn,$sql11);
                $row11=mysqli_fetch_assoc($result11);
                $ppl=$row11['profilePictureLocation'];
                ?>
                
                <div class="answer_div comments-dedicated comments" id="answerdiv<?php echo htmlentities($answerId); ?>">
                    <a href="userprofile.php?id=<?php echo $answerByUserId; ?>">
                        <div class="comment-top">
                            <img src="<?php echo $ppl; ?>" class="notif-dp" id="comment-dp">                          
                        </div>
                    </a>
                    <p class="real-comment">
                    <span class="username" id="dedicated-username" style="position:relative;top:0px;"><?php echo $username; ?></span><br>
                    <span class="answer" id="answer<?php echo htmlentities($answerId); ?>" contenteditable="false"><?php echo $answer; ?>
                    <br>
                    <?php 
                    if($answerMemelocation!=''){
                        echo '<img src="'.$answerMemelocation.'" style="max-width:700px"><br>';
                    }
                    
                    echo '<span class="datetime comment-info comment-time">'.getTime($datetime).'</span>';//echo is done specifically for this because otherwise, for some reason, date doesnot get displayed -_-' XD
                    ?>

                    <span class="likes comment-info" id="answerlikes<?php echo htmlentities($answerId); ?>" style="margin-left:0px">Likes: <?php echo $likes; ?></span>
                    <span class="numberOfReplies comment-info comment-replies" id="numberOfReplies<?php echo htmlentities($answerId); ?>">Number of replies: <?php echo $numberOfReplies; ?></span><br>
                    
                    
                    <?php

                    //answer like button
                    $answerlikesLabel="answerlikes".$answerId;
                    $answerlikesinnerhtml="Like";
                    if(isset($_SESSION['id'])){
                        //echo '<script language="javascript">alert("im in 1")</script>';
                        $sql3= "SELECT likedByUserId FROM answerlikestable WHERE answerId='$answerId'";
                        $result3=mysqli_query($conn,$sql3);
                        while($row3=mysqli_fetch_assoc($result3)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
                            if($row3['likedByUserId']==$_SESSION['id']){
                                //echo '<script language="javascript">alert("im in commentlikes")</script>';
                                $answerlikesinnerhtml="Undo Like";
                                //echo '<script language="javascript">alert("'.$commentlikesinnerhtml.'")</script>';
                                break;              
                            }
                        }
                    }
                    echo '<a class="likeanswerbutton action-link like-link-answer" onclick="answerlikeFunction(\''.htmlentities($answerId).'\',\''.htmlentities($answerlikesLabel).'\');" id="answerlike'.htmlentities($answerId).'" name="'.htmlentities($answerId).'">'.$answerlikesinnerhtml.'</a>';  

                    //shows/hides reply button on clicking
                    echo '<a class="showanswerreplyformbutton action-link reply-link-answer" name="'.htmlentities($answerId).'">Reply</a></p>';    
                    
                    if(isset($_SESSION['id'])){
                        if($answerByUserId==$_SESSION['id']){
                            //if the answer has been by the user then it will show the delete option
                            echo '<div><a class="display-edit"><span class="glyphicon glyphicon-chevron-down"></span></a></div>';
                            echo '<div class="edit-panel"><button type="submit" class="deleteanswerbutton delete-button" name="'.htmlentities($answerId).'">Delete</button></div>'; 
                            //echo '<button type="submit" class="editanswerbutton" name="'.$answerId.'">Edit answer</button>';//makes the answer editable 
                            //echo '<button type="submit" class="updateanswerbutton"  name="'.$answerId.'" style="display:none">Update answer</button>';//updates the database with the changes to the answer
                        
                        }
                    }
                    
                    echo '<p id="answerLikeError'.htmlentities($answerId).'" class="error-message"></p>';
                    echo '<form method="post" class="answerreplyform" id="answerreplyform'.htmlentities($answerId).'" action="" style="display:none">
                            <div class="answer-reply-form"><input type="hidden" id="answerId'.htmlentities($answerId).'" value="'.htmlentities($answerId).'" name="answerId">
                            <input type="hidden" id="datetime'.htmlentities($answerId).'" value="'.date('Y-m-d H:i:s').'" name="datetime">
                            <textarea class="reply-answer-text form-control" rows="2" id="replytext'.htmlentities($answerId).'" placeholder="Write reply" name="answerreply"></textarea>
                            <h4 class="add-image-header" style="margin-top:15px">Add Image: </h4>
                            <input type="file" id="answerReplyMeme" class="filestyle" data-buttonName="reply-small-add btn" data-icon="false" data-buttonText="+" data-input="false"  name="answerReplyMeme"><br>
                            <button type="submit" name="'.htmlentities($answerId).'" class="postanswerreplybutton btn">Post</button><br>
                          </form></div>';     
                      
                   /* echo '<button class="includeExternalImageButton" id="includeExternalImageButton'.htmlentities($answerId).'" name="replytext'.htmlentities($answerId).'" style="display:none;top:70px;">Include external image</button>
                          <button class="includeLinkButton" id="includeLinkButton'.htmlentities($answerId).'" name="replytext'.htmlentities($answerId).'" style="display:none;top:90px;">Include link</button></div>';*/
                    
                    if($numberOfReplies>=1){
                    
                        echo '<a class="answerrepliestogglebutton replies" name="'.htmlentities($answerId).'">Replies <span class="glyphicon glyphicon-chevron-down"></span></a>';
                    }else{
                        echo '<a class="answerrepliestogglebutton replies" name="'.htmlentities($answerId).'" style="display:none">Replies <span class="glyphicon glyphicon-chevron-down"></span></a>';
                    }
                    
                    echo '<p id="answerreplyerror'.htmlentities($answerId).'" class="error-message"></p>';
                    
                    
                    
                    echo '<div id="allanswerreplies'.htmlentities($answerId).'" class="allanswerreplies" style="display:none">';//we add the comment id of the comment to the end of "allreplies" ..this makes a unique name for every div containing all the replies to a particular meme...the above thing is done so that when we press the "show all replies" button, only the replies for that particular comment shall be shown
                    if($numberOfReplies>=1){
                        $sql1= "SELECT * FROM answerrepliestable ORDER BY id";
                        $result1=mysqli_query($conn,$sql1);
                        while($row1=mysqli_fetch_assoc($result1))
                        { 
                            $replyToAnswerId=$row1['replyToAnswerId'];
                            if($replyToAnswerId==$answerId){
                                $replyUsername=$row1['replyByUsername'];
                                $reply=$row1['reply'];
                                $replyDatetime=$row1['datetime'];
                                $replyLikes=$row1['likes']; 
                                $replyId=$row1['id'];
                                $replyByUserId=mysqli_real_escape_string($conn,$row1['replyByUserId']);
                                $answerReplyMemelocation=$row1['replyMemeDestination'];
                                $replydivname="answerreply_div".$replyId;
                            
                                $answerreplylikesLabel="answerreplylikes".$replyId;
                                $answerreplylikesinnerhtml="Like";
                                if(isset($_SESSION['id'])){
                                    //echo '<script language="javascript">alert("im in 1")</script>';
                                    $sql4= "SELECT likedByUserId FROM answerreplylikestable WHERE replyId='$replyId'";
                                    $result4=mysqli_query($conn,$sql4);
                                    while($row4=mysqli_fetch_assoc($result4)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
                                        if($row4['likedByUserId']==$_SESSION['id']){
                                            //echo '<script language="javascript">alert("im in commentlikes")</script>';
                                            $answerreplylikesinnerhtml="Undo Like";
                                            //echo '<script language="javascript">alert("'.$commentlikesinnerhtml.'")</script>';
                                            break;              
                                        }
                                    }
                                }
                                //echo '<button type="submit" class="likereplybutton" onclick="replylikeFunction(\''.$commentId.'\',\''.$commentlikesLabel.'\');" id="commentlike'.$commentId.'" name="'.$commentId.'">'.$commentlikesinnerhtml.'</button>';
                                
                                $sql5="SELECT profilePictureLocation FROM memberstable WHERE id='$replyByUserId'";
                                $result5=mysqli_query($conn,$sql5);
                                $row5=mysqli_fetch_assoc($result5);
                                $replyPPL=$row5['profilePictureLocation'];

                                echo '
                                    <div class="answerreply_div reply-comment" id="'.htmlentities($replydivname).'" style="margin-left: 60px;">
                                      <a href="userprofile.php?id="'.$replyByUserId.'">
                                        <div class="comment-top" style="width:55px">
                                            <img src="'.$replyPPL.'" class="notif-dp" id="comment-dp" style="width:50px;height:50px">                          
                                        </div>
                                      </a>
                                      <p class="reply-real-comment" style="width:750px">
                                      <span class="replyUsername"><a class="answerreplyUsername"><span id="dedicated-username" style="font-size:19px">'.$replyUsername.'</span></a></span>
                                      <span class="answerreply reply" id="answerreply'.htmlentities($replyId).'" contenteditable="false" style="font-size:17px">'.htmlentities($reply).'</span>
                                      <br>';
                                if($answerReplyMemelocation!=''){
                                    echo '<img src="'.$answerReplyMemelocation.'" style="max-width:700px;"><br>
                                        ';
                                }
                                echo '
                                      <span class="answerreplyDatetime replyDatetime">'.getTime($replyDatetime).'</span>
                                      <span class="answerreplyLikes comment-reply-info" id="answerreplylikes'.htmlentities($replyId).'" style="margin-left:0px;font-size:15px">Likes:'.$replyLikes.'</span>';
                                    
                                echo '<a type="button" class="likeanswerreplybutton reply-like-link" onclick="answerreplylikeFunction(\''.htmlentities($replyId).'\',\''.htmlentities($answerreplylikesLabel).'\');" id="answerreplylike'.htmlentities($replyId).'"  name="'.htmlentities($replyId).'" style="margin-left:5px;font-size:15px">'.$answerreplylikesinnerhtml.'</a></p>
                                      <p id="answerreplyLikeError'.htmlentities($replyId).'" class="error-message"></p>';
                                    
                                    if(isset($_SESSION['id'])){
                                        if($replyByUserId==$_SESSION['id']){//if the reply has been posted by the same user who is viewing it, he'll get theoption to delete the reply
                                            echo '<div><a class="display-edit"><span class="glyphicon glyphicon-chevron-down"></span></a></div>';
                                            echo '<div class="edit-panel"><button type="submit" class="deleteanswerreplybutton delete-button" id="'.htmlentities($answerId).'" name="'.htmlentities($replyId).'">Delete</button></div>';
                                            //echo '<button type="submit" class="editreplybutton" name="'.$replyId.'">Edit reply</button>';//makes the reply editable 
                                            //echo '<button type="submit" class="updatereplybutton"  name="'.$replyId.'" style="display:none">Update reply</button>';//updates the database with the changes to the reply
                                        }
                                    }
                                
                                echo '</div>';    
                        
                            }
                        }
                    }     
                    //echo '</div>';   
                    echo '</div>';  
                echo '</div>';    
            }
        }
        //echo "Time:  " . number_format(( microtime(true) - $startTime), 10) . " Seconds\n";
        ?>
    </div>
</div>
<?php
}
else{
    echo '<p>This question has been flagged more than five times and is awaiting admin approval.</p>';
}
?>

<div class="small-notifications-column">
    <?php
    if(isset($_SESSION['id']))
    {
        $userId=mysqli_real_escape_string($conn,$_SESSION['id']);
        $sql="SELECT * FROM notifications_table WHERE receiverId='$userId' ORDER BY id DESC";
        $result=mysqli_query($conn,$sql);

        $areThereNotifications=false;
        $notifications_counter=0;
        echo '<div class="small-notifications-body">';
        while($row=mysqli_fetch_assoc($result)){
            $areThereNotifications=true;

            $notification=$row['notification'];
            $notificationId=mysqli_real_escape_string($conn,$row['id']);
            $datetime=$row['datetime'];
            $nL=$row['notificationLink'];

            $senderId=$row['senderId'];
            $sql1="SELECT profilePictureLocation FROM memberstable WHERE id='$senderId'";
            $result1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_assoc($result1);
            $ppL=$row1['profilePictureLocation'];
            if($ppL=='')
            {
                //this means its a group ka notification
                if(preg_match_all('/\d+/', $nL, $numbers))
                {
                    $groupId = end($numbers[0]);
                }
                $sql10="SELECT groupPicLocation FROM groups_table WHERE id='$groupId'";
                $result10=mysqli_query($conn,$sql10);
                $row10=mysqli_fetch_assoc($result10);
                $ppL=$row10['groupPicLocation'];

            }

            $viewingStatus=$row['viewingStatus'];
            if($viewingStatus==0)
            {
                $notifications_counter+=1;
                ?>
                <a href="<?php echo htmlentities($nL); ?>" class="notif-link" id="notification<?php echo htmlentities($notificationId); ?>">    
                    <div class="notif">
                        <img src="<?php echo htmlentities($ppL) ?>" class="small-notif-dp">
                        <p class="small-notif-text"><?php echo $notification; ?></p>                            
                    </div>
                </a>
                <?php

            }
            else
            {
                ?>
                <a href="<?php echo htmlentities($nL); ?>" class="notif-link" id="notification<?php echo htmlentities($notificationId); ?>">    
                    <div class="notif" style="background-color:#EAEAEA">
                        <img src="<?php echo htmlentities($ppL) ?>" class="small-notif-dp">
                        <p class="small-notif-text"><?php echo $notification; ?></p>                            
                    </div>
                </a>
                <?php
            }
        }

        if($areThereNotifications==false){
            echo '<p>No notifications yet!</p>';            
        }else{
            ?>
            <script>thereAreNotifications(<?php echo $notifications_counter; ?>);</script>
            <?php
        }
        echo "</div>";
    }   
    ?>
    </div>
</div>
</body>
</html>