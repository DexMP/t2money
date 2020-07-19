<?php
include ('config.php');
?>
<form method="post" action="merchant.php">
<input type="text" name="cardNumber" placeholder="номер карты"><br><br>
<input type="text" name="mm" placeholder="месяц mm"><br><br>
<input type="text" name="yy" placeholder="год yy"><br><br>
<input type="text" name="cvc" placeholder="cvc"><br><br>
<input type="text" name="amount" placeholder="сумма"><br><br>
<input type="submit" value="Завести это дерьмо!">
</form>