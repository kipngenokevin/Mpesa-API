<?php
// Access token
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


//Reversal Request
 $url = 'https://sandbox.safaricom.co.ke/mpesa/reversal/v1/request';

 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, $url);
 curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header


 $curl_post_data = array(
   //Fill in the request parameters with valid values
   'Initiator' => 'testapi',
   'SecurityCredential' => 'KTsuca0nmxn0ISI3DdNDjeLbpOscW+4dsnbi+nOqMRk2LtUHmQefecSFGXrdbmyfoQqLSzw5QuEs+/tDsamhDyJQPRHPbKArAqvdWmEtTpn1XkIi3/JD4YEMoIuFLN0ON/Hq8qh+YMyLc0UrLpPsjkNXcJ27Ig2u+Vpc7YByL51COcfxh6uLPB9MlcowVCVpSC1MiW1aWLgVc4BtxMytjW1vPdCUhcA3TJk+wAVG2kNa5w3TxT2pVlKMWyukiTg7P74SQxDOEq2wA5d06c5lnhfqyugL8ub9GxoOdtcfhI2NQoznN9e4cScgyDVl9f+usl4WBaJwhTagATJ6pXpqTg==',
   'CommandID' => 'TransactionReversal',
   'TransactionID' => 'NJ481HAKOG',
   'Amount' => '1200',
   'ReceiverParty' => '600582',
   'RecieverIdentifierType' => '11',
   'ResultURL' => 'https://victoriacarpetsample.000webhostapp.com/mpesa/reverse_response_url.php',
   'QueueTimeOutURL' => 'https://victoriacarpetsample.000webhostapp.com/mpesa/reverse_response_url.php',
   'Remarks' => 'Out Of Stock',
   'Occasion' => 'Web Purchase'
 );

 $data_string = json_encode($curl_post_data);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_POST, true);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

 $curl_response = curl_exec($curl);
 print_r($curl_response);

 echo $curl_response;

 ?>
