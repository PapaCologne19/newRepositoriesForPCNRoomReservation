<?php
  require "2-cal-lib.php";

if (isset($_POST["req"])) {
  // (A) LOAD LIBRARY  
  switch ($_POST["req"]) {
    // (B) GET DATES & EVENTS FOR SELECTED PERIOD
    case "get":
      echo json_encode($_CAL->get($_POST["month"], $_POST["year"]));
      break;

    // (C) SAVE EVENT
    case "save":
      echo $_CAL->save(
        $_POST["start"], $_POST["end"], $_POST["txt"], $_POST["color"], $_POST["bg"], $_POST["status"], $_POST["email"], $_POST['endpoint'], $_POST['fullname'],
        isset($_POST["id"]) ? $_POST["id"] : null
      ) ? "OK" : $_CAL->error;
      break;

    // (D) DELETE EVENT
    case "del":
      echo $_CAL->del($_POST["bg"], $_POST["status"], $_POST['email'], $_POST['endpoint'], $_POST['fullname'], isset($_POST['id']) ? $_POST["id"] : null
      ) ? "OK" : $_CAL->error;
      break;

    case "cancel":
      echo $_CAL->cncl($_POST['status'], $_POST['email'], $_POST['fullname'], isset($_POST['id']) ? $_POST['id'] : null
      ) ? "OK" : $_CAL->error;
      break;

}}




