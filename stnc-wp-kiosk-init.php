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




function example_ajax_request() {
    $nonce = $_POST['nonce'];
    if ( ! wp_verify_nonce( $nonce, 'stnc-kiosk-ajax-script' ) ) {
        die( 'Nonce value cannot be verified.' );
    }
   // wp_send_json_success( 'It works' );

}

add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );
 
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_example_ajax_request', 'example_ajax_request' );