<?php 
include 'top.php';
include 'dbh.php';
include_once 'functions.php';
?>
<h1>ASK A QUESTION</h1>
<hr>
<?php
//fetching the required user data
if(isset($_SESSION['id']))
{
	$userId=$session_value;

	$sql="SELECT username FROM memberstable WHERE id='$userId'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$username=$row['username'];

	date_default_timezone_set('Asia/Kolkata');//setting the timezone
	?>

	<form action="" id="askquestionform<?php echo htmlentities($userId); ?>" method="post" enctype="multipart/form-data">
	    <input type="text" placeholder="Enter Question Title" name="questionTitle"><br>
	    <textarea name="question" placeholder="Enter question statement. You can also mention the category of the meme that you would prefer."></textarea><br>
	    <input type="file" id="questionMeme" name="meme"><br>
	    <input type="hidden" name="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
	    <input type="submit" value="Ask Question!" name="askquestion"><br>
	</form>

	<p id="askQuestionError"></p>
<?php
}
else{
	header("LOCATION: signup.php?lastpage=askquestion.php");
}
?>
</body>
</html>