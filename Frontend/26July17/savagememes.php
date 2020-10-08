<?php
include 'top.php';

include 'dbh.php';
include_once 'functions.php';
?>
<div class="tabs">
	<a id="trendingmemes" class="sign-out-trend" href="#trending">Trending</a>
	<a id="freshmemes" class="sign-out-fresh" href="#fresh">Fresh</a>
	<?php 
	/*
	if(isset($_SESSION['id'])){
		?>
		<a id="shuffle" href="#shuffled">Shuffle</a>
		<?php
	}*/
	?>			
</div>
<div>
<?php
	echo '<div class="group">';
	echo '<img src="defaults/savage_memes.png" style="width=200px;height:200px;" id="group_dp">';
	echo '<h4 class="group-name" style="margin-left:65px;">Savage Memes</h4>';

	$sql="SELECT totalSubscribers,totalMemesForThisCategory FROM memecategoriestable WHERE memeCategory='Savage'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$memeCategorySubscribers=$row['totalSubscribers'];
	$totalMemesForThisCategory=$row['totalMemesForThisCategory'];

	$memeCategorySubscribersLabel="categorySubscribeSavage";

	echo '<p id="'.$memeCategorySubscribersLabel.'" name="'.$memeCategorySubscribersLabel.'" style="top:55px;left:180px;" class="last-active">Subscribers: '.$memeCategorySubscribers.'</p>';
	echo '<p class="created">Total Memes:'.$totalMemesForThisCategory.'</p>';
	$subscribeToMemeCategoryInnerHtml="Subscribe";
	if(isset($_SESSION['id'])){
		$userId=mysqli_real_escape_string($conn,$_SESSION['id']);
		//echo '<script language="javascript">alert("im in 1")</script>';
		$sql6= "SELECT subscribedByUserId FROM savagememessubscriberstable WHERE subscribedByUserId='$userId'";
		$result6=mysqli_query($conn,$sql6);
		if($row6=mysqli_fetch_assoc($result6)){//checks if the user has already liked the meme..if yes, then it will show the option to undo the like
			//echo '<script language="javascript">alert("im in 2")</script>';
			$subscribeToMemeCategoryInnerHtml="Unsubscribe";
		
		}
	}
	

	echo '<button type="submit" onclick="memeCategorySubscribeFunction(0,\'Savage\',\''.$memeCategorySubscribersLabel.'\');" name="subscribecategorySavage" class="btn" id="userprofile-subscribe-button" style="margin-top:40px;margin-left:10px">'.$subscribeToMemeCategoryInnerHtml.'</button>';
	echo '</div>';
