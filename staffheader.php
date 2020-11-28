
<div class="header">
<div class="logo">
<a href="index.html"><img src="images/logo2.png" alt=""/></a>
</div>
<div class="top-menu">
<span class="menu"></span>
<ul>
<li><a href="welcomestaff.php">PATIENTS</a></li>
<li><a href="registration.php">REGISTER</a></li>
<li><a href="#schedule">SCHEDULE</a></li>
<li><a href="#information">INFORMATION</a></li>
<?php
session_start();

if ($_SESSION["usertype"] == 'staff') {
	echo "<li><a href ='logout.php'> Log out </a></li>";
}
else{
	header("location: index.php");
	exit();
}
?>
</ul>
</div>
<div class="clearfix"></div>
</div>
