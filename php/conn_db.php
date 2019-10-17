<?php
$server = "localhost";
$user = "root";
$pass = "mysql";
$database = "gamesthor";
//connect to the server
$conn;
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $conn = new mysqli($server,$user,$pass,$database);
    } catch (Exception $e) {
        error_log($e->getMessage());
        exit('Error connecting to database');
    }
?>