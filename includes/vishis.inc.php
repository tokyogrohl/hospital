<?php

require_once 'dbh.inc.php';
$patid = $_POST['patid'];

	$sql = "SELECT * FROM visits WHERE patId = $patid;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultData) > 0) {
	while($row3 = mysqli_fetch_assoc($resultData)) { ?>
<a href="visits.php" class="btn btn-primary" role="button"><?php echo $row3['visDate'] . ' ' . $row3['reason'] ?></a>
<?php	}
}
	else{?>
		<h3 class="text-white text-center"> No previous visits! </h3>
	<?php }

	mysqli_stmt_close($stmt);


?>
