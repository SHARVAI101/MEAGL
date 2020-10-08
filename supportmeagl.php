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
include 'leftnav.php';
$b=ob_get_contents();
ob_end_clean();

$title = "Support Meagl";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

echo $buffer;
?>

<h1 class="supportmeagl-header">Support Meagl!</h1>
<img style="height:38px;margin-top:36px;left:565px" src="logo/m_gold.png" class="sign-up-logo">
<div class="supportmeagl"><br>
	 <p style="font-size:25px;color:#333333;text-align:center;font-family:'Open Sans';margin:0 15px 0 15px">At Meagl, we're constantly working to provide memers a platform to showcase their talents and be able to support themselves through them.<br><br>Inorder to achieve this, we need your help! So go ahead, and drop that donation, however small it may be, for us to make the dream of allowing memers to make money through their memes a possibility!</p><br><br><br>

		<a href="https://paypal.me/supportMEAGL" target="_blank" class="inbutton1 donate-button" id="donatebutton" style="border:1px solid green;height:58px;padding:15px 30px 15px 30px;font-size:19px;color:white;background-color:green;text-align:center;display:block;margin:0 auto;width:150px">DONATE</a>
	<!-- </form> -->
</div>

</body>
</html>