<?php

function send_log($message, $to) {
	include "config.php";

	if ($message == "" || $message == null) {
		exit;
	}

	if ($to == "chat") {
		$chat = $group_id;
	} else if ($to == "user") {
		$chat = $chat_id;
	} else if ($to == "add-user") {
		$chat = $chat_add_id;
	}

            $url = "https://api.telegram.org/bot" . $bot_token . "/sendMessage?chat_id=" . $chat . "&parse_mode=markdown";

	$url = $url . "&text=" . urlencode($message);
	$ch = curl_init();
	$optArray = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true
	);
	curl_setopt_array($ch, $optArray);
	$result = curl_exec($ch);
	curl_close($ch);
}


?>