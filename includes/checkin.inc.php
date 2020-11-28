<?php

if(isset($_POST['submit'])) {

	include_once 'checkintab.inc.php';

	$patID = $_POST['patID'];
	$reason = $_POST['reason'];
	$t=time();
	$visDate = date("Y-m-d",$t);
	$checkin = date("H:i",$t);

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if(emptyCheckin($patID) !== false){
		header("location: ../welcomestaff.php?error=emptyinput");
		exit();
	}

	if(pidExists($conn, $patID) == false){
		header("location: ../welcomestaff.php?error=invalidid");
		exit();
	}
	if (checkins($conn, $patID, $reason, $visDate, $checkin) == true){
	patCheckin($conn, $patID);
}
}

else {
	header("location: ../welcomestaff.php");
	exit();
}
