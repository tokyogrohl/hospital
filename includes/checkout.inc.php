<?php

if(isset($_POST['submit'])) {

	$patID = $_POST['patid'];
	$t=time();
	$checkout = date("H:i",$t);

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	$npatId = substr($patID,5);
	$sql = "UPDATE visits SET checkout= ? WHERE patId = ?;";
	$stmt1 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt1, $sql)) {
		header("location: ..welcomedoc.php?error=stmtfailed");
		exit();
	}


	mysqli_stmt_bind_param($stmt1, "ss", $checkout, $npatId);
	mysqli_stmt_execute($stmt1);
	mysqli_stmt_close($stmt1);

if (checkout($conn, $patID) == true){
	patCheckout($conn, $patID);
}
}

else {
	header("location: ../welcomestaff.php");
	exit();
}
