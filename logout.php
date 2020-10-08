<?php 

session_start();
session_destroy();

unset($_COOKIE['id']);
setcookie('id', '', -1, '/');
unset($_COOKIE['username']);
setcookie('username', '', -1, '/');
unset($_COOKIE['memesUploaded']);
setcookie('memesUploaded', '', -1, '/');
unset($_COOKIE['numberofSubscribers']);
setcookie('numberofSubscribers', '', -1, '/');
unset($_COOKIE['numberOfQuestionsAsked']);
setcookie('numberOfQuestionsAsked', '', -1, '/');
unset($_COOKIE['profilePictureLocation']);
setcookie('profilePictureLocation', '',-1, '/');

header('Location: index.php');