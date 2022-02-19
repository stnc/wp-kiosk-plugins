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

define('stnc_wp_kiosk_PATH', plugin_dir_path(__FILE__) . 'includes/');

include ('register_custom_types.php');

require(stnc_wp_kiosk_PATH . "sideBarMetaBox.php");

require(stnc_wp_kiosk_PATH . "metabox_engine_class.php");

require(stnc_wp_kiosk_PATH . "kullanilamayan_ajax.php");

include ('register_css_js.php');

require("extraOptions.php");

include ('register_configurationPages.php');//ek 1

include("configurationPages/init.php");//ek 2