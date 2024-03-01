<?php
require 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'));
    $subscriberId = $data->subscriberId;

    $query = "SELECT endpoint_URL FROM notification WHERE endpoint_URL = '$subscriberId'";
    $res = $connect->query($query);

    if (mysqli_num_rows($res) > 0) {
        echo "Already in database";
    } else {
        // Insert the subscriber ID into your database
        try {
            $sql = "INSERT INTO notification (endpoint_URL) VALUES ('$subscriberId')";
            $result = $connect->query($sql);
            if ($result) {
                $_SESSION['subscriber_id'] = $subscriberId;
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
