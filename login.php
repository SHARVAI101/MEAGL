<?php
include 'top.php';
if(!isset($_SESSION['id'])){
?>

<h1>LOG IN</h1>
<form class="loginForm" action="loginh.php" method="POST">
	
	<input type="text" name="email" placeholder="Email"><br>
	<input type="password" name="pwd" placeholder="Password"><br>
	<?php 
		if(isset($_GET['lastpage'])){
			$lastpage=$_GET['lastpage'];
			//echo $lastpage;
			echo '<input type="hidden" name="lastpage" value="'.htmlentities($lastpage).'"></input>';//passing the lastpage
		}
	?>
	<button class="inbutton" id="loginbutton" type="submit">LOG IN</button>
</form>
<p id="logInError"></p>
<?php 
}
else{	
	//echo '<script language="javascript">alert("userprofile la challa")</script>';
	header("LOCATION: userprofile.php?id=".$_SESSION['id']);		
}
?>
</body>
</html>