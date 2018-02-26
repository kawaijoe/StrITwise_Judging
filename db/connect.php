<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Local Server Information
$server = "localhost";
$username = "root";
$password = "root";
$db = "Judging";

//Check if connection was successful
try {
    $conn = new PDO("mysql:host=$server;dbname=$db", "$username", "$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Oops. Something went wrong in the database.");
}
?>