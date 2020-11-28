<?php

require_once 'dbh.inc.php';


	$sql = "SELECT * FROM patients WHERE patCheck = 'yes';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultData) > 0) {
	while($row = mysqli_fetch_assoc($resultData)) { ?>
		<form action="includes/checkout.inc.php" method="post">
			<div class="form-row">
				<div class="form-group col-xs-2 col-md-offset-3">
				<input name="patid" type="text" readonly class="form-control-plaintext" value="PAT00<?php echo $row["patId"] ?>">
				</div>
				<div class="form-group col-md-6">
				<input type="text" readonly class="form-control-plaintext" value="<?php echo $row["patName"] ?>">
				</div>
				<div class="form-group col-xs-2">
			    <button type="submit" name="submit" class="btn btn-danger">Check Out</button>
			  </div>
			</div>
		</form>

<?php	}
}
	else{
		echo "<h2> No patients checked in yet!</h2>";
	}

	mysqli_stmt_close($stmt);


?>
