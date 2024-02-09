<?php
/*
Plugin Name:Teknopark Kiosk 
Plugin URI:	https://github.com/stnc/wp-kiosk-plugins	
Description: Kiosk Tv management 
Version: 2.5.0
Author: SELMAN TUNC
 * Author URI: https://selmantunc.com.tr
*/ 

$stnc_wp_kiosk_meta_key_kiosk = 'stnc_wp_kiosk-kioskLocation-Setting';
$stnc_wp_kiosk_postID = isset($_GET['post']) ? $_GET['post'] : null;//post  id  for edit
$stnc_wp_kiosk_post_type = (get_post_type($stnc_wp_kiosk_postID));//get type
$stnc_wp_kiosk_post_type_post = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';//for new



define('stnc_wp_kiosk_PATH', plugin_dir_path(__FILE__) . 'metaBox/');

require_once ('register_custom_types.php');

require_once(stnc_wp_kiosk_PATH . "sideBarMetaBox.php");

require_once(stnc_wp_kiosk_PATH . "metabox_engine_class.php");


require_once ('register_css_js.php');

require_once("helper-and-extra.php");

require_once ('register_menu.php');//ek 1

require_once("pages/configurationPages/init.php");//ek 2
require_once("pages/about/about.php");//ek 2
require_once("stnc-kiosk-ajax.php");
require_once("customPage.php");
