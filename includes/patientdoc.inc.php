<?php

require_once 'dbh.inc.php';


	$sql = "SELECT * FROM patients WHERE patCheck = 'yes' AND patConsult = 'no';";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../signup.php?error=stmtfail");
		exit();
	}

	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultData) > 0) {
	while($row = mysqli_fetch_assoc($resultData)) { ?>
		<form action="patbase.php" method="post">
			<div class="form-row">
				<div class="form-group col-md-6 col-md-offset-4">
					<input type="hidden" name="patid" value= <?php echo $row["patId"] ?>>
			    <button type="submit" name="submit" class="btn btn-secondary">
						<?php
						echo "PAT00" . $row["patId"] . " " . $row["patName"];
						  ?>
					</button>
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
