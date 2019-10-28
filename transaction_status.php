<?php
  /* access token */
    $consumerKey = 	EFSpT2PLIFA2DgVAJYnPOGY8tUW4Tkyh;
    $consumerSecret = EoC8fm3ov73FHHh8;
    $headers = ['Content-Type:application/json; charset=utf8'];
    $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $curl = curl_init($access_token_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $result = json_decode($result);
    $access_token = $result->access_token;
    curl_close($curl);


  /* making the request */
  $url = 'https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query';

 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, $url);
 curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer'.$access_token)); //setting custom header


 $curl_post_data = array(
   //Fill in the request parameters with valid values
   'Initiator' => 'testapi',
   'SecurityCredential' => 'OiGPQ7GM08ywJjPl+1uJn4pnUxbK+hSCYcomuUyF/6Cb0JdgofRWuIlx5vzBfzH8BJniBLyZNLfJw4MpJFzDJzA+fgDR6ER79DesQfOlT5bEebKHbgKqANcJhzdM8tZoCeIgeSl63M1id9HQAnThml4Heb+kixOfNuM0TOsEy2vY3Nzhoxp5TJTjMGsEseAu4y90OjcdakfISrxwEnn4OdSsdAx0dG5dFRst17CjepHh0bVDsF1KjajGUD2GP7bKUB9AmRPXiinxERrpphrLVg299WwbhB34Wg+VQKuGTVNZ/babu2Ab+DP/34vDuSE6YaXRZiNdVLXM0F8LH3cjnA==',
   'CommandID' => 'TransactionStatusQuery',
   'TransactionID' => 'NJ431HAKOB',
   'PartyA' => '600582',
   'IdentifierType' => '4',
   'ResultURL' => 'https://victoriacarpetsample.000webhostapp.com/transactioncallback_url.php',
   'QueueTimeOutURL' => 'https://victoriacarpetsample.000webhostapp.com/transactioncallback_url.php',
   'Remarks' => 'This_The_Carpet',
   'Occasion' => 'Testing_1'
 );

 $data_string = json_encode($curl_post_data);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_POST, true);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

 $curl_response = curl_exec($curl);
 print_r($curl_response);

 echo $curl_response;
?>
