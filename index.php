<?php 
ob_start();
include 'top.php';
$b=ob_get_contents();
ob_end_clean();

$title = "MEAGL";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

echo $buffer;

include 'dbh.php';
include_once 'functions.php';
/*if(isset($_SESSION['id'])){
	echo '<a href="userprofile.php">Back to profile page</a>';
}
else{
	echo '<a href="index.php">Back to home page</a>';
}*/
//$startTime = microtime(true);
if(isset($_SESSION['id'])){
	$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
}

//groups part
if(isset($_SESSION['id'])){
	/*
	?>
	<div class="index-group-display">
		<h5 class="index-group-header">My Groups</h5>
		<?php
		$counter=0;//counter to keep a track of the array element number..that is, key number

		$sql="SELECT groupId FROM group_participants_table WHERE participantId='$userId' AND invitationStatus=1 AND participantStatus!=3";//participantStatus!=3 means this user has not exited the group
		$result=mysqli_query($conn,$sql);

		while($row=mysqli_fetch_assoc($result)){
			$groupId=mysqli_real_escape_string($conn,$row['groupId']);
			$sql1="SELECT id,lastActivityDateTime,groupname FROM groups_table WHERE id='$groupId'";
			$result1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_assoc($result1);
			$all_sharing[]=$row1;

			$all_sharing[$counter]["shareType"]="group";//defining the type of this share..that is, since the meme has been shared with this group therefore its a group share
			$counter+=1;
		}	

		if (!empty($all_sharing)) {
			//now sorting according to the "lastActivityDateTime" value...latest activity shares are displayed first
			usort($all_sharing, function($a, $b) {
			    //return $a['lastActivityDateTime'] <=> $b['lastActivityDateTime'];
				if ($a['lastActivityDateTime'] == $b['lastActivityDateTime']) {
			        return 0;
			    }
			    return ($a['lastActivityDateTime'] > $b['lastActivityDateTime']) ? -1 : 1;
			});

			//now printing out the values
			echo '<div class="scrollable">';
			foreach ($all_sharing as $key => $as) {
				if($as['shareType']=="group"){
					//its a group share
					$groupId=mysqli_real_escape_string($conn,$as['id']);
					$lastActivityDateTime=$as['lastActivityDateTime'];
					$groupname=$as['groupname'];

					$sql1010="SELECT groupPicLocation FROM groups_table WHERE id='$groupId'";
					$result1010=mysqli_query($conn,$sql1010);
					$row1010=mysqli_fetch_assoc($result1010);
					$gpL=$row1010['groupPicLocation'];
					?>
						<div class="index-group"><div class="flex-contains">
							<a href="groupspage.php?id=<?php echo htmlentities($groupId); ?>">
							<img src="<?php echo $gpL; ?>" class="index-group-dp"/>
							<p class="index-group-name"><?php echo htmlentities($groupname); ?></p>
							<p style="display:none">Last Activity: <?php echo getTime($lastActivityDateTime); ?></p>
							</a>
						</div></div>
					<?php
				}
			}
			echo "</div>";
		}else{
			echo '<h4 class="error-message">No Meagls yet!</h4>';
		}
		?>
	</div>
	<?php
	*/
	?>
	<span class="sign-up-advert index-group-display">
			<img style="height:32px;margin-top:5px;margin-left:-10px" src="logo/m_gold.png" class="sign-up-logo">
			<p class="sign-up-p" style="margin-top:9px;margin-left:50px"><b>WELCOME TO MEAGL 2.0!</b></p>
	</span>
	<?php
}else{
	?>
	<a href="signup.php">
		<span class="sign-up-advert index-group-display">
			<img style="height:32px;margin-top:5px" src="logo/m_gold.png" class="sign-up-logo">
			<p class="sign-up-p text-center" style="margin:10 0 0 0;padding: 0"><b>Learn how to earn MONEY from your memes!</b></p>

		</span>
	</a>
	<?php
}

?>
<?php
include('leftnav.php');
?>
<!-- FRESH AND TRENDING HAVE BEEN SWITCHED SO THAT FRESH IS DISPLAYED FIRST -->
<?php 
if(isset($_SESSION['id'])){
	?>
	<div class="tabs">
		<!--<a id="recommendedmemes" href="#recommended">Recommended</a>-->
		<a id="trendingmemes" class="sign-out-trend" href="#trending" style="color: #aaa;border-radius:3px;top:3.5px;left:125px">Fresh</a>
		<a id="freshmemes" class="sign-out-fresh" href="#fresh" style="color: #aaa;border-radius:3px;top:3.5px;left:100px">Trending</a>	
		<!--<a id="shuffle" href="#shuffled">Shuffle</a>-->
		<hr style="margin-bottom:0px;border-color:#ccc;margin-top:7px;">
		<canvas id="tab-bottom" width="600" height="0"></canvas>
<?php
}else{
	?>
	<div class="tabs">
		<a id="trendingmemes" class="sign-out-trend" href="#trending" style="color: #aaa;border-radius:3px;top:3.5px;left:125px">Fresh</a>
		<a id="freshmemes" class="sign-out-fresh" href="#fresh" style="color: #aaa;border-radius:3px;top:3.5px;left:100px">Trending</a>	
		<!--<a id="recommendedmemes" class="sign-out-recom" href="#recommended" style="color: #aaa;border-radius:3px;top:3.5px;">Recommended</a>latest changes here.......latest changes end-->
		<hr style="margin-bottom:0px;border-color:#ccc;margin-top:7px;">
		<canvas id='tab-bottom' height='0' width='0'></canvas>
	<?php
}
?>		
	
	
</div>

