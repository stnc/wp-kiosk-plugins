<?php
/*
 * Template Name: Kiosk Page
 * Description: TV ekranları için özel sayfa
* @package WordPress
 *@subpackage stnc-kiosk
 *@since stnc-kiosk 2.0
 */
$options_Other = get_option( 'stncWpKiosk_Other_Settings' );
// print_r($options );
//  $domainName=$options_Other ["stncWpKiosk_text_field_domain_name"];
 $domainName=  get_option('siteurl'); 
 $allPageRenewTime=$options_Other ["Other_all_page_renew_stncWpKiosk_text_field_render"];
// https://stackoverflow.com/questions/28249774/add-custom-css-to-a-page-template-in-wordpress
//https://stackoverflow.com/questions/20780422/wordpress-get-plugin-directory
// https://stackoverflow.com/questions/39652122/how-to-list-all-category-from-custom-post-type
//search wordpress plugin page path
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="ERCIYES TEKNOPARK">
    <meta name="generator" content="selmantunc.com.tr">
    <title>Erciyes Teknopark KİOSK V2.00</title>
    <meta name="robots" content="noindex">

    <link rel="canonical" href="<?php echo  $domainName?>">

    <!-- Bootstrap core CSS -->
    <!-- <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.2.5/video-js.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto"> -->



    <?php

    wp_localize_script(
		'stncKiosk-ajax-script',
		'stncKiosk_ajax_obj',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'my_user_like_nonce' )
        ));
    ?>
    <style>
    body {
        background-color: #fff;
        padding: 10px;
        margin-top: 15px;
    }

    .stnc-kiosk-top {
        max-height: 82cm;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .stnc-kiosk-bottom {
        max-height: 38m;
        overflow: hidden;
        margin-bottom: 10px;
    }





    /* Show the controls (hidden at the start by default) */
    .video-js .vjs-control-bar {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }



    #vjs_video_3_html5_api {
        text-align: center;
        margin: auto;
    }

    .main {
        margin-top: 50px;
    }

    /*https://img.otelz.com/s3/placeimages/turkey/icanadolu/kayseri_kayseri-sehir-merkezi-9a9f3b.jpg*/
    .weather-panel {
        /* background-image: url("imageedit_6_3730365362.jpg"); */
        /*background-image: url("imageedit_1_9413438685.jpg");*/
        background-image: url("https://p.w3layouts.com/demos/june-2016/09-06-2016/new_york_weather_widget/web/images/city.jpg");
        /* background-image: url("https://img.otelz.com/s3/placeimages/turkey/icanadolu/kayseri_kayseri-sehir-merkezi-9a9f3b.jpg"); */
        /* background-image: url("https://pixahive.com/wp-content/uploads/2020/08/Sea-Shell-Black-and-White-7574-pixahive.jpg"); */
        /* background-image: url("colored-smoke-on-black-background.jpg"); */
        /* background-size: cover; */
        border-radius: 5px;
        /* box-shadow: 25px 25px 40px 0px rgba(0, 0, 0, 0.33); */
        color: #fff;
        overflow: hidden;
        position: relative;
        padding: 5px;
        border: 0.1px solid #ddd;
    }

    .weather-panel small {
        color: inherit;
        font-size: 50%;
    }

    .weather-panel .weather-panel-top {
        padding-left: 15px;
    }

    .weather-panel ul.forecast>li {
        border-top: 1px solid #fff;
        padding-top: 10px;
    }


    .weather-panel ul.forecast>li h3 {
        font-weight: bold;
    }

    .weather-panel .temperature>span {
        font-size: 1.0em;
        font-weight: bold;
    }

    /*CLOCK */

    /* CLOCK */



    /* DAYS OF THE WEEK */

    div.days {
        margin: 0 auto;
        color: #131212;
    }

    div.days .day {
        display: inline-block;
        color: #ffffff;
        font-family: 'Orbitron', sans-serif;
    }

    div.days .day p {
        font-size: 12px;
        font-weight: bold;
        font-family: sans-serif;
        text-transform: uppercase;
        color: #ffffff;
        font-family: 'Orbitron', sans-serif;

    }

    /* CLOCK */

    div.clock {

        align-items: center;
        text-align: center;
        margin-bottom: 20px;
    }

    div.clock div {
        display: inline-block;
        position: relative;
        color: #ffffff;
        height: 85px;
        text-align: center;
        font-family: 'Orbitron', sans-serif;
    }

    div.clock div p {
        font-size: 80px;
        position: relative;
        z-index: 74;
        color: #ffffff;
        font-family: 'Orbitron', sans-serif;
        /* padding: 0 13px; */
    }

    .tarih {
        display: block;
        font-size: 2.5em;
        margin-top: 15px;
        margin-bottom: 15px;
        color: #fff;
        text-align: center;
        font-family: 'Orbitron', sans-serif;
    }

    div.clock .placeholder {
        color: #131212;
        position: absolute;
        top: 0;
        z-index: 50;
    }

    div.clock .meridian {
        margin-left: 15px;
    }

    /*END CLOCK*/

    /* AM OR PM*/

    .am-pm {
        font-family: sans-serif;
        text-transform: uppercase;
        width: 20px;
    }

    div.am-pm div p {
        font-size: 12px;
        font-weight: bold;
        width: 100%;
    }

    .am,
    .pm {
        color: #131212;
    }

    /*CLASS THAT CHANGES COLOR OF TEXT TO APPEAR LIKE ITS "ON"*/

    .light-on {
        color: #ffffff;
    }



    .widget-Weather {
        background: linear-gradient(to bottom right, #3cc0fe 20%, #0066ff);
        border-radius: 6px;
        box-shadow: 0px 60px 80px -20px rgb(39 165 253 / 40%);
        position: relative;
        overflow: hidden;
    }

    .single-weather-widget {
        /* background: linear-gradient(to bottom right, #3cc0fe 20%, #0066ff); */
        background: #0066ff;
        border-radius: 6px;

    }

    .single-weather-widget .temperature {
        color: white;
        font-size: 5em;
    }

    .single-weather-widget figure img {
        padding: 25px;
        text-align: center;
        margin-top: 5px;
    }


    .single-weather-widget .summary {
        color: #d2e9fa;
        font-size: 2em;
        font-weight: 300;
        /* width: 260px; */
        margin-top: -16px;
        padding-bottom: 16px;
        border-bottom: 2px solid #9cd0ff;
        margin-left: 8px;
    }

    .single-weather-widget .precipitation {
        margin-top: 16px;
    }

    .single-weather-widget .precipitation,
    .single-weather-widget .wind {
        color: #d2e9fa;
        font-size: 1.6em;
        font-weight: bold;
        margin-left: 8px;
    }

    .single-weather-widget .summaryText {
        margin: 0;
        font-weight: bold;
    }

    .weatherTodayDescriptionJson {
        text-transform: capitalize;
    }

    .todays6 {
        display: block;
        font-size: 1.6em;
    }

    .single-weather-widget .wind {
        margin-top: 4px;
    }


    .single-weather-widget .details {

        display: flex;
        flex-direction: column;

        margin-left: 30px;
        margin-bottom: 5px;
        margin-top: 5px;
    }

    .exchange {
        margin-top: 15px;

        text-align: center;
    }

    .exchange i {
        padding-right: 20px;
        color: tomato;
    }

    .exchange i,
    .exchange span {
        font-size: 2.0em;
    }

    .exchange strong {
        font-size: 18px;
    }

    .exchange span {
        color: white;
        font-weight: bold;

    }

    .exchange .birim {
        font-size: 20px;
    }


    .list-inline.forecast {
        margin-bottom: 0;
    }

    .text-black {
        color: #000;
    }

    .swiper-slide-active img {
        display: block !important;
    }

    .swiper-slide img {
        display: none;
    }

    .forecast img {
        width: 70px;
        /* margin-left: 35px; */
        text-align: center;
        margin: 0 auto;
    }


    .weather-panel-top-img {
        width: 90px;
        text-align: center;

        margin: 15px;
    }

    .weather-panel-top h2 {
        float: left;

    }

    .weather-panel-top p {
        float: right;

        text-align: center;
    }

    .weatherTodayDayJson {
        font-size: 1.8em;
    }

    .humidity {
        font-size: 1.2em;
    }
    </style>
</head>
<?php
function weather6today(){ ?>





<div class="weather-panel">

    <div class="row">

        <div class="col-md-2 col-lg-2 text-center">
            <img class="weather-panel-top-img weatherTodayIconJson"
                src="https://cdnydm.com/media/tr-Z7uMGW668t0R024tdJA.png" alt="weather">
        </div>


        <div class="col-md-3 col-lg-3 text-center">
            <div class="h1 temperature">
                <span class="weatherTodayDegreeJson">2</span> <span>°</span>

            </div>
        </div>


        <div class="col-md-7 col-lg-7 text-center">

            <div class="row">

                <div class="col-md-12 col-lg-12 text-center">
                    <strong class="weatherTodayDescriptionJson todays6">Açık</strong>
                </div>

                <div class="col-md-12 col-lg-12 text-center">
                    <strong class="weatherTodayDayJson">cuma</strong>
                </div>

                <div class="col-md-12 col-lg-12 text-center">
                    <span class="humidity">Nem Oranı: %<span class="weatherTodayHumidityJson">0</span></span>
                </div>

                <div class="col-md-12 col-lg-12 text-center">
                    <strong>Gece <span class="weatherTodayNightJson">0</span> <span>°</span> </strong>
                </div>



            </div>



        </div>



        <div class="col-lg-12">
            <ul class="list-inline row forecast">
                <li class="col-xs-4 col-sm-2 text-center weatherToday1">

                    <h3 class="h5">CMT</h3>

                    <img src="https://cdnydm.com/media/tr-Z7uMGW668t0R024tdJA.png" alt="">
                    <br>
                    <span> <span class="day">2</span> <span clas="sprit">°/</span> <span class="night">2</span>°</span>

                </li>
                <li class="col-xs-4 col-sm-2 text-center weatherToday2">
                    <h3 class="h5">PAZ</h3>
                    <img src="https://cdnydm.com/media/7FbW8fgzadAEm9nU6aT7Iw.png" alt="">
                    <br>
                    <span> <span class="day">2</span> <span clas="sprit">°/</span> <span class="night">2</span>°</span>
                </li>
                <li class="col-xs-4 col-sm-2 text-center weatherToday3">
                    <h3 class="h5">PZT</h3>
                    <img src="https://cdnydm.com/media/tr-Z7uMGW668t0R024tdJA.png" alt="">
                    <br>
                    <span> <span class="day">2</span> <span clas="sprit">°/</span> <span class="night">2</span>°</span>
                </li>
                <li class="col-xs-4 col-sm-2 text-center weatherToday4">
                    <h3 class="h5">SAL</h3>
                    <img src="https://cdnydm.com/media/7FbW8fgzadAEm9nU6aT7Iw.png" alt="">
                    <br>
                    <span> <span class="day">2</span> <span clas="sprit">°/</span> <span class="night">2</span>°</span>
                </li>
                <li class="col-xs-4 col-sm-2 text-center weatherToday5">
                    <h3 class="h5">ÇAR</h3>
                    <img src="https://cdnydm.com/media/QIoLslqq8kRklYCNiIjvVw.png" alt="">
                    <br>
                    <span> <span class="day">2</span> <span clas="sprit">°/</span> <span class="night">2</span>°</span>


                </li>
                <li class="col-xs-4 col-sm-2 text-center weatherToday6">
                    <h3 class="h5">PER</h3>
                    <img src="https://cdnydm.com/media/QIoLslqq8kRklYCNiIjvVw.png" alt="">
                    <br>
                    <span> <span class="day">2</span> <span clas="sprit">°/</span> <span class="night">2</span>°</span>
                </li>

            </ul>
        </div>
    </div>
</div>
?>
<?php 
}
 function singleWeather(){ ?>
<div class="single-weather-widget">
    <div class="row">
        <div class="col-sm-8 col-md-8 ">
            <div class="details">
                <div class=" temperature"><span class="weatherTodayDegreeJson">1</span> <span>°</span> </div>
                <div class="summary">
                    <p class="summaryText weatherTodayDescriptionJson">Açık</p>
                </div>
                <div class="precipitation">Gece Sıcaklığı: <span class="weatherTodayNightJson">0</span><span>°</span>
                </div>
                <div class="wind">Nem: <span>%</span><span class="weatherTodayHumidityJson">0</span> </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <figure class="mx-auto justify-content-center align-self-center float-right">
                <img class="weatherTodayIconJson" src="https://cdnydm.com/media/T42wPWSnBp4JWAnxJT6TWA.png"
                    height="250px" width="250px" class="img-fluid" alt="">
            </figure>

        </div>
    </div>

</div>
<?php 
 }



if (!isset($_GET['bina'])){
$list_child_terms_args = array(
    'taxonomy' => 'stnc_kiosk_binalar',
    'use_desc_for_title' => 0, // best practice: don't use title attributes ever
    'orderby' => 'name',
    'order'   => 'ASC',
);
$root_categories = get_categories($list_child_terms_args);
	// print_r($root_categories[0] );
	// print_r($root_categories[0]->name );
?>

<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="alert alert-danger" role="alert"> Lütfen görüntülenmesini istediğiniz binayı seçiniz</div>
                <?php foreach ($root_categories as $key => $row ):?>
                <a href="?bina=<?php echo $row->term_id?>" class="btn btn-primary"><?php echo $row->name?></a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php
die;
}
?>

<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-12 col-lg-12">

                <div class="col-sm-12 col-lg-12">
                    <div class="stnc-kiosk-top">
                        <div class="row">

                            <div class="col-sm-12 col-lg-12">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">

                                        <?php
// 2020/10/10 12:34:56
//2022/03/07 11:21:38 -- benım kı 


$options = get_option( 'stncWpKiosk_Other_Settings' );
$order=$options ["stncWpKiosk_text_field_Other_orderby"];


if (!isset($_GET['onizleme'])){
    // $options = get_option( 'stncWpKiosk_Other_Settings' );
    function timers($hours){
        if ($hours=="3600000"){
            $returnTime="1";
        } 
        else if ($hours=="7200000"){
            $returnTime="2";
        }
        else if ($hours=="10800000"){
            $returnTime="3";
        }
        else if ($hours=="14400000"){
            $returnTime="4";
        }
        return  $returnTime;
        }

 $hours=   timers( $options ["Other_all_page_renew_stncWpKiosk_text_field_render"]) ;
 
    date_default_timezone_set('Europe/Istanbul');
    $time=date("Y/m/d H:i:s",strtotime("+".$hours." hours"));
    update_option('stncWpKiosk_allPage_last_update',  $time  );

  
}


if ($order==""){
    $order="id";
}


$query = array(
    // 'offset' => -1,
    'post_type' => 'stnc_kiosk',
    'posts_per_page' => -1,
    'numberposts' => -1,
    "orderby" =>$order,
    "order" => "DESC",
    "post_status" => "publish",
    'parent' => 0,
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'stnc_kiosk_binalar',
            'field' => 'term_id',
            'terms' => $_GET['bina'],
            'include_children' => true,
        ),
    )
);
$loop = new WP_Query( $query ); 
while ( $loop->have_posts() ) : $loop->the_post(); 
$imagewow = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'stnc_wp_kiosk_size' );
$time=get_post_meta( get_the_ID(), 'stnc_wp_kiosk_slide_time_metaBox' );
$video=get_post_meta( get_the_ID(), 'stnc_wp_kiosk_Metabox_video' );
if(!empty($video[0])):
?>
                                        <div class="swiper-slide videoSlide"
                                            data-swiper-autoplay="<?php echo $time[0] ?>">
                                            <div style="background-color: #000;" class="container-fluid-sel h-100">
                                                <div class="row h-100">
                                                    <div class="col-12 my-auto">
                                                        <video muted loop controls
                                                            class="video-js vjs-default-skin vjs-big-play-centered"
                                                            style="background-color: #000;" controls preload="auto"
                                                            width="100%" height="100%" data-setup='{"fluid": true}'>
                                                            <source src="<?php echo $video[0] ?>" type="video/mp4">
                                                        </video>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
 else :
