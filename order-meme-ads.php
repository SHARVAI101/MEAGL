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
    <title>Order Meme Ads</title>
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
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js"> </script>
</head>

<body style="background-color:#fefefe" >    
    <?php //include_once("analyticstracking.php") ?>
   
    
    <div class="top-nav container-fluid transparent">
        <nav>
            <?php
            //<i class="flaticon-eagle-shield"></i><h1 style="display:inline;margin-left:30px;">MEAGL</h1>
            ?>
           <!-- <a href="index.php"><img style="height:40px;width:130px;margin-top:5px" src="logo/m.png"></a>--> 
            
            <a href="index.php" class="website-name montserrat" style="font-size:23px;top:10px;color:#a49fa8">M E A G L</a>  
        
        </nav>
        
    </div>

    <div class="lower-body" id="lower-body">
    
        <!--<div class="meme-ad-page-1 parallax">
            <div class="meme-ad-page-1-contents">
                <img src="logo/m_gold.png" class="" style="display:block;margin:0 auto;position:relative;height:20vw">
                <p class="develop-text-ad" style="color:#CEB250;width:100%">MEME ADS</p>
                <p class="develop-text-ad" style="color:#CEB250;font-size:25px">Redefining Advertising</p>
            </div>
        </div>-->
        <div class="parallax"></div>
        
        <!--<div class="parallax1"></div>
        <div class="parallax2"></div>
        <img src="Frontend/P1020007.png" style="height:100%;width:100%">-->
        <div class="para1">
            <h1 class="om_h" style="padding-top:20px">MEME ADVERTISING</h1>
            <p class="om_p">We are a company dedicated to completely revolutionising the way in which advertising is done.</p>
            <p class="om_p"style="font-size:30px">How?</p>
            <p class="om_h lato" style="font-size:40px;margin-top:20px">M E M E S</p>
        </div>
        <div class="para2" style="padding-bottom:50px">
            <h2 class="om_h p2" style="padding-top:20px">WHY MEMES AS ADs?</h2>
            <div style="display:block;margin:20px auto 0 auto;position:relative;width:900px">
                <div style="width:400px;display:inline-block">
                    <h3 class="pointers">POPULARITY</h3>
                    <p class="om_p p2">A majority of today's youth LOVE MEMES and their popularity is increasing at a tremendous rate. Guess what? <span style="color:#65C9C0" class="lato"><b>Memes recently crossed Jesus Christ in Google's Search Terms!</b></span></p>
                </div>
                <div style="width:400px;display:inline-block;margin-left:70px;margin-top:-209px">
                    <h3 class="pointers">SIMPLE and HILARIOUS</h3>
                    <p class="om_p p2">The short, simple and hilarious nature of memes just attract people to them. Therefore, your content will be consumed at a rate like no other.</p>
                </div>
            </div>
            <p class="om_h lato" style="font-size:40px;margin-top:70px">Therefore your audience might probably not have enough time to watch an Ad but they'll definitely have just enough time to read a meme!</p>            
        </div>
        <div class="para3" style="padding-bottom:50px">
            <h2 class="om_h p3" style="padding-top:20px;color:#fff">HOW DOES THAT HELP YOUR BRAND?</h2>            
            <p class="om_p p3">The answer is simple- the short and hilarious nature of memes compels people to read them...even if they might be advertisements.</p>
            <p class="om_p p3">Therefore your advertisements shall never be ignored and the name of your brand shall always reach your target audience. No matter what.</p>
            <p class="om_h lato" style="font-size:40px;margin-top:40px">This means the effectiveness of your ads increases almost <span style="color:#e74c3c" class="lato"><b>5 fold</b></span> on an average</p>
        </div>
        <div class="para4">
            <h1 class="om_h p4" style="padding-top:20px;">WHY GO WITH US?</h1>            
            <p class="om_p p4">BECAUSE WE MAKE THEM EPIC</p>
            <p class="om_p p3">Before making a meme-ad for you, we perform a meticulous background research on your brand so as to find the best points to make memes on.</p>
            <p class="om_h lato" style="font-size:40px;margin-top:20px">Our aim to is make your meme-ads go <span style="color:#e74c3c" class="lato"><b>viral</b><span></p>
        </div>
        <div class="para5">
            <h1 class="om_h p3" style="padding-top:20px;color:#fff">NOT CONVINCED YET? WE TOTALLY UNDERSTAND</h1>            
            <p class="om_p p3">And therefore we give the first meme for free</p>
            <p class="om_p p3">Therefore your advertisements shall never be ignored and the name of your brand shall always reach your target audience. No matter what.</p>
            <p class="om_h lato" style="font-size:40px;margin-top:20px">This means the effectiveness of your ads increases almost 10 fold on an average</p>
        </div>
    </div>
</body>
</html>
