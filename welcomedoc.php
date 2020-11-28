
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

<?php
session_start();

if ($_SESSION["usertype"] == 'doctor') {
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

<div class="banner-text">

<h1>Welcome, Dr. <?php echo $_SESSION["username"] ?></h1>
<h2 class="lead">Here's your appointment for today</h2>

<?php
include_once 'includes/patientdoc.inc.php';
?>

</div>
</div>
<div class="clearfix"></div>
</div>
</div>

<?php
include_once 'footer.php';
?>

</body>
</html>
