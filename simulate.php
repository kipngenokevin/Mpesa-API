<?php
  $consumerKey = 	EFSpT2PLIFA2DgVAJYnPOGY8tUW4Tkyh;
  $consumerSecret = EoC8fm3ov73FHHh8;
  $headers = ['Content-Type:application/json; charset=utf8'];
  $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  $curl =curl_init($access_token_url);
  curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);
  curl_setopt($curl,CURLOPT_HEADER,FALSE);
  curl_setopt($curl, CURLOPT_USERPWD,$consumerKey.':'.$consumerSecret);
  $result = curl_exec($curl);
  $status = curl_getinfo($ch,CURLINFO_HTTP_CODE);
  $result = json_decode($result);
  $access_token = $result->access_token;
  $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));

    $curl_post_data = array(
            //Fill in the request parameters with valid values
           'ShortCode' => '600582',
           'CommandID' => 'CustomerPayBillOnline',
           'Amount' => '1200',
           'Msisdn' => '254708374149',
           'BillRefNumber' => 'Carpet100'
    );

    $data_string = json_encode($curl_post_data);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    $curl_response = curl_exec($curl);
    print_r($curl_response);

    echo $curl_response;
  ?>
