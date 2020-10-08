<?php
ob_start();
include 'top.php';
$b=ob_get_contents();
ob_end_clean();

$title = "Dedicated meme page";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

echo $buffer;
//<a href="allmemes.php">Back to all memes</a>
include 'dbh.php';
include_once 'functions.php';

$imageId=mysqli_real_escape_string($conn,$_GET['id']);

//now checking the scope of the meme that is, its visibility 
if(isset($_GET['world'])){
	//if one is set then the others are also definitely set
	$world=$_GET['world'];
	$sharedWithUserId=$_GET['uid'];
	$sharedWithGroupId=$_GET['gid'];

	if($world!=0){
		$originLabel="from The World";
	}
	else if($sharedWithUserId!=0){
		$sql1001="SELECT uploaderId FROM memestable WHERE id='$imageId'";
		$result1001=mysqli_query($conn,$sql1001);
		$row1001=mysqli_fetch_assoc($result1001);
		if($_SESSION['id']==$row1001['uploaderId'])
		{
			$fid=mysqli_real_escape_string($conn,$sharedWithUserId);
			$sql1002="SELECT username FROM memberstable WHERE id='$fid'";
			$result1002=mysqli_query($conn,$sql1002);
			$row1002=mysqli_fetch_assoc($result1002);

			$originLabel="from My Friends: <a target='_blank' href='userimagesharing.php?id=".$sharedWithUserId."'>".$row1002['username']."</a>";
		}
		else{
			$fid=mysqli_real_escape_string($conn,$row1001['uploaderId']);
			$sql1002="SELECT username FROM memberstable WHERE id='$fid'";
			$result1002=mysqli_query($conn,$sql1002);
			$row1002=mysqli_fetch_assoc($result1002);

			$originLabel="from My Friends: <a target='_blank' href='userimagesharing.php?id=".$row1001['uploaderId']."'>".$row1002['username']."</a>";
		}
		
	}
	else{
		$sql1001="SELECT groupname FROM groups_table WHERE id='$sharedWithGroupId'";
		$result1001=mysqli_query($conn,$sql1001);
		$row1001=mysqli_fetch_assoc($result1001);
		
		$originLabel="from My Groups: <a target='_blank' href='groupspage.php?id=".$sharedWithGroupId."'>".$row1001['groupname']."</a>";
	}
}
/*echo $world;
echo $sharedWithUserId;
echo $sharedWithGroupId;*/
/*
//Facebook and twitter share buttons
if(isset($_GET['world'])){
?>
<div class="fb-share-button" data-href="http://localhost/memewebsite_test1/imagedisplay.php?id=<?php echo $imageId; ?>&amp;world=<?php echo $world; ?>&amp;uid=<?php echo $sharedWithUserId; ?>&amp;gid=<?php echo $sharedWithGroupId; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fmemewebsite_test1%2Fimagedisplay.php%3Fid%3D<?php echo $imageId; ?>%26world%3D<?php echo $world; ?>%26uid%3D<?php echo $sharedWithUserId; ?>%26gid%3D<?php echo $sharedWithGroupId; ?>&amp;src=sdkpreparse">Share</a></div>

<a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-text="Check out this hilarious meme that I found here:" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<?php
}*/

$sql= "SELECT * FROM memestable WHERE id='$imageId'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$imagelocation=$row['memeDestination'];
$memetitle=$row['memetitle'];
$uploader=$row['uploader'];

//obtaining user id and number of subscribers
$uploaderId=$row['uploaderId'];
$sql1= "SELECT * FROM memberstable WHERE id='$uploaderId'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$datetime=$row['datetime'];
if($row['memeDescription']!=''){
	$memeDescription=$row['memeDescription'];
}else{
	$memeDescription="No special description for this meme!";
}


$numberOfFlags=$row['flags'];
$profilePictureLocation=$row1['profilePictureLocation'];
$imageId=$row['id'];
$likesLabel="likes".$imageId;
$numberOfLikes=$row['likes'];//obtains the likes for this particular meme

//subscribe to user
$subscribeLabel="subscribers".$uploaderId;//subscriber to the meme uploader
$numberofSubscribers=$row1['numberofSubscribers'];//subscribers for the uploader obtained
$subscribeToUserInnerHtml="Subscribe";
if(isset($_SESSION['id'])){
	//echo '<script language="javascript">alert("im in 1")</script>';
	$sql2= "SELECT subscribedById FROM subscriberstable WHERE uploaderId='$uploaderId'";
	$result2=mysqli_query($conn,$sql2);
	while($row2=mysqli_fetch_assoc($result2)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
		if($row2['subscribedById']==$_SESSION['id']){
			//echo '<script language="javascript">alert("im in 2")</script>';
			$subscribeToUserInnerHtml="Unsubscribe";
		}
	}
}
//comments
if(isset($world) && $world==0){
	$sql100="SELECT numberOfComments FROM meme_sharing_visibility_table WHERE imageId='$imageId' AND userId='$sharedWithUserId' AND groupId='$sharedWithGroupId'";
	$result100=mysqli_query($conn,$sql100);
	$row100=mysqli_fetch_assoc($result100);
	$numberOfComments=$row100['numberOfComments'];
}else{
	$numberOfComments=$row['numberOfComments'];
}
$numberOfCommentsLabel="comments".$imageId;