?>
</div>
<div class="tab-content" id="tabs">
	<div class="tab trendingmemes" id="trending">
		<div id="trending_content_div">
			<?php
			$sql="SELECT * FROM memestable WHERE (memeCategory='Savage' AND (visibilityStatus=1 OR visibilityStatus=3)) ORDER BY likes DESC";
			$result=mysqli_query($conn,$sql);

			$total_likes=0;
			$total_memes=0;

			while($row=mysqli_fetch_assoc($result)){
				$savage_trending[]=$row;
				$total_likes+=$row['likes'];
				$total_memes+=1;
			}
			
			if($total_memes!=0){

			$avg_likes=$total_likes/$total_memes;

			$current_time=date('Y-m-d H:i:s');		
			$currentDate = DateTime::createFromFormat('Y-m-d H:i:s', $current_time);
			
			foreach($savage_trending as $key => $am){

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

				$savage_trending[$key]['trending_score']=$score;			
			}

			//removing all duplicate values
			$savage_trending = removeDuplicateArrayEntry($savage_trending, 'id');

			//sorting in descending order according to the score
			usort($savage_trending, function ($a, $b) {
			    if($b['trending_score'] < $a['trending_score']){
		    	return -1;
		    }else if($b['trending_score'] > $a['trending_score']){
		    	return 1;
		    }else {
		    	return 0;
		    }
			});

			//print_r($savage_trending);

			$_SESSION['savage_page_trending_counter']=0;
			$numberOfMemesInTrending=count($savage_trending);			
			//echo $numberOfMemesInTrending;
			loadMorefunction($savage_trending,$numberOfMemesInTrending,'savage_page_trending_counter','trending',"donthideform");

			echo '</div>';//closing trending_content_div

			//load more button
			if($numberOfMemesInTrending!=$_SESSION['savage_page_trending_counter'])
			{
				echo '
				<form class="load_more_memes_form" id="savage_page_trending_loadmore_form">
					<input type="hidden" name="load_more_type" value="trending">
					<input type="hidden" name="session_counter_name" value="savage_page_trending_counter">
					<input type="hidden" name="numberOfElementsInArray" value="'.$numberOfMemesInTrending.'">';?>
					<input type="hidden" name="data_array" value='<?php echo base64_encode(serialize($savage_trending)) ; ?>'>
				<?php
				echo '
					<button type="submit" class="btn">Load More</button>
				</form>
				';
			}

			}else{
				echo '</div>';//closing trending_content_div
				echo '<p>No memes in this category yet.</p>';
			}

			?>
	</div>
	<div class="tab freshmemes" id="fresh">
		<div id="fresh_content_div">
		<?php
		$sql= "SELECT * FROM memestable WHERE memeCategory='Savage' AND (visibilityStatus=1 OR visibilityStatus=3) ORDER BY id DESC";//ordering in the descending order(that is, printing all the memes in the decreasing order of their id)
		$result=mysqli_query($conn,$sql);
		
		//printing all the memes one by one
		while($row=mysqli_fetch_assoc($result)){
			$fresh_savage[]=$row;
		}

		if(isset($fresh_savage)){

		$_SESSION['savage_page_fresh_counter']=0;
		$numberOfMemesInFresh=count($fresh_savage);				
		loadMorefunction($fresh_savage,$numberOfMemesInFresh,'savage_page_fresh_counter','fresh',"donthideform");

		echo '</div>';//closing fresh_content_div

		//load more button
		if($numberOfMemesInFresh!=$_SESSION['savage_page_fresh_counter'])
		{
			echo '
			<form class="load_more_memes_form" id="savage_page_fresh_loadmore_form" method="post">
				<input type="hidden" name="load_more_type" value="fresh">
				<input type="hidden" name="session_counter_name" value="savage_page_fresh_counter">
				<input type="hidden" name="numberOfElementsInArray" value="'.$numberOfMemesInFresh.'">';?>
				<input type="hidden" name="data_array" value='<?php echo base64_encode(serialize($fresh_savage)) ; ?>'>
			<?php
			echo '
				<button type="submit" class="btn">Load More</button>
			</form>
			';
		}

		}else{
			echo '</div>';//closing fresh_content_div
			echo '<p>No memes in this category yet.</p>';
		}

		?>	
	</div>
	<?php
	/*
	?>
	<div class="tab shuffledmemes" id="shuffled">		
		
		<?php		
		echo '<button class="reshuffleButton" id="savagePageShuffle">Shuffle!</button>';
		?>
		<div id="shuffled_inner_wrapper">
			<div id="shuffled_content_div">
		
			<?php
			$sql= "SELECT * FROM memestable WHERE memeCategory='Savage' AND (visibilityStatus=1 OR visibilityStatus=3)";
			$result=mysqli_query($conn,$sql);
			
			//printing all the memes one by one
			while($row=mysqli_fetch_assoc($result)){
				$shuffle_savage[]=$row;
			}
			
			shuffle($shuffle_savage);

			$_SESSION['savage_page_shuffle_counter']=0;
			$numberOfMemesInShuffle=count($shuffle_savage);
			//echo $numberOfMemesInShuffle;				
			loadMorefunction($shuffle_savage,$numberOfMemesInShuffle,'savage_page_shuffle_counter','shuffled',"donthideform");

			echo '</div>';//closing shuffle_content_div

			//load more button
			if($numberOfMemesInShuffle!=$_SESSION['savage_page_shuffle_counter'])
			{
				echo '
				<form class="load_more_memes_form" id="savage_page_shuffle_loadmore_form" method="post">
					<input type="hidden" name="load_more_type" value="shuffled">
					<input type="hidden" name="session_counter_name" value="savage_page_shuffle_counter">
					<input type="hidden" name="numberOfElementsInArray" value="'.$numberOfMemesInShuffle.'">';?>
					<input type="hidden" name="data_array" value='<?php echo base64_encode(serialize($shuffle_savage)) ; ?>'>
				<?php
				echo '
					<button type="submit" class="btn">Load More</button>
				</form>
				';
			}

			?>
		</div>
	</div>
	<?php
	*/
	?>
</div>

</div>
</body>
</head>
</html>
