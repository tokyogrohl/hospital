<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Sign up</title>
</head>
<body>
    <section class="Signup">
        <h1>Sign Up</h1>
        <form action = "includes/signup.inc.php" method="post">
		  <input type="text" name="uid" placeholder="Username">
		  <input type="password" name="pwd" placeholder="Password">
		  <label for="usertype">Select account type:</label>
		  <select id="usertype" name="usertype">
		  <option value="doctor">Doctor</option>
		  <option value="staff">Staff</option>
		  </select>
		  <button type="submit" name="submit">Sign Up</button>
		</form>
		
		<?php
if (isset($_GET["error"])){
	if ($_GET["error"] == "emptyinput") {
		echo "<p> Fill in all fields! </p>";
	}
	else if($_GET["error"] == "usernametaken") {
		echo "<p>User name already exists</p>";
	}
	else if($_GET["error"] == "none") {
		echo "<p>Success</p>";
	}
}


?>
    </section>




</body>
</html>
