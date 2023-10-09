<?php

	$localhost = "localhost";
	$user = "root";
	$password = "";
	$database = "calendar";

	$connect = mysqli_connect($localhost, $user, $password, $database);

	if(!$connect){
		echo "There was an error in connecting database";
	}
	
	
	// $localhost = "localhost";
	// $user = "u685566035_pcn";
	// $password = "Pcn123456789";
	// $database = "u685566035_pcn";

	// $connect = mysqli_connect($localhost, $user, $password, $database);

	// if(!$connect){
	// 	echo "There was an error in connecting database";
	// }

	// $localhost = "localhost";
	// $user = "msileen_james";
	// $password = "James2023";
	// $database = "msileen_room";

	// $connect = mysqli_connect($localhost, $user, $password, $database);

	// if(!$connect){
	// 	echo "There was an error in connecting database";
	// }

	?>
