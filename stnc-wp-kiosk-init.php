<?php
/*
Plugin Name:teknopark kiosk 
Plugin URI:			
Description: erciyes teknopark tv ekranları (by stnc)
Version: 2.0.0
Author: Chrom Themes
Text Domain: stnc-wp-kiosk
Domain Path: /languages/
*/ 

$stnc_wp_kiosk_meta_key_kiosk = 'stnc_wp_kiosk-kioskLocation-Setting';
$stnc_wp_kiosk_postID = isset($_GET['post']) ? $_GET['post'] : null;//post  id  for edit
$stnc_wp_kiosk_post_type = (get_post_type($stnc_wp_kiosk_postID));//get type
$stnc_wp_kiosk_post_type_post = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';//for new



define('stnc_wp_kiosk_PATH', plugin_dir_path(__FILE__) . 'metaBox/');

include ('register_custom_types.php');

require(stnc_wp_kiosk_PATH . "sideBarMetaBox.php");

require(stnc_wp_kiosk_PATH . "metabox_engine_class.php");

require(stnc_wp_kiosk_PATH . "kullanilamayan_ajax.php");

include ('register_css_js.php');

require("extraOptions.php");

include ('register_configurationPages.php');//ek 1

include("configurationPages/init.php");//ek 2

function gun_Kısaltma($gun) {
    switch($gun) :
        case "Pazartesi":
            $kisaIsım="PZT";
          break;
        
          case 'Salı':
            $kisaIsım="SAL";
          break;
          
        
        case 'Çarşamba':
            $kisaIsım="ÇAR";
        break;

        case 'Perşembe':
            $kisaIsım="PER";
        break;

        case 'Cuma':
            $kisaIsım="CUM";
        break;

        case 'Cumartesi':
            $kisaIsım="CMT";
        break;

        case 'Pazar':
            $kisaIsım="PAZ";
        break;

        default:
             $kisaIsım="PZT";
          break;
      endswitch;
      return $kisaIsım;
}


function example_ajax_request() {
    $nonce = $_POST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'stnc-kiosk-ajax-script' ) ) {
        die( 'Nonce value cannot be verified.' );
    }
   // wp_send_json_success( 'It works' );


   $optionsWeather6Today = get_option('stncWpKiosk_Weather_Today');
   $weather6Today = json_decode($optionsWeather6Today, true);
//    print_r ( $weather6Today);
   date_default_timezone_set('Europe/Istanbul');
//    $date = date('m/d/Y h:i:s a', time());
   $today = date('d.m.Y');
//    echo $gun = date('l');
//    echo    $date;
   foreach ($weather6Today["result"] as $key => $row ) { 
       if ( $today==$row["date"]){
        $myopt = array(
            'stncWpKiosk_text_field_weather_date' => $row ["date"],
            'stncWpKiosk_text_field_weather_day' => $row ["day"],
            'stncWpKiosk_text_field_weather_degree' => $row ["degree"],
            'stncWpKiosk_text_field_weather_description' => $row ["description"],
            'stncWpKiosk_text_field_weather_description_en' => $row ["status"],
            'stncWpKiosk_text_field_weather_night' => $row ["night"],
            'stncWpKiosk_text_field_weather_humidity' => $row ["humidity"],
            'stncWpKiosk_text_field_weather_icon' => $row ["icon"],
            );
        update_option('stncWpKiosk_Weather_Settings', $myopt);
        unset ($weather6Today["result"][$key]);
       }
   }


//    print_r ( $weather6Today);
$NEWweather6Today = array();
   $i=1;
   foreach ($weather6Today["result"] as $key2 => $row2 ) { 
    

        $NEWweather6Today[ $i]['weatherToday_gun'] = gun_Kısaltma($row2 ["day"]);
        $NEWweather6Today[ $i]['weatherToday_icon'] = $row2 ["icon"] ;
        $NEWweather6Today[ $i]['weatherToday_degree'] = round($row2 ["degree"]) ;
        $NEWweather6Today[ $i]['weatherToday_night'] = round($row2 ["night"] );

        
    

    // $NEWweather6Today['weatherToday_gun'.$i.''][$i]  =gun_Kısaltma($row2 ["day"]) ;
    // $NEWweather6Today['weatherToday_icon'.$i.''][$i]  =$row2 ["icon"];
    // $NEWweather6Today['weatherToday_degree'.$i.''][$i]  =round($row2 ["degree"]);
    // $NEWweather6Today['weatherToday_night'.$i.''][$i]  =round($row2 ["night"]);
     
      $i++;
}

// print_r ( $NEWweather6Today);
// die;
   $optionsExchange = get_option('stncWpKiosk_Exchange_Settings');
   $optionsWeather = get_option('stncWpKiosk_Weather_Settings');

   $newOptions = array(
    "jsonData" => array(          

    'dolar' => $optionsExchange ["stncWpKiosk_text_field_dolar"],
    'euro' => $optionsExchange ["stncWpKiosk_text_field_euro"],
    'altin' => $optionsExchange ["stncWpKiosk_text_field_altin"],
    'ceyrek_altin' => $optionsExchange ["stncWpKiosk_text_field_ceyrek_altin"],
    //hava durumu 
    'weatherTodayDegree' => round($optionsWeather ["stncWpKiosk_text_field_weather_degree"]),
    'weatherTodayDescription' => $optionsWeather ["stncWpKiosk_text_field_weather_description"],
    'weatherTodayNight' => round($optionsWeather ["stncWpKiosk_text_field_weather_night"]),
    'weatherTodayHumidity' => $optionsWeather ["stncWpKiosk_text_field_weather_humidity"],
    'weatherTodayIcon' => $optionsWeather ["stncWpKiosk_text_field_weather_icon"],
    "todays" =>$NEWweather6Today
    ));
    //taihi de sunucuda ceksın guncellesın 
    // json datayı curl ceksın
    // guncellesın wo optionda guncelleme yapsın   
    //elimizde 7 gunluk hava durumu var 
    //her kontrolde bugunku hava durumuna bakacak --bugunun tarıhı https://www.merdincz.com/Php-Turkce-Gunler-Aylar/


   echo json_encode($newOptions);
   die;
}

add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );
 
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_example_ajax_request', 'example_ajax_request' );