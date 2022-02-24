<?php

//dolar cek 



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.collectapi.com/economy/allCurrency",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: apikey 4RfMup6BllrkoMTz4rwZu2:0blygMZDxJtI3lyqhDblpC",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
print_r ($response);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
