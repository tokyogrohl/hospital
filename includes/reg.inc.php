<?php

if(isset($_POST["submit"])) {

	$name = $_POST["fullname"];
	$dob = $_POST["birthday"];
	$email = $_POST["email"];
	$phone = $_POST["mobile"];
	$emergency = $_POST["em_contact"];
	$gender = $_POST["Gender"];
	$blood = $_POST["blood"];
	$address = $_POST["Address"];
	$medic = $_POST["medic"];
	$meddet = $_POST["med_det"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if(emptyReg($name, $dob, $phone, $gender) !== false){
		header("location: ../registration.php?error=emptyinput");
		exit();
	}

regPat($conn, $name, $dob, $email, $phone, $emergency, $gender, $blood,
	$address, $medic, $meddet);

}
else {
	header("location: ../registration.php");
	exit();
}
