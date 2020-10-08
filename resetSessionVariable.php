<?php

session_start();

$ss=$_POST['sessionvariable'];
$_SESSION[$ss]=10;//number of memes after 1st call to load more