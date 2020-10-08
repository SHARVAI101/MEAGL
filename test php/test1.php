<html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<title>HI</title>
</head>
<body>
<?php


$search="Hi there my name is sharvai.";
$all_search_words=$explode(" ",$search);
foreach($all_search_words as $asw){
	echo $asw;
	$search_string=preg_replace("#[^0-9a-z]#i","",	$asw);
	echo $search_string."<br>";
}

?>
</body>
</html>