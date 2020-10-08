<?php

$conn=mysqli_connect("localhost","root","","members");

if(!$conn){
	die("Couldnot connect to server");
}