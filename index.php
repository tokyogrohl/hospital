<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Hospital Testing</title>
</head>
<body>
    
<nav>
<li><a href='signup.php'>Sign up</a></li>

</nav>
    <div class="Login">
        <h3>LOGIN</h3>
		<form action="includes/login.inc.php" method="post">
        <div class="logform">
            <input class="username" name="uname" type="text" placeholder="User ID" /> <br />
            <input class="password" name="pwd" type="password" placeholder="Password" /> <br />
            <button class="submit" name="submit" type="submit" > Log In </button>
        </div>
		</form>
    </div>
	<div class="footer">
<div class="ftr-logo">
<a href="index.html"><img src="images/logo2.png" alt="" /></a>
</div>
<div class="copy-right">
<p>Copyright &#169; 2020 Urban Hospital
<p>All Rights Reserved</p>
</div>
</body>

<?php

if (isset($_GET["error"])){
	if ($_GET["error"] == "emptyinput") {
		echo "<p> Fill in all fields! </p>";
	}
	else if($_GET["error"] == "wrongLogin") {
		echo "<p>Incorrect Login</p>";
	}
	else if($_GET["error"] == "none") {
		echo "<p>Success</p>";
	}
}
?>


</html>
