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
	<title>Forgot Password</title>
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
<div class="login-bar container-fluid">
    <nav>
    	<img style="height:60px;width:165px;display:inline-block;top:5px;position:relative" src="logo/m_gold.png">
		<p class="signin-website-name" style="font-size:32px;left:0px;position:relative;display:inline-block;top:10px">meagl</p>	
    </nav>
</div>

<div class="forgotpasswordform">

	<h1 class="signup-header">Forgot Password</h1>
	<form class="fpForm" action="" method="POST">
		<h1 class="prompt-style">Enter your email:</h1>
		<input type="text" name="email" class="form-control signup-field" style="font-size:18px;" id="email_field"><br>
		
		<button class="inbutton btn signup-button fp-button" id="fpbutton" type="submit">Send Email</button>
	</form>
	
</div>
<p id="fpError" class="error-message" style="display:block;width:300px;margin:20 auto;"></p>
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