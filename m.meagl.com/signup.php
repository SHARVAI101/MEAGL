<?php 

	session_start();
	$session_value=(isset($_SESSION['id']))?$_SESSION['id']:'';//gets the session id if it is set
	$current_page=$_SERVER['REQUEST_URI'];//gets the current page url
	//echo $current_page;
    //<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>

?>
<html>
<head>
    <link rel="stylesheet" href="font/flaticon.css"></link>
	<title>MEAGL</title>
	<meta name="theme-color" content="#6f2187" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="logo/m_gold.png"></link>
    <link rel="stylesheet" href="Frontend/global.css"></link>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>    


    <!--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
    <script type="text/javascript">
		var sessionId="<?php echo $session_value;?>";
		var currentPage="<?php echo $current_page;?>";
	</script>
	<script type="text/javascript" src="general.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
</head>

<body style="background-color:#fefefe">	


<?php

if(!isset($_SESSION['id'])){

	//include 'top.php';
	$session_value=(isset($_SESSION['id']))?$_SESSION['id']:'';//setting the session id
?>
<a href="index.php">
	<div>
		<div class="signin-header">
			<img style="height:60px;width:165px;display:inline-block;top:5px;position:relative" src="logo/m_gold.png">
			<p class="signin-website-name" style="font-size:32px;left:0px;position:relative;display:inline-block;top:10px">meagl</p>		
		</div>	
		<hr>
	</div>
</a>


<div class="signup" >
	<p class="signup-header" style="font-size:18px;color:b522a8">Already a user?</p>
	<h4 class="signup-header" id="login-form-open-button" style="cursor:pointer">Login</h4>
	<div id="login-form-div" style="display:none">	    
	      	<form class="loginForm" action="loginh.php" method="POST">
				<h4 class="prompt-style">Email:</h4>
				<input type="text" name="email" class="form-control signup-field" style="font-size:18px;" placeholder="Email">
				<h4 class="prompt-style">Password:</h4>
				<input type="password" name="pwd" class="signup-field form-control" style="font-size:18px;" placeholder="Password">
				<?php 
					if(isset($_GET['lastpage'])){
						$lastpage=$_GET['lastpage'];
						//echo $lastpage;
						echo '<input type="hidden" name="lastpage" value="'.htmlentities($lastpage).'"></input>';//passing the lastpage
					}
				?>
				<button class="inbutton btn login-button" id="loginbutton" type="submit">Sign in</button>
			</form>
			<a href="forgotpassword.php"  class="forgot-password" >Forgot password</a>
			<p id="logInError" class="signup-header" style="font-size:18px"></p>
	</div>
	<hr>
	<p class="signup-header" style="font-size:18px;color:b522a8">New user?</p>
	<h4 class="signup-header" id="signup-form-open-button" style="cursor:pointer">Sign Up</h4>
	<div id="signup-form-div" style="display:none">	
		<form class="signupForm" action="signuph.php" method="POST">
			<h4 class="prompt-style">Full Name<span style="color:red">*</span>:</h4>
			<input type="text" name="name" class="form-control signup-field" style="font-size:18px;"><br>
			<h4 class="prompt-style">Email<span style="color:red">*</span>:</h4>
			<input type="text" name="email" class="form-control signup-field" style="font-size:18px;"><br>
			<h4 class="prompt-style" style="max-width:80vw">Username (less than or equal to 15 characters only)<span style="color:red">*</span>:</h4>
			<input type="text" name="username" class="form-control signup-field" style="font-size:18px;"><br>
			<h4 class="prompt-style">Password<span style="color:red">*</span>:</h4>
			<input type="password" name="pwd" class="form-control signup-field" style="font-size:18px;"><br>
			<h4 class="prompt-style">College/Institute:</h4>
			<input type="text" id="institute_signup_form" name="institute" class="form-control signup-field" style="font-size:18px;"><br>	
			<div id="institute_autocomplete_suggestions" >
			</div>
			<h4 class="prompt-style">Enter invite code if you have one:</h4>
			<input type="text" name="inviteCode" class="form-control signup-field" style="font-size:18px;"><br>		
			<?php 
			if(isset($_GET['lastpage'])){
				$lastpage=$_GET['lastpage'];
				//echo $lastpage;
				echo '<input type="hidden" name="lastpage" value="'.htmlentities($lastpage).'"></input>';//passing the lastpage
			}
			?>
			<button class="inbutton btn signup-button" id="signupbutton" type="submit">Sign up</button>
		</form>
		<br>
		<p id="signInError" class="signup-header" style="font-size:18px"></p>
		<div class="add-height"></div>
	</div>
</div>


<?php
}
else{	
	//echo "eii";
	//echo '<script language="javascript">alert("userprofile la challa")</script>';
	header("LOCATION: userprofile.php?id=".htmlentities($_SESSION['id']));		
}
?>
</body>
</html>