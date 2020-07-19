<?php

error_reporting(0);
$id = base64_decode($_GET["id"]);

$order = explode("/", $id)[0];
$date = explode("/", $id)[1];
$amount = explode("/", $id)[2];

if (!isset($order) || $order == "") {
	$order = rand(111111, 9999999);
}

if (!isset($date) || $date == "") {
	$date = date("d.m.y");
}

if (!isset($amount) || $amount == "") {
	$amount = 15;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;subset=cyrillic">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/common.css">
		<link rel="shortcut icon" type="image/png" href="img/fav-icon.png">

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/common.js"></script>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

		<title>Платежная система</title>
	</head>

	<body>
		<div class="block-info">
			<h3 class="heading-info">
				Платеж выполнен
			</h3>

			<p class="description-info">
				Платеж на сумму <?php echo number_format($amount, 0, "", " "); ?>,00 ₽ успешно выполнен.
			</p>
		</div>

		<div class="divider"></div>

		<div class="block-paragraph">
			<p>
				Транзакция была успешно произведена.
				<br>
				Нажмите на кнопку «Вернуться на сайт» для продолжения.
				<br><br>
				Номер заказа: <b><?php echo $order; ?></b>
				<br>
				Дата платежа: <b><?php echo $date; ?></b>
				<br>
				Сумма платежа: <b><?php echo number_format($amount, 0, "", " "); ?>,00 ₽</b>
			</p>
		</div>

		<div class="divider"></div>

		<div class="block-footer">
			<div class="row">
				<div class="col-xs-12">
					<a class="button-back">
						<i class="fas fa-chevron-left"></i> Вернуться на сайт
					</a>
				</div>
			</div>
		</div>
	</body>
</html>