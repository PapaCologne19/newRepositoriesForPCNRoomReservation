<?php
//export.php  

include("../../connect.php");
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');

$dtnow = date("m/d/Y");

if (isset($_POST['Back'])) {

  header("location: print_entry.php");
}

?>

<html>

<head>
  <?php include '../components/header.php'; ?>
  <style>
    * {
      font-family: 'Gabarito', sans-serif;
      font-weight: 800;
    }

    .form-label {
      text-align: left !important;
    }

    .form-control {
      text-transform: uppercase;
    }

    .body5025p {
      position: absolute;
      top: 1px;
      left: 20%;
      border: 0px solid green;
      height: 90%;
      width: 60%;
    }

    .body50 {
      position: absolute;
      top: inherit;
      left: 0%;
      border: 0px solid black;
      height: 100%;
      width: 30%;
    }

    .body60 {
      position: absolute;
      top: inherit;
      left: 25%;
      border: 0px solid black;
      height: 100%;
      width: 50%;
    }

    .buttons,
    .name,
    .footer {
      text-align: right;
    }

    .form-group {
      font-size: 13px !important;
    }

    .form-control {
      border-top: none;
      border-right: none;
      border-left: none;
    }

    .form-label {
      font-size: 13px !important;
    }

    .many1 {
      padding: 3rem;
    }

    @media screen and (max-width: 840px) {
      .name .name {
        font-size: 13px;
      }

      .name .address,
      .name .number {
        font-size: 12px;
      }
    }
  </style>
</head>

<body>

  <div class="container-fluid">

    <?php

    
    $appnoto = $_SESSION["appnoto1"];

    $resultap = mysqli_query($link, "SELECT * FROM employees where appno = '$appnoto'");
    while ($rowap = mysqli_fetch_assoc($resultap)) {


      $resultap1 = mysqli_query($link, "SELECT * FROM deployment where appno = '" . $rowap['appno'] . "' AND is_deleted != '1'");
      while ($rowap1 = mysqli_fetch_assoc($resultap1)) {

        echo '


<div class="many1">
  <form action = "" method = "POST">
    <div class="mb-1 buttons">
      <button class="btn btn-dark" id="myDIV" onclick="myFunction()">Print this page</button>
      <button class="btn btn-secondary" name="Back" id="myDIV1">Back</button>
    </div>
  </form>

<div class="form-group name" >

        <center>
                          <img src="' . $rowap['photopath'] . '" alt="" class="img-responsive" style="float:left; flex: none; width: 130px;height: 130px; object-fit: contain;">
                          </center>

        <h4 class="name">' . $rowap['lastnameko'] . ", " . $rowap['firstnameko'] . " " . $rowap['mnko'] . '</h4>
        <br>
          <label>' . $rowap['paddress'] . '</label>
            <br>
          <label>' . $rowap['cpnum'] . '</label>
        </div>


       <hr>
       <center>
          <label class="form-label">
          <font color="Black" size="4">Employee Information</font>
          </label>
       </center>
         <hr>



<form action="" class="form-group">

 <div class="row">
            <div class="col-md-4 col-sm-4">
              <label class="form-label">Employee Number</label>
            </div>
            <div class="col-md-8">
              <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['id'] . '" class="form-group" readonly>
            </div>
          </div>

 <div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Employment Status</label>
 </div>
 <div class="col-md-8">
   <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['employment_status'] . '" class="form-group" readonly>
 </div>
</div>

<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Client</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['client_name'] . '" class="form-group" readonly>
 </div>
</div>

<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Project</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['place_assigned'] . '" class="form-group" readonly>
 </div>
</div>

<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Employment Start Date</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['loa_start_date'] . '" class="form-group" readonly>
 </div>
</div>

<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Employment End Date</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['loa_end_date'] . '" class="form-group" readonly>
 </div>
</div>

<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Outlet</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['outlet'] . '" class="form-group" readonly>
 </div>
</div>

<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Area</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['address_assigned'] . '" class="form-group" readonly>
 </div>
</div>

<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">SSS Number</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['sss'] . '" class="form-group" readonly>
 </div>
</div>


<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Philhealth Number</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['philhealth'] . '" class="form-group" readonly>
 </div>
</div>

<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Pag-ibig Number</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['pagibig'] . '" class="form-group" readonly>
 </div>
</div>

<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">TIN Number</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['tin'] . '" class="form-group" readonly>
 </div>
</div>

<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Birthdate</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap['birthday'] . '" class="form-group" readonly>
 </div>
</div>

  
<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Salary</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['basic_salary'] . '" class="form-group" readonly>
 </div>
</div>


<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">Job Title</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['job_title'] . '" class="form-group" readonly>
 </div>
</div>
 
<div class="row ">
 <div class="col-md-4 col-sm-4">
   <label class="form-label">LOA Number</label>
 </div>
 <div class="col-md-8">
    <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['emp_id'] . '" class="form-group" readonly>
 </div>
</div>


  <div class="row ">
    <div class="col-md-4 col-sm-4">
      <label class="form-label">ID Number</label>
    </div>
    <div class="col-md-8">
        <input type="text" name = "newshortlist" class="form-control" value= "' . $rowap1['emp_id'] . '" class="form-group" readonly>
    </div>
  </div>
</form>
<hr>


<label style="float:left; width:400px; height:10px; font-style: italic !important; font-size: 13px; font-family: "Thasadith", sans-serif;">I hereby certify that the above information are true and correct.</label>

<br>

<div class="footer">
  <label class="form-label">___________________________</label><br>
  <label class="form-label">Signature over Printed Name</label>
  <br>
  <label >________________</label><br>
  <label class="form-label">Date</label>
</div>




';
      }
    }
    ?>
  </div>

</body>

</html>

<script>
  function myFunction() {
    var x = document.getElementById("myDIV");
    var y = document.getElementById("myDIV1");

    if (x.style.display === "none") {
      x.style.display = "block";
      y.style.display = "block";

    } else {
      x.style.display = "none";
      y.style.display = "none";

      window.print();
      x.style.display = "block";
      y.style.display = "block";
    }
  }
</script>