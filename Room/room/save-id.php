<?php
require 'connect.php';
session_start();

// Check if the unique ID and endpoint URL exist in the POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $endpointURL = mysqli_real_escape_string($connect, $_POST['endpointURL']);
    $user_id = $_SESSION["id"];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT user_id, endpoint_URL FROM notification WHERE user_id = ? AND endpoint_URL = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("ss", $user_id, $endpointURL);
    $stmt->execute();
    $stmt->store_result();


    if ($stmt->num_rows() > 0) {
        // User already has a record, update it with the endpoint URL
        echo "Already exists";
    } 
    else{
        $insertQuery = "INSERT INTO notification (user_id, endpoint_URL) VALUES (?, ?)";
        $insertStmt = $connect->prepare($insertQuery);
        $insertStmt->bind_param("ss", $user_id, $endpointURL);

        if ($insertStmt->execute()) {
            echo "Unique ID and Endpoint URL saved successfully"; 
        } else {
            echo "Error inserting record: " . $insertStmt->error;
        }

        $insertStmt->close();
    }
    $stmt->close();
} 

$connect->close();
?>
