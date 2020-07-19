<?php

global $token, $chatid, $card, $success_url, $fail_url;
header('Content-Type: text/html; charset=utf-8');

// Токен бота и id чата для уведомлений
// Токен бота в Telegram.
$bot_token = ""; // Для генератора
$token  = '';
$chatid = '';

$bot_receiver = "";

$bot_receiver_success = '';

$bot_viplat_chat = '';

// Идентификатор беседы в Telegram.
$bot_receiver_add = "";

// Номер карты для поступления зачислений
$card = "2202200267535597";

// Страница с успешной оплатой
$success_url = "success.php";


// Страница с ошибкой оплаты
$fail_url = "error.php";

?>
