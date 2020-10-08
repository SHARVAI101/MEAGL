<?php 

/*if(isset($_SESSION['id'])){
    echo '<a href="userprofile.php">Back to profile page</a>';
}
else{
    echo '<a href="index.php">Back to home page</a>';
}*/
//session_start();
ob_start();
include 'top.php';
$b=ob_get_contents();
ob_end_clean();

$title = "Support Meagl";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

echo $buffer;
?>

<h1 class="supportmeagl-header">Support Meagl!</h1>
<img style="height:32px;margin-top:28px;left:370px" src="logo/m_gold.png" class="sign-up-logo">
<div class="supportmeagl">
     <textarea class="form-control supportreason" name="question" style="font-size:19px" placeholder="At Meagl, we're constantly working to provide memers a platform to showcase their talents and be able to support themselves through them. Inorder to achieve this, we need your help! So go ahead, and drop that donation, however small it may be, for us to make the dream of allowing memers to make money through their memes a possibility!"></textarea><br>
        <form action="/action_page.php" style="color:#b225a8;padding-left:180px">Amount to be donated: <input type="text" name="fname" style="width:150px"><br>


        <button class="inbutton1 donate-button" id="donatebutton" type="submit"><b>Donate</b></button>
         </form>