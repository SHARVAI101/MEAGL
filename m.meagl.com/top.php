<?php 

	session_start();
    include 'dbh.php';
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

    <meta name="description" content="An amazing memes' website that combines memes and social media into an epic mixture!">
    <meta name="keywords" content="meme, meagl, fun, savage memes, sports memes, celeb memes, gaming memes, comic memes, college memes, school memes, dank memes">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!--<link rel="icon" type="image/png" href="font/eagle-shield_32.png"></link>-->
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js"> </script>
</head>

<body style="background-color:#fefefe" >	
    <?php //include_once("analyticstracking.php") ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div class="top-nav container-fluid">
        <nav>
            
            <!--<a href="index.php" class="website-name">meagl</a>-->

            <!--<a href="index.php"><img style="height:56px;width:158px;margin-left:-27px;margin-top:-5px" src="logo/m_2.png"></a>-->
            <div class="dropdown">
                <p id="dropdown" style="cursor:pointer">
                    <span class="glyphicon glyphicon-chevron-down" style="color:#b522a8"></span>
                </p>
            </div>

            <?php
            //<i class="flaticon-eagle-shield"></i><h1 style="display:inline;margin-left:30px;">MEAGL</h1>
            if(!isset($_SESSION['id']))
            {
            ?>
                <a href="index.php"><img style="height:30px;width:100px;margin-top:11px;margin-left:25px" src="logo/m.png"></a>
            <?php
            }
            ?>

            <?php
            if(isset($_SESSION['id']))
            {
            ?>
                <div class="search-box" id="search-box">
                    <form class="searchBarForm">
                        <input type="text" placeholder="Q" class="search form-control" id="search-text" style="font-size:20px;">                   
                    </form>

                    <form class="searchResultsArrayForm" method="POST" action="usernameSearchResults.php">
                        <input type="hidden" name="resultArray" value="">
                    </form>
                </div>

                <div class="wrapper">                

                    <div class="notifications">
                        <p class="notifications-button" id="notifications"  style="cursor:pointer">
                            <span class="glyphicon glyphicon-bell"></span>
                            <span id="notificationsNumber" style="display:none"></span>
                        </p>
                    </div>
                    
                    <div class="mobi-wrapper">
                            <a class="mobi-menu"><i class="fa fa-bars" aria-hidden="true"></i></a> 
                    </div>
                </div>
            <?php
            }
            else
            {
            ?>
                <li style="display:inline" class="header-signin"><a href="signup.php">Sign Up | In</a></li>
            <?php
            }
            ?>
        
        </nav>

        <?php
        if(isset($_SESSION['id']))
        {
        ?>
            <div class="mobi-options">
                <h4  class="mobi-option"><a href="uploadmeme.php">Upload</a></h4><hr class="option-hr">
                <a href="userprofile.php?id=<?php echo htmlentities($_SESSION['id']); ?>">
                <h4 class="mobi-option">My Profile</h4></a><hr class="option-hr">
                <a href="editPersonalInfo.php"><h4 class="mobi-option">Settings</h4></a><hr class="option-hr">
                <a href="logout.php"><h4 class="mobi-option">Sign Out</h4></a>
            </div>
        <?php
        }
        ?>
        
    </div>

    <div class="header2">
      	<a href="index.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">All</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="rate_memes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center;color:#f1c40f">Rate Memes (NEW)</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="memedevelopersforum.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Meme Developers' Forum</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
      	<a href="savagememes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Savage</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
      	<a href="sportsmemes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Sports</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
      	<a href="celebmemes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Celeb</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
      	<a href="gamingmemes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Gaming</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
      	<a href="comicmemes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Comic</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="college_school_memes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">College / School</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="politics_memes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Politics</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
        <a href="justmythoughts.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Just my thoughts</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">
      	<a href="othermemes.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Other</h2></a><hr style="margin-left:10px;margin-right:10px;margin-top:0px">      	
        <a href="contact_us.php" class="mobi-categ-link"><h2 class="categ" style="text-align:center">Contact Us</h2></a>
        <!--<li style="display:inline;float:right;"><a href="uploadmeme.php">Post meme!</a></li>-->
    </div>

    <div class="lower-body">
    