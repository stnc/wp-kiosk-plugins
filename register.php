<?php 

////*************FRONTEnd register***********//////

// register our form css --kapalı 
function stnc_wp_kiosk_front_register_js()
{
    wp_enqueue_script("dropzone",  plugins_url('../assets/js/dropzone.min.js', __FILE__), array('jquery'));
    /*
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
 */
    //  wp_register_script("dropzone.dict", plugins_url('../assets/js/dropzone.dict-tr.js', __FILE__) . '', array('jquery'));
    //   wp_register_script("stnc_upload", plugins_url('../assets/js/stnc_upload.js',__FILE__) , array('jquery'));

    // localize the script to your domain name, so that you can reference the url to admin-ajax.php file easily
    wp_localize_script('dropzone', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
    // enqueue jQuery library and the script you registered above
    wp_enqueue_script('jquery');
    wp_enqueue_script('dropzone');
}

//add_action('wp_enqueue_scripts', 'stnc_wp_kiosk_front_register_js');

// load css into the website's front-end --kapalı 
function stnc_wp_kiosk_front_enqueue_style()
{
    global $post_type;

    if( 'staff' == $post_type ){
    wp_enqueue_style('stnc-style', plugins_url('assets/css/min/stnc_wp_kiosk-admin.min.css', __FILE__));
    }
}
//add_action('admin_enqueue_scripts', 'stnc_wp_kiosk_front_enqueue_style');




// Load plugin text-domain

$locale = apply_filters('plugin_locale', get_locale(), 'stnc_wp_kiosk-staff');

load_textdomain('stnc_wp_kiosk-staff', WP_LANG_DIR . 'stnc_wp_kiosk-staff/stnc_wp_kiosk-staff-' . $locale . '.mo');
load_plugin_textdomain('stnc_wp_kiosk-staff', false, plugin_basename(dirname(__FILE__)) . '/languages');


////*******************************************************************************//////
////*******************************************************************************//////
////*************admin panel register***********//////
////*******************************************************************************//////
////*******************************************************************************//////

// load css into the website's front-end
function stnc_wp_kiosk_admin_enqueue_style()
{
    // wp_enqueue_style('stnc-style-boot', plugins_url('assets/css/bootstrap.min.css', __FILE__))
    wp_enqueue_style('stnc-style-style2', plugins_url('assets/css/stnc_wp_kiosk_admin.css', __FILE__));
}

// if ((isset($_GET['post_type'])) && ($_GET['post_type'] === 'staff')) {

add_action('admin_enqueue_scripts', 'stnc_wp_kiosk_admin_enqueue_style');
add_action('admin_enqueue_scripts', 'stnc_wp_kiosk_script_in_admin');
// }


function stnc_wp_kiosk_script_in_admin($hook) {

    // wp_register_script( 'stnc-bootstrap',plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.bundle.min.js', '',true );
    // wp_enqueue_script('stnc-bootstrap');   
    
    wp_register_script( 'stnc-admin',plugin_dir_url( __FILE__ ) . 'assets/js/CHfw-admin.js', '',true );
    // wp_register_script( 'stnc-my',plugin_dir_url( __FILE__ ) . 'assets/js/my.js', '',true );
    wp_enqueue_script('stnc-admin');
}



function stnc_wp_kiosk_admin_menu()
{
    add_submenu_page("edit.php?post_type=staff", __("Locations", 'mp-timetable'), __("Locations", 'mp-timetable'), "edit_posts", "edit.php?post_type=locations");//stnc_wp_kiosk condi
    add_submenu_page("edit.php?post_type=staff", __("Add Locations", 'mp-timetable'), __("Add Locations", 'mp-timetable'), "edit_posts", "post-new.php?post_type=locations");//stnc_wp_kiosk add treatmens
    add_submenu_page( "edit.php?post_type=staff", 'Ayarlar', 'Ayarlar', 'manage_options', 'stncFullPage', 'stncForm_adminMenu_About_contentsTest' ); ////burası alt kısım onun altında olacak olan bolum için 

}

add_action('admin_menu', 'stnc_wp_kiosk_admin_menu');