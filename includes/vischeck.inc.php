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

$sql = "CREATE TABLE IF NOT EXISTS visits (
               slNo int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						   patId varchar(128) ,
							 visDate varchar(128) ,
						   checkin varchar(128),
						   checkout varchar(128),
						   reason varchar(128),
						   diagnosis varchar(128) ,
						   recco varchar(128),
						   prescript varchar(128))";

$conn->query($sql);

mysqli_close($conn);
?>