<div class="tab-content" id="tabs"> 
	<?php
	/*if(isset($_SESSION['id'])){
	?>
	<div class="tab recommendedmemes" id="recommended">
		<div id="recommended_content_div">
		<?php
		//here, for the MVP, we'll just get all the memes from the world in their trending page order and all the memes from the user's friends and groups, and then arrange them in the order: world,friend,group and repeat..the order can change but the memes will be posted in groups of three

		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~WORLD PART~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//fetching world memes
		$sql="SELECT * FROM memestable WHERE visibilityStatus=1 AND uploaderId!='$userId'";
		$result=mysqli_query($conn,$sql);

		$total_likes=0;
		$total_memes=0;

		while($row=mysqli_fetch_assoc($result)){
			$row['origin']="world";
			$world_memes[]=$row;
			$total_likes+=$row['likes'];
			$total_memes+=1;
		}

		//sorting world_memes according to the trending algo
		$avg_likes=$total_likes/$total_memes;

		$current_time=date('Y-m-d H:i:s');		
		$currentDate = DateTime::createFromFormat('Y-m-d H:i:s', $current_time);
		
		foreach($world_memes as $key => $am){

			$memeDate = DateTime::createFromFormat('Y-m-d H:i:s', $am['datetime']);
	        $datediff=date_diff($memeDate, $currentDate);	        	
			$differenceInTimeInHours=intval($datediff->format('%R%a'))*24;//here, we get the time in days between the two dates and then convert into an integer(since, formerly it is in string) and then convert it into hours
	        if($differenceInTimeInHours==0){
		        	$differenceInTimeInHours=0.001;
		        	//this is done to prevent division by zero in the calculation of $slopeOfLikes
		        }
	        $slopeOfLikes=$am['likes']/$differenceInTimeInHours;			
			

			//getting ratio of dislikes(flags for low-quality) to likes
			$imgId=$am['id'];
			$sql100="SELECT id FROM image_flags_table WHERE flagType='low-quality' AND imageId='$imgId'";
			$result100=mysqli_query($conn,$sql100);
			$numberOfDownvotes=mysqli_num_rows($result100);
			if($am['likes']!=0)
			{				
				$downvotesRatio=$numberOfDownvotes/$am['likes'];
			}else{
				$downvotesRatio=$numberOfDownvotes;
			}
			
			$score=($am['likes']-$avg_likes)+$slopeOfLikes-$downvotesRatio; 

			$world_memes[$key]['trending_score']=$score;			
		}		
		usort($world_memes, function ($a, $b) {
		    //return $b['trending_score'] <=> $a['trending_score'];
		    if ($b['trending_score'] == $a['trending_score']) {
				return 0;
			}
			return ($b['trending_score'] < $a['trending_score']) ? -1 : 1;
		});

		//~~~~~~~~~~~~~~FRIENDS' PART~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~```
		//fetching friends' upload data
		$sql="SELECT * FROM friends_table WHERE sender_user_id='$userId' OR receiver_user_id='$userId'";
		$result=mysqli_query($conn,$sql);

		$total_likes=0;
		$total_memes=0;

		while($row=mysqli_fetch_assoc($result)){
			if($row['sender_user_id']==$userId){
				//means, the receiver is the friend
				$friendId=$row['receiver_user_id'];
				
				$sql1="SELECT * FROM meme_sharing_visibility_table WHERE userId='$userId' AND uploaderId='$friendId'";
				$result1=mysqli_query($conn,$sql1);
				while($row1=mysqli_fetch_assoc($result1)){
					$imageId=$row1['imageId'];
					//echo $imageId."<br>";
					$sql2="SELECT * FROM memestable WHERE id='$imageId'";
					$result2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($result2);
					$row2['origin']="friends";
					$friends_memes[]=$row2;
					$total_likes+=$row2['likes'];
					$total_memes+=1;
				}

			}else{
				//means, the sender is the friend
				$friendId=$row['sender_user_id'];
				
				$sql1="SELECT * FROM meme_sharing_visibility_table WHERE userId='$userId' AND uploaderId='$friendId'";
				$result1=mysqli_query($conn,$sql1);
				while($row1=mysqli_fetch_assoc($result1)){
					$imageId=$row1['imageId'];

					$sql2="SELECT * FROM memestable WHERE id='$imageId'";
					$result2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($result2);
					$row2['origin']="friends";
					$friends_memes[]=$row2;
					$total_likes+=$row2['likes'];
					$total_memes+=1;
				}
			}

		}

		//sorting freinds_memes according to the trending algo
		if(isset($friends_memes)){
			$avg_likes=$total_likes/$total_memes;

			$current_time=date('Y-m-d H:i:s');		
			$currentDate = DateTime::createFromFormat('Y-m-d H:i:s', $current_time);
			
			foreach($friends_memes as $key => $am){

				$memeDate = DateTime::createFromFormat('Y-m-d H:i:s', $am['datetime']);
		        $datediff=date_diff($memeDate, $currentDate);	        	
				$differenceInTimeInHours=intval($datediff->format('%R%a'))*24;//here, we get the time in days between the two dates and then convert into an integer(since, formerly it is in string) and then convert it into hours
		        if($differenceInTimeInHours==0){
		        	$differenceInTimeInHours=0.001;
		        	//this is done to prevent division by zero in the calculation of $slopeOfLikes
		        }
		        $slopeOfLikes=$am['likes']/$differenceInTimeInHours;		

				//getting ratio of dislikes(flags for low-quality) to likes
				$imgId=$am['id'];
				$sql100="SELECT id FROM image_flags_table WHERE flagType='low-quality' AND imageId='$imgId'";
				$result100=mysqli_query($conn,$sql100);
				$numberOfDownvotes=mysqli_num_rows($result100);
				if($am['likes']!=0)
				{				
					$downvotesRatio=$numberOfDownvotes/$am['likes'];
				}else{
					$downvotesRatio=$numberOfDownvotes;
				}

				$score=($am['likes']-$avg_likes)+$slopeOfLikes-$downvotesRatio; 

				$friends_memes[$key]['trending_score']=$score;			
			}		
			usort($friends_memes, function ($a, $b) {
			    //return $b['trending_score'] <=> $a['trending_score'];
			    if ($b['trending_score'] == $a['trending_score']) {
					return 0;
				}
				return ($b['trending_score'] < $a['trending_score']) ? -1 : 1;
			});
		}
		

		//~~~~~~~~~~~~~~~~~~~~~~~~~~~GROUPS PART~~~~~~~~~~~~~~~~~~~~~~
		//fetching groups data
		$sql="SELECT groupId FROM group_participants_table WHERE participantId='$userId' AND invitationStatus=1 AND participantStatus!=3";
		$result=mysqli_query($conn,$sql);

		$total_likes=0;
		$total_memes=0;

		while($row=mysqli_fetch_assoc($result)){
			$groupId=$row['groupId'];
			$memeNotPresent=true;//if the meme that we're trying to extract is already present in the friends' memes array, this variable will be false

			$sql1="SELECT imageId FROM meme_sharing_visibility_table WHERE groupId='$groupId' AND uploaderId!='$userId'";
			$result1=mysqli_query($conn,$sql1);

			while($row1=mysqli_fetch_assoc($result1)){
				$imageId=$row1['imageId'];

				foreach($friends_memes as $fm){
					if($fm['id']==$imageId){
						$memeNotPresent=false;
						break;
					}
				}

				if($memeNotPresent==true){
					$sql2="SELECT * FROM memestable WHERE id='$imageId'";
					$result2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($result2);
					$row2['origin']="groups";
					$groups_memes[]=$row2;
					$total_likes+=$row2['likes'];
					$total_memes+=1;
				}
				
			}
		}
		//print_r($groups_memes);
		//sorting groups_memes according to the trending algo
		if(isset($groups_memes)){
			$avg_likes=$total_likes/$total_memes;

			$current_time=date('Y-m-d H:i:s');		
			$currentDate = DateTime::createFromFormat('Y-m-d H:i:s', $current_time);
			
			foreach($groups_memes as $key => $am){

				$memeDate = DateTime::createFromFormat('Y-m-d H:i:s', $am['datetime']);
		        $datediff=date_diff($memeDate, $currentDate);	        	
				$differenceInTimeInHours=intval($datediff->format('%R%a'))*24;//here, we get the time in days between the two dates and then convert into an integer(since, formerly it is in string) and then convert it into hours
		        if($differenceInTimeInHours==0)
		        {
		        	$differenceInTimeInHours=0.001;
		        }
		        $slopeOfLikes=$am['likes']/$differenceInTimeInHours;	

				//getting ratio of dislikes(flags for low-quality) to likes
				$imgId=$am['id'];
				$sql100="SELECT id FROM image_flags_table WHERE flagType='low-quality' AND imageId='$imgId'";
				$result100=mysqli_query($conn,$sql100);
				$numberOfDownvotes=mysqli_num_rows($result100);
				if($am['likes']!=0)
				{				
					$downvotesRatio=$numberOfDownvotes/$am['likes'];
				}else{
					$downvotesRatio=$numberOfDownvotes;
				}

				$score=($am['likes']-$avg_likes)+$slopeOfLikes-$downvotesRatio; 

				$groups_memes[$key]['trending_score']=$score;			
			}		
			usort($groups_memes, function ($a, $b) {
			    //return $b['trending_score'] <=> $a['trending_score'];
			    if ($b['trending_score'] == $a['trending_score']) {
					return 0;
				}
				return ($b['trending_score'] < $a['trending_score']) ? -1 : 1;
			});
		}

		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~QUESTIONS PART~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//fetching questions
		$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
		$sql="SELECT * FROM questionstable WHERE askerId!='$userId'";
		$result=mysqli_query($conn,$sql);

		$total_likes=0;
		$total_questions=0;

		while($row=mysqli_fetch_assoc($result)){
			$questions[]=$row;
			$total_likes+=$row['likes'];
			$total_questions+=1;
		}		
		if($total_questions>=1)
		{
			//sorting world_memes according to the trending algo
			$avg_likes=$total_likes/$total_questions;

			$current_time=date('Y-m-d H:i:s');		
			$currentDate = DateTime::createFromFormat('Y-m-d H:i:s', $current_time);
			
			foreach($questions as $key => $am){

				$questionDate = DateTime::createFromFormat('Y-m-d H:i:s', $am['datetime']);
		        $datediff=date_diff($questionDate, $currentDate);	        	
				$differenceInTimeInHours=intval($datediff->format('%R%a'))*24;//here, we get the time in days between the two dates and then convert into an integer(since, formerly it is in string) and then convert it into hours
		        if($differenceInTimeInHours==0){
		        	$differenceInTimeInHours=0.001;
		        	//this is done to prevent division by zero in the calculation of $slopeOfLikes
		        }
		        $slopeOfLikes=$am['likes']/$differenceInTimeInHours;			
							
				$score=($am['likes']-$avg_likes)+$slopeOfLikes; 
				//echo $score;

				$questions[$key]['trending_score']=$score;	
				$questions[$key]['type']="question";		
			}		
			usort($questions, function ($a, $b) {
			    //return $b['trending_score'] <=> $a['trending_score'];
			    if ($b['trending_score'] == $a['trending_score']) {
					return 0;
				}
				return ($b['trending_score'] < $a['trending_score']) ? -1 : 1;
			});
		}

		//echo "<br>";print_r($questions);echo "<br>";
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~`
		
		$recommended[]=array();
		$counter=0;
		//echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~WORLD MEMES~~~~~~~~~~~~~~~~~~~~~`````<br>";
		//print_r($world_memes);
		$two_iterations=0;
		foreach($world_memes as $key => $wm){						
			$recommended[$counter]=$wm;//echo "<br>counter=".$counter;	
			$counter+=3;
			$two_iterations+=1;
			if($two_iterations==2)
			{
				$two_iterations=0;//leaving one space for the question after every two world memes
				//echo "<br>counter=".$counter;echo "plus 1";		
				$counter+=1;					
			}		
			
		}
		//echo "<br>~~~~~~~~~~~~~~~~~~WORLD RECOMMENDEED~~~~~~~~~~~~~~~~~~~`<br>";print_r($recommended);echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>";	
		
		//echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~FRIENDS MEMES~~~~~~~~~~~~~~~~~~~~~`````<br>";
		//print_r($friends_memes);
		if(isset($friends_memes)){
			$counter=1;
			$two_iterations=0;
			foreach($friends_memes as $key => $fm){			
				$recommended[$counter]=$fm;//echo "<br>counter=".$counter;	
				$counter+=3;	
				$two_iterations+=1;
				if($two_iterations==2)
				{
					$two_iterations=0;//leaving one space for the question after every two friends memes
					//echo "<br>counter=".$counter;echo "plus 1";				
					$counter+=1;					
				}	
					
			}
		}				
		//echo "<br>~~~~~~~~~~~~~~~~~~Friends RECOMMENDEED~~~~~~~~~~~~~~~~~~~`<br>";print_r($recommended);echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>";	
		
		//echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~GROUPS MEMES~~~~~~~~~~~~~~~~~~~~~`````<br>";
		//print_r($groups_memes);
		if(isset($groups_memes)){
			$counter=2;
			$two_iterations=0;
			foreach($groups_memes as $key => $gm){			
				$recommended[$counter]=$gm;//echo "<br>counter=".$counter;
				$counter+=3;
				$two_iterations+=1;
				if($two_iterations==2)
				{
					$two_iterations=0;//leaving one space for the question after every two groups memes
					//echo "<br>counter=".$counter;echo "plus 1";				
					$counter+=1;						
				}			

			}
		}
		//echo "<br>~~~~~~~~~~~~~~~~~~groups RECOMMENDEED~~~~~~~~~~~~~~~~~~~`<br>";print_r($recommended);echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>";	
		//echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~QUESTIONS~~~~~~~~~~~~~~~~~~~~~`````<br>";
		//print_r($groups_memes);
		if(isset($questions)){
			$counter=6;
			foreach($questions as $key => $gm){			
				$recommended[$counter]=$gm;
				$counter+=6;	
				//echo "<br>counter=".$counter;		
			}
		}
		//echo "<br>~~~~~~~~~~~~~~~~~~QuestionsRECOMMENDEED~~~~~~~~~~~~~~~~~~~`<br>";print_r($recommended);echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>";	
		

		ksort($recommended);//sorts the array according to the key
		//print_r($recommended);
		//echo "<br>~~~~~~~~~~~~~~~~~~RECOMMENDEED~~~~~~~~~~~~~~~~~~~`<br>";print_r($recommended);echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>";	
		$_SESSION['index_page_recommended_counter']=0;
		$numberOfMemesInRecommended=count($recommended);	
		if($numberOfMemesInRecommended!=0){
			//echo serialize($recommended);
			loadMorefunction($recommended,$numberOfMemesInRecommended,'index_page_recommended_counter','recommended',"hideform");

			echo '</div>';//closing recommended_content_div

			//load more button
			if($numberOfMemesInRecommended!=$_SESSION['index_page_recommended_counter'])
			{
				echo '
				<form class="load_more_memes_form" id="index_page_recommended_loadmore_form">
					<input type="hidden" name="load_more_type" value="recommended">
					<input type="hidden" name="session_counter_name" value="index_page_recommended_counter">
					<input type="hidden" name="numberOfElementsInArray" value="'.$numberOfMemesInRecommended.'">';?>
					<input type="hidden" name="data_array" value='<?php echo base64_encode(serialize($recommended)) ; ?>'>
				<?php
				echo '
					<button type="submit" class="btn load-more">Load More</button>
				</form>
				';
			}
		
		}else{
			echo '<p>No memes to display</p>';
		}		
	}		
	else
	{//style this boi
		?>
		<div class="tab recommendedmemes" id="recommended">
			<?php
			echo '<p class="error-message" style="text-align:center;margin-top:30px">Memes according to your interests are displayed here.</p>';
			echo '<p class="error-message"  style="text-align:center">You need to sign-in to view them.</p>';
			?>
		</div>
		<?php
	}	
	*/
	/*
	if(isset($_SESSION['id']))	
	{
	?>



	</div>
	<div class="tab shuffledmemes" id="shuffled">		
		<?php
		//here we'll just get all the trending memes from the world and all the memes from the user's friends and groups, randommly arrange them(shuffle them) and print them out
		echo '<button class="reshuffleButton btn" id="indexPageShuffle">Shuffle <span class="glyphicon glyphicon-refresh"></span></button>';
		?>		
		<div id="shuffled_inner_wrapper">
			<div id="shuffled_content_div">
		<?php
		//$userId=$_SESSION['id'];
		//content uploaded by this user is not displayed on the recommended and the shuffled page..everywhere else, it is displayed
		if(isset($_SESSION['id']))
		{
			$sql="SELECT * FROM memestable WHERE visibilityStatus=1 AND uploaderId!='$userId'";
			$result=mysqli_query($conn,$sql);

			while($row=mysqli_fetch_assoc($result)){
				$row['origin']="world";
				$all_memes[]=$row;
			}
			//print_r($all_memes);
			//fetching friends' upload data

			$sql="SELECT * FROM friends_table WHERE sender_user_id='$userId' OR receiver_user_id='$userId'";
			$result=mysqli_query($conn,$sql);

			while($row=mysqli_fetch_assoc($result)){
				if($row['sender_user_id']==$userId){
					//means, the receiver is the friend
					$friendId=$row['receiver_user_id'];
					
					$sql1="SELECT * FROM meme_sharing_visibility_table WHERE userId='$userId' AND uploaderId='$friendId'";
					$result1=mysqli_query($conn,$sql1);
					while($row1=mysqli_fetch_assoc($result1)){
						$imageId=$row1['imageId'];

						$sql2="SELECT * FROM memestable WHERE id='$imageId'";
						$result2=mysqli_query($conn,$sql2);
						$row2=mysqli_fetch_assoc($result2);
						$row2['origin']="friends";
						$all_memes[]=$row2;
					}

				}else{
					//means, the sender is the friend
					$friendId=$row['sender_user_id'];
					
					$sql1="SELECT * FROM meme_sharing_visibility_table WHERE userId='$userId' AND uploaderId='$friendId'";
					$result1=mysqli_query($conn,$sql1);
					while($row1=mysqli_fetch_assoc($result1)){
						$imageId=$row1['imageId'];

						$sql2="SELECT * FROM memestable WHERE id='$imageId'";
						$result2=mysqli_query($conn,$sql2);
						$row2=mysqli_fetch_assoc($result2);
						$row2['origin']="friends";
						$all_memes[]=$row2;
					}
				}

			}
			//print_r($all_memes);
			//fetching groups data
			$sql="SELECT groupId FROM group_participants_table WHERE participantId='$userId' AND invitationStatus=1 AND participantStatus!=3";
			$result=mysqli_query($conn,$sql);

			while($row=mysqli_fetch_assoc($result)){
				$groupId=$row['groupId'];
				$memeNotPresent=true;//if the meme that we're trying to extract is already present in the friends' memes array, this variable will be false

				$sql1="SELECT imageId FROM meme_sharing_visibility_table WHERE groupId='$groupId' AND uploaderId!='$userId'";
				$result1=mysqli_query($conn,$sql1);

				while($row1=mysqli_fetch_assoc($result1)){
					$imageId=$row1['imageId'];

					foreach($all_memes as $fm){
						if($fm['id']==$imageId){
							$memeNotPresent=false;
							break;
						}
					}

					if($memeNotPresent==true){
						$sql2="SELECT * FROM memestable WHERE id='$imageId'";
						$result2=mysqli_query($conn,$sql2);
						$row2=mysqli_fetch_assoc($result2);
						$row2['origin']="groups";
						//$groups_memes[]=$row2;
						$all_memes[]=$row2;
						$total_likes+=$row2['likes'];
						$total_memes+=1;
					}
					
				}
			}
		}/*
		else{
			$sql="SELECT * FROM memestable WHERE visibilityStatus=1 AND uploaderId!='$userId'";
			$result=mysqli_query($conn,$sql);

			while($row=mysqli_fetch_assoc($result)){
				$row['origin']="world";
				$all_memes[]=$row;
			}
		}(there existed a multicomment close here)

		//print_r($all_memes);
		//now shuffling
		//function shuffle_memes(){
		shuffle($all_memes);//in-built in php
		//}
		$_SESSION['shuffled_memes_array']=$all_memes;
		//print_r($_SESSION['shuffled_memes_array']);
		
		
		//echo "<br>shuffled<br>";
		//print_r($all_memes);
		
		$_SESSION['index_page_shuffled_counter']=0;
		$numberOfMemesInShuffled=count($all_memes);	
		//echo $numberOfMemesInShuffled;
		loadMorefunction($all_memes,$numberOfMemesInShuffled,'index_page_shuffled_counter','shuffled',"donthideform");

		echo '</div>';//closing shuffled_content_div
		$all_memes=$_SESSION['shuffled_memes_array'];
		//echo "indexpage";print_r($_SESSION['shuffled_memes_array']);
		//load more button
		if($numberOfMemesInShuffled!=$_SESSION['index_page_shuffled_counter'])
		{
			echo '
			<form class="load_more_memes_form" id="index_page_shuffled_loadmore_form">
				<input type="hidden" name="load_more_type" value="shuffled">
				<input type="hidden" name="session_counter_name" value="index_page_shuffled_counter">
				<input type="hidden" name="numberOfElementsInArray" value="'.$numberOfMemesInShuffled.'">';?>
				<input type="hidden" name="data_array" value='<?php echo base64_encode(serialize($_SESSION['shuffled_memes_array'])) ; ?>'>
			<?php
			echo '
				<button type="submit" class="btn load-more">Load More</button>
			</form>
			';
		}

		
		?>
		</div>
	</div>
	<?php
	}
	*/
	?>
	<div class="tab freshmemes" id="fresh">		
		<div id="fresh_content_div">
		<?php
 		//here, all memes in the world are displayed...only their order will be based on their trending score
		$sql="SELECT * FROM memestable WHERE (visibilityStatus=1 OR visibilityStatus=3) ORDER BY likes DESC";
		$result=mysqli_query($conn,$sql);

		$total_likes=0;
		$total_memes=0;

		while($row=mysqli_fetch_assoc($result)){
			$all_memes[]=$row;
			$total_likes+=$row['likes'];
			$total_memes+=1;
		}
		
		$avg_likes=$total_likes/$total_memes;

		$current_time=date('Y-m-d H:i:s');		
		$currentDate = DateTime::createFromFormat('Y-m-d H:i:s', $current_time);
		
		foreach($all_memes as $key => $am){

			$memeDate = DateTime::createFromFormat('Y-m-d H:i:s', $am['datetime']);
	        $datediff=date_diff($memeDate, $currentDate);
	        			
			$differenceInTimeInHours=intval($datediff->format('%R%a'))*24;//here, we get the time in days between the two dates and then convert into an integer(since, formerly it is in string) and then convert it into hours
	        if($differenceInTimeInHours==0){
		       	$differenceInTimeInHours=0.001;
		       	//this is done to prevent division by zero in the calculation of $slopeOfLikes
		    }
			$slopeOfLikes=$am['likes']/$differenceInTimeInHours;
			
			$score=($am['likes']-$avg_likes)+$slopeOfLikes; 

			$all_memes[$key]['trending_score']=$score;			
		}

		//removing all duplicate values
		$all_memes = removeDuplicateArrayEntry($all_memes, 'id');

		//sorting in descending order according to the score
		usort($all_memes, function ($a, $b) {
		   // return $b['trending_score'] <=> $a['trending_score'];
			if ($b['trending_score'] == $a['trending_score']) {
				return 0;
			}
			return ($b['trending_score'] < $a['trending_score']) ? -1 : 1;
		});

		$_SESSION['index_page_trending_counter']=0;
		$numberOfMemesInTrending=count($all_memes);			
		loadMorefunction($all_memes,$numberOfMemesInTrending,'index_page_trending_counter','trending',"donthideform");

		echo '</div>';//closing trending_content_div

		//load more button
		if($numberOfMemesInTrending!=$_SESSION['index_page_trending_counter'])
		{
			echo '
			<form class="load_more_memes_form" id="index_page_trending_loadmore_form">
				<input type="hidden" name="load_more_type" value="trending">
				<input type="hidden" name="session_counter_name" value="index_page_trending_counter">
				<input type="hidden" name="numberOfElementsInArray" value="'.$numberOfMemesInTrending.'">';?>
				<input type="hidden" name="data_array" value='<?php echo base64_encode(serialize($all_memes)) ; ?>'>
			<?php
			echo '
				<button type="submit" class="btn load-more">Load More</button>
			</form>
			';
		}
		
		?>
	</div>
	<!--<div class="tab" id="top">
		<h2>TOP MEMES</h2>
		<?php
		/*$sql= "SELECT * FROM memestable WHERE (visibilityStatus=1 OR visibilityStatus=3) ORDER BY likes DESC";//ordering in the descending order(that is, printing all the memes in the decreasing order of their id)
		$result=mysqli_query($conn,$sql);
		//printing all the memes one by one
		while($row=mysqli_fetch_assoc($result)){
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
			$imageId=$row['id'];

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
						$subscribeToUserInnerHtml="UnSubscribe";
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
			if($memecategory=="Inspirational"){
				$tableName="inspirationalmemessubscriberstable";
			}else if($memecategory=="Sports"){
				$tableName="sportsmemessubscriberstable";
			}else if($memecategory=="Gaming"){
				$tableName="gamingmemessubscriberstable";
			}else if($memecategory=="Cartoons"){
				$tableName="cartoonsmemessubscriberstable";
			}else if($memecategory=="Quiz"){
				$tableName="quizmemessubscriberstable";
			}else if($memecategory=="College / School"){
				$tableName="collegememessubscriberstable";
			}else if($memecategory=="Politics"){
				$tableName="politicsmemessubscriberstable";
			}else if($memecategory=="Just My Thoughts"){
				$tableName="justmythoughtsmemessubscriberstable";
			}else if($memecategory=="Other"){
				$tableName="othermemessubscriberstable";
			}
			if(isset($_SESSION['id'])){
				$userId=$_SESSION['id'];
				//echo '<script language="javascript">alert("im in 1")</script>';
				$sql6= "SELECT subscribedByUserId FROM $tableName WHERE subscribedByUserId='$userId'";
				$result6=mysqli_query($conn,$sql6);
				if($row6=mysqli_fetch_assoc($result6)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
					//echo '<script language="javascript">alert("im in 2")</script>';
					$subscribeToMemeCategoryInnerHtml="UnSubscribe";
				
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
			//echo "flags=".$numberOfFlags."<br>";
			if($numberOfFlags<3){
				echo '<a href="imagedisplay.php?id='.$imageId.'&world=1&uid=0&gid=0"><h1>'.$memetitle.'</h1></a>
					 <a href="imagedisplay.php?id='.$imageId.'&world=1&uid=0&gid=0"><img src="'.$imagelocation.'" style="width:200px;height:200px;"></a>
					 <h2>Uploaded by:<a href="userprofile.php?id='.$uploaderId.'">'.$uploader.'</a></h2>
					 
					 <button type="submit" onclick="subscribeFunction(\''.$imageId.'\',\''.$uploaderId.'\',\''.$subscribeLabel.'\',\''.$uploader.'\');" name="subscribe'.$uploaderId.'">'.$subscribeToUserInnerHtml.' to '.$uploader.'</button>
		 			 <p id="'.$subscribeLabel.'" name="'.$subscribeLabel.'">Number of Subscribers:'.$numberofSubscribers.'</p>
					 
					 <button type="submit" class="likeimagebutton" onclick="imagelikeFunction(\''.$imageId.'\',\''.$likesLabel.'\',\''.$likeErrorLabel.'\',\''.$likeButtonId.'\');" id="like'.$imageId.'" name="like'.$imageId.'">'.$likesinnerhtml.'</button>
					 <p name="'.$likesLabel.'">Likes:'.$numberOfLikes.'</p>
					 <p>Meme Category: '.$memecategory.'</p>
					 <p id="'.$memeCategorySubscribersLabel.'" name="'.$memeCategorySubscribersLabel.'">Number of Subscribers for '.$memecategory.' memes category:'.$memeCategorySubscribers.'</p>
					 <button type="submit" onclick="memeCategorySubscribeFunction(\''.$imageId.'\',\''.$memecategory.'\',\''.$memeCategorySubscribersLabel.'\');" name="subscribecategory'.$memecategory.'">'.$subscribeToMemeCategoryInnerHtml.' to '.$memecategory.'</button>
				 					 					 				 
					 <p id="'.$numberOfCommentsLabel.'">Number of Comments:'.$numberOfComments.'</p>
					 <p class="datetime">'.getTime($datetime).'</p>
					 
					 <p name="Error'.$imageId.'"></p>
					 
					 
					 ';
					 //echo "display=".$displayFlagButton;
				if($displayFlagButton==true){
					//echo "in";
					echo '<p id="flagimage'.$imageId.'"></p>';
					echo '<button type="submit" class="flagimagebutton" name="'.$imageId.'" id="imageFlagButton'.$imageId.'">Flag Image!</button>';
				}else{
					if($flaggedByCurrentUser==true){
						echo 'You have flagged this image!';
					}
					
				}
				echo '<hr><br>';
			}		 
		}*/
		?>
	</div>-->
	<div class="tab trendingmemes" id="trending">
		<div id="trending_content_div">
		<?php
		$sql= "SELECT * FROM memestable WHERE (visibilityStatus=1 OR visibilityStatus=3) ORDER BY id DESC";//ordering in the descending order(that is, printing all the memes in the decreasing order of their id)
		$result=mysqli_query($conn,$sql);
		//printing all the memes one by one
		while($row1=mysqli_fetch_assoc($result))
		{
			$row[]=$row1;
		}
		$_SESSION['index_page_fresh_counter']=0;
		$numberOfMemesInFresh=count($row);		
		//echo $numberOfMemesInFresh;		
		loadMorefunction($row,$numberOfMemesInFresh,'index_page_fresh_counter','fresh',"donthideform");

		echo '</div>';//closing fresh_content_div

		//load more button
		if($numberOfMemesInFresh!=$_SESSION['index_page_fresh_counter'])
		{
			echo '
			<form class="load_more_memes_form" id="index_page_fresh_loadmore_form">
				<input type="hidden" name="load_more_type" value="fresh">
				<input type="hidden" name="session_counter_name" value="index_page_fresh_counter">
				<input type="hidden" name="numberOfElementsInArray" value="'.$numberOfMemesInFresh.'">';?>
				<input type="hidden" name="data_array" value='<?php echo base64_encode(serialize($row)) ; ?>'>
			<?php
			echo '
				<button type="submit" class="btn load-more">Load More</button>
			</form>
			';
		}
		
		?>
	</div>
	
