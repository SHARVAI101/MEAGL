<?php
include 'top.php';

include 'dbh.php';
include_once 'functions.php';
date_default_timezone_set('Asia/Kolkata');//setting the timezone
$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
?>

<!---<p style="color:grey">Here, you can discuss doubts</p>
<a id="askquestion" href="askquestion.php">ASK A QUESTION!</a>-->
<div class="question">
    <form action="" id="askquestionform<?php echo htmlentities($userId); ?>" method="post" enctype="multipart/form-data">
        <textarea class="form-control question-asked" name="question" style="font-size:19px" placeholder="Stuck on a meme? Write your problem here. Our community cures the memeMaker's block!" rows="3" ></textarea><br>
        <input type="file" id="questionMeme" name="meme"><br>
        <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
        <input type="submit" class="btn post-question" value="Ask Question" name="askquestion"><br>
    </form>

    <p id="askQuestionError"></p>
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
        <button type="submit" class="btn">Load More</button>
    </form>
    ';
}

?>

  
</div>
</body>
</html>