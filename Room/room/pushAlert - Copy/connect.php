<?php 

$localhost = "localhost";
$user = "root";
$password = "";
$database = "push_alert";

$connect = mysqli_connect($localhost, $user, $password, $database);

if(!$connect){
    echo "Error in connecting to database";
}