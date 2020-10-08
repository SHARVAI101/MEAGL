<?php 
ob_start();
include 'top.php';
$b=ob_get_contents();
ob_end_clean();

$title = "User Image Sharing";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

echo $buffer;
include 'dbh.php';
include_once 'functions.php';

$userId=mysqli_real_escape_string($conn,$_GET['id']);

//if(isset($_SESSION['id'])){
$currentUserId=mysqli_real_escape_string($conn,$_SESSION['id']);
//}
//echo "uid=".$userId."cuid".$currentUserId;
$sql900="SELECT username,profilePictureLocation FROM memberstable WHERE id='$userId'";
$result900=mysqli_query($conn,$sql900);
$row900=mysqli_fetch_assoc($result900);
$uname=$row900['username'];
$ppL=$row900['profilePictureLocation'];
echo '<div class="group">
		<img src="'.$ppL.'" style="width=200px;height:200px;" id="group_dp">
		<h4 class="group-name" style="margin-left:90px;">'.$uname.'</h4>';
		//put the number of subs and sub button from savage here
echo '</div>';
echo '<div class="right-container" style="width:600px;margin-left:40px;margin-top:55px">';
$sql1001="SELECT imageId FROM meme_sharing_visibility_table WHERE ((uploaderId='$currentUserId' AND userId='$userId') OR (uploaderId='$userId' AND userId='$currentUserId')) ORDER BY id DESC ";
$result1001=mysqli_query($conn,$sql1001);
//echo "adas";
while($row1001=mysqli_fetch_assoc($result1001)){
	$imageId=$row1001['imageId'];
	
	//MEME UPLOAD DATA ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	$sql= "SELECT * FROM memestable WHERE id='$imageId'";
	$result=mysqli_query($conn,$sql);
	//printing all the memes one by one
	//echo "asdasdasd";
	while($row=mysqli_fetch_assoc($result)){
		////echo "dfghjksamnbgdasv";
		$imagelocation=$row['memeDestination'];
		$memetitle=$row['memetitle'];
		$uploader=$row['uploader'];
		//obtaining user id and number of subscribers
		$uploaderId=$row['uploaderId'];
		$sql1= "SELECT * FROM memberstable WHERE id='$uploaderId'";
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_assoc($result1);
		$numberofSubscribers=$row1['numberofSubscribers'];
		//subscribers obtained
		//$imageId=$row['id'];
		$likesLabel="likes".$imageId;
		$datetime=$row['datetime'];
		$numberOfFlags=$row['flags'];
		//subscribe
		$subscribeLabel="subscribers".$uploaderId;
		$numberOfLikes=$row['likes'];//obtains the likes for this particular meme
		$subscribeToUserInnerHtml="Subscribe";
		if(isset($_SESSION['id'])){
			//echo '<script language="javascript">alert("im in 1")</script>';
			$sql6= "SELECT subscribedById FROM subscriberstable WHERE uploaderId='$uploaderId'";
			$result6=mysqli_query($conn,$sql6);
			while($row6=mysqli_fetch_assoc($result6)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
				if($row6['subscribedById']==$_SESSION['id']){
					//echo '<script language="javascript">alert("im in 2")</script>';
					$subscribeToUserInnerHtml="Unsubscribe";
				}
			}
		}
					
		//$numberOfComments=$row['numberOfComments'];
		$sql100="SELECT numberOfComments FROM meme_sharing_visibility_table WHERE imageId='$imageId' AND userId='$userId' AND groupId=0";
		$result100=mysqli_query($conn,$sql100);
		$row100=mysqli_fetch_assoc($result100);
		$numberOfComments=$row100['numberOfComments'];
		$numberOfCommentsLabel="comments".$imageId;


		$likesinnerhtml="Like";
		if(isset($_SESSION['id'])){
			$sql2= "SELECT likedByuserId FROM likestable WHERE imageId='$imageId'";
			$result2=mysqli_query($conn,$sql2);
			while($row2=mysqli_fetch_assoc($result2)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
				if($row2['likedByuserId']==$_SESSION['id']){
					$likesinnerhtml="Undo Like";
				}
			}
		}
		$likeErrorLabel="Error".$imageId;
		$likeButtonId="like".$imageId;
		//subscribers for the meme category
		$memecategory=$row['memeCategory'];//gets the meme category
		$sql4="SELECT totalSubscribers FROM memecategoriestable WHERE memeCategory='$memecategory'";
		$result4=mysqli_query($conn,$sql4);
		while($row4=mysqli_fetch_assoc($result4)){
			$memeCategorySubscribers=$row4['totalSubscribers'];//stores the total number of subscribers for this meme category
		}
		$memeCategorySubscribersLabel="categorySubscribe".$memecategory;
					
		$subscribeToMemeCategoryInnerHtml="Subscribe";
		if($memecategory=="Savage"){
			$tableName="savagememessubscriberstable";
			$category_link="savagememes.php";
		}else if($memecategory=="Sports"){
			$tableName="sportsmemessubscriberstable";
			$category_link="sportsmemes.php";
		}else if($memecategory=="Gaming"){
			$tableName="gamingmemessubscriberstable";
			$category_link="gamingmemes.php";
		}else if($memecategory=="Comics"){
			$tableName="comicmemessubscriberstable";
			$category_link="comicmemes.php";
		}else if($memecategory=="Celeb"){
			$tableName="celebmemessubscriberstable";
			$category_link="celebmemes.php";
		}else if($memecategory=="College / School"){
			$tableName="collegememessubscriberstable";
			$category_link="college_school_memes.php";
		}else if($memecategory=="Politics"){
			$tableName="politicsmemessubscriberstable";
			$category_link="politics_memes.php";
		}else if($memecategory=="Just My Thoughts"){
			$tableName="justmythoughtsmemessubscriberstable";
			$category_link="justmythoughts.php";
		}else if($memecategory=="Other"){
			$tableName="othermemessubscriberstable";
			$category_link="othermemes.php";
		}
		if(isset($_SESSION['id'])){
			$uId=mysqli_real_escape_string($conn,$_SESSION['id']);
			//echo '<script language="javascript">alert("im in 1")</script>';
			$sql6= "SELECT subscribedByUserId FROM $tableName WHERE subscribedByUserId='$uId'";
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
							$uId=mysqli_real_escape_string($conn,$_SESSION['id']);

							$sql7="SELECT flaggerUserId FROM image_flags_table WHERE imageId='$imageId' AND flaggerUserId='$uId'";
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

					//echo '<div class="right-container" style="width:600px;margin-left:40px;margin-top:55px">';
					if($numberOfFlags<5 && $flaggedByCurrentUser==false)
					{	

						echo '<div class="meme centering meme-box'.$imageId.'"  id="meme-box'.$imageId.'">
							 	<a href="imagedisplay.php?id='.$imageId.'&world=0&uid='.htmlentities($userId).'&gid=0" target="_blank"><h1 class="title">'.$memetitle.'</h1></a>';
						/*if($load_more_type=="recommended")
						{
						echo 	'<h1 class="origin" style="color:#9A12B3">'.$originLabel.'</h1>';
						}*/
						echo    '<a href="imagedisplay.php?id='.$imageId.'&world=0&uid='.htmlentities($userId).'&gid=0" target="_blank"><img class="image" src="'.$imagelocation.'"></a>
							 	<h1 class="points" name="'.$likesLabel.'">'.$numberOfLikes.' likes</h1>
							 	<h1 class="comments" id="'.$numberOfCommentsLabel.'">'.$numberOfComments.' Comments</h1>
							 	<div class="category_1">
							 	<h1  align="right" style="font-size:17px;" class="category">Category: <a href="'.$category_link.'" style="color:#9A12B3">'.$memecategory.'</a>
							 		
							 	</h1></div>
							 	';


						if($displayFlagButton==true){
							//echo "in";
							echo '<input type="image" class="flagimagebutton flag" name="'.$imageId.'" id="imageFlagButton'.$imageId.'" style="display:inline" src="icons/flag_icon.jpg"> Downvote</input>';
							echo '<p id="flagimage'.$imageId.'"></p>';
							
						}else{
							if($flaggedByCurrentUser==true){
								echo '<p>You have flagged this image!</p>';
							}
							else{
								echo '<p></p>';//this is for CSS debugging..if this is not done tthen everything collapses in the meme box
							}
							
						}

							 //echo '<a href="#"><img src="https://image.freepik.com/iconos-gratis/comentario-de-chat-discurso-burbuja-oval-con-lineas-de-texto_318-70514.jpg" class="comment"></a>';

							 echo '<a href="imagedisplay.php?id='.htmlentities($imageId).'&world=0&uid='.htmlentities($userId).'&gid=0#Error'.htmlentities($imageId).'" target="_blank"><img src="https://image.freepik.com/iconos-gratis/comentario-de-chat-discurso-burbuja-oval-con-lineas-de-texto_318-70514.jpg" class="comment"></a>';

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

							 //echo '<p class="subscribers" id="'.$subscribeLabel.'" name="'.$subscribeLabel.'">'.$numberofSubscribers.'</p>';

							 //echo '<button type="submit" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'" class="btn subscribe-button">'.$subscribeToUserInnerHtml.'</button>	';		 	 
							 	
				 			 						 
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
						
						echo '</div>';
						echo '<p name="Error'.htmlentities($imageId).'" class="error-message"></p>';
						?>

						<div class="flag-message flag-message<?php echo $imageId; ?>" id="flag-message<?php echo $imageId; ?>" style="display:none">
							<p id="flag-p">Downvoting helps Meagl remove low quality or pornographic content. You could tell us more about why you downvoted this meme:</p>
							<form class="flag-form" name="<?php echo $imageId; ?>" method="POST" action="">
								<input type="hidden" name="imageId" value="<?php echo $imageId; ?>">
		  						<input type="radio" name="downvote" value="low-quality" checked> Low Quality Content<br>
								<input type="radio" name="downvote" value="pornographic"> Pornographic<br>
								<input type="radio" name="downvote" value="racist"> Racist/abusive<br>
								<input type="radio" name="downvote" value="plagiarism"> Plagiared<br> 
								<input type="radio" name="downvote" value="other"> Other <br> 
								<button type="submit" class="btn flag-submit" name="<?php echo $imageId; ?>">Submit</button>
							</form> 
							

						</div>

						<div class="flag-message final-flag-message final-flag-message<?php echo $imageId; ?>" id="final-flag-message<?php echo $imageId; ?>" style="display:none;height:60px;font-size:20px;">
							<p id="flag-p" style="left:40px;letter-spacing:0.5px;">Thank you for reporting low quality content to Meagl.</p>
						</div>	
					
					<?php	
					}
					//}	//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
					//echo"finiah";
	}	
	//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
}
echo '</div>';
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
</div>
</body>
</html>