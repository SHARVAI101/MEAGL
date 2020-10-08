<?php
session_start();
if(isset($_SESSION['id']))
{
    if(isset($_GET['imageId']))
    {
    	ob_start();
    	include 'top.php';
		$b=ob_get_contents();
		ob_end_clean();

		$title = "TIP MEMER";
		$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $b);

		echo $buffer;

		include 'dbh.php';

	   	//$_SESSION['payeeEmail']="juliusjulius@gmail.com";

	   	$tipperId=mysqli_real_escape_string($conn,$_SESSION['id']);

	   	$imageId=mysqli_real_escape_string($conn,$_GET['imageId']);
	   	$sql="SELECT uploaderId,uploader,memetitle FROM memestable WHERE id='$imageId'";
	   	$result=mysqli_query($conn,$sql);
	   	$row=mysqli_fetch_assoc($result);

	   	$tipReceiverId=mysqli_real_escape_string($conn,$row['uploaderId']);
	   	$tipReceiverName=mysqli_real_escape_string($conn,$row['uploader']);
	   	$memetitle=$row['memetitle'];

	   	$sql1="SELECT paypalEmail,profilePictureLocation,paypalAccountCountry FROM memberstable WHERE id='$tipReceiverId'";
	   	$result1=mysqli_query($conn,$sql1);
	   	$row1=mysqli_fetch_assoc($result1);
	   	$tipReceiverEmail=mysqli_real_escape_string($conn,$row1['paypalEmail']);
	   	$ppl=$row1['profilePictureLocation'];
	   	$payeePaypalAccountCountry=$row1['paypalAccountCountry'];
	   	
?>

	<div class="card" style="padding-top:100px">

	    <br>
	  
	    <h1 style="margin-top:-100px;text-align:center">Tip <?php echo $tipReceiverName; ?></h1> 
	  
	    <div style="margin: 24px 0;">
	        <p style="text-align:center;margin-left:10px;font-size:23px;margin-top:30px;color:#b225a8">
	            <img style="position:absolute;top:75px;left:175px;height:180px;width:160px;border-radius:50%" src="<?php echo $ppl; ?>"><br><br><br><br><br><br>
	            <b><?php echo $tipReceiverName; ?></b>
	            <br>
	        </p>
	        <a href="imagedisplay.php?id=<?php echo $imageId; ?>&world=1&uid=0&gid=0" style="color:grey;font-size:22px;font-family:arial;letter-spacing:2px"><?php echo $memetitle; ?></a><br><br>
	       
	        <form class="tip_money_form" action="">	  
	            <p class="tip-amount" style="display:inline;font-size:20px;color:black;letter-spacing:1px">Tip amount: </p>
	            <input type="text" onkeypress="return isNumberKey(event)" name="amount" class="tip-amount" required><br><br><br>
	            <input type="hidden" name="creator-name" value="<?php echo $tipReceiverName; ?>">
	            <input type="hidden" name="imageForTipId" value="<?php echo $imageId; ?>">
	            <input type="hidden" name="tipperId" value="<?php echo $tipperId; ?>">
	            <input type="hidden" name="tipReceiverId" value="<?php echo $tipReceiverId; ?>">
	            <input type="hidden" name="tipReceiverEmail" value="<?php echo $tipReceiverEmail; ?>">
	            <input type="hidden" name="payeePaypalAccountCountry" value="<?php echo $payeePaypalAccountCountry; ?>">
	            <!-- <input type="hidden" name="landing_page" value="billing"> -->
	            <p>Choose your country of residence (i.e., bank account or PayPal account location)</p>
	            <select name="payer_location">
	            	<option value="1">United States</option>
	            	<option value="2">India</option>
	            	<option value="3">Other</option>
	            </select>
	            <!--<input type="hidden" name="memeId" value="<?php //echo $memeId; ?>">-->
	            <button class="tip_money_button tipbutton" id="tip_money_button" type="submit"><h3 style="font-size:22px;margin-top:7px">Tip</h3></button>
	        </form>
	    
	        <!--<button type="submit" class="tipbutton"><h3 style="font-size:22px;margin-top:7px">Tip</button><br> -->
	    
	    </div>
	</div>


<?php
	}
	else
	{
		header("LOCATION: index.php");
	}
}
else
{
	header("LOCATION: signup.php?lastpage=tip-memer.php?imageId=".$_GET['imageId']);
}
?>