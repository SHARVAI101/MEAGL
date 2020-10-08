<?php

//refresh session
function refreshSession($userId)
{
	include 'dbh.php';
	$sql="SELECT username,memesUploaded,numberofSubscribers,numberOfQuestionsAsked,profilePictureLocation FROM memberstable WHERE id='$userId'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);

	$_SESSION['id']=$userId;
	$_SESSION['username']=$row['username'];
	$_SESSION['memesUploaded']=$row['memesUploaded'];
	$_SESSION['numberofSubscribers']=$row['numberofSubscribers'];
	$_SESSION['numberOfQuestionsAsked']=$row['numberOfQuestionsAsked'];
	$_SESSION['profilePictureLocation']=$row['profilePictureLocation'];
}

//load more part
if(isset($_POST['data_array']))
{	
	session_start();
	$load_more_type=$_POST['load_more_type'];
	if($load_more_type=="shuffled")
	{
		$array=$_SESSION['shuffled_memes_array'];
	}else{
		$array=unserialize(base64_decode($_POST['data_array']));
	}

	$upperlimit=$_POST['numberOfElementsInArray'];
	
	//$load_more_form_id=$_POST['load_more_form_id'];
	$session_counter_name=$_POST['session_counter_name'];

	//echo "functions::::";print_r($array);

	if($load_more_type=="question"){
		loadMoreQuestionsfunction($array,$upperlimit,$session_counter_name,$load_more_type,"hideform");
	}
	else{
		loadMorefunction($array,$upperlimit,$session_counter_name,$load_more_type,"hideform");
	}
}

function getTime($time){
	//$time is the time of the posting of the comment/image/meme/etc

	date_default_timezone_set('Asia/Kolkata');

	$timeOfPosting=new DateTime($time);
	$currentTime=  new DateTime(date('Y-m-d H:i:s'));

	$since_start = $timeOfPosting->diff($currentTime);

	$years=$since_start->y;
	$months=$since_start->m;
	$days=$since_start->d;
	$hours=$since_start->h;
	$minutes=$since_start->i;
	$seconds=$since_start->s;

	if($years!=0){
		if($years==1){
			return $years." year ago";
		}
		else{
			return $years." years ago";
		}
	}
	else if($months!=0){
		if($months==1){
			return $months." month ago";
		}
		else{
			return $months." months ago";
		}

	}
	else if($days!=0){
		if($days==1){
			return $days." day ago";
		}
		else{
			return $days." days ago";
		}
		
	}
	else if($hours!=0){
		if($hours==1){
			return $hours." hour ago";
		}
		else{
			return $hours." hours ago";
		}
		
	}
	else if($minutes!=0){
		if($minutes==1){
			return $minutes." minute ago";
		}
		else{
			return $minutes." minutes ago";
		}
		
	}
	else{
		if($seconds==1){
			return $seconds." second ago";
		}
		else{
			return $seconds." seconds ago";
		}
		
	}


	
}

//removes duplicate keys in an array based on a particular key(i.e., two or more array entries that have the same key will be removed and only one left)
function removeDuplicateArrayEntry($a, $key) {
    $uk=array();
    $array_final=array();
    foreach ($a as $v) {
        if(!in_array($v[$key], $uk)) {
            $uk[]=$v[$key];
            $array_final[]=$v;
        }
    }
    return $array_final;
}


