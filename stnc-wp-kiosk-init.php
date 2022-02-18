<?php
/*
Plugin Name:teknopark kiosk 
Plugin URI:			
Description: erciyes teknopark tv ekranları (by stnc)
Version: 1.11.97
Author: Chrom Themes
Text Domain: stnc-wp-kiosk
Domain Path: /languages/
*/ 

define('stnc_wp_kiosk_PATH', plugin_dir_path(__FILE__) . 'includes/');

include ('register_custom_types.php');

require(stnc_wp_kiosk_PATH . "sideBarMetaBox.php");

require(stnc_wp_kiosk_PATH . "metabox_engine_class.php");

// require(stnc_wp_kiosk_PATH . "kullanilamayan_ajax.php");

require("extraOptions.php");



include ('register_css_js.php');


include ('register_menu.php');//ek 1
require("menuPages/ayarlar.php");//ek 2