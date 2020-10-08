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

    <script type="text/javascript" src="bootstrap-filestyle.min.js"> </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color:#fefefe" >	

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
            <?php
            //<i class="flaticon-eagle-shield"></i><h1 style="display:inline;margin-left:30px;">MEAGL</h1>
        	?>
            <a href="index.php"><img style="height:40px;width:130px;margin-top:5px" src="logo/m.png"></a>
            
            <!--<a href="index.php" class="website-name">meagl</a>-->

            <!--<a href="index.php"><img style="height:56px;width:158px;margin-left:-27px;margin-top:-5px" src="logo/m_2.png"></a>-->
            <div class="dropdown">
                <p id="dropdown" style="cursor:pointer">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </p>
            </div>

            <div class="search-box" id="search-box">
                <form class="searchBarForm">
                    <input type="text" placeholder="Search users" class="search form-control" style="font-size:20px;">                   
                </form>

                <form class="searchResultsArrayForm" method="POST" action="usernameSearchResults.php">
                    <input type="hidden" name="resultArray" value="">
                </form>
            </div>

            <div class="wrapper">
                

                <?php
                if(isset($_SESSION['id'])){       
                //echo "yes";
                //<li style="display:inline;float:right;"><a href="userprofile.php?id=<?php echo htmlentities($_SESSION['id']); "><?php echo htmlentities($_SESSION['username']); </a></li>
                
                ?>
                <div class="dp">                    
                    <a href="userprofile.php?id=<?php echo htmlentities($_SESSION['id']); ?>"><img src="<?php echo $_SESSION['profilePictureLocation']; ?>" id="dp" class="img-responsive"></a>
                    <!--<a href="userprofile.php?id=<?php //echo htmlentities($_SESSION['id']); ?>"><?php //echo htmlentities($_SESSION['username']); ?></a>-->
                </div>

                <div class="notifications">
                    <p class="notifications-button" id="notifications"  style="cursor:pointer">
                        <span class="glyphicon glyphicon-bell"></span>
                    </p>
                </div>
                <?php
                } 
                else{
                    ?>

                    <li style="display:inline"><a href="login.php">LOGIN</a></li>

                    <?php
                    if($current_page=='/memewebsite_test1/signup.php?lastpage=uploadmeme.php'){
                        echo '<li style="display:inline"><a href="signup.php?lastpage='.htmlentities($current_page).'">Sign Up</a></li>';
                    }else{
                        //echo $current_page;
                        echo '<li style="display:inline"><a href="signup.php">Sign In / Sign Up</a></li>';
                    }
                }
                ?>

                

                <div class="post-a-meme">
                    <!--<a href="#" id="upload"><span class="glyphicon glyphicon-upload"></span></a>-->
                    <a href="uploadmeme.php" id="upload"><span class="glyphicon glyphicon-upload"></span></a>
                </div>        
            </div>
        
        </nav>
        <?php
        if(isset($_SESSION['id']))
        {
        ?>
        <div class="user-options">
            <a href="editPersonalInfo.php" class="user-option-link"><h4 class="user-option">Settings</h4></a>
            <a href="logout.php" class="user-option-link outbutton"><h4 class="user-option">Log out</h4></a>
            <!--<form name='logoutForm' method='POST' action='logout.php'>
                <button class='outbutton' >LOG OUT</button>
                <a href="logout.php" class="user-option-link outbutton"><h4 class="user-option">Log out</h4></a>
            </form>-->
        </div>
        <?php
        }
        ?>
    </div>

    
        <?php
        /*<li style="display:inline"><a href="index.php">MEAGL</a></li>
        
        if(isset($_SESSION['id'])){       
        ?>
        <li style="display:inline;float:right;"><a href="userprofile.php?id=<?php echo htmlentities($_SESSION['id']); ?>"><?php echo htmlentities($_SESSION['username']); ?></a></li>
        <?php
        } 
        else{
          
            echo '<li style="display:inline"><a href="login.php">LOGIN</a></li>';

            if($current_page=='/memewebsite_test1/signup.php?lastpage=uploadmeme.php'){
                echo '<li style="display:inline"><a href="signup.php?lastpage='.htmlentities($current_page).'">Sign Up</a></li>';
            }else{
                //echo $current_page;
                echo '<li style="display:inline"><a href="signup.php">Sign Up</a></li>';
            }
        }*/
        ?>
    <div class="header2">
      	<a href="index.php" class="categ-link"><h1 class="categ">All Memes</h1></a>
      	<a href="savagememes.php" class="categ-link"><h1 class="categ">Savage memes</h1></a>
      	<a href="sportsmemes.php" class="categ-link"><h1 class="categ">Sports memes</h1></a>
      	<a href="celebmemes.php" class="categ-link"><h1 class="categ">Celeb memes</h1></a>
      	<a href="gamingmemes.php" class="categ-link"><h1 class="categ">Gaming memes</h1></a>
      	<a href="comicmemes.php" class="categ-link"><h1 class="categ">Comic memes</h1></a>
        <a href="justmythoughts.php" class="categ-link"><h1 class="categ">Just my thoughts</h1></a>
      	<a href="othermemes.php" class="categ-link"><h1 class="categ">Other memes</h1></a>
      	<a href="memedevelopersforum.php" class="categ-link"><h1 class="categ">Meme Developers' Forum</h1></a>
        <!--<li style="display:inline;float:right;"><a href="uploadmeme.php">Post meme!</a></li>-->
    </div>

    <div class="lower-body">
    