$likesinnerhtml="Like";
if(isset($_SESSION['id'])){
	//echo '<script language="javascript">alert("im in 1")</script>';
	$sql2= "SELECT likedByuserId FROM likestable WHERE imageId='$imageId'";
	$result2=mysqli_query($conn,$sql2);
	while($row2=mysqli_fetch_assoc($result2)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
		if($row2['likedByuserId']==$_SESSION['id']){
			//echo '<script language="javascript">alert("im in 2")</script>';
			$likesinnerhtml="Undo Like";
		}
	}
}
$likeErrorLabel="Error".$imageId;
$likeButtonId="like".$imageId;
//subscribers for the meme category
$memecategory=$row['memeCategory'];//gets the meme category
$numberOfViews=$row['views'];
   //IMPORTANT:::while the user base of our website is small, the views is calculated per session only(this is to encourage our website's users)...but as the number of users increase..for example wwhen we reach about 1 lakh users, there will be a views table just like the likestable where the data for the questionId and the viewer's id shall be stored so that for 1 user only 1 view shall be registered..but then youll have to think of what to do for users who have not logged in 
   //echo "session value=".($_SESSION['viewed'.$questionId]);
   if(!isset($_SESSION['viewed'.$imageId])){
	   	//if the user in the current session has not viewed this question 
	   	//then increment the number of views for him
	   	$numberOfViews+=1;
	   	$sql11="UPDATE memestable SET views='$numberOfViews' WHERE id='$imageId'";
	   	$row11=mysqli_query($conn,$sql11);
	   	$_SESSION['viewed'.$imageId]="viewed";
   }

$sql4="SELECT totalSubscribers FROM memecategoriestable WHERE memeCategory='$memecategory'";
$result4=mysqli_query($conn,$sql4);
while($row4=mysqli_fetch_assoc($result4)){
	$memeCategorySubscribers=$row4['totalSubscribers'];//stores the total number of subscribers for this meme category
}
$memeCategorySubscribersLabel="categorySubscribe".$memecategory;
//echo $memeCategorySubscribersLabel;
$subscribeToMemeCategoryInnerHtml="Subscribe";
if($memecategory=="Savage"){
	$tableName="savagememessubscriberstable";
	$categoryImageSource="defaults/savage_memes.png";
}else if($memecategory=="Sports"){
	$tableName="sportsmemessubscriberstable";
	$categoryImageSource="defaults/sports_memes.png";
}else if($memecategory=="Gaming"){
	$tableName="gamingmemessubscriberstable";
	$categoryImageSource="defaults/gaming_memes.png";
}else if($memecategory=="Comics"){
	$tableName="comicmemessubscriberstable";
	$categoryImageSource="defaults/comic_memes.png";
}else if($memecategory=="Celeb"){
	$tableName="celebmemessubscriberstable";
	$categoryImageSource="defaults/celeb_memes.png";
}else if($memecategory=="College / School"){
	$tableName="collegememessubscriberstable";
	$categoryImageSource="defaults/college_memes.png";
}else if($memecategory=="Politics"){
	$tableName="politicsmemessubscriberstable";
	$categoryImageSource="defaults/politics_memes.png";
}else if($memecategory=="Just My Thoughts"){
	$tableName="justmythoughtsmemessubscriberstable";
	$categoryImageSource="defaults/just_my_thoughts.png";
}else if($memecategory=="Other"){
	$tableName="othermemessubscriberstable";
	$categoryImageSource="defaults/other_memes.png";
}
if(isset($_SESSION['id'])){
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
	//echo '<script language="javascript">alert("im in 1")</script>';
	$sql6= "SELECT subscribedByUserId FROM $tableName WHERE subscribedByUserId='$userId'";
	$result6=mysqli_query($conn,$sql6);
	if($row6=mysqli_fetch_assoc($result6)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
		//echo '<script language="javascript">alert("im in 2")</script>';
		$subscribeToMemeCategoryInnerHtml="Unsubscribe";
	
	}
}

//flag button
$displayFlagButton=false;
$flaggedByCurrentUser=false;
//echo "ITHE";
if(isset($_SESSION['id'])){
	if($_SESSION['id']!=$uploaderId){//the user who uploads the image himself can't flag it - -' XD
		$userId=$_SESSION['id'];

		$sql7="SELECT flaggerUserId FROM image_flags_table WHERE imageId='$imageId' AND flaggerUserId='$userId'";
		$result7=mysqli_query($conn,$sql7);
		
		if($row7=mysqli_fetch_assoc($result7)){				
			//echo "FLAG KELAY";
			$flaggedByCurrentUser=true;
		}
		else{
			//if this user has not flagged this image already
			//echo "FLAG NAHI KELAY!!";
			$displayFlagButton=true;
			$flagButtonId="flagbutton".$imageId;
		}
		
	}
}

