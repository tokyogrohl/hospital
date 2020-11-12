<?php

function emptyInputSignup($username, $pwd) {
	$result;
	if(empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
	}


function uidExists($conn, $username) {
	$sql = "SELECT * FROM users WHERE usersUid = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "s", $username);
	mysqli_stmt_execute($stmt);
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
	}
	
	
	function createUser($conn, $username, $pwd, $utype) {
	$sql = "INSERT INTO users (usersUid, usersPwd, usersType) VALUES (?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPwd, $utype);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../signup.php?error=none");
	exit();
	}
	
	function emptyInputLogin($username, $pwd) {
	$result;
	if(empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
	}
	
	
	function loginUser($conn, $username, $pwd) {
		$uidExists = uidExists($conn, $username);
		
		if($uidExists === false) {
			header("location: ../index.php?error=wrongLogin");
			exit();
		}
		
		$pwdHashed = $uidExists["usersPwd"];
		$checkPwd = password_verify($pwd, $pwdHashed);
		
		if ($checkPwd === false) {
			header("location: ../index.php?error=wrongLogin");
			exit();
		}
		else if($checkPwd === true) {
			session_start();
			$_SESSION["userid"] = $uidExists["usersId"];
			$_SESSION["useruid"] = $uidExists["usersUid"];
			$_SESSION["usertype"] = $uidExists["usersType"];
			if ($_SESSION["usertype"] == doctor) {
				header("location: ../welcomedoc.php");
				exit();
			}
			else {
				header("location: ../welcomestaff.php");
				exit();
			}
		}
	}