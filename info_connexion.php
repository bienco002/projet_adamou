<?php
	
	$email=$_POST["email"];
	$motpass=$_POST["motpass"];
	
	session_start();
	$_SESSION['email']=$email;
	$_SESSION['motpass']=$motpass;
?>