<?php

if(isset($_POST['submit'])) {

	$patID = $_POST['patid'];
	$medup = $_POST['meddet'];
	$diag = $_POST['diag'];
	$recco = $_POST['recco'];
	$reason = $_POST['reason'];
	$visDate = $_POST['visDate'];
	$checkin = $_POST['checkin'];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

  if (createVisit($conn, $patID, $visDate, $checkin, $reason, $diag, $recco, $medup) == true) {
			medUpdate($conn, $medup, $patID);
	}

}

else {
	header("location: ../welcomedoc.php");
	exit();
}
