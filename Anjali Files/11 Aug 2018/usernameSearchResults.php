<?php 
ob_start();
include 'top.php';
$b=ob_get_contents();
ob_end_clean();

$title = "Username Search";
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
$startTime = microtime(true);
if(isset($_SESSION['id'])){
	$userId=$_SESSION['id'];
}

?>

<div class="search-results">

	<?php

	//$resultsArray=json_decode(mysqli_real_escape_string($conn,$_POST['resultArray']),true);
	$resultsArray=array($_POST['resultArray']);
	/*for($i=0;$i<count($resultsArray);$i+=1)
	{	
		echo "<a href=userprofile.php?id=".$resultsArray[$i]['id'].">".htmlentities($resultsArray[$i]['username'])."</a><br>";	
	}*/

	$usernamesArray=(array_column(json_decode($resultsArray[0],true), 'username'));
	$idArray=(array_column(json_decode($resultsArray[0],true), 'id'));
	if(count($usernamesArray)>=20)
	{
		$end=20;
	}else{
		$end=count($usernamesArray);
	}
	//maximum 20 search results
	for($i=0;$i<$end;$i+=1)
	{	
		//echo "<a href=userprofile.php?id=".$idArray[$i].">".htmlentities($usernamesArray[$i])."</a><br>";	
		$id=mysqli_real_escape_string($conn,$idArray[$i]);
		$sql="SELECT profilePictureLocation,numberOfSubscribers FROM memberstable WHERE id='$id'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$ppl=$row['profilePictureLocation'];
		$numberOfSubscribers=$row['numberOfSubscribers'];

		echo '<div class="search-result">
				  <a href="userprofile.php?id='.$id.'">
				  	  <span class="search-result-link">
					  <img src="'.$ppl.'" class="search-dp">
					  <h3 class="search-username">'.$usernamesArray[$i].'</h3>
					  <h3 class="search-subscribers">Subscribers: '.$numberOfSubscribers.'</h3>
				  </a>				  
			  </div>
			  ';

	}

	?>

</div>
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