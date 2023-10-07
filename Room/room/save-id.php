<?php
require 'connect.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $data = json_decode(file_get_contents('php://input'));
    $user_id = $_SESSION['id'];
    $subscriberId = $data->subscriberId;
    $email = $_SESSION['email'];
    
    $query = "SELECT user_id, endpoint_URL FROM notification WHERE user_id = '$user_id' AND endpoint_URL = '$subscriberId'";
    $res = $connect->query($query);
    
    if(mysqli_num_rows($res) > 0){
        echo "Already in database";
    }
    else{
        // Insert the subscriber ID into your database
        try {
            $sql = "INSERT INTO notification (user_id, endpoint_URL) VALUES ('$user_id', '$subscriberId')";
            $result = $connect->query($sql);
            if ($result) {
                echo "Subscriber ID saved successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
        } catch (Exception $e) {
            // Log the error
            error_log($e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }
} 

$connect->close();
