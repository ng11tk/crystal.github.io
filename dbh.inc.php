<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "fifa";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if(!$conn){
    die("connection failed: ".mysquli_connect_error());
}
