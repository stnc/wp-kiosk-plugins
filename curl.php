<?php

/*
  //cpanel cron komutları 
  //çalışan 
  wget -q -O /dev/null "http://yeni.erciyesteknopark.com/curl.php?dghjghhdd=sssd&action=hava" > /dev/null 2>&1
  wget -q -O /dev/null "http://yeni.erciyesteknopark.com/curl.php?dghjghhdd=sssd&action=exchange" > /dev/null 2>&1

  
  //çalışmadı tekrar denenebilir 
  wget -q --spider 'http://yeni.erciyesteknopark.com/curl.php?dghjghhdd=sssd&action=hava'	
  
*/
//dolar cek

$string = veriTabani_Option_id_Oku("stncWpKiosk_Other_Settings")["option_value"];
$apiRead = unserialize($string); 
$apiKey = $apiRead["stncWpKiosk_text_field_Other_apikey"] ;

/* DÖVİZ */
/* DÖVİZ */
/* DÖVİZ */
/* DÖVİZ */
/* DÖVİZ */

if (isset($_GET['sageon']) && $_GET['sageon'] == "exchange")
{

    $piyasalar = array();

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
            "authorization: apikey " . $apiKey . "",
            "content-type: application/json"
        ) ,
    ));

    $responseExchange = curl_exec($curl);

    $exchange = json_decode($responseExchange, true);
    print_r($exchange);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err)
    {
        echo "cURL Error #:" . $err;
    }
    else
    {
        // echo $responseExchange;
        
    }

    //--------------------------------
    

    $curl2 = curl_init();
    curl_setopt_array($curl2, array(
        CURLOPT_URL => "https://api.collectapi.com/economy/goldPrice",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "authorization: apikey " . $apiKey . "",
            "content-type: application/json"
        ) ,
    ));

    $response_gold = curl_exec($curl2);

    $gold_price = json_decode($response_gold, true);

    print_r($gold_price);
    $err = curl_error($curl2);

    curl_close($curl2);

    if ($err)
    {
        echo "cURL Error #:" . $err;
    }
    else
    {
        // echo $response_gold;
        
    }

    $piyasalar['stncWpKiosk_text_field_dolar'] = $exchange["result"][0]["selling"];
    $piyasalar['stncWpKiosk_text_field_euro'] = $exchange["result"][1]["selling"];

    $piyasalar['stncWpKiosk_text_field_altin'] = $gold_price["result"][0]["selling"];
    $piyasalar['stncWpKiosk_text_field_ceyrek_altin'] = $gold_price["result"][1]["selling"];
    $piyasalar['stncWpKiosk_text_field_guncelleme_zamani'] = date('d.m.Y h:i:s a', time());

    // print_r($piyasalar);
    $serialize_php = serialize($piyasalar);
    // print_r($serialize_php);
    veriTabaniKaydet("stncWpKiosk_Exchange_Settings", $serialize_php);
}

/* HAVA */
/* HAVA */
/* HAVA */
/* HAVA */
/* HAVA */
if (isset($_GET['sageon']) && $_GET['sageon'] == "hava")
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.collectapi.com/weather/getWeather?data.lang=tr&data.city=kayseri",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "authorization: apikey " . $apiKey . "",
            "content-type: application/json"
        ) ,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err)
    {
        echo "cURL Error #:" . $err;
    }
    else
    {
        // echo $response;
        
    }

    veriTabaniKaydet("stncWpKiosk_Weather_Today", $response);

}

function veriTabaniKaydet($optionName, $optionValue)
{

    $env = "pro";

    if ($env == "dev")
    {
        define('DB_NAME', 'summit');
        /** MySQL database username */
        define('DB_USER', 'root');
        /** MySQL database password */
        define('DB_PASSWORD', 'qggmkvwm');
        /** MySQL hostname */
        define('DB_HOST', 'localhost');
        $table_prefix = 'wp_';
    }
    else
    {
        include ("wp-config.php");
    }

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_errno)
    {
        //  printf("Connect failed: %s<br />", $mysqli->connect_error);
        exit();
    }
    // printf('Connected successfully.<br />');
    

    $option_id = veriTabani_Option_id_Oku($optionName)["option_id"];
    //  echo $sql2 = "UPDATE wp_options set option_value = '".$serialize_php."' where option_id = ".$row["option_id"]."";
    $sql2 = "UPDATE " . $table_prefix . "options SET option_value = '" . $optionValue . "' WHERE option_id = " . $option_id . "";

    if ($mysqli->query($sql2))
    {
        // printf("Table updated successfully.<br />");
    }

    else
    {
        // echo "No record found";
        
    }
}

function veriTabani_Option_id_Oku($optionName)
{

    $env = "pro";

    if ($env == "dev")
    {
        define('DB_NAME', 'summit');
        /** MySQL database username */
        define('DB_USER', 'root');
        /** MySQL database password */
        define('DB_PASSWORD', 'qggmkvwm');
        /** MySQL hostname */
        define('DB_HOST', 'localhost');
        $table_prefix = 'wp_';
    }
    else
    {
        include ("wp-config.php");
    }

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_errno)
    {
        //  printf("Connect failed: %s<br />", $mysqli->connect_error);
        exit();
    }
    // printf('Connected successfully.<br />');
    $sql = "SELECT option_id,option_value FROM " . $table_prefix . "options WHERE option_name = '" . $optionName . "'";

    $result = $mysqli->query($sql);
    // print_r($result);
    if ($result)
    {
        if ($result->num_rows > 0)
        {
            // Associative array
            $row = $result->fetch_assoc();

return array (
  "option_value"=>$row["option_value"],
  "option_id"=>$row["option_id"],
);
            // echo "No record found";
            
        }
    }
    else
    {
        //  echo "Error in ";
        
    }
}



