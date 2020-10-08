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

<body>	


<?php

if(!isset($_SESSION['id'])){

	//include 'top.php';
	$session_value=(isset($_SESSION['id']))?$_SESSION['id']:'';//setting the session id
?>
<div class="login-bar container-fluid">
    <nav>
    	<a href="index.php"><img style="height:60px;width:165px;margin-top:5px" src="logo/m_gold.png"></a>
	    <a href="index.php" class="website-name" style="font-size:50px; left:180px">meagl</a>

	    <div class="login-wrapper">
	      	<div class="login">
	      		<form class="loginForm" action="loginh.php" method="POST">
					<h1 class="username-prompt prompt-style">Email:</h1>
					<input type="text" name="email" class="form-control username-input" style="font-size:18px;" placeholder="Email">
					<h1 class="password-prompt prompt-style">Password:</h1>
					<input type="password" name="pwd" class="password-input form-control" style="font-size:18px;" placeholder="Password">
					<?php 
						if(isset($_GET['lastpage'])){
							$lastpage=$_GET['lastpage'];
							//echo $lastpage;
							echo '<input type="hidden" name="lastpage" value="'.htmlentities($lastpage).'"></input>';//passing the lastpage
						}
					?>
					<button class="inbutton btn login-button" id="loginbutton" type="submit">Sign in</button>
				</form>
				<p id="logInError"></p>
	        	<!--<h1 class="username-prompt prompt-style">Username:</h1>
	        	<input type="text" placeholder="Username" class="form-control username-input" style="font-size:18px;">
	        	<h1 class="password-prompt prompt-style">Password:</h1>
	        	<input type="text" placeholder="Password" class="password-input form-control" style="font-size:18px;">
	        	<button class="btn login-button">Login</button>-->
	      	</div>
	    </div>

	    <a href="forgotpassword.php"  class="forgot-password">Forgot password</a>
    </nav>
</div>

<div class="meagl-infos">
    <p class="p-lines">Create your personal brand.</p>
    <p class="p-lines"> Subscribe to your favourites!</p>
    <p class="p-lines">Share your funniest creations with your friends.</p>
    <p class="p-lines">Create and view original funny content.</p>
    <p class="p-lines">So the next time you see something funny,</p>
    <p class="meagl-it"><i> just meagl it!</i></p>
</div>

<div class="signup">

	<h1 class="signup-header">New User? Sign Up.</h1>
	<form class="signupForm" action="signuph.php" method="POST">
		<h1 class="prompt-style">Full Name<span style="color:red">*</span>:</h1>
		<input type="text" name="name" class="form-control signup-field" style="font-size:18px;"><br>
		<h1 class="prompt-style">Email<span style="color:red">*</span>:</h1>
		<input type="text" name="email" class="form-control signup-field" style="font-size:18px;"><br>
		<h1 class="prompt-style">Username(less than equal to 15 characters only)<span style="color:red">*</span>:</h1>
		<input type="text" name="username" class="form-control signup-field" style="font-size:18px;"><br>
		<h1 class="prompt-style">Password<span style="color:red">*</span>:</h1>
		<input type="password" name="pwd" class="form-control signup-field" style="font-size:18px;"><br>
		<h1 class="prompt-style">College/Institute:</h1>
		<input type="text" id="institute_signup_form" name="institute" class="form-control signup-field" style="font-size:18px;"><br>	
		<div id="institute_autocomplete_suggestions" >
		</div>
		<h1 class="prompt-style">Enter invite code if you have one:</h1>
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
	<p id="signInError"></p>
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