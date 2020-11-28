<?php
session_start();
include_once 'includes/dbcheck.inc.php';
include_once 'includes/tabcheck.inc.php';
?>


<!DOCTYPE html>
<html>
<head>
<title>URBAN HOSPITAL</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div id="login" class="login">
<div class="login-text text-center">
<h3>LOGIN</h3>
<p>Urban Hospital for Citizens</p>
</div>

<div id="login-error-msg-holder">

<?php

if (isset($_GET["error"])){
	if ($_GET["error"] == "emptyinput") {
		echo "<p> Fill in all the fields! </p>";
	}
	else if($_GET["error"] == "wrongLogin") {
		echo "<p>Incorrect Login</p>";
	}
	else if($_GET["error"] == "none") {
		echo "<p>Success</p>";
	}
}
?>

</div>
<div class="login-form">
<form id="login-form" action="includes/login.inc.php" method="post">
<div class="col-md-6 col-md-offset-4 text-box">
	<input name="uname" type="text" placeholder="User ID" autocomplete="off">
	<input name="pwd" type="password" placeholder="Password">
	<input name="submit" type="submit" value="SUBMIT" id="login-form-submit">
</div>
<div class="clearfix"></div>
</form>
</div>
</div>

<?php
include_once 'footer.php';
?>

</body>
</html>
