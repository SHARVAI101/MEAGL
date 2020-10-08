<?php
session_start();

include 'dbh.php';

ini_set('max_execution_time', 300); //setting the maximum execution time for mail sending

if(isset($_POST['email']) && $_POST['email']!="")
{

	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$sql="SELECT username FROM memberstable WHERE email='$email'";//updating database 
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)!=0)
	{
		$row=mysqli_fetch_assoc($result);

		$username=$row['username'];
		

		function random_password() 
		{
		    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		    $password = array(); 
		    $alpha_length = strlen($alphabet) - 1; 
		    for ($i = 0; $i < 8; $i++) 
		    {
		        $n = rand(0, $alpha_length);
		        $password[] = $alphabet[$n];
		    }
		    return implode($password); 
		}
		$pwd=random_password();

		//$db_pwd=password_hash($pwd, PASSWORD_DEFAULT);
		$db_pwd=$pwd;
		$sql1="UPDATE memberstable SET pwd='$db_pwd' WHERE email='$email'";
		$result1=mysqli_query($conn,$sql1);
		
		$emailId=$email;

					$to      = $emailId;
					$subject = 'Account Password Reset';
					$message = '
<html>
<body>
<img src="http://www.meagl.com/logo/m_2.png" style="width:100%; height:auto;"><br>
<pre style="font-size:17px">

Hey, '.$username.'!

We received a request to reset your password. This is your new password: '.$pwd.'
</pre> 
															
</body>
</html>';
											
					$headers = 'From: support@meagl.com' . "\r\n" .
					    'Reply-To: support@meagl.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion()."\r\n";
					$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";

					mail($to, $subject, $message, $headers);

		echo 'sent';
	}
	else
	{
		echo 'wrong email';
	}
	
}
?>
