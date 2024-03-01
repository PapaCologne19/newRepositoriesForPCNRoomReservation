<?php
include 'connect.php';
// session_start();
date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');

if (isset($_POST['next'])) {

  //$_SESSION["print"]=$newtracking;
  header("location:printmrf.php");
  //session_unset();
  //session_destroy();
  //header("Location: https://www.pcnpromopro.com/");
}
?>

<!DOCTYPE html>


<html lang="en">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- PushAlert -->
  <script type="text/javascript">
    (function(d, t) {
      var g = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
      g.src = "https://cdn.pushalert.co/integrate_1f63f45c1232a23dc34fa03433fb06c2.js";
      s.parentNode.insertBefore(g, s);
    }(document, "script"));
  </script>
  <!-- End PushAlert -->




  <style>
    .bs-example {
      margin: 20px;
    }

    .howx {
      position: absolute;

      background: #cb0dd1;
      background-size: 100% 100%;
      top: 0;
      height: 100%;
      width: 100%;
    }


    .many {

      z-index: 2;
      height: 50%;
      width: 60%;
      border: 2px inset Blue;
      opacity: .8;
      border-radius: 10px;
      box-shadow: 1px 5px 10px 5px #000000;
      font-family: Arial;
      font-size: 25;

    }

    .fa-facebook {
      background: #3B5998;
      color: white;
    }

    .fa {
      padding: 10px;
      font-size: 20px;
      width: 50px;
      text-align: center;
      text-decoration: none;
      margin: 5px 15px;
    }

    .fa:hover {
      opacity: 0.7;
    }

    .fa-facebook {
      background: #3B5998;
      color: white;
    }
  </style>
</head>

<body> <!-- Modal HTML -->
  <div id="myModal" class="modal fade">
    <div class="howx">
        <div class="bs-example">
        </div>
      </center>
      <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title">Under Maintainance</h5> -->
            <img src="six.jpg" alt="" class="" style="max-width:200px">
            <button type="button" class="close" data-dismiss="modal"></button>
          </div>

          <form id="contactForm" name="contact" role="form">
            <div class="modal-body">
              <img src="under.jpg" alt="Under Maintainance" width="100%" height="100%">

            </div>
          </form>
        </div>
      </div>

      <div class="container form-group">
        <form action="send_notification.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" id="title" placeholder="Title of the Project" required />
          </div>
          <div class="form-group">
            <textarea name="message" id="message" cols="30" rows="10" required></textarea>
          </div>

          <div class="form-group">
            <select name="endpoint_url" id="endpoint_url" class="form-select">
              <option value="" selected disabled>Select</option>
              <?php
                $query = "SELECT * FROM notification";
                $result = $connect->query($query);
                while($row = $result->fetch_assoc()){
              ?>
              <option value="<?= $row['endpoint_url']?>"><?= $row['endpoint_url']?></option>
              <?php }?>
            </select>
          </div>

          <div class="col-md-12">
            <button type="submit" name="submit_button">Submit</button>
          </div>
        </form>
      </div>
      </center>
</body>

</html>
<script type="text/javascript">
  $(window).on('load', function() {
    $('#myModal').modal('show');
  });

  $(document).ready(function() {
    $('.launch-modal').click(function() {
      $('#myModal').modal({
        backdrop: 'static',
        keyboard: false


      });
    });
    $('input:radio[name="location"]').filter('[value="NCR"]').attr('checked', true);

  });

/*
|-------------------------------------------------------------------
| Push Alert 
|-------------------------------------------------------------------
| This is the script that will be executed when a user click the allow button if the push alert modal pop up.
| It will send an ajax request to the server and save the device token of the user in order for us to notify them later on.
|-------------------------------------------------------------------
*/

(pushalertbyiw = window.pushalertbyiw || []).push(['onSuccess', callbackOnSuccess]);

    function callbackOnSuccess(result) {
      console.log(result.subscriber_id); //will output the user's subscriberId
      console.log(result.alreadySubscribed); // False means user just Subscribed

      saveSubscriberIdToDatabase(result.subscriber_id);
    }

    (pushalertbyiw = window.pushalertbyiw || []).push(['onFailure', callbackOnFailure]);


    function callbackOnFailure(result) {
      console.log(result.status); //-1 - blocked, 0 - canceled or 1 - unsubscribed
    }


    function saveSubscriberIdToDatabase(subscriberId) {
      fetch('save_id.php', {
        method: 'POST',
        body: JSON.stringify({
          subscriberId: subscriberId
        }),
        headers: {
          'Content-Type': 'application/json'
        }
      })
        .then(response => {
          if (response.ok) {
            console.log('Subscriber ID saved to the database.');
          } else {
            console.error('Failed to save subscriber ID to the database.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
</script>
