<?php
/*
Plugin Name: Teknopark Kiosk 
Plugin URI:			
Description: Erciyes Teknopark Tv Ekranları (by stnc)
Version: 2.0.0
Author: https://github.com/stnc/wp-kiosk-plugins
Text Domain: stnc-wp-kiosk
Domain Path: /languages/
*/ 

$stnc_wp_kiosk_meta_key_kiosk = 'stnc_wp_kiosk-kioskLocation-Setting';
$stnc_wp_kiosk_postID = isset($_GET['post']) ? $_GET['post'] : null;//post  id  for edit
$stnc_wp_kiosk_post_type = (get_post_type($stnc_wp_kiosk_postID));//get type
$stnc_wp_kiosk_post_type_post = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';//for new



define('stnc_wp_kiosk_PATH', plugin_dir_path(__FILE__) . 'metaBox/');

include ('register_custom_types.php');
include ('installTable.php');

require(stnc_wp_kiosk_PATH . "sideBarMetaBox.php");

require(stnc_wp_kiosk_PATH . "metabox_engine_class.php");

// require(stnc_wp_kiosk_PATH . "kullanilamayan_ajax.php");

include ('register_css_js.php');

require("extraOptions.php");

include ('register_Pages.php');//ek 1

include("pages/configurationPages/init.php");//ek 2
include("pages/about/about.php");//ek 2
include("pages/onizleme/onizleme.php");//ek 2
include("stnc-kiosk-ajax.php");


//bu custom page eklemek içindir, çalışması için kiosk isminde bir sayfa açınız.
add_filter( 'page_template', 'stnc_kat_page_template' );
function stnc_kat_page_template( $page_template )
{
    if ( is_page( 'kiosk' ) ) {
        $page_template = dirname( __FILE__ ) . '/stnc-kiosk-page-frontpage.php';
    }
    return $page_template;
}