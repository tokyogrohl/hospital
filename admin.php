

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
<li><a href="#home">PATIENTS</a></li>
<li><a href="#register">REGISTER</a></li>
<li><a href="#schedule">SCHEDULE</a></li>
<li><a href="#information">INFORMATION</a></li>
<?php
session_start();

if ($_SESSION["usertype"] == 'admin') {
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
<h1><span>Welcome</span></h1>
<h2><li><a href='signup.php'>Sign up</a></li></h2>
</div>
<div class="clearfix"></div>
</div>		 
</div>
<?php

include_once 'footer.php';
?>

</body>
</html>
