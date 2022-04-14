<?php

function stncStatus_database_install1()
{
    
    global $wpdb; //wp_stnc_map_floors
    add_option( "stncWpKiosk_Exchange_Settings", '', '', 'yes' );
    add_option( "stncWpKiosk_Weather_Settings", '', '', 'yes' );
    add_option( "stncWpKiosk_Other_Settings", '', '', 'yes' );
    add_option( "stncWpKiosk_Weather_Today", '', '', 'yes' );
}

register_activation_hook(__FILE__, 'stncStatus_database_install1');

add_action('admin_init', 'stncStatus_database_install1');

