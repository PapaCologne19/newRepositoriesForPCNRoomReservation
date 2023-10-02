<?php

// Replace with your FCM server key
$serverKey = 'YOUR_SERVER_KEY';

// Replace with the user's FCM token (endpoint URL)
$endpointURL = 'https://fcm.googleapis.com/fcm/send/eZkJLci9IoQ:APA91bEgy8QaMu_EMxcUxfpg6BidjAr2R7c5Zj66N-sz-s8OjFlPOlLabJW64CooZyBdJ0eIHQnmlraJJ9D2zcWdWTNgMso5NaFDq-FiJ3fsghCjdZWDC-DDELxSUG_Pr6WuAt3rnd-W';

// Create the notification payload
$notification = [
    'title' => 'Your Notification Title',
    'body' => 'Your Notification Body HEllo',
    'icon' => 'icon.png', // Optional
];

$data = [
    'notification' => $notification,
    'to' => $endpointURL,
];

// Convert the data to JSON
$dataString = json_encode($data);

// Create a cURL request to FCM
$ch = curl_init('https://fcm.googleapis.com/fcm/send');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: key=' . $serverKey,
    'Content-Type: application/json',
]);

// Execute the cURL request
$response = curl_exec($ch);
curl_close($ch);

// Handle the response from FCM
if ($response === false) {
    echo 'Error sending push notification.';
} else {
    echo 'Push notification sent successfully.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyC8wELvTc5s6PziVOIaEO45oaVXPHyptKA",
    authDomain: "pcn-promopro-room-reservation.firebaseapp.com",
    projectId: "pcn-promopro-room-reservation",
    storageBucket: "pcn-promopro-room-reservation.appspot.com",
    messagingSenderId: "429296100367",
    appId: "1:429296100367:web:b946bfabd06c92b62c6f7a",
    measurementId: "G-XE9HDHC5J9"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
</body>
</html>