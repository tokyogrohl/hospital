<?php

function emptyInputSignup($name, $username, $pwd) {
	$result;
	if(empty($username) || empty($pwd) || empty($name)) {
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


	function createUser($conn, $name, $username, $pwd, $utype) {
	$sql = "INSERT INTO users (usersName, usersUid, usersPwd, usersType) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $hashedPwd, $utype);
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
			$_SESSION["username"] = $uidExists["usersName"];
			if ($_SESSION["usertype"] == doctor) {
				header("location: ../welcomedoc.php");
				exit();
			}
			elseif ($_SESSION["usertype"] == staff){
				header("location: ../welcomestaff.php");
				exit();
			}
			else {
				header("location: ../admin.php");
				exit();
			}
		}
	}


	function emptyReg($name, $dob, $phone, $gender) {
	$result;
	if(empty($name) || empty($dob) || empty($phone) || empty($gender)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
	exit();
	}


	function regPat($conn, $name, $dob, $email, $phone, $emergency, $gender, $blood,
	$address, $medic, $meddet) {
	$sql = "INSERT INTO patients (patName, patDob, patEmail, patPhone, patEmer,
						patGen, patBlood, patAdd, patMed, patMedDet)
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../registration.php?error=stmtfailed");
		exit();
	}


	mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $dob, $email, $phone, $emergency, $gender, $blood,
	$address, $medic, $meddet);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["last_id"] = mysqli_insert_id($conn);
	header("location: ../registration.php?error=none");
	exit();
	}



		function emptyCheckin($patID) {
				$result;
				if(empty($patID)) {
					$result = true;
				}
				else {
					$result = false;
				}
				return $result;
				exit();
				}


function pidExists($conn, $patID) {
			$sql = "SELECT * FROM patients WHERE patId = ?;";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("location: ../signup.php?error=stmtfailed");
			exit();
				}
			$npatId = substr($patID,5);
			mysqli_stmt_bind_param($stmt, "s", $npatId);
			mysqli_stmt_execute($stmt);

			$resultData = mysqli_stmt_get_result($stmt);

			if($row = mysqli_fetch_assoc($resultData)) {
				return $row;
				}
			else{
					$result = false;
					return $result;
					}
				}

function patCheckin($conn, $patID) {
			$sql = "UPDATE patients SET patCheck='yes', patConsult='no' WHERE patId = ?;";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("location: ../welcomestaff.php?error=stmtfailed");
				exit();
				}

			$npatId = substr($patID,5);

				mysqli_stmt_bind_param($stmt, "s", $npatId);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
		  	header("location: ../welcomestaff.php?error=none");
		exit();
			}

			function checkins($conn, $patID, $reason, $visDate, $checkin) {
						$sql = "INSERT INTO checkins (patId, visDate, checkin, reason) VALUES (?, ?, ?, ?);";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)) {
								header("location: ../welcomestaff.php?error=stmtfailed");
							exit();
							}
							$npatId = substr($patID,5);
							mysqli_stmt_bind_param($stmt, "ssss", $npatId, $visDate, $checkin, $reason);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_close($stmt);
							$result = true;
							return $result;
						}

		function checkout($conn, $patID) {
				$sql = "DELETE FROM checkins WHERE patId = ? ;";
				$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)) {
								header("location: ../welcomestaff.php?error=stmtfailed");
						exit();
								}
				$npatId = substr($patID,5);
				mysqli_stmt_bind_param($stmt, "s", $npatId);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
				$result = true;
				return $result;
									}


	function patCheckout($conn, $patID) {
						$sql = "UPDATE patients SET patCheck='no' WHERE patId = ?;";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt, $sql)) {
								header("location: ../welcomestaff.php?error=stmtfailed");
							exit();
							}

						$npatId = substr($patID,5);

							mysqli_stmt_bind_param($stmt, "s", $npatId);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_close($stmt);
					  	header("location: ../welcomestaff.php?error=none");
					exit();
						}

function medUpdate($conn, $medup, $patID) {
		$sql = "UPDATE patients SET patMedDet= ? WHERE patId = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("location: ../welcomedoc.php?error=stmtfailed");
		exit();
					}
			mysqli_stmt_bind_param($stmt, "ss", $medup, $patID);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			header("location: ../welcomedoc.php");
			exit();
	}

	function createVisit($conn, $patId, $visDate, $checkin, $reason, $diag, $recco, $medup) {
	$sql = "INSERT INTO visits (patId, visDate, checkin, reason, diagnosis, recco, prescript) VALUES (?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../patbase.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sssssss", $patId, $visDate, $checkin, $reason, $diag, $recco, $medup);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	$result = true;
	return $result;
	}