</div>

<!--
<div class="notifications-column">
    <h1 id="notif-heading">Notifications</h1>

    <a href="#" class="notif-link notif-border">
    <div class="notif">
        <img src="https://pbs.twimg.com/profile_images/782474226020200448/zDo-gAo0_400x400.jpg" class="notif-dp">
        <p class="notif-text"> Posted a new meme</p>
    </div>
	</a>
    <a href="#" class="notif-link">
    <div class="notif">
        <img src="https://pbs.twimg.com/profile_images/378800000404379031/2a3d936021faaec6ec899ef2a4a7e6c8_400x400.jpeg" class="notif-dp">
        <p class="notif-text"> Commented on your meme</p>
    </div>
	</a>
    <a href="#" class="notif-link">
    <div class="notif">
        <img src="https://specials-images.forbesimg.com/imageserve/07SCcYB3zU5yT/400x400.jpg?fit=scale&background=000000" class="notif-dp">
        <p class="notif-text"> Posted on the group Silicon Valley</p>
    </div>
	</a>
    <a href="#" class="notif-link">
    <div class="notif">
        <img src="http://media.bizj.us/view/img/4846601/markcuban-prnewswire*400xx800-800-0-0.jpg" class="notif-dp">
        <p class="notif-text"> Mentioned you in a comment</p>
    </div>
	</a>

