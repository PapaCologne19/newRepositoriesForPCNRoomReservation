<?php

	$title = "PCN Room Reservation Notifications";
	$message = "Hello, Everyone. Kumusta kayo? ";
	$icon = "https://hr2.alegariocurehms.com/Room/room/images/pcn.png";
	$url = "https://hr2.alegariocurehms.com/Room/room/index.php";
	
	$apiKey = "e07d3332576a592c358f6118804807f2";

	$curlUrl = "https://api.pushalert.co/rest/v1/send";

	//POST variables
	$post_vars = array(
		"icon" => $icon,
		"title" => $title,
		"message" => $message,
		"url" => $url
	);

	$headers = Array();
	$headers[] = "Authorization: api_key=".$apiKey;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $curlUrl);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_vars));
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);

	$output = json_decode($result, true);
	if($output["success"]) {
		echo $output["id"]; //Sent Notification ID
	}
	else {
		//Others like bad request
	}
?>