?>
                                        <div class="swiper-slide" data-swiper-autoplay="<?php echo $time[0] ?>">
                                            <img src="<?php echo $imagewow[0] ?>" class="img-fluid">
                                        </div>
                                        <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $options_Other = get_option( 'stncWpKiosk_Other_Settings' );
                // print_r($options );
                $WeatherShowType=$options_Other ["stncWpKiosk_text_field_Other_WeatherShowType"];
                // echo "<br>";
                $WeatherExchangeStatus=$options_Other ["stncWpKiosk_text_field_Other_exchange_status"];
                $WeatherWeatherRenewTime=$options_Other ["stncWpKiosk_text_field_Other_exchange_weather_renew_time"];
                $Other6todayTime=$options_Other ["stncWpKiosk_text_field_Other_6today_time"];
                $OtherAllPageRenew=$options_Other ["Other_all_page_renew_stncWpKiosk_text_field_render"];

                ?>
                <div class="col-sm-12 col-lg-12">
                    <div class="stnc-kiosk-bottom">

                        <div class="row">

                            <!-- time start -->
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <div id="tarih" class="tarih justify-content-center align-self-center ">2
                                            Nisan
                                            Cuma</div>
                                    </div>
                                </div>
                            </div>
                            <!-- time  !!end -->


                            <!-- date time start -->
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <!-- CLOCK -->
                                        <div class="clock">


                                            <!-- HOUR -->
                                            <div class="numbers">
                                                <p class="hours"></p>
                                                <p class="placeholder">88</p>
                                            </div>

                                            <div class="colon">
                                                <p>:</p>
                                            </div>

                                            <!-- MINUTE -->
                                            <div class="numbers">
                                                <p class="minutes"></p>
                                                <p class="placeholder">88</p>
                                            </div>

                                            <div class="colon">
                                                <p>:</p>
                                            </div>

                                            <!-- SECOND -->
                                            <div class="numbers">
                                                <p class="seconds"></p>
                                                <p class="placeholder">88</p>
                                            </div>

                                        </div><!-- END CLOCK -->


                                    </div>
                                    <!-- <div class="col-md-12 col-sm-12 col-lg-12">
                                        <div id="tarih" class="tarih justify-content-center align-self-center ">2 Nisan
                                            Cuma</div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- date time !!end -->


                        </div>

                        <div class="row">
                            <!-- weather start -->
                            <?php
                        if  ($WeatherShowType != "close"){ ?>
                                                <div class="col-sm-7 col-md-7 col-lg-7">
                                                    <?php     
                        if  ($WeatherShowType == "tek") { 
                        singleWeather();
                        } else if  ($WeatherShowType == "alti") { 
                        weather6today();
                        }
                        else if ( $WeatherShowType == "both") { ?>
                                <div class="swiper-container-weather">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <?php  weather6today(); ?>
                                        </div>
                                        <div class="swiper-slide">
                                            <?php singleWeather(); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php    } ?>
                            </div>
                            <?php    } ?>
                            <!-- weather  !!end -->

                            <!-- doviz start -->
                            <?php
                          if  ($WeatherExchangeStatus == "hayir"){ ?>
                            <div style="margin-top:30px" class="col-md-5 col-sm-5 col-lg-5">

                                <div class="row">


                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="exchange">
                                            <i class="fa fa-usd" aria-hidden="true"></i>
                                            <br>
                                            <span id="jsonDolarData"> 00 </span> <span class="birim">TL</span>
                                            <br>
                                            <strong style="color: white; "> Dolar </strong>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="exchange">
                                            <i class="fa fa-euro" aria-hidden="true"></i>
                                            <br>
                                            <!-- ₺ -->
                                            <span id="jsonEuroData"> 00 </span><span class="birim"> TL</span>
                                            <br>
                                            <strong style="color: white; "> Euro </strong>
                                        </div>
                                    </div>



                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="exchange">
                                            <i class="fa fa-sun-o" aria-hidden="true"> </i>
                                            <br>
                                            <span id="jsonAltinData"> 00 </span> <span class="birim">TL</span>
                                            <br>
                                            <strong style="color: white; "> Altın </strong>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="exchange">
                                            <i class="fa fa-sun-o" aria-hidden="true"> </i>
                                            <br>

                                            <span id="jsonCeyrekAltinData"> 00 </span> <span class="birim">TL</span>
                                            <br> <strong style="color: white; "> Çeyrek altın </strong>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <?php } ?>
                            <!-- doviz  !!end -->

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js"
        integrity="sha512-BrvVYNhKh6yST24E5DY/LopLO5d+8KYmIXyrpBIJ2PK+CyyJw/cLSG/BfJomWLC1IblNrmiJWGlrGueKLd/Ekw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.2.5/video.min.js"></script>
    <script>
    var timeOut = <?php echo $WeatherWeatherRenewTime;?>;
    var OtherAllPageRenew = <?php echo $OtherAllPageRenew;?>;

    var swiper = new Swiper('.swiper-container', {
        autoHeight: false, //enable auto height
        spaceBetween: 20,
        centeredSlides: true,
        effect: 'fade',
        autoplay: {
            delay: <?php echo $Other6todayTime;?>,
            disableOnInteraction: false,
        },
        loop: true,
        // Disable preloading of all images
        preloadImages: true,
        // Enable lazy loading
        keyboard: {
            enabled: false,
            onlyInViewport: false,
        },
        mousewheel: {
            invert: false,
        },
        lazy: false,
    });

    [...document.querySelectorAll('video')].forEach(video => {
        video.classList.add('video-js');
        video.classList.add('vjs-default-skin');
        video.classList.add('vjs-big-play-centered');
        videojs(video, {
            fluid: true,
            autoplay: true
        });
    });



    //invokes functions as soon as window loads
    window.onload = function() {
        time();
        ampm();
        //   whatDay();
        setInterval(function() {
            time();
            ampm();
            //   whatDay();
        }, 1000);
    };

    var amPmDisplay = false;
    //gets current time and changes html to reflect it
    function time() {
        var date = new Date(),
            hours = date.getHours(),
            minutes = date.getMinutes(),
            seconds = date.getSeconds();

        //make clock a 12 hour clock instead of 24 hour clock
        if (amPmDisplay) {
            hours = (hours > 12) ? (hours - 12) : hours;
        }


        //invokes function to make sure number has at least two digits
        hours = addZero(hours);
        minutes = addZero(minutes);
        seconds = addZero(seconds);

        //changes the html to match results
        document.getElementsByClassName('hours')[0].innerHTML = hours;
        document.getElementsByClassName('minutes')[0].innerHTML = minutes;
        document.getElementsByClassName('seconds')[0].innerHTML = seconds;


    }

    //turns single digit numbers to two digit numbers by placing a zero in front
    function addZero(val) {
        return (val <= 9) ? ("0" + val) : val;
    }

    //lights up either am or pm on clock
    function ampm() {
        var date = new Date(),
            hours = date.getHours()
        // am = document.getElementsByClassName("am")[0].classList,
        // pm = document.getElementsByClassName("pm")[0].classList
        ;

        if (amPmDisplay) {
            (hours >= 12) ? pm.add("light-on"): am.add("light-on");
            (hours >= 12) ? am.remove("light-on"): pm.remove("light-on");
        }

    }

    //lights up what day of the week it is
    function whatDay() {
        var date = new Date(),
            currentDay = date.getDay(),
            days = {
                0: "sunday",
                1: "monday",
                2: "tuesday",
                3: "wednesday",
                4: "thursday",
                5: "friday",
                6: "saturday"
            },
            currentDayHTML = document.getElementsByClassName(days[currentDay])[0].innerHTML,
            currentDayClass = document.getElementsByClassName(days[currentDay])[0].classList,
            previousDayClass = document.getElementsByClassName(days[currentDay - 1])[0].classList;

        //not quite right.  doesnt remove light on Saturday to Sunday switch due to days array
        currentDayClass.add("light-on");
        previousDayClass.remove("light-on");

    }


    var swiper = new Swiper('.swiper-container-weather', {
        effect: 'cube',
        grabCursor: true,
        cubeEffect: {
            shadow: true,
            slideShadows: true,
            shadowOffset: 20,
            shadowScale: 0.94,
        },
        autoplay: {
            delay: <?php echo $WeatherWeatherRenewTime?>,
            disableOnInteraction: false,
        },
        loop: true,
        // Disable preloading of all images
        preloadImages: true,
        // Enable lazy loading
        keyboard: {
            enabled: false,
            onlyInViewport: false,
        },
        mousewheel: {
            invert: false,
        },
        lazy: true,
    });
    </script>

    <script>
    //1000 one second 
    //1 minute  =  60*1000 = 60000 one minute 

    // 15 minute 15*60000
    //45 minute 
    // var timeOut =45*60000;
    var aylar = new Array("Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül",
        "Ekim",
        "Kasım", "Aralık");
    var gunler = new Array("Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi");

    function tarih() {
        var now = new Date();
        var yil = now.getFullYear();
        var ay = now.getMonth();
        var gun = now.getDate();
        var haftagun = now.getDay();
        //  document.getElementById("tarih").innerHTML = gun + " " + aylar[ay] + " " + yil + " " + gunler[haftagun] ; //yıl bilgisi var 
        document.getElementById("tarih").innerHTML = gun + " " + aylar[ay] + " " + gunler[haftagun];
    }
    tarih();

    function ajaxCall() {
   
        const ajax_obj = {
            nonce: "<?php echo wp_create_nonce("my_user_like_nonce"); ?>",
            ajaxurl: "<?php echo admin_url( 'admin-ajax.php' )?>",
        };

        const data = new FormData();
        data.append('action', 'stncStatus_ajax_request');
         data.append('nonce', ajax_obj.nonce);

        fetch(ajax_obj.ajaxurl, {
                method: "POST",
                credentials: 'same-origin',
                body: data,
            })
            .then(response => {
                if (response.ok) {
                    return response.json()
                } else {
                    console.log("error")
                }
            })
            .then(data => {
                // console.log(data)
                // console.log(data.renewal)
                $('#jsonDolarData').html(data.jsonData.dolar);
                $('#jsonEuroData').html(data.jsonData.euro);
                $('#jsonAltinData').html(data.jsonData.altin);
                $('#jsonCeyrekAltinData').html(data.jsonData.ceyrek_altin);

                $('.weatherTodayDegreeJson').html(data.jsonData.weatherTodayDegree);
                $('.weatherTodayDescriptionJson').html(data.jsonData.weatherTodayDescription);
                $('.weatherTodayNightJson').html(data.jsonData.weatherTodayNight);
                $('.weatherTodayHumidityJson').html(data.jsonData.weatherTodayHumidity);
                $('.weatherTodayDayJson').html(data.jsonData.weatherTodayDay);
                $('.weatherTodayIconJson').attr('src', data.jsonData.weatherTodayIcon);

                $.each(data.jsonData.todays, function(key, value) {
                    $('.weatherToday' + key + ' h3').html(value.weatherToday_gun);
                    $('.weatherToday' + key + ' .night').html(value.weatherToday_night);
                    $('.weatherToday' + key + ' .day').html(value.weatherToday_degree);
                    $('.weatherToday' + key + ' img').attr('src', value.weatherToday_icon);
                })


                // if (data.jsonData.pageRenewStatus) {
                //     location.reload()
                // }
                // //  else if (data.jsonData.location_Href ) {
                // //     window.location.href = data.jsonData.location_Href_Path ;
                // //   } 
                // else {
                //     console.log("error")
                // }
            })
            .catch((error) => {
                console.log("error2")
            });
    }

    setTimeout(function() {
        ajaxCall();
    }, 3000);

    //     //tum sayfa yenilenme 
    //    setInterval(function() {
    //       location.reload()
    //    },OtherAllPageRenew);

    <?php 
        $bina= isset($_GET['bina']) ? "/?bina=".$_GET['bina'] : '';
        ?>
    setInterval(function() {
        window.location.href = "<?php echo  $domainName.$bina?>"
    }, <?php echo  $allPageRenewTime?>);



    //dolar ve hava durumu  yenilenme 
    setInterval(function() {
        ajaxCall();
    }, timeOut);
    </script>
</body>

</html>