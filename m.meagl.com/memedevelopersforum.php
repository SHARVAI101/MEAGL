<?php
ob_start();
include 'top.php';
$b=ob_get_contents();
ob_end_clean();

$title = "Developers' Forum";
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
<div class="question">
    <form action="" id="askquestionform<?php echo htmlentities($userId); ?>" method="post" enctype="multipart/form-data">
        <textarea class="form-control question-asked" name="question" style="font-size:19px" placeholder="Stuck on a meme? Write your problem here. Our community cures the meme-maker's block! You can also mention the category of the meme that you would prefer for the answers." rows="7"></textarea><br>
        <div class="add-image-div">
            <p class="add-image-header">Add Image: </p>
            <input type="file" id="questionMeme" name="meme" class="filestyle" data-buttonName="question-small-add btn" data-icon="false" data-buttonText="+" data-input="false" name="answerMeme" style="width:50px"><br>
        </div>
        <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
        <input type="submit" class="btn post-question" value="Ask Question" name="askquestion"><br>
    </form>

    <p id="askQuestionError" ></p>
</div>

<hr>
<?php
//print out all the questions in descending order of being posted
$sql="SELECT * FROM questionstable ORDER BY id DESC";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $questions[]=$row;
}
echo '<div id="questions_content_div">';

$_SESSION['questions_counter']=0;
$numberOfQuestions=count($questions);        
//echo serialize($questions);
loadMoreQuestionsfunction($questions,$numberOfQuestions,'questions_counter','questions',"donthideform");
echo '</div>';//closing questions_content_div

//load more button
if($numberOfQuestions!=$_SESSION['questions_counter'])
{
    echo '
    <form class="load_more_memes_form" id="questions_loadmore_form">
        <input type="hidden" name="load_more_type" value="question">
        <input type="hidden" name="session_counter_name" value="questions_counter">
        <input type="hidden" name="numberOfElementsInArray" value="'.$numberOfQuestions.'">';?>
        <input type="hidden" name="data_array" value='<?php echo base64_encode(serialize($questions)) ; ?>'>
    <?php
    echo '
        <button type="submit" class="btn load-more">Load More</button>
    </form>
    ';
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
                        <img src="../<?php echo htmlentities($ppL) ?>" class="small-notif-dp">
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
                        <img src="../<?php echo htmlentities($ppL) ?>" class="small-notif-dp">
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