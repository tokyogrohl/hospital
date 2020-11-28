<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "hospitaltest";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Create Table if doesnt exist

$sql = "CREATE TABLE IF NOT EXISTS users (
               usersId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						   usersName varchar(128) NOT NULL,
						   usersUid varchar(128) NOT NULL,
						   usersPwd varchar(128) NOT NULL,
						   usersType varchar(128) NOT NULL)";
$conn->query($sql);

mysqli_close($conn);
?>