//load more function
function loadMorefunction(&$array,$upperlimit,$session_counter_name,$load_more_type,$hf){
	include 'dbh.php';
	
	//session_start();
	$counter=0;
	$start_counter=0;
	//echo "upperlimit=".$upperlimit;
	//echo "session wala=".$_SESSION[$session_counter_name];
	$diff=$upperlimit-$_SESSION[$session_counter_name];
	//echo "diff=".$diff;
	if($diff<50)
	{
		$end=$diff;
	}
	else{
		$end=50;
	}
	//outputting 10 memes at a time	
	//echo "upperlimit=".$upperlimit;
	//echo "counter=".$_SESSION[$session_counter_name];

	//language part
	if(isset($_SESSION['id']))
	{
		$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

		$sql="SELECT viewerId FROM english_meme_viewers WHERE viewerId='$userId'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)!=0){
			$r_e=true;
		}else{
			$r_e=false;
		}

		$sql="SELECT viewerId FROM hinglish_meme_viewers WHERE viewerId='$userId'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)!=0){
			$r_h=true;
		}else{
			$r_h=false;
		}
	}else{
		$r_e=true;
		$r_h=true;
	}
	//echo "end=".$end;
	//echo $r_e."&".$r_h;

	$f=0;//counter for counting the meme number that is being considered in the given array...the most important counter
	foreach($array as $row)
	{	
		//echo $row['language'];

		//echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>";
		//echo "f=".$f;
		$f+=1;
		//print_r($row);//echo 'counter='.$counter;
		
			//echo "in".$row['language'];
		if($start_counter==$_SESSION[$session_counter_name])
		{

		if((((isset($r_e) && $r_e==true && isset($row['language']) && $row['language']=="english")||((isset($r_h) && $r_h==true && isset($row['language']) && $row['language']=="hinglish")))|| (isset($row['uploaderId']) && isset($_SESSION['id']) && $row['uploaderId']==$_SESSION['id'])||(isset($row['askerId']) && isset($_SESSION['id']) && $row['askerId']==$_SESSION['id']))||(isset($row['type'])))
		{
			
			if($counter==$end)
			{
				break;
			}
			
			$counter+=1;
			//echo "counter(inner after +1)=".$counter;
			//echo $row['type'];
			if(!isset($row['type'])){
			
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
			$imageId=mysqli_real_escape_string($conn,$row['id']);

			$likesLabel="likes".$imageId;
			$datetime=$row['datetime'];

			if($load_more_type=="recommended" || ($load_more_type=="shuffled" && isset($_SESSION['id'])))
			{
				//origin
				$origin=$row['origin'];
				if($origin=="world"){
					$originLabel="from The World";
					$link="&world=1&uid=0&gid=0";
				}
				else if($origin=="friends"){
					$originLabel="from My Friends";

					$sql1001="SELECT userId FROM meme_sharing_visibility_table WHERE (groupId=0 AND imageId='$imageId')";
					$result1001=mysqli_query($conn,$sql1001);
					$row1001=mysqli_fetch_assoc($result1001);
					$link="&world=0&uid=".$row1001['userId']."&gid=0";
				}
				else{
					$originLabel="from My Groups";
					$sql1001="SELECT groupId FROM meme_sharing_visibility_table WHERE (userId=0 AND imageId='$imageId')";
					$result1001=mysqli_query($conn,$sql1001);
					$row1001=mysqli_fetch_assoc($result1001);
					$link="&world=0&uid=0&gid=".$row1001['groupId'];
				}
			}
			/*else if($load_more_type=="my_memes")
			{
				$link="";
			}*/
			else{
				$link="&world=1&uid=0&gid=0";
			}
			

			//$numberOfFlags=$row['flags'];
			$sql100="SELECT id FROM image_flags_table WHERE flagType!='low-quality' AND imageId='$imageId'";
			$result100=mysqli_query($conn,$sql100);
			$numberOfFlags=mysqli_num_rows($result100);
			

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
			
			$numberOfComments=$row['numberOfComments'];
			$numberOfCommentsLabel="comments".$imageId;

			//LIKING
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
					$userId=mysqli_real_escape_string($conn,$_SESSION['id']);

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
			//echo "flags=".$numberOfFlags."<br>";
			if($numberOfFlags<5 && $flaggedByCurrentUser==false)
			{
				echo '<div class="meme centering meme-box'.$imageId.'"  id="meme-box'.$imageId.'">
					 	<a href="imagedisplay.php?id='.$imageId.$link.'" target="_blank" class="title" style="margin-bottom:7px;margin-top:10px">'.$memetitle.'</a>';
				/*if($load_more_type=="recommended" || ($load_more_type=="shuffled" && isset($_SESSION['id'])))
				{
				echo 	'<h1 class="origin" style="color:#9A12B3">'.$originLabel.'</h1>';
				}*/
				$sql6969="SELECT verified FROM memberstable WHERE id='$uploaderId' AND verified=1";
				$result6969=mysqli_query($conn,$sql6969);
				if(mysqli_num_rows($result6969)>0)
				{
					//if($uploaderId!=$_SESSION['id'] || !isset($_SESSION['id']))
					//{
						echo '<a href="tip-memer.php?imageId='.$imageId.'" class="origin memebox-tip" style="background-color:#D81B60;color:white;padding:7px 20px 7px 20px;border-radius:5px;margin-top:7px" target="_blank" onMouseOver="this.style.backgroundColor=\'#ff7675\'" onMouseOut="this.style.backgroundColor=\'#D81B60\'">TIP</a>';
					//}
				}

				echo    '<a href="imagedisplay.php?id='.$imageId.$link.'" target="_blank"><img class="image" src="'.$imagelocation.'" alt="'.$memetitle.'"></a>
					 	<p class="points" name="'.$likesLabel.'" style="margin-top:7px">'.$numberOfLikes.' likes</p>
					 	<p class="comments" id="'.$numberOfCommentsLabel.'" style="margin-top:7px">'.$numberOfComments.' Comments</p>
					 	<div class="category_1">
					 	<p  align="right" style="font-size:17px;" class="category">Category: <a href="'.$category_link.'" style="color:#9A12B3">'.$memecategory.'</a>
					 		
					 	</p></div>
					 	';


				if($displayFlagButton==true){
					//echo "in";
					echo '<input type="image" class="flagimagebutton flag" name="'.$imageId.'" id="imageFlagButton'.$imageId.'" style="display:inline" alt="Downvote"></input>';
					echo '<p id="flagimage'.$imageId.'"></p>';
					
				}else{
					if($flaggedByCurrentUser==true){
						echo '<p class="error-message">You have flagged this image!</p>';
					}
					else{
						echo '<p></p>';//this is for CSS debugging..if this is not done tthen everything collapses in the meme box
					}
					
				}

					 //echo '<a href="#"><img src="https://image.freepik.com/iconos-gratis/comentario-de-chat-discurso-burbuja-oval-con-lineas-de-texto_318-70514.jpg" class="comment"></a>';

					 //echo '<a href="imagedisplay.php?id='.htmlentities($imageId).$link.'#Error'.htmlentities($imageId).'" target="_blank"><img src="https://image.freepik.com/iconos-gratis/comentario-de-chat-discurso-burbuja-oval-con-lineas-de-texto_318-70514.jpg" class="comment"></a>';
					   echo '<a href="imagedisplay.php?id='.htmlentities($imageId).$link.'#Error'.htmlentities($imageId).'" target="_blank"><i class="fa fa-comments" aria-hidden="true" class="comment" style="font-size:40px;margin:10px"></i></a>';
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
						//echo' 	<input type="image" class="likeimagebutton upvote like-button'.$imageId.'" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'" src="icons/undo_like_icon.jpg"></input>';
						//font awesome:(paste inside span)<i class="far fa-thumbs-up" style="height:40px;width:40px;cursor:pointer;color:#D81B60"></i>
						echo '<span class="likeimagebutton upvote like-button'.$imageId.'" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'"><i class="fas fa-thumbs-up" style="font-size:38px;cursor:pointer;color:#BDBDBD"></i></span>';
						//https://image.freepik.com/free-icon/like-hand-symb6l-for-social-media-interface_318-30403.jpg--like button url
					}else{
						//echo' 	<input type="image" class="likeimagebutton upvote like-button'.$imageId.'" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'" src="icons/like_icon.jpg"></input>';
						//font awesome:<i class="fas fa-thumbs-up" style="height:40px;width:40px;cursor:pointer;color:#D81B60"></i>
						echo '<span class="likeimagebutton upvote like-button'.$imageId.'" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'"><i class="fas fa-thumbs-up" style="font-size:38px;cursor:pointer;color:#D81B60"></i></span>';
						//http://www.vox.com.my/vox/resources/user_1/512.png---like icon url
					}
					 	

					echo '<div class="posted-by"><p align="right" style="font-size:17px;margin-bottom:7px">posted by:<a href="userprofile.php?id='.$uploaderId.'" style="color:#9A12B3;">'.$uploader.'</a></p></div>
					 	
					 	';

					/*echo '<p id="'.$memeCategorySubscribersLabel.'" name="'.$memeCategorySubscribersLabel.'">Number of Subscribers for '.$memecategory.' memes category:'.$memeCategorySubscribers.'</p>
					<button type="submit" onclick="memeCategorySubscribeFunction(\''.$imageId.'\',\''.$memecategory.'\',\''.$memeCategorySubscribersLabel.'\');" name="subscribecategory'.$memecategory.'">'.$subscribeToMemeCategoryInnerHtml.' to '.$memecategory.'</button>';*/

				 					 					 				 
					/*echo '
					 	<p class="datetime">'.getTime($datetime).'</p>

					 	

					 	<p name="Error'.$imageId.'"></p>

					 
					 
					 ';*/

				//echo "display=".$displayFlagButton;
				
				echo '</div>
					  <p name="Error'.$imageId.'" class="error-message"></p>';

				?>

				<div class="flag-message flag-message<?php echo $imageId; ?>" id="flag-message<?php echo $imageId; ?>" style="display:none">
					<p id="flag-p">Downvoting helps Meagl remove low quality, racist or pornographic content. You could tell us more about why you downvoted this meme:</p>
					<form class="flag-form" name="<?php echo $imageId; ?>" method="POST" action="" style="margin-top:-65px">
						<input type="hidden" name="imageId" value="<?php echo $imageId; ?>">
  						<input type="radio" name="downvote" value="low-quality" checked> Low Quality Content<br>
						<input type="radio" name="downvote" value="pornographic"> Pornographic<br>
						<input type="radio" name="downvote" value="racist"> Racist/abusive<br>
						<input type="radio" name="downvote" value="plagiarism"> Plagiarism<br> 
						<input type="radio" name="downvote" value="other"> Other <br> <br><br>
						<button type="submit" class="btn flag-submit" name="<?php echo $imageId; ?>">Submit</button>
					</form> 
					

				</div>

				<div class="flag-message final-flag-message final-flag-message<?php echo $imageId; ?>" id="final-flag-message<?php echo $imageId; ?>" style="display:none;height:60px;font-size:20px;">
					<p id="flag-p" style="left:40px;letter-spacing:0.5px;">Thank you for reporting low quality content to Meagl.</p>
				</div>

				<?php
			}

			}//question "if" statement end
			else{
				printQuestion($row);
			}
		}

		}
		else
		{
			$start_counter+=1;
		}

		
	}
	//echo "`~~~~~~~~~~~~~```upperlimit=".$upperlimit;
	if($_SESSION[$session_counter_name]==0){
		$print_hideform=false;
	}
	else{
		$print_hideform=true;
	}

	$_SESSION[$session_counter_name]=$f;
	//to hide the load more button
	if($hf=="hideform" && $print_hideform==true){
		if($upperlimit<=$_SESSION[$session_counter_name])
		{
			echo " hide_form";
		}
	}
	

}