if($numberOfFlags<5 && $flaggedByCurrentUser==false){

	/*echo '<h1>'.$memetitle.'</h1>
		 <img src="'.$imagelocation.'" style="width:500px;height:500px;">
		 <h2>Uploaded by:<a href="userprofile.php?id='.htmlentities($uploaderId).'">'.$uploader.'</a></h2>
		 <p>Views:'.$numberOfViews.'</p>
		 <button type="submit" class="likeimagebutton" onclick="imagelikeFunction(\''.htmlentities($imageId).'\',\''.htmlentities($likesLabel).'\',\''.htmlentities($likeErrorLabel).'\',\''.htmlentities($likeButtonId).'\');" id="like'.htmlentities($imageId).'" name="like'.htmlentities($imageId).'">'.$likesinnerhtml.'</button>
		 <p name="'.htmlentities($likesLabel).'">Likes:'.$numberOfLikes.'</p>
		 
		 <button type="submit" onclick="subscribeFunction(\''.htmlentities($imageId).'\',\''.htmlentities($uploaderId).'\',\''.htmlentities($subscribeLabel).'\',\''.htmlentities($uploader).'\');" name="subscribe'.htmlentities($uploaderId).'">'.htmlentities($subscribeToUserInnerHtml).' to '.$uploader.'</button>
		 <p id="'.htmlentities($subscribeLabel).'" name="'.$subscribeLabel.'">Number of Subscribers:'.$numberofSubscribers.'</p>
		 
		 <p>Meme Category: '.$memecategory.'</p>
		 <p id="'.htmlentities($memeCategorySubscribersLabel).'" name="'.htmlentities($memeCategorySubscribersLabel).'">Number of Subscribers for '.$memecategory.' memes category:'.$memeCategorySubscribers.'</p>
		 <button type="submit" onclick="memeCategorySubscribeFunction(\''.htmlentities($imageId).'\',\''.$memecategory.'\',\''.htmlentities($memeCategorySubscribersLabel).'\');" name="subscribecategory'.$memecategory.'">'.$subscribeToMemeCategoryInnerHtml.' to '.$memecategory.'</button>
		 <p id="'.htmlentities($numberOfCommentsLabel).'">Number of Comments:'.$numberOfComments.'</p>
		 <p class="datetime">Posted: '.getTime($datetime).'</p>
		 <p class="memeDescription">Meme description: '.$memeDescription.'</p>
		 
		 <p name="Error'.htmlentities($imageId).'"></p>	 
		 
		 ';
		
		
		if($displayFlagButton==true){
			echo '<p id="flagimage'.htmlentities($imageId).'"></p>';
			echo '<button type="submit" class="flagimagebutton" name="'.htmlentities($imageId).'" id="imageFlagButton'.htmlentities($imageId).'">Flag Image!</button>';
		}else{
			if($flaggedByCurrentUser==true){
				echo 'You have flagged this image!';
			}
			
		}




		//////////////////////////delete image button
		if(isset($_SESSION['id'])){
			if($_SESSION['id']==$uploaderId){
				echo '<button type="submit" class="deleteimagebutton" name="'.htmlentities($imageId).'">Delete meme</button>
					  <hr>
					  <br>';
			}
		}
	*/
	echo '<div class="meme dedicated-meme meme-box'.$imageId.'"  id="meme-box'.$imageId.'">
			<h1 class="title">'.$memetitle.'</h1>';
	if(isset($world))
	{
		echo 	'<h1 class="origin" style="color:#9A12B3">'.$originLabel.'</h1>';
	}
	
	echo '<img class="image" src="'.$imagelocation.'">
			<h1 class="points" name="'.$likesLabel.'">'.$numberOfLikes.' likes</h1>';
			//<h1 class="comments" id="'.$numberOfCommentsLabel.'">'.$numberOfComments.' Comments</h1>
	echo 	'<div class="category_1">
			<h1  align="right" style="font-size:17px;" class="category">Category: <a href="#" style="color:#9A12B3">'.$memecategory.'</a>
					 		
			</h1></div>
			';


			if($displayFlagButton==true){
				//echo "in";
				//echo '<input type="image" class="flagimagebutton flag" name="'.$imageId.'" id="imageFlagButton'.$imageId.'" style="display:inline" src="icons/flag_icon.jpg"> Flag</input>';
				echo '<input type="image" class="flagimagebutton flag" name="'.$imageId.'" id="imageFlagButton'.$imageId.'" style="display:inline" alt="Downvote"></input>';
				echo '<p id="flagimage'.$imageId.'"></p>';
					
			}else{
				if($flaggedByCurrentUser==true){
					echo '<p>You have flagged this image!</p>';
				}
				else{
					echo '<p></p>';//this is for CSS debugging..if this is not done tthen everything collapses in the meme box
				}
					
			}

					 /*echo '

					 	<a href="#"><img src="https://image.freepik.com/iconos-gratis/comentario-de-chat-discurso-burbuja-oval-con-lineas-de-texto_318-70514.jpg" class="comment"></a>';*/

			echo '<a href="#"><img src="https://image.freepik.com/iconos-gratis/comentario-de-chat-discurso-burbuja-oval-con-lineas-de-texto_318-70514.jpg" class="comment"></a>';

			//echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'">'.$numberofSubscribers.'</p>';
			//echo '<button type="submit" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';		 	 
			//this is for proper styling of the subscribe button
			if($subscribeToUserInnerHtml=="Subscribe")
			{
			if($numberofSubscribers>=100)
		             {
		                 echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:72px">'.$numberofSubscribers.'</p>';
		             	echo '<button type="submit" style="letter-spacing:2px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
		             }
		             else if($numberofSubscribers<100&&$numberofSubscribers>10)
		             {
		                 echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:52px">'.$numberofSubscribers.'</p>';
		                 echo '<button type="submit" style="letter-spacing:2px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
		             }
		             else if($numberofSubscribers<=10)
		             {
		                 echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:32px">'.$numberofSubscribers.'</p>';
		                 echo '<button type="submit" style="letter-spacing:2px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
		             }
		          }else if($subscribeToUserInnerHtml=="Unsubscribe"){		             	
		           if($numberofSubscribers>=100)
		             {
		                 echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:72px">'.$numberofSubscribers.'</p>';
		                 echo '<button type="submit" style="letter-spacing:-0.7px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
		             }
		             else if($numberofSubscribers<100&&$numberofSubscribers>10)
		             {
		                 echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:52px">'.$numberofSubscribers.'</p>';
		                 echo '<button type="submit" style="letter-spacing:-0.7px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
		             }
		             else if($numberofSubscribers<=10)
		             {
		                 echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'" style="width:32px;">'.$numberofSubscribers.'</p>';
		                 echo '<button type="submit" style="letter-spacing:-0.7px" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';
		             }
		          }		 	
		 			 						 
			//echo' 	<button type="submit" class="likeimagebutton upvote" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'" style="background:url(https://image.freepik.com/free-icon/like-hand-symb6l-for-social-media-interface_318-30403.jpg)">'.$likesinnerhtml.'</button>';
			if($likesinnerhtml=="Like"){
				echo' 	<input type="image" class="likeimagebutton upvote like-button'.$imageId.'" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'" src="icons/undo_like_icon.jpg"></input>';
				//https://image.freepik.com/free-icon/like-hand-symb6l-for-social-media-interface_318-30403.jpg--like button url
			}else{
				echo' 	<input type="image" class="likeimagebutton upvote like-button'.$imageId.'" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'" src="icons/like_icon.jpg"></input>';
				//http://www.vox.com.my/vox/resources/user_1/512.png---like icon url
			}
					 	

			echo '<div class="posted-by"><h1 align="right" style="font-size:17px">posted by:<a href="userprofile.php?id='.$uploaderId.'" style="color:#9A12B3;">'.$uploader.'</a></h1></div>
					 	
			 	';

				/*echo '<p id="'.$memeCategorySubscribersLabel.'" name="'.$memeCategorySubscribersLabel.'">Number of Subscribers for '.$memecategory.' memes category:'.$memeCategorySubscribers.'</p>
				<button type="submit" onclick="memeCategorySubscribeFunction(\''.$imageId.'\',\''.$memecategory.'\',\''.$memeCategorySubscribersLabel.'\');" name="subscribecategory'.$memecategory.'">'.$subscribeToMemeCategoryInnerHtml.' to '.$memecategory.'</button>';*/

				 					 					 				 
				/*echo '
				 	<p class="datetime">'.getTime($datetime).'</p>

					 	

				 	<p name="Error'.$imageId.'"></p>

					 
					 
				 ';*/
				 //echo "display=".$displayFlagButton;
				
		echo '</div>';//dedicated-meme box div

		?>
		<div class="flag-message flag-message<?php echo $imageId; ?>" id="flag-message<?php echo $imageId; ?>" style="display:none">
			<p id="flag-p">Downvoting helps Meagl remove low quality, racist or pornographic content. You could tell us more about why you downvoted this meme:</p>
			<form class="flag-form" name="<?php echo $imageId; ?>" method="POST" action="">
				<input type="hidden" name="imageId" value="<?php echo $imageId; ?>">
  				<input type="radio" name="downvote" value="low-quality" checked> Low Quality Content<br>
				<input type="radio" name="downvote" value="pornographic"> Pornographic<br>
				<input type="radio" name="downvote" value="racist"> Racist/abusive<br>
				<input type="radio" name="downvote" value="plagiarism"> Plagiarism<br> 
				<input type="radio" name="downvote" value="other"> Other <br> 
				<button type="submit" class="btn flag-submit" name="<?php echo $imageId; ?>">Submit</button>
			</form> 
			

		</div>

		<div class="flag-message final-flag-message final-flag-message<?php echo $imageId; ?>" id="final-flag-message<?php echo $imageId; ?>" style="display:none;height:60px;font-size:20px;">
			<p id="flag-p" style="left:40px;letter-spacing:0.5px;">Thank you for reporting low quality content to Meagl.</p>
		</div>
		<?php

		//~~~~~~~~~~~~~~~~~right part~~~~~~~~~~~~~~~~~~~~~
		?>

		<div class="right-container">
			<div class="posters-plate">
				<h1 class="username" style="top:0px;left:180px;"><a href="userprofile.php?id=<?php echo $uploaderId; ?>"><?php echo $uploader; ?></a></h1>
   				<!--<h1 class="info-followers" style="top:50px;left:180px;">Subscribers: 21</h1>-->
   				<h1 class="info-subscribers" style="top:50px;left:180px;">Subscribers:</h1>
   				<h1 class="info-subscribers" id="<?php echo $subscribeLabel; ?>" name="<?php echo $subscribeLabel; ?>" style="top:50px;left:360px;"><?php echo $numberofSubscribers; ?></h1>
   				<!--<button class="btn" id="userprofile-subscribe-button" style="top:118px;left:180px;">Subscribe</button>-->
   				<!--<button type="submit" id="userprofile-subscribe-button" onclick="subscribeFunction(<?php //echo $imageId; ?>,<?php// echo $uploaderId; ?>,<?php //echo $subscribeLabel; ?>,<?php //echo $uploader; ?>);" name="subscribe<?php //echo $uploaderId; ?>" class="btn" style="top:118px;left:180px;"><?php //echo $subscribeToUserInnerHtml?></button>-->	
   				<?php
   				echo '<button type="submit" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" id="userprofile-subscribe-button" name="subscribe'.$uploaderId.'" class="btn" style="top:118px;left:180px;" >'.$subscribeToUserInnerHtml.'</button>	';
   				?>
   				<img id="infobox-dp" src="<?php echo $profilePictureLocation; ?>" style="left:10px;top:20px;">

   				<p class="posters-time"><i><span class="glyphicon glyphicon-alarm"></span><?php echo getTime($datetime); ?></i></p>
			</div>

			<div class="category-plate">
				<img src="<?php echo $categoryImageSource; ?>" class="category-dp">
		   		<h1 class="info-subscribers" style="top:0px;left:180px;"><?php echo $memecategory; ?></h1>
		   		<h1 class="info-subscribers" id="<?php echo $memeCategorySubscribersLabel; ?>" name="<?php echo $memeCategorySubscribersLabel; ?>" style="top:55px;left:180px;">Subscribers: <?php echo $memeCategorySubscribers; ?></h1>
		   		<!--<button class="btn" id="userprofile-subscribe-button" style="top:130px;left:180px;">Subscribe</button>-->
		   		<?php 
		   		echo '<button type="submit" onclick="memeCategorySubscribeFunction(\''.$imageId.'\',\''.$memecategory.'\',\''.$memeCategorySubscribersLabel.'\');" name="subscribecategory'.$memecategory.'" class="btn" id="userprofile-subscribe-button" style="top:130px;left:180px;">'.$subscribeToMemeCategoryInnerHtml.'</button>';
		   		?>  		
   			</div>
		

			<?php

			//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

			//Facebook and twitter share buttons
			if(isset($_GET['world'])){
			/*
			?>
			<div class="fb-share-button" data-href="http://localhost/memewebsite_test1/imagedisplay.php?id=<?php echo $imageId; ?>&amp;world=<?php echo $world; ?>&amp;uid=<?php echo $sharedWithUserId; ?>&amp;gid=<?php echo $sharedWithGroupId; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fmemewebsite_test1%2Fimagedisplay.php%3Fid%3D<?php echo $imageId; ?>%26world%3D<?php echo $world; ?>%26uid%3D<?php echo $sharedWithUserId; ?>%26gid%3D<?php echo $sharedWithGroupId; ?>&amp;src=sdkpreparse">Share</a></div>
			*/
			?>
			<div class="fb-share-button" data-href="http://www.meagl.com/imagedisplay.php?id=<?php echo $imageId; ?>&amp;world=<?php echo $world; ?>&amp;uid=<?php echo $sharedWithUserId; ?>&amp;gid=<?php echo $sharedWithGroupId; ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.meagl.com%2Fimagedisplay.php%3Fid%3D<?php echo $imageId; ?>%26world%3D<?php echo $world; ?>%26uid%3D<?php echo $sharedWithUserId; ?>%26gid%3D<?php echo $sharedWithGroupId; ?>&amp;src=sdkpreparse">Share</a></div>
			<a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-text="Check out this hilarious meme that I found here:" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

			<?php
			}

			?>
		</div>
		<?php
		echo '<p id="Error'.htmlentities($imageId).'" name="Error'.htmlentities($imageId).'" class="error-message"></p> '; 
		?>
		<div class="meme-description-box">
			<p class="meme-desc-content"><?php echo $memeDescription; ?></p>
		</div>
	<?php
	//comments system is made below
	date_default_timezone_set('Asia/Kolkata');//setting the timezone

	if(isset($world) && isset($sharedWithUserId) && isset($sharedWithGroupId)){
	?>	
		<div class="heading">
            	<h1 class="heading-part2 comments" id="<?php echo $numberOfCommentsLabel; ?>"><?php echo htmlentities($numberOfComments); ?> Comments</h1>
        </div>
		<div class="submission" id="submission-dedicated">
			<form method="post" class="commentform" id="commentform<?php echo htmlentities($imageId); ?>" action="" onsubmit="">
				<input type="hidden" id="imageId" value="<?php echo htmlentities($imageId); ?>">
			  	<input type="hidden" id="datetime" value="<?php echo date('Y-m-d H:i:s'); ?>">
			  	<input type="hidden" id="world" value="<?php echo htmlentities($world); ?>">
			  	<input type="hidden" id="sharedWithGroupId" value="<?php echo htmlentities($sharedWithGroupId); ?>">
			  	<input type="hidden" id="sharedWithUserId" value="<?php echo htmlentities($sharedWithUserId); ?>">
			  	<textarea class="comment-input form-control" rows="1" name="comment" id="comment" placeholder="Write comment" style="font-size:21px"></textarea>
			  	<?php
			 		if(isset($_SESSION['id'])){  
			 		//show the postcomment button only if the user has signed in			
			 		?>
			  	<button type="submit" class="postcomment btn submit-comment">Post</button>
			  	<?php
			 		}			
			 		?>
			</form>
		</div>

		<div class="comment-section" id="dedicated-comment-section">
			
		<div class="allcomments" id="allcomments">			
			
			<?php
			if(isset($userId))
			{	$sql= "SELECT * FROM commentstable WHERE (sharedWithWorld='$world' AND sharedWithGroupId='$sharedWithGroupId' AND (sharedWithUserId='$sharedWithUserId' OR sharedWithUserId='$userId')) ORDER BY id DESC";}
			else
			{	$sql= "SELECT * FROM commentstable WHERE (sharedWithWorld='$world' AND sharedWithGroupId='$sharedWithGroupId' AND (sharedWithUserId='$sharedWithUserId')) ORDER BY id DESC";}
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result))
			{	
				$commentForMemeId=$row['commentForMemeId'];
				if($commentForMemeId==$imageId){										
					$comment=$row['comment'];
					$datetime=$row['datetime'];
					$likes=$row['likes'];
					$numberOfReplies=$row['numberOfReplies'];
					$commentId=$row['id'];
					$commentByUserId=$row['commentByUserId'];

					$username=$row['commentByUserName'];
					$uId=mysqli_real_escape_string($conn,$row['commentByUserId']);

					$sql11="SELECT profilePictureLocation FROM memberstable WHERE id='$uId'";
					$result11=mysqli_query($conn,$sql11);
					$row11=mysqli_fetch_assoc($result11);
					$ppl=$row11['profilePictureLocation'];
					//echo nl2br(htmlentities($comment));
					//$comment=str_replace(["\r\n", "\r", "\n"], "<br/>",$comment);
					?>
					
					<div class="comment_div comments-dedicated comments" id="commentdiv<?php echo htmlentities($commentId); ?>">
						<a href="userprofile.php?id=<?php echo $uId; ?>">
		                	<div class="comment-top">
		                  		<img src="<?php echo $ppl; ?>" class="notif-dp" id="comment-dp">		                  
		                	</div>
		           		</a>
		           		<p class="real-comment">							
							<span class="username"><a href="userprofile.php?id=<?php echo $uId; ?>"><span id="dedicated-username"><?php echo htmlentities($username); ?></span></a></span>
							<span class="comment" id="comment<?php echo htmlentities($commentId); ?>" contenteditable="false"><?php echo htmlentities($comment); ?></span>
							<br>
							<?php
							//shows/hides reply button on clicking
							echo '<a class="showreplyformbutton action-link reply-link" name="'.htmlentities($commentId).'">Reply</a>';

							//comment like button
							$commentlikesLabel="commentlikes".$commentId;
							$commentlikesinnerhtml="Like";
							if(isset($_SESSION['id'])){
								//echo '<script language="javascript">alert("im in 1")</script>';
								$sql3= "SELECT likedByUserId FROM commentlikestable WHERE commentId='$commentId'";
								$result3=mysqli_query($conn,$sql3);
								while($row3=mysqli_fetch_assoc($result3)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
									if($row3['likedByUserId']==$_SESSION['id']){
										//echo '<script language="javascript">alert("im in commentlikes")</script>';
										$commentlikesinnerhtml="Undo Like";
										//echo '<script language="javascript">alert("'.$commentlikesinnerhtml.'")</script>';
										break;							
									}
								}
							}
							echo '<a class="likecommentbutton action-link like-link" onclick="commentlikeFunction(\''.htmlentities($commentId).'\',\''.htmlentities($commentlikesLabel).'\');" id="commentlike'.htmlentities($commentId).'" name="'.htmlentities($commentId).'">'.$commentlikesinnerhtml.'</a>';	
							
							//like button finished
							?>
							
								<span class="likes comment-info" id="commentlikes<?php echo htmlentities($commentId); ?>">Likes: <?php echo htmlentities($likes); ?></span>
								<span class="numberOfReplies comment-info comment-replies" id="numberOfReplies<?php echo htmlentities($commentId); ?>">Replies: <?php echo htmlentities($numberOfReplies); ?></span>
								
							<?php
							echo '<span class="datetime comment-info comment-time">'.getTime($datetime).'</span><br>';//echo is done specifically for this because otherwise, for some reason, date doesnot get displayed -_-' XD
							
							
							
							//changes 1.0 in the if block
							if(isset($_SESSION['id'])){
								if($commentByUserId==$_SESSION['id']){
									//if the comment has been by the user then it will show the delete option
									echo '<div><a class="display-edit"><span class="glyphicon glyphicon-chevron-down"></span></a></div>';
									echo '<div class="edit-panel"><button type="submit" class="deletecommentbutton" name="'.htmlentities($commentId).'">Delete</button><br>';	
									echo '<button type="submit" class="editcommentbutton" name="'.htmlentities($commentId).'">Edit</button>';//makes the comment editable	
									echo '<button type="submit" class="updatecommentbutton"  name="'.htmlentities($commentId).'" style="display:none">Update</button>';//updates the database with the changes to the comment
									echo '</div>';
								}
							}
							echo '<p id="commentLikeError'.htmlentities($commentId).'"></p>';
							echo '<form method="post" class="replyform" id="replyform'.htmlentities($commentId).'" action="" onsubmit="return postreply();"  style="display:none">
									<input type="hidden" id="commentId'.htmlentities($commentId).'" value="'.htmlentities($commentId).'">
				  					<input type="hidden" id="datetime'.htmlentities($commentId).'" value="'.date('Y-m-d H:i:s').'">
				  					<textarea class="reply-action form-control text-reply" rows="1" id="replytext'.htmlentities($commentId).'" placeholder="Write reply"></textarea><br>
				  					<button type="submit" name="'.htmlentities($commentId).'"  class="postreplybutton btn reply-action post-reply">Post</button>
								  </form>';				
							if($numberOfReplies>=1){
							
								echo '<a class="repliestogglebutton replies" name="'.htmlentities($commentId).'">Replies <span class="glyphicon glyphicon-chevron-down"></span></a>';
							}else{
								echo '<a class="repliestogglebutton replies" name="'.htmlentities($commentId).'" style="display:none">Replies <span class="glyphicon glyphicon-chevron-down"></span></a>';
							}
							
						?>
						</p>
						<?php
						echo '<div id="allreplies'.htmlentities($commentId).'" class="allreplies" style="display:none">';//we add the comment id of the comment to the end of "allreplies" ..this makes a unique name for every div containing all the replies to a particular meme...the above thing is done so that when we press the "show all replies" button, only the replies for that particular comment shall be shown
		
						if($numberOfReplies>=1){
							$sql1= "SELECT * FROM repliestable ORDER BY id";
							$result1=mysqli_query($conn,$sql1);
							while($row1=mysqli_fetch_assoc($result1))
							{	
								$replyToCommentId=$row1['replyToCommentId'];
					
								if($replyToCommentId==$commentId){
									$replyUsername=$row1['replyByUsername'];
									$reply=$row1['reply'];
									$replyDatetime=$row1['datetime'];
									$replyLikes=$row1['likes'];	
									$replyId=$row1['id'];
									$replyByUserId=mysqli_real_escape_string($conn,$row1['replyByUserId']);
					
									$replydivname="reply_div".$replyId;
									$replylikesLabel="replylikes".$replyId;
									$replylikesinnerhtml="Like";
									if(isset($_SESSION['id'])){
										//echo '<script language="javascript">alert("im in 1")</script>';
										$sql4= "SELECT likedByUserId FROM replylikestable WHERE replyId='$replyId'";
										$result4=mysqli_query($conn,$sql4);
										while($row4=mysqli_fetch_assoc($result4)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
											if($row4['likedByUserId']==$_SESSION['id']){
												//echo '<script language="javascript">alert("im in commentlikes")</script>';
												$replylikesinnerhtml="Undo Like";
												//echo '<script language="javascript">alert("'.$commentlikesinnerhtml.'")</script>';
												break;							
											}
										}
									}

									$sql5="SELECT profilePictureLocation FROM memberstable WHERE id='$replyByUserId'";
									$result5=mysqli_query($conn,$sql5);
									$row5=mysqli_fetch_assoc($result5);
									$replyPPL=$row5['profilePictureLocation'];
									//echo '<button type="submit" class="likereplybutton" onclick="replylikeFunction(\''.$commentId.'\',\''.$commentlikesLabel.'\');" id="commentlike'.$commentId.'" name="'.$commentId.'">'.$commentlikesinnerhtml.'</button>';
									
									echo '
										  <div class="reply_div reply-comment" id="'.htmlentities($replydivname).'">
										  	<a href="userprofile.php?id='.$replyByUserId.'">
								             	<div class="reply-comment-top">
								                		<img src="'.$replyPPL.'" class="notif-dp" id="comment-dp">
								               	</div>
								            </a> 
								            <p class="reply-real-comment">
								               	<span class="replyUsername"><a href="userprofile.php?id='.$replyByUserId.'"><span id="dedicated-username">'.htmlentities($replyUsername).'</span></a></span>
							                    <span class="reply" id="reply'.htmlentities($replyId).'" contenteditable="false">'.htmlentities($reply).'</span>
							                    <br>
							                    <a type="submit" class="likereplybutton reply-like-link" onclick="replylikeFunction(\''.htmlentities($replyId).'\',\''.htmlentities($replylikesLabel).'\');" id="replylike'.htmlentities($replyId).'"  name="'.htmlentities($replyId).'">'.$replylikesinnerhtml.'</a>
										  		<span id="replyLikeError'.htmlentities($replyId).'"></span>
							                    
							                    <span class="replyLikes comment-reply-info" id="replylikes'.htmlentities($replyId).'">Likes:'.htmlentities($replyLikes).'</span>
								           		<span class="replyDatetime">'.getTime($replyDatetime).'</span>
								            </p>
										  	';
										  											    
										  
										  	
											if(isset($_SESSION['id'])){
												if($replyByUserId==$_SESSION['id']){//if the reply has been posted by the same user who is viewing it, he'll get theoption to delete the reply
													
													echo '<div><a class="display-edit"><span class="glyphicon glyphicon-chevron-down"></span></a></div>';
													echo '<div class="edit-panel"><button type="submit" class="deletereplybutton" id="'.htmlentities($commentId).'" name="'.htmlentities($replyId).'">Delete</button><br>';
													echo '<button type="submit" class="editreplybutton" name="'.htmlentities($replyId).'">Edit</button>';//makes the reply editable	
													echo '<button type="submit" class="updatereplybutton"  name="'.htmlentities($replyId).'" style="display:none">Update</button>';//updates the database with the changes to the reply
													echo '</div>';
												}
											}
										  	
									echo '</div>';		
							
								}
							}
						}					
						echo '</div>';	
						?>
					</div>
					<?php		
				}
			}
		//}
			?>
		   </div>
		</div>
	  <?php
	}else{
		//if $world,$sharedWithUserId and $sharedWithGroupId are not set means the user has just uploaded the meme and this is the page being displayed on that meme's upload
		if(!isset($world) && $_SESSION['id']==$uploaderId)
		{
			echo "<p class='meme-sharing-header'>Meme Shared With:</p>
					<div class='shared-div'>
					";


			$sql="SELECT visibilityStatus FROM memestable WHERE /*(visibilityStatus=1 OR visibilityStatus=3) AND*/ id='$imageId'";//means, the meme has been shared with the world
			$result=mysqli_query($conn,$sql);
			if($row=mysqli_fetch_assoc($result)){
				//echo "visibilityStatus=".$row['visibilityStatus'];
				if($row['visibilityStatus']==1){
					//echo "yo";
					//only shared with the world
					echo '<a href="imagedisplay.php?id='.htmlentities($imageId).'&world=1&uid=0&gid=0" class="shared"><span style="position:relative;bottom:3.5px">The World: <span style="font-size:15px">Everyone on this website</span></span></a>';
				
				}else{
					//shared with the world and also with some user or group
					if($row['visibilityStatus']==3){			
						echo '<a href="imagedisplay.php?id='.htmlentities($imageId).'&world=1&uid=0&gid=0"  class="shared"><span style="position:relative;bottom:3.5px">The World: <span style="font-size:15px">Everyone on this website</span></span></a>';
					}

					if(isset($_SESSION['id']) && $_SESSION['id']==$uploaderId){
						//if the uploader himself is viewing it then show the groups and friends it's been shared with otherwise, dont show anything
										
						//searching for users and groups
						$sql1="SELECT userId,groupId FROM meme_sharing_visibility_table WHERE imageId='$imageId'";//means, the meme has been shared with the world
						$result1=mysqli_query($conn,$sql1);
						while($row1=mysqli_fetch_assoc($result1)){
							
							if($row1['groupId']!=0){
								//means this is a group share
								$groupId=$row1['groupId'];

								//getting the groupname
								$sql2="SELECT groupname FROM groups_table WHERE id='$groupId'";
								$result2=mysqli_query($conn,$sql2);
								$row2=mysqli_fetch_assoc($result2);
								$groupname=$row2['groupname'];
								echo '<p style="margin-bottom:5px;"><a href="imagedisplay.php?id='.htmlentities($imageId).'&world=0&uid=0&gid='.htmlentities($groupId).'"   class="shared">'.$groupname.'</a>: My Group</p>';
							}else{					
								//means this is a user share
								//echo 'user';
								$userId=$row1['userId'];					
								//getting the userpname
								$sql2="SELECT username FROM memberstable WHERE id='$userId'";
								$result2=mysqli_query($conn,$sql2);
								$row2=mysqli_fetch_assoc($result2);
								$username=$row2['username'];
								echo '<p style="margin-bottom:5px;"><a href="imagedisplay.php?id='.htmlentities($imageId).'&world=0&uid='.htmlentities($userId).'&gid=0"  class="shared">'.$username.'</a>: My Friend</p>';
							}
						}
					}
					
				}		

			}
		}
		else
		{
			echo "<p class='meme-sharing-header'>Meme Shared With:</p>
					<div class='shared-div'>
					";


			$sql="SELECT visibilityStatus FROM memestable WHERE /*(visibilityStatus=1 OR visibilityStatus=3) AND*/ id='$imageId'";//means, the meme has been shared with the world
			$result=mysqli_query($conn,$sql);
			if($row=mysqli_fetch_assoc($result)){
				//echo "visibilityStatus=".$row['visibilityStatus'];
				if($row['visibilityStatus']==1){
					//echo "yo";
					//only shared with the world
					echo '<a href="imagedisplay.php?id='.htmlentities($imageId).'&world=1&uid=0&gid=0" class="shared"><span style="position:relative;bottom:3.5px">The World: <span style="font-size:15px">Everyone on this website</span></span></a>';
				
				}else{
					//shared with the world and also with some user or group
					//echo $row['visibilityStatus'];
					if($row['visibilityStatus']==3){			
						echo '<a href="imagedisplay.php?id='.htmlentities($imageId).'&world=1&uid=0&gid=0"  class="shared"><span style="position:relative;bottom:3.5px">The World: <span style="font-size:15px">Everyone on this website</span></span></a>';
					}
					
					//if(isset($_SESSION['id']) && $_SESSION['id']==$uploaderId){
					//if the uploader himself is viewing it then show the groups and friends it's been shared with otherwise, dont show anything
										
					//searching for users and groups
					$sql1="SELECT userId,groupId FROM meme_sharing_visibility_table WHERE imageId='$imageId'";//means, the meme has been shared with the world
					$result1=mysqli_query($conn,$sql1);
					while($row1=mysqli_fetch_assoc($result1)){
							
						if($row1['groupId']!=0){
							//means this is a group share
							$groupId=mysqli_real_escape_string($conn,$row1['groupId']);
							$uid=mysqli_real_escape_string($conn,$_SESSION['id']);
							$sql101="SELECT participantId FROM group_participants_table WHERE participantId='$uid' AND groupId='$groupId' AND invitationStatus=1";
							$result101=mysqli_query($conn,$sql101);
							if(mysqli_num_rows($result101)!=0)
							{
								//getting the groupname
								$sql2="SELECT groupname FROM groups_table WHERE id='$groupId'";
								$result2=mysqli_query($conn,$sql2);
								$row2=mysqli_fetch_assoc($result2);
								$groupname=$row2['groupname'];
								echo '<p style="margin-bottom:5px;"><a href="imagedisplay.php?id='.htmlentities($imageId).'&world=0&uid=0&gid='.htmlentities($groupId).'"   class="shared">'.$groupname.'</a>: Your Group</p>';
							}
						}else{					
							//means this is a user share
							//echo 'user';
							$userId=mysqli_real_escape_string($conn,$row1['userId']);		
							if($userId==$_SESSION['id'])
							{									
								$username=$uploader;
								echo '<p style="margin-bottom:5px;"><a href="imagedisplay.php?id='.htmlentities($imageId).'&world=0&uid='.htmlentities($userId).'&gid=0"  class="shared">You</a>: Personal Sharing</p>';
							}
							
						}
					}
					
					
				}		

			}
		}
		

	}
}
else{
	echo '<p>This image has been flagged more than five times and is awaiting admin approval.</p></div>';
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

			$viewingStatus=$row['viewingStatus'];
			if($viewingStatus==0)
			{
				//only if the notification hasn't been viewed

				$notification=$row['notification'];
				$notificationId=mysqli_real_escape_string($conn,$row['id']);
				$datetime=$row['datetime'];
				$nL=$row['notificationLink'];

				$notifications_counter+=1;
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
				?>
					
				<a href="<?php echo htmlentities($nL); ?>" class="notif-link" id="notification<?php echo htmlentities($notificationId); ?>">	
				    <div class="notif">
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
</body>
</head>
</html>