</div>
-->
<div class="sidenav-right-top" style="padding-top:40px;z-index:-25;border-radius: 10px">
		
	<i class="fas fa-hand-holding-usd" style="height:100px;width:200px;font-size:90px;margin-left:90px;color:#b225a8"></i><br><br><b style="color:#b225a8;margin-left:0px"><span class="blinking">$ $ $ $ $</b></span><br>
	<p style="font-size:22px;color:#3c4043;text-align:center;font-family:'Open Sans';margin-top: 15px">Join MEAGL and support your favorite memers by dropping tips on their memes!</p>

	<!-- <a href="#" style="font-size:22px;color:#3c4043;margin-left:31px">Top Donor of the Day!</a><br><br>
 	<a href="#" style="font-size:22px;color:#3c4043;margin-left:27px">Top Earners of the Day!</a><br><br><br><br> -->
 		
 </div>
 <div class="sidenav-right-bottom" style="padding-top:30px;border-radius: 10px;height:auto">	
	<!-- <img src="donar.jpg"><br><span class="blinking"> -->
	<p class="text-center" style="font-size:25px;color:#2d3436;text-align:center;font-family:'Open Sans'">SUPPORT MEAGL</p>
 	<a href="supportmeagl.php" style="left:0;display:block;width:150px;margin:0 auto;padding:5px 5px 5px 5px;border-radius: 5px" class="donate">DONATE</a><br>