//load more questions function
function loadMoreQuestionsfunction(&$array,$upperlimit,$session_counter_name,$load_more_type,$hf){
	include 'dbh.php';
	//session_start();
	$counter=0;
	$start_counter=0;
	$diff=$upperlimit-$_SESSION[$session_counter_name];
	if($diff<=50)
	{
		$end=$diff;
	}
	else{
		$end=50;
	}
	//outputting 50 memes at a time	
	$f=0;
	foreach($array as $row)
	{
		$f+=1;
		if($start_counter==$_SESSION[$session_counter_name])
		{

			if($counter==$end)
			{
				break;
			}
			$counter+=1;

			$question=$row['question'];
		    $datetime=$row['datetime'];
		    $memeDestination=$row['memeDestination'];
		    $askerId=$row['askerId'];
		    $askerUsername=$row['askerUsername'];
		    $questionId=$row['id'];
		    $likes=$row['likes'];    
		    $numberOfViews=$row['views'];
		    $numberOfAnswers=$row['numberOfAnswers'];
		    $numberOfFlags=$row['flags'];

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
			//echo "flags=".$numberOfFlags."<br>";
			if($numberOfFlags<5 && $flaggedByCurrentUser==false)
			{

			    /*echo '<div id="question-meme'.$questionId.'" class="question-meme question-meme'.$questionId.'">
			            <h1 class="q-header">Q</h1>
			            <a href="questiondisplay.php?id='.htmlentities($questionId).'"><p class="question-title"><a href="userprofile.php?id='.htmlentities($askerId).'"><span class="question-by">'.htmlentities($askerUsername).'</span></a>'.$question.'</p></a>
			            <h6 class="question-time"><i>- '.getTime($datetime).'</i></h6>
			            <a href="questiondisplay.php?id='.htmlentities($questionId).'"><img src="'.$memeDestination.'" class="meme" id="question-image"></a><br>
			            <h5 class="question-likes" name="'.htmlentities($likesLabel).'">'.htmlentities($likes).' likes</h5>
			            <h5 class="answers-count">'.htmlentities($numberOfAnswers).' answers</h5>
			            <h5 class="views-count">'.htmlentities($numberOfViews).' views</h5> <br> ';
			            
			    echo   '<button type="submit" class="likequestionbutton question-action" onclick="questionlikeFunction(\''.htmlentities($questionId).'\',\''.htmlentities($likesLabel).'\');" id="questionlike'.htmlentities($questionId).'" name="questionlike'.htmlentities($questionId).'">'.$questionlikesinnerhtml.'</button>';*/
			            //<a class="question-action">Like</a>

			    //echo   '<a class="question-action">Downvote</a>';

			   echo '<div id="question-meme'.$questionId.'" class="question-meme question-meme'.$questionId.'">
			            <h1 class="q-header">Q</h1>
			            <a href="questiondisplay.php?id='.htmlentities($questionId).'" target="_blank"><p class="question-title">'.$question.'</a><span class="question-by">-posted by <a href="userprofile.php?id='.htmlentities($askerId).'">'.htmlentities($askerUsername).'</span></a></p>
			            
			            <a href="questiondisplay.php?id='.htmlentities($questionId).'" target="_blank"><img src="'.$memeDestination.'" class="meme" id="question-image"></a><br>
			            <h5 class="question-likes" name="'.htmlentities($likesLabel).'">'.htmlentities($likes).' likes</h5>
			            <h5 class="answers-count">'.htmlentities($numberOfAnswers).' answers</h5>
			            <h5 class="views-count">'.htmlentities($numberOfViews).' views</h5>';

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

				        //<a class="question-action">Like</a>

				//echo   '<a class="question-action">Downvote</a>';
				        


				

			    echo ' 	<a class="answer-btn" href="questiondisplay.php?id='.htmlentities($questionId).'#Error'.htmlentities($questionId).'" target="_blank">Write an Answer</a>
			            <a class="develop-btn" href="developQuestionFurther.php" target="_blank">Develop further<span class="glyphicon glyphicon-chevron-right"></span></a>
			          </div>
			          ';
			    echo '<p id="Error'.htmlentities($questionId).'" name="Error'.htmlentities($questionId).'" class="error-message"></p>';
				?>
				
				<div class="flag-message flag-question-message<?php echo $questionId; ?>" id="flag-question-message<?php echo $questionId; ?>" style="display:none;margin-left:400px">
					<p id="flag-p">Downvoting helps Meagl remove low quality, racist or pornographic content. You could tell us more about why you downvoted this meme:</p>
					<form class="flag-form flag-question-form" name="<?php echo $questionId; ?>" method="POST" action="" style="margin-top:-60px">
						<input type="hidden" name="questionId" value="<?php echo $questionId; ?>">
						<input type="radio" name="downvote" value="pornographic"> Pornographic<br>
						<input type="radio" name="downvote" value="racist"> Racist/abusive<br>
						<input type="radio" name="downvote" value="plagiarism"> Plagiarism<br> 
						<input type="radio" name="downvote" value="other"> Other <br> <br><br>
						<button type="submit" class="btn flag-submit" name="<?php echo $questionId; ?>">Submit</button>
					</form> 
						

				</div>

				<div class="flag-message final-flag-message final-question-flag-message<?php echo $questionId; ?>" id="final-question-flag-message<?php echo $questionId; ?>" style="display:none;height:60px;font-size:20px;">
					<p id="flag-p" style="left:40px;letter-spacing:0.5px;">Thank you for reporting low quality content to Meagl.</p>
				</div>
			<?php
			}

		}
		else
		{
			$start_counter+=1;
		}
	}

	$print_hideform=false;
	if($_SESSION[$session_counter_name]==0){
		$print_hideform=false;
	}else{
		$print_hideform=true;
	}
	
	$_SESSION[$session_counter_name]=$f;
	//to hide the load more button
	if($hf=="hideform" && $print_hideform==true){
		if($upperlimit<=$_SESSION[$session_counter_name])
		{
			echo " hide_form";
		}
	}
	

}

