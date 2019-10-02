<?php 

$servername = "localhost";
$dBUsername = "lakshay";
$dBPassword = "sdk";
$dBName = "fretboard";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection Failed: ".mysqli_connect_error());  
}

error_reporting(E_ALL);
ini_set("display_errors", "On");