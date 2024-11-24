<?php
session_start();

$host = 'localhost';
$dbname = 'journal';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_error()){
    echo "Impossible de se connecter à MySQL: " . mysqli_connect_error();
    exit();
}

$_SESSION["conn"] = $conn;
    
?>