function printQuestion(&$row){
	include 'dbh.php';

	//print_r($row);
	$question=$row['question'];
	$datetime=$row['datetime'];
	$memeDestination=$row['memeDestination'];
	$askerId=$row['askerId'];
	$askerUsername=$row['askerUsername'];
	$questionId=$row['id'];
	$likes=$row['likes'];    
	$numberOfViews=$row['views'];
	$numberOfAnswers=$row['numberOfAnswers'];
	$numberOfFlags=$row['flags'];

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
	//echo "flags=".$numberOfFlags."<br>";
	if($numberOfFlags<5 && $flaggedByCurrentUser==false)
	{
		/*echo '<div id="question-meme'.$questionId.'" class="question-meme question-meme'.$questionId.'">
		        <h1 class="q-header">Q</h1>
		        <a href="questiondisplay.php?id='.htmlentities($questionId).'"><p class="question-title"><a href="userprofile.php?id='.htmlentities($askerId).'"><span class="question-by">'.htmlentities($askerUsername).'</span></a>'.$question.'</p></a>
		        <h6 class="question-time"><i>- '.getTime($datetime).'</i></h6>
		        <a href="questiondisplay.php?id='.htmlentities($questionId).'"><img src="'.$memeDestination.'" class="meme" id="question-image"></a><br>
		        <h5 class="question-likes" name="'.htmlentities($likesLabel).'">'.htmlentities($likes).' likes</h5>
		        <h5 class="answers-count">'.htmlentities($numberOfAnswers).' answers</h5>
		        <h5 class="views-count">'.htmlentities($numberOfViews).' views</h5> <br> ';
			            
		echo   '<button type="submit" class="likequestionbutton question-action" onclick="questionlikeFunction(\''.htmlentities($questionId).'\',\''.htmlentities($likesLabel).'\');" id="questionlike'.htmlentities($questionId).'" name="questionlike'.htmlentities($questionId).'">'.$questionlikesinnerhtml.'</button>';*/

		echo '<div id="question-meme'.$questionId.'" class="question-meme question-meme'.$questionId.' index-question-meme">
			            <h1 class="q-header">Q</h1>
			            <a href="questiondisplay.php?id='.htmlentities($questionId).'" target="_blank"><p class="question-title">'.$question.'</a><span class="question-by">-posted by <a href="userprofile.php?id='.htmlentities($askerId).'">'.htmlentities($askerUsername).'</span></a></p>
			            
			            <a href="questiondisplay.php?id='.htmlentities($questionId).'" target="_blank"><img src="'.$memeDestination.'" class="meme" id="question-image"></a><br>
			            <h5 class="question-likes" name="'.htmlentities($likesLabel).'">'.htmlentities($likes).' likes</h5>
			            <h5 class="answers-count">'.htmlentities($numberOfAnswers).' answers</h5>
			            <h5 class="views-count">'.htmlentities($numberOfViews).' views</h5>';

		if($displayFlagButton==true){
			//echo "in";
			//echo '<input type="image" class="flagimagebutton flag" name="'.$imageId.'" id="imageFlagButton'.$imageId.'" style="display:inline" src="icons/flag_icon.jpg"> Downvote</input>';
			echo '<input type="image" class="flagquestionbutton flag question-action" name="'.$questionId.'" id="questionFlagButton'.$questionId.'" alt="Downvote"></input>';
			echo '<p id="flagquestion'.$questionId.'"></p>';					
		}else{
			if($flaggedByCurrentUser==true){
				echo '<p>You have flagged this question!</p>';
			}
			else{
				echo '<p></p>';//this is for CSS debugging..if this is not done tthen everything collapses in the meme box
			}
					
		}


		echo '<h6 class="question-time"><i>- '.getTime($datetime).'</i></h6> <br> ';
			            
		echo   '<button type="submit" class="likequestionbutton question-action" onclick="questionlikeFunction(\''.htmlentities($questionId).'\',\''.htmlentities($likesLabel).'\');" id="questionlike'.htmlentities($questionId).'" name="questionlike'.htmlentities($questionId).'">'.$questionlikesinnerhtml.'</button>';

		        //<a class="question-action">Like</a>

		//echo   '<a class="question-action">Downvote</a>';
		        

		

		echo ' 	<a class="answer-btn" href="questiondisplay.php?id='.htmlentities($questionId).'#Error'.htmlentities($questionId).'" target="_blank">Write an Answer</a>
			    <a class="develop-btn" href="developQuestionFurther.php" target="_blank">Develop further<span class="glyphicon glyphicon-chevron-right"></span></a>
			  </div>
			  ';
		echo '<p id="Error'.htmlentities($questionId).'" name="Error'.htmlentities($questionId).'" class="error-message"></p>';
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
		<?php
	}
}