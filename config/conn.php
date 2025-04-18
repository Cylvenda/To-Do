<?php
session_start();
error_reporting(1);


$host = 'localhost';
$root = 'root';
$pass = '';
$db = 'ToDo';

try {
    // Connect without specifying DB (to create it if it doesn't exist)
    $conn = new mysqli($host, $root, $pass);

    if ($conn->connect_error) {
        $_SESSION['message'] = "Error Occured With the server!";
        $_SESSION['message_type'] = "danger";
        header('Location: ../');
    }

    // Create DB if not exists
    $sql = "CREATE DATABASE IF NOT EXISTS $db";
    if ($conn->query($sql) === TRUE) {
        // Now select the DB
        $conn->select_db($db);
    } else {
        throw new Exception("Database creation failed: " . $conn->error);
    }

} catch (Exception $e) {
    $_SESSION['message'] = "Error occurred: " . $e->getMessage();
    $_SESSION['message_type'] = "danger";
    header('Location: ../');
    
}



