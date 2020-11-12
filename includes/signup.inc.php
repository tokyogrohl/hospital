<?php

if(isset($_POST["submit"])) {
	
	$username = $_POST["uid"];
	$pass = $_POST["pwd"];
	$utype = $_POST["usertype"];
	
	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';
	
	if(emptyInputSignup($username, $pass) !== false){
		header("location: ../signup.php?error=emptyinput");
		exit();
	}
	if(uidExists($conn, $username) !== false){
		header("location: ../signup.php?error=usernametaken");
		exit();
	}
	
	createUser($conn, $username, $pass, $utype);
}
else {
	header("location: ../signup.php");
	exit();
}