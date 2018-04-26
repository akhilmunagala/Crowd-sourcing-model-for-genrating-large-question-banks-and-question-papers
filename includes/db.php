<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "data";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

if(!$conn){
	die("Database connection failed".mysqli_error($conn));
}