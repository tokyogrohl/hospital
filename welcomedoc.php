<?php
session_start();

if (isset($_SESSION["useruid"])) {
	echo "Welcome Doc";
	echo "<li><a href ='logout.php'> Log out </a></li>";
}
else{
	header("location: index.php");
	exit();
}