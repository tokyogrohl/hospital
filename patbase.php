<html>
<head>
<title>Welcome Doc</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="banner">
<div class="container">
<div class="header">
<div class="logo">
<a href="index.html"><img src="images/logo2.png" alt=""/></a>
</div>
<div class="top-menu">
<span class="menu"></span>
<ul>
<li><a href="welcomedoc.php">HOME</a></li>
<li><a href="#register">APPOINTMENT</a></li>
<li><a href="#schedule">SCHEDULE</a></li>
</ul>
</div>
<div class="clearfix"></div>
</div>
<?php
session_start();

if(isset($_POST["submit"])) {
	$patID = $_POST['patid'];


	require_once 'includes/dbh.inc.php';
	require_once 'includes/functions.inc.php';

	$sql1 = "SELECT * FROM patients WHERE patId = ?;";
	$stmt1 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt1, $sql1)) {
		header("location: ..welcomedoc.php?error=stmtfailed");
		exit();
	}


	mysqli_stmt_bind_param($stmt1, "s", $patID);
	mysqli_stmt_execute($stmt1);
  $result = mysqli_stmt_get_result($stmt1);
	$row = mysqli_fetch_assoc($result);
	mysqli_stmt_close($stmt1);

	$sql2 = "SELECT * FROM checkins WHERE patId = ?;";
	$stmt2 = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt2, $sql2)) {
		header("location: ..welcomedoc.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt2, "s", $patID);
	mysqli_stmt_execute($stmt2);
	$resultData = mysqli_stmt_get_result($stmt2);
	$rowc = mysqli_fetch_assoc($resultData);
	mysqli_stmt_close($stmt2);


?>
<h3 class="text-center text-white">PATIENT DATA</h3>

<div class="border border-primary" style="padding:1.5rem">
	<h4 class="text-center text-white" style="margin-top:0px">General Information</h4>
<form>
	<div class="form-group row">
    <div class="col-md-2">
			<p class="text-white"> Patient ID </p>
      <input type="text" readonly class="form-control-plaintext" value=<?php echo "PAT00". $patID ?>>
    </div>
		<div class="col-md-6">
			<p class="text-white"> Patient Name </p>
			<input type="text" readonly class="form-control-plaintext" value='<?php echo htmlspecialchars($row["patName"]) ?>'>
		</div>
		<div class="col-md-2">
			<p class="text-white"> Date of Birth </p>
			<input type="text" readonly class="form-control-plaintext" value=<?php echo $row["patDob"] ?>>
		</div>
		<div class="col-md-2">
			<p class="text-white"> Blood Group </p>
			<input type="text" readonly class="form-control-plaintext" value=<?php echo $row["patBlood"] ?>>
		</div>
		<div class="col-md-2">
			<p class="text-white"> Phone Number</p>
			<input type="text" readonly class="form-control-plaintext" value=<?php echo $row["patPhone"] ?>>
		</div>
  </div>
</form>
</div>

<div class="border border-primary" style="padding:1.5rem">
	<h4 class="text-center text-white" style="margin-top:0px">Visit History</h4>
<?php include_once 'includes/vishis.inc.php' ?>
</div>

<div class="border border-primary" style="padding:1.5rem">
	<h4 class="text-center text-white" style="margin-top:0px">Current Visit</h4>
<form action="includes/updatemed.inc.php" method="post">
	<div class="form-group row">
    <div class="col-md-2">
			<p class="text-white"> Visit Reason </p>
      <input type="text" name='reason' readonly class="form-control-plaintext" value=<?php echo $rowc['reason'] ?>>
    </div>
		<div class="col-md-3">
			<p class="text-white"> Diagnosis </p>
			<textarea class="form-control" name="diag"></textarea>
		</div>
		<div class="col-md-3">
			<p class="text-white"> Reccomendations </p>
			<textarea class="form-control" name="recco"></textarea>
		</div>
		<div class="col-md-6">
			<p class="text-white"> Medication </p>
			<textarea class="form-control" name="meddet"><?php echo $row["patMedDet"] ?></textarea>
			<input type="hidden" name="patid" value= <?php echo $patID ?>>
			<input type="hidden" name="visDate" value= <?php echo $rowc['visDate'] ?>>
			<input type="hidden" name="checkin" value= <?php echo $rowc['checkin'] ?>>
			<button style="margin-top:1px" class="form-group btn btn-success" type="submit" name="submit">
				Update and end visit
			</button>
		</div>
  </div>
</form>
</div>


<?php
}
else {
	header("location: welcomedoc.php");
	exit();
} ?>


</div>
<div class="clearfix"></div>
</div>
</div>
<?php
include_once 'footer.php';
?>

</body>
</html>