</div> 
<!-- 
<div class="sidenav-right-bottom" style="padding-top:30px;z-index:-25">	
	<img src="donar.jpg"><br><span class="blinking">
	<a href="#" style="font-size:25px;color:#1979d2;margin-left:52px">Support Meagl!</a><br><br><br><br><br>
 	
 	<button style="display:inline" class="donate">Donate</button>
</div> -->


<div class="notifications-column">
	<?php	
	if(isset($_SESSION['id']))
	{
		$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
		$sql="SELECT * FROM notifications_table WHERE receiverId='$userId' ORDER BY id DESC";
		$result=mysqli_query($conn,$sql);

		$areThereNotifications=false;
		$notifications_counter=0;
		echo '<h1 id="notif-heading">Notifications</h1>';
		echo '<div class="notifications-body">';
		while($row=mysqli_fetch_assoc($result)){
			$areThereNotifications=true;

			//only if the notification hasn't been viewed

			$notification=$row['notification'];
			$notificationId=mysqli_real_escape_string($conn,$row['id']);
			$datetime=$row['datetime'];
			$nL=$row['notificationLink'];

			$senderId=mysqli_real_escape_string($conn,$row['senderId']);
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
			//echo $nL;
			$viewingStatus=$row['viewingStatus'];
			if($viewingStatus==0)
			{
				$notifications_counter+=1;
				?>
				<a href="<?php echo $nL; ?>" class="notif-link" id="notification<?php echo htmlentities($notificationId); ?>">	
				    <div class="notif">
						<img src="<?php echo htmlentities($ppL) ?>" class="notif-dp">
					    <p class="notif-text"><?php echo $notification; ?></p>							
					</div>
				</a>
				<?php
			}
			else
			{
				?>
				<a href="<?php echo $nL; ?>" class="notif-link" id="notification<?php echo htmlentities($notificationId); ?>">	
				    <div class="notif" style="background-color:#EAEAEA">
						<img src="<?php echo htmlentities($ppL) ?>" class="notif-dp">
					    <p class="notif-text"><?php echo $notification; ?></p>							
					</div>
				</a>
				<?php
			}	
		}

		if($areThereNotifications==false){
			echo '<p class="error-message">No notifications yet!</p>';			
		}else{
			?>
			<script>thereAreNotifications(<?php echo $notifications_counter; ?>);</script>
			<?php
		}
		echo "</div>";
	}	
	?>
</div>
<?php
//echo "Time:  " . number_format(( microtime(true) - $startTime), 10) . " Seconds\n";
?>



</div>	
</body>
</html>
