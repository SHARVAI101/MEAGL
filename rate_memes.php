<?php
ob_start();
include 'top.php';
$b=ob_get_contents();
ob_end_clean();

$title = "Rate Memes";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

echo $buffer;

include 'dbh.php';
include_once 'functions.php';
date_default_timezone_set('Asia/Kolkata');//setting the timezone

if(isset($_SESSION['id']))
{
    $userId=mysqli_real_escape_string($conn,$_SESSION['id']);
}
?>

<!---<p style="color:grey">Here, you can discuss doubts</p>
<a id="askquestion" href="askquestion.php">ASK A QUESTION!</a>-->
<?php
/*<div class="question">
    <form action="" id="askquestionform<?php echo htmlentities($userId); ?>" method="post" enctype="multipart/form-data">
        <textarea class="form-control question-asked" name="question" style="font-size:19px" placeholder="Stuck on a meme? Write your problem here. Our community cures the meme-maker's block! You can also mention the category of the meme that you would prefer for the answers." rows="3" ></textarea><br>
        <h4 class="add-image-header" style="margin-left:280px;margin-top:-3px">Add Image: </h4>
        <input type="file" id="questionMeme" name="meme" class="filestyle" data-buttonName="question-small-add btn" data-icon="false" data-buttonText="+" data-input="false" name="answerMeme"><br>
        <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
        <input type="submit" class="btn post-question" value="Ask Question" name="askquestion"><br>
    </form>

    <p id="askQuestionError" ></p>
</div>
*/
?>
<br>
<br>
<h1 class="develop-text" style="font-size:50px">RATE MEMES</h1>
<p class="develop-text" style="font-size:20px">Welcome to the Meagl Meme Rating System! Here, you can rate memes according to your liking and view the average scores of memes that are calculated according to other peoples' ratings. We decided to make this system thanks to Pewdiepie's idea in one of his videos! Thanks Papa Pewds :)</p>
<hr>
<?php
//print out all the questions in descending order of being posted
$sql="SELECT * FROM pewds_memes_table";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    
    $memeId=$row['id'];
    $meme_name=$row['meme_name'];
    $score=$row['score'];
    $total_ratings=$row['total_ratings'];
    $image_loc=$row['image_location'];

    ?>
    <div class="meme centering" style="display:block;margin:25px auto 0px auto">
        <h2 class="title"><?php echo $meme_name ?></h2>
        
        <img src="<?php echo $image_loc; ?>" style="width:600px;height:auto">
        <br>
        <p class="points open-sans" style="display:block;margin-top:10px">Score: <span id="score_span<?php echo $memeId; ?>"><?php echo $score; ?></span></p>
        <p class="comments open-sans" style="margin-left:7px">Total Ratings: <span id="ratings_span<?php echo $memeId; ?>"><?php echo $total_ratings; ?></span></p>
        <br>
        <?php
        $user_has_scored=false;
        if(isset($_SESSION['id']))
        {
            $sql1="SELECT scored_by_userId,score FROM pewds_meme_ratings_table WHERE pewds_memeId='$memeId'";
            $result1=mysqli_query($conn,$sql1);
            if($result1!=false)
            {
                while($row1=mysqli_fetch_assoc($result1)){
                    if($row1['scored_by_userId']==$_SESSION['id'])
                    {
                        $userScore=$row1['score'];
                        $user_has_scored=true;
                        break;
                    }
                }
            }
        }

        ?>
        <p class="title" style="margin-top:0px;font-size:18px"><strong>Rate This Meme :</strong></p>
        <?php

        if(isset($user_has_scored) && $user_has_scored==true)
        {
            ?>
            <p class="title" id="rating_message<?php echo $memeId; ?>" style="margin-top:0px;font-size:15px"><b>You've rated this meme <?php echo $userScore; ?> out of 10</b></p>
            <?php
        }
        else
        {
            ?>
            <p class="title" id="rating_message<?php echo $memeId; ?>" style="margin-top:0px;font-size:15px;display:none"><b></b></p>
            <div class="meme_rating_form_div" id="meme_rating_form_div<?php echo $memeId; ?>">
                <form class="meme_rating_form" action="">
                    <select name="meme_rating" style="margin-left:7px;cursor:pointer">
                        <option value="0.5">0.5</option>
                        <option value="1">1</option>
                        <option value="1.5">1.5</option>
                        <option value="2">2</option>
                        <option value="2.5">2.5</option>
                        <option value="3">3</option>
                        <option value="3.5">3.5</option>
                        <option value="4">4</option>
                        <option value="4.5">4.5</option>
                        <option value="5">5</option>
                        <option value="5.5">5.5</option>
                        <option value="6">6</option>
                        <option value="6.5">6.5</option>
                        <option value="7">7</option>
                        <option value="7.5">7.5</option>
                        <option value="8">8</option>
                        <option value="8.5">8.5</option>
                        <option value="9">9</option>
                        <option value="9.5">9.5</option>
                        <option value="10">10</option>
                    </select>
                    <input type="hidden" name="memeId" value="<?php echo $memeId; ?>">
                    <button class="rate-meme-button" id="" type="submit">Rate</button>
                </form>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
} 
?>
<br>
<?php

/*echo '<div id="questions_content_div">';
echo '</div>';//closing questions_content_div*/


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