<?php 
ob_start();

include 'top.php';
$b=ob_get_contents();
ob_end_clean();

$title = "Create Channel";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

echo $buffer;

include 'dbh.php';
include_once 'functions.php';

?>

<!-- <br><br><br><br>
<h1 style="text-align:center;color:#b225a8">Create Channel</h1><br>
<i class="fas fa-quote-left" style="color:black;margin-left:660px;font-size:50px"></i><br><br>
<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', sans-serif">Take your memeing to the next level by creating a meme-channel which allows you to earn money directly from your memes in the form of tips from your audience!</p>
<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', sans-serif">Now you can make your meme-ing a means of living!</p>
<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', sans-serif">With the creation of a channel, we offer you a Creator's Studio for you to manage and analyse your donations and subscriptions.</p>
<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', sans-serif">With ever increasing features, the Creator's Studio is the perfect tool for your channel to grow by tracking what people love the most.</p>
<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', sans-serif">And on top of everything, its absolutely FREE.</p>
<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', sans-serif">Make your own meme channel today for free!</p><br>padding-left:30px;padding-right:30px;padding-top:8px
<a href="setupchannel.php" style="margin-left:600px;color:#1b79d2;font-size:25px"><i>Create Channel</i></a> -->

<div style="width:100%;height:100%;text-align:center">
	
	<h1 style="text-align:center;font-size:60;margin-top:65px;color:#b225a8;font-family: 'Open Sans', 'sans-serif';"><b>CREATE  CHANNEL</b></h1>
<!-- <i class="fas fa-quote-left" style="color:black;width:50px;display:block;margin:0 auto;font-size:25px"></i> -->
	<br>
	<div class="row" style="margin-top:60px;width:100%">
		<div class="col-md-1"></div>
		<div class="col-md-2">
			<i class="fa fa-usd" style="font-size:45px"></i><!-- <i class="fa fa-inr" style="font-size:52px;margin-left: 30px"></i> -->
			<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', 'sans-serif';padding-left:10px;padding-right:10px;padding-top:10px">Create your meme channel and start monetising your memes.</p>
		</div>
		<div class="col-md-2">
			<i class="fa fa-money" style="font-size:50px"></i>
			<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', 'sans-serif';padding-left:10px;padding-right:10px;padding-top:10px">Creating a channel enables your audience to pay tips for your memes.</p>
		</div>
		<div class="col-md-2">
			<i class="fas fa-cog" style="font-size:50px"></i>
			<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', 'sans-serif';padding-left:10px;padding-right:10px;padding-top:10px">Get access to the <b>Creator's Studio (beta)</b> and easily manage and analyse your donations and subscriptions.</p>
		</div>
		<div class="col-md-2">			
			<i class="fab fa-paypal" style="font-size:50px"></i>
			<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', 'sans-serif';padding-left:10px;padding-right:10px;padding-top:10px">Get payments via PayPal's secure payment gateway.</p>
		</div>
		<div class="col-md-2">
			<i class="fas fa-trophy" style="font-size:47px"></i>
			<p style="text-align:center;font-size:19px;color:#494949;font-family: 'Open Sans', 'sans-serif';padding-left:10px;padding-right:10px;padding-top:10px">Why not have a go? It's absolutely <b>FREE</b>!</p>
		</div>
		<div class="col-md-1"></div>
	</div>
	<br><br><br><br>
	<div class="container-fluid">
		<p style="text-align:center;font-size:14px;color:#494949;font-family: 'Open Sans', 'sans-serif';padding-left:20px;padding-right:20px;padding-top:8px">TAKE YOUR MEMEING TO THE NEXT LEVEL</p>
		<a href="setupchannel.php" style="border-radius:3px;display:block;width:300px;margin:0 auto;padding:10px 20px 10px 20px;display:block;color:#fff;font-size:25px;background-color:#b522a8">CREATE CHANNEL</a>
	</div>
</div>

