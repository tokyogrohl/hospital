
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="banner">


<?php
include_once 'staffheader.php';
?>



<h3 class="text-center text-white">PATIENT REGISTRATION FORM</h3>




<?php if (isset($_GET["error"])){
	if ($_GET["error"] == "emptyinput") { ?>
  <div id="login-error-msg-holder">
	 <p> Fill in all the required fields! </p>
   </div>
<?php	}
} ?>


<?php if (isset($_GET["error"])){
	if ($_GET["error"] == "none") { ?>
    <div class="alert alert-success text-center" role="alert">
      Patient registered successfully! Patiet ID: PAT00<?php echo $_SESSION["last_id"] ?>
      <br><a href="registration.php" class="alert-link">Register another patient</a>
    </div>
<?php	}
} ?>



<form action="includes/reg.inc.php" method="post">
<table align="center" cellpadding = "10">

<tr>
<td>Full Name</td>
<td><input type="text" name="fullname" />
</td>
</tr>

<tr>
<td>Date Of Birth</td>
<td>
<input color='black' type='date' id='birthday' name='birthday'>
</tr>


<tr>
<td>E-mail (optional)</td>
<td><input type="email" name="email" maxlength="100" placeholder="ex: myname@example.com" /></td>
</tr>

<tr>
<td>Phone Number</td>
<td>
<input type="number" name="mobile" maxlength="12" />
</td>
</tr>

<tr>
<td>Emergency Contact</td>
<td>
<input type="number" name="em_contact" maxlength="12" />
</td>
</tr>

<tr>
<td>Sex</td>
<td>
<input type="radio" name="Gender" value="male" checked/> Male
<input type="radio" name="Gender" value="female" /> Female
</td>
</tr>

 <tr>
<td>Blood Group</td>
<td><select id="blood" name="blood">
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
		<option value="B-">B-</option>
    <option value="O+">O+</option>
	<option value="O-">O-</option>
	<option value="AB+">AB+</option>
	<option value="AB-">AB-</option>
  </select></td>
</tr>

<tr>
<td>Address<br /><br /><br /></td>
<td><textarea name="Address" rows="4" cols="30"></textarea></td>
</tr>


<tr>
<td>Current medication</td>
<td>
<input type="radio" name="medic" value="yes" checked/> Yes
<input type="radio" name="medic" value="no" /> No
</td>
</tr>

<tr>
<td>If yes, please list here<br /><br /><br /></td>
<td><textarea name="med_det" rows="2" cols="30"></textarea></td>
</tr>

<tr>
<td colspan="2" align="right">
<input name="submit" type="submit" value="SUBMIT" id="form-submit">
</td>
</tr>
</table>
</form>


</div>

<?php
include_once 'footer.php';
?>
</body>
</html>
