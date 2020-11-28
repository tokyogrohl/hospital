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

$sql = "CREATE TABLE IF NOT EXISTS patients (
               patId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						   patName varchar(128) ,
						   patDob varchar(128) ,
						   patEmail varchar(128),
						   patPhone varchar(128),
						   patEmer varchar(128) ,
						   patGen varchar(128) ,
						   patBlood varchar(128),
						   patAdd varchar(128) ,
						   patMed varchar(128) ,
						   patMedDet varchar(128),
						   patCheck varchar(128),
						   patConsult varchar(128))";

$conn->query($sql);

mysqli_close($conn);
?>
