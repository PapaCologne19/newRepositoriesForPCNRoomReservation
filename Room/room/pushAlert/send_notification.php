<?php
session_start();

if (isset($_POST['submit_button'])) {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $icon = 'images/under.jpg';
    $url = "https://fun.pcnpromopro.com/";
    $endpoint = $_POST['endpoint_url'];

    $apiKey = "b17c6b66a316dd5114f9ea2533bdc879";
    $curlUrl = "https://api.pushalert.co/rest/v1/send";

    $post_vars = array(
        "icon" => $icon,
        "title" => $title,
        "message" => $message,
        "url" => $url,
        "subscriber" => $endpoint
    );

    $headers = array();
    $headers[] = "Authorization: api_key=" . $apiKey;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $curlUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_vars));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    $output = json_decode($result, true);
    if ($output["success"]) {
        echo 'Success';
    } else {
        //Others like bad request
        echo "Error in push notifications";
    }
}