<?php
require 'connect.php';
session_start();

// Check if the unique ID and endpoint URL exist in the POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];

// Insert the token into the database
$sql = "INSERT INTO fcm_tokens (token) VALUES ('$token')";

if ($connect->query($sql) === TRUE) {
    echo "Token saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
} 

$connect->close();
