<?php
    $consumerKey = 	EFSpT2PLIFA2DgVAJYnPOGY8tUW4Tkyh;
    $consumerSecret = EoC8fm3ov73FHHh8;
    $headers = ['Content-Type:application/json; charset=utf8'];
    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $curl =curl_init($url);
    curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);
    curl_setopt($curl,CURLOPT_HEADER,FALSE);
    curl_setopt($curl, CURLOPT_USERPWD,$consumerKey.':'.$consumerSecret);
    $result = curl_exec($curl);
    $status = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    $result = json_decode($result);
    $access_token = $result->access_token;
    echo $access_token;
    curl_close($curl);
 ?>
