<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Create Database if doesnt exist

$sql = "CREATE DATABASE IF NOT EXISTS hospitaltest";
$conn->query($sql);

mysqli_close($conn);
?>