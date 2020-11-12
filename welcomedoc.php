
<html>
<head>
<title>URBAN HOSPITAL</title>
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
<li><a href="#home">HOME</a></li>
<li><a href="#register">APPOINTMENT</a></li>
<li><a href="#schedule">SCHEDULE</a></li>

<?php
session_start();

if (isset($_SESSION["useruid"])) {
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
<div class="col-xs-3">
<img class="img-responsive tpad" src="images/drbanner.jpg">
</div>
<div class="col-xs-9">
<h1>Welcome, Dr. Banner</h1>
<h2 class="lead">Here's your appointment for today</h2>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>		 
</div>
</body>
</html>