<?php

$servername = "localhost";
$username = "deleontexy"; 
$password = "0169475889Qwe"; 
$dbname = "deleontexy"; 

$db = mysqli_connect($servername, $username, $password, $dbname);
if (!$db) {    
    die("Connection failed: " . mysqli_connect_error());
}

?>