<?php
error_reporting(0);
$token= file_get_contents("DZGIF_Token.txt");

function xploit($fadillah, $dataAing=null) {
    $ayubi = curl_init();
    curl_setopt($ayubi, CURLOPT_URL, $fadillah);
    if($dataAing != null){
        curl_setopt($ayubi, CURLOPT_POST, true);
        curl_setopt($ayubi, CURLOPT_POSTFIELDS, $dataAing);
    }
    curl_setopt($ayubi, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ayubi, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ayubi, CURLOPT_SSL_VERIFYPEER, false);
    $eks = curl_exec($ayubi);
    curl_close($ayubi);
    return $eks;
}

$menta = xploit("https://graph.facebook.com/me/friends?fields=id,name&limit=5000&access_token=" . $token);
$jason = json_decode($menta);
foreach ($jason->data as $data) {

    xploit("https://graph.facebook.com/me/friends?uid=".$data->id."&method=delete&access_token=" . $token);
       echo "Success Delete ID " . $data->id . " From : " . $data->name . " // Script by DZGIF<br>";
}
?>
