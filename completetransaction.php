<?php

require_once('bootstrap.php');

use \PayPal\Api\Payment;

session_start();

include 'dbh.php';
include 'functions.php';

//refreshing session
refreshSession($_GET['sid']);

include 'top.php';
?>
<html>
<head>
	<title>complete transaction</title>
</head>
<body>
	<img src="logo/m_gold.png" class="develop-logo centering">
	<?php

	if(isset($_GET['success']) && $_GET['success']=="true")
	{
		//echo 'paying...';

		$paymentId=$_GET['paymentId'];

		//echo $paymentId;
		
		$payment=Payment::get($paymentId,$apiContext);
		//var_dump($payment);
		
		$execution=new \PayPal\Api\PaymentExecution();
		$execution->setPayerId($_GET['PayerID']);

		/*$amount=new \PayPal\Api\Amount();
		$amount->setCurrency('USD');
		$amount->setDetails($details);

		$transaction=new \PayPal\Api\Transaction();
		$transaction->setAmount($amount);

		$execution->addTransaction($transaction);
		var_dump($execution);*/
		
		try{
			$result=$payment->execute($execution,$apiContext);
			//var_dump($result);
			
			//print_r($jsonResult);
			try{
				$payment=Payment::get($paymentId,$apiContext);
				//echo 'executed';
				//print_r($payment);
				//echo '<br><br>';
				/*echo $payment->id.'<br>';
				$jsonResult = $payment->toJSON();
				//echo "<br>echoing:".$jsonResult."echoing end<br>";				
				$data = json_decode($jsonResult);*/
				/*echo "<br>";
				echo $payment->id."<br>";
				echo $payment->transactions[0]->amount->total."<br>";
				echo $payment->transactions[0]->amount->currency;*/

				$pid=$payment->id;
				$amt=$payment->transactions[0]->amount->total;
				$cur=$payment->transactions[0]->amount->currency;
				$tipperId=mysqli_real_escape_string($conn,$_GET['sid']);
				$tipReceiverId=mysqli_real_escape_string($conn,$_GET['rid']);
				$imageId=mysqli_real_escape_string($conn,$_GET['imageId']);

				date_default_timezone_set('Asia/Kolkata');//setting the timezone
				$datetime=date('Y-m-d H:i:s');

				$sql="INSERT INTO tips_table (tipperId,tipReceiverId,tipForImageId,tipAmount,transactionId,currency, date_time) VALUES ('$tipperId','$tipReceiverId','$imageId','$amt','$pid','$cur','$datetime')";
				$result=mysqli_query($conn,$sql);

				$sql1="SELECT username FROM memberstable WHERE id='$tipReceiverId'";
				$result1=mysqli_query($conn,$sql1);
				$row=mysqli_fetch_assoc($result1);
				$username=$row['username'];



				echo '<p class="develop-text">Payment of '.$payment->transactions[0]->amount->currency.' '.$payment->transactions[0]->amount->total.' successfully done to '.$username.'<br>';
				echo '<a href="'.$_GET['redir'].'" style="color:#b522a8">BACK</a></p>';

				/*echo $jsonResult['id'];
				echo $payment->total.'<br>';
				echo $payment->currency.'<br>';*/
				//echo 'payment successful';
			}catch(Exception $ex){
				//exit(1);
				echo "<p class='develop-text'>Something went wrong. Redirect:</p>";
				?>
				<a href="<?php echo $_GET['redir'].'.php'; ?>">Back to Tip Memer</a>
				<?php
			}
		}catch(Exception $ex){
			//exit(1);
			echo "<p class='develop-text'>Something went wrong. Redirect:";
			?>
			<a href="<?php echo $_GET['redir'].'.php'; ?>" style="color:#b522a8">Back to Tip Memer</a></p>
			<?php
		}

		return $payment;
	}
	else
	{
		//exit(1);
		echo '<p class="develop-text">Transaction was cancelled or something went wrong. Redirect:</p>';
		?>
		<a href="<?php echo $_GET['redir'].'.php'; ?>" style="color:#b522a8">Back to Tip Memer</a></p>
		<?php
	}

	?>
</body>
</html>