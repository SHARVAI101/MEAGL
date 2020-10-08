<?php

session_start();

include 'dbh.php';
//$startTime = microtime(true);
$search=strtolower(mysqli_real_escape_string($conn,$_POST['search']));

if($search!=""){

	$sql="SELECT username, id FROM memberstable";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result)){
		$all_users_total[]=$row;//creating array containing the info of all users of the website
	}


	$all_search_words=explode(" ",$search);//here we separate all words in the string

	//USING SQL LIKE 
	foreach($all_search_words as $asw){
		
		$search_string=preg_replace("#[^0-9a-z]#i","",	$asw);//removes all special chaaracters that are unnecessary
		
		if($search_string!=''){
			//EXACT STRING SEARCH
			$sql="SELECT username,id FROM memberstable WHERE username='$search_string'";//EXACT MATCH SEARCH
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
				//echo "new iteration<br>";
				foreach($all_users_total as $key => $aut){
					//echo "aut username=".$aut['username']."<br>";
					//echo "row username=".$row['username']."<br>";
					if(strtolower($aut['username'])==strtolower($row['username'])){
						if(isset($all_users_total[$key]['lev'])){
							$all_users_total[$key]['lev']=0;
							break;
						}				
						
					}
				}
			}

			//SIMILAR STRING SEARCH
			$sql="SELECT username,id FROM memberstable WHERE username LIKE '%$search_string%'";//SIMILAR MATCH SEARCH..that is, finding the search string in bigger strings eg: "ha" in "sharvai"
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
				//echo "new iteration<br>";
				foreach($all_users_total as $key => $aut){
					//echo "aut username=".$aut['username']."<br>";
					//echo "row username=".$row['username']."<br>";
					if(strtolower($aut['username'])==strtolower($row['username'])){
						$all_users_total[$key]['lev']=0;
						break;
					}
				}
			}
		}
	}
	//If there is a spelling error in the search, we'll execute the following code..so now we'll use levenshentein algorithm to fetch closest results
	//USING LEVENSHTEIN METHOD
	foreach($all_users_total as $key => $allusers){
		if(!isset($all_users_total[$key]['lev'])){
			$username=strtolower($allusers['username']);
			$lev = levenshtein($search, $username);
			
			$all_users_total[$key]['lev']=$lev;		
		}
		
	}

	//now sorting according to the "lev" value(asscending...for descending, return $b['lev'] <=> $a['lev'];)
	usort($all_users_total, function($a, $b) {
	    //return $a['lev'] <=> $b['lev'];
	    if ($a['lev'] == $b['lev']) {
			return 0;
		}
		return ($a['lev'] < $b['lev']) ? -1 : 1;
	});

	//echo "<br>ALL USERS FINALLY:<br>";
	//print_r($all_users_total);

	//echo "Time:  " . number_format(( microtime(true) - $startTime), 10) . " Seconds\n";

	echo json_encode($all_users_total);

}