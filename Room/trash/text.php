<?php
// if ($_SERVER['REQUEST_METHOD'] === "POST") {
 // Replace 'YOUR_API_KEY' with your Semaphore API key
  $ch = curl_init();
  $parameters = array(
      'apikey' => 'a0fec20843878d48ea3c5ba85871cd6e', //Your API KEY
      'number' => '09478093814',
      'message' => 'Hello, Sir. This is a message from James Philip',
  );
  curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
  curl_setopt( $ch, CURLOPT_POST, 1 );
  
  //Send the parameters set above with the request
  curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
  
  // Receive response from server
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  $output = curl_exec( $ch );
  curl_close ($ch);
  
  //Show the server response
  echo $output;
// }



?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending SMS</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <label for="number">Number</label><br>
    <input type="text" name="number" id="number">

    <br><br>
    <label for="message">Message</label><br>
    <textarea name="message" id="message" cols="30" rows="10"></textarea>

    <br><br>
    <button type="submit" name="submit">Send</button>
</form>
</body>
</html> -->
