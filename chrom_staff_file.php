<?php



function stnc_wp_kiosk_register_post_type_staff()
{
    $singular = 'Staff';
    $plural = __('Staff', 'stnc_wp_kiosk-Staff');
    $slug = str_replace(' ', '_', strtolower($singular));
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'add_new' => __('Add New', 'stnc_wp_kiosk-staff'),
        'add_new_item' => __('Add New Staff ', 'stnc_wp_kiosk-staff'),
        'edit' => __('Edit', 'stnc_wp_kiosk-staff'),
        'edit_item' => __('Edit Staff ', 'stnc_wp_kiosk-staff'),
        'new_item' => __('New Staff ', 'stnc_wp_kiosk-staff'),
        'view' => __('View Staff ', 'stnc_wp_kiosk-staff'),
        'view_item' => __('View Staff ', 'stnc_wp_kiosk-staff'),
        'search_term' => __('Search Staff ', 'stnc_wp_kiosk-staff'),
        'parent' => __('Parent Staff ', 'stnc_wp_kiosk-staff'),
        'not_found' => 'No Staff  found',
        'not_found_in_trash' => 'No Staff in Trash',

    );
    $args = array(
        'label' => 'Staff',
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-businessman',
        'can_export' => true,
        'delete_with_user' => false,
        'hierarchical' => true,
        'show_in_nav_menus' => false,
        'has_archive' => true,
        'query_var' => true,
        'map_meta_cap' => true,
        'rewrite' => array(
            'slug' => 'staff',
        ),

        'supports' => array(
            'title',
            'excerpt',
            'editor',
            'thumbnail',
        )
    );

    register_post_type($slug, $args);

}

add_action('init', 'stnc_wp_kiosk_register_post_type_staff');


require(stnc_wp_kiosk_PATH . "metabox_engine_class.php");


$stnc_wp_kiosk_staff_ch_postID = isset($_GET['post']) ? $_GET['post'] : null;//post  id  for edit

$stnc_wp_kiosk_staff_post_type_ch = get_post_type($stnc_wp_kiosk_staff_ch_postID);//get type

$stnc_wp_kiosk_staff_post_type_post = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';//for new

if ($stnc_wp_kiosk_staff_post_type_post == 'staff' or $stnc_wp_kiosk_staff_post_type_ch == 'staff') {
    if (is_admin()) {
        add_action('load-post.php', 'stnc_wp_kiosk_staff_init_metabox');
        add_action('load-post-new.php', 'stnc_wp_kiosk_staff_init_metabox');
    }
}

/*
 * Staff Languages Support add 09-09-2017
 * */
function stnc_wp_kiosk_create_language_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => __('Languages', 'stnc_wp_kiosk-staff'),
        'singular_name' => __('Languages', 'stnc_wp_kiosk-staff'),
        'add_new_item' => __('Add New Language ', 'stnc_wp_kiosk-staff'),
        'search_items' => __('Search Language', 'stnc_wp_kiosk-staff'),
        'popular_items' => __('Popular Language', 'stnc_wp_kiosk-staff'),
        'all_items' => __('All Languages', 'stnc_wp_kiosk-staff'),
        'parent_item' => __('Parent Language', 'stnc_wp_kiosk-staff'),
        'parent_item_colon' => __('Parent Language:', 'stnc_wp_kiosk-staff'),
        'edit_item' => __('Edit Language', 'stnc_wp_kiosk-staff'),
        'update_item' => __('Update Language', 'stnc_wp_kiosk-staff'),

        'new_item_name' => __('New Language Name', 'stnc_wp_kiosk-staff'),
    );
    register_taxonomy('staff_languages', array('staff'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,

        'rewrite' => array('slug' => 'staff_languages'),
    ));
}

add_action('init', 'stnc_wp_kiosk_create_language_taxonomies', 0);
/*
 * Staff location  Support add 09-09-2017
 * */
function stnc_wp_kiosk_create_slocation()
{
    $singular = 'Locations';
    $plural = __('Locations', 'stnc_wp_kiosk-Staff');
    $slug = str_replace(' ', '_', strtolower($singular));
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'add_new' => __('Add Location', 'stnc_wp_kiosk-staff'),
        'add_new_item' => __('Add New Location ', 'stnc_wp_kiosk-staff'),
        'edit' => __('Edit', 'stnc_wp_kiosk-staff'),
        'edit_item' => __('Edit Location ', 'stnc_wp_kiosk-staff'),
        'new_item' => __('New Location ', 'stnc_wp_kiosk-staff'),
        'view' => __('View Location ', 'stnc_wp_kiosk-staff'),
        'view_item' => __('View Location ', 'stnc_wp_kiosk-staff'),
        'search_term' => __('Search Location ', 'stnc_wp_kiosk-staff'),
        'parent' => __('Parent Location ', 'stnc_wp_kiosk-staff'),
        'not_found' => 'No Location  found',
        'not_found_in_trash' => 'No Location in Trash',

    );
    $args = array(
        'label' => 'Location',
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_admin_bar' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-businessman',
        'can_export' => true,
        'delete_with_user' => true,
        'hierarchical' => true,
        'show_in_nav_menus' => false,
        'has_archive' => true,
        'query_var' => true,
        'map_meta_cap' => true,
        'rewrite' => array(
            'slug' => 'locations',
        ),

        'supports' => array(
            'title',
            'excerpt',
            'editor',
            'thumbnail',
        )
    );

    register_post_type($slug, $args);
}

add_action('init', 'stnc_wp_kiosk_create_slocation', 0);


/*------------------UPDATE STAFF---------------------*/

//add_action( 'publish_staff', 'Staff_schedule_staff_expiration_event_insert' );
function stnc_wp_kiosk_Staff_schedule_staff_expiration_event_insert($post_id)
{
    // Schedule the actual event
    //wp_schedule_single_event( 30 * DAY_IN_SECONDS, 'updateCategories_staff_after_expiration_V1', array( $post_id ) );//insert
    stnc_wp_kiosk_updateCategories_staff_after_expiration($post_id);
    write_log("run");

}


add_action('stnc_wp_kiosk_updateCategories_staff_after_expiration', 'stnc_wp_kiosk_updateCategories_staff_after_expiration', 10, 1);
// This function will run once the 'addCategories_staff_after_expiration' is called


function stnc_wp_kiosk_updateCategories_staff_after_expiration($post_id)
{

    global $wpdb;


    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (wp_is_post_autosave($post_id)) {
        return;
    }

    // Check if not a revision.
    if (wp_is_post_revision($post_id)) {
        return;
    }

    $term_cal = term_exists('Auto Draft', 'booked_custom_calendars');
    if ($term_cal !== 0 && $term_cal !== null) {
        wp_delete_term($term_cal['term_id'], 'booked_custom_calendars');
    }


    $post_title = get_the_title($post_id);

    $display_before_title = get_post_meta($post_id, 'wow_BeforeTitle');

    if (count($display_before_title) > 0) {
        $display_before_title = $display_before_title[0];
    } else {
        $display_before_title = null;
    }

        //the purpose of this place looks at If the period has already occurred, if it has occurred does not
    $booked_custom_calendars_term = term_exists($post_title, 'booked_custom_calendars');
    $added_booked_custom_calendars_term = 0;
    if ($booked_custom_calendars_term !== 0 && $booked_custom_calendars_term !== "") {
        $added_booked_custom_calendars_term = isset($booked_custom_calendars_term['term_id']) ? $booked_custom_calendars_term['term_id'] : 0;
    }

        // is the savebefore value where the first insertion also does not occur with wow_befortitle, meaning it has not been added before
    if (empty($display_before_title)) {

        $args = array(
            'description' => "Staff plugin ; Automatic Value: " . $post_title . "",
            'slug' => $post_title,
        );
        //the purpose of this place is to see if the term is more formed if it is formed does not
        $booked_custom_calendars_term = wp_insert_term($post_title, "booked_custom_calendars", $args);
        $added_booked_custom_calendars_term = isset($booked_custom_calendars_term['term_id']) ? $booked_custom_calendars_term['term_id'] : 0;
    }
    //the event will break here here will make insert, so this place will be the first insert event get
    else {



// if you enter here the title has changed post title is the value of changing the old ($display_before_title) to make the term_exist
        if ($display_before_title != $post_title) {
            //booked_custom_calendars taxonomy change
            $term_control_booked_custom_calendars = term_exists($display_before_title, 'booked_custom_calendars');
            wp_update_term($term_control_booked_custom_calendars['term_id'], 'booked_custom_calendars', array(
                'name' => $post_title,
                'slug' => $post_title
            ));
        }
    }


    $selected_departman_id = stnc_wp_kiosk_get_meta($post_id, 'display_doctor_department', 'stnc_wp_kiosk_DoctorAndDepartmant_ForSingleStaffPage');
    if ($selected_departman_id != false) {//so I used wp_schedule_single_event() so if the value is not empty,
        $selected_departman_id = (int)$selected_departman_id;
    }


// events is also using the metabase (doctor selected) )
    $previously_added_values = get_post_meta($selected_departman_id, 'stnc_wp_kiosk_mpevent_departmentForSingleEventPage');
    $dilimler = explode(",", $previously_added_values[0]);
    array_push($dilimler, $added_booked_custom_calendars_term);
    $previously_added_values = implode(",", $dilimler);
    update_post_meta($selected_departman_id, 'stnc_wp_kiosk_mpevent_departmentForSingleEventPage', $previously_added_values);
}


//  runs when a Post is update
add_action('publish_staff', 'stnc_wp_kiosk_Staff_schedule_staff_expiration_event_update');
function stnc_wp_kiosk_Staff_schedule_staff_expiration_event_update($post_id)
{
    // Schedule the actual event
    //updateCategories_staff_after_expiration( $post_id );
    wp_schedule_single_event(strtotime("+2 seconds"), 'stnc_wp_kiosk_updateCategories_staff_after_expiration', array($post_id));
}


add_action('pre_post_update', 'stnc_wp_kiosk_post_updating_callback');
function stnc_wp_kiosk_post_updating_callback($post_id)
{
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($post->post_status)){
        if ($post->post_status == "publish" && $post->post_type == "staff") {
            $display_before_title_read = get_the_title($post_id);
            update_post_meta($post_id, 'wow_BeforeTitle', $display_before_title_read);

        }
    }

}


add_action('pre_delete_term', 'stnc_wp_kiosk_prevent_terms_delete', 1, 2);
function stnc_wp_kiosk_prevent_terms_delete($term, $taxonomy)
{
    global $wpdb;
    if (!current_user_can('manage_network')) {
        $table = $wpdb->prefix . 'options';
        $wpdb->delete($table, array('option_name' => 'booked_defaults_' . $term));
    }
}


require("includes/stnc_wp_kiosk-staff-metabox-options.php");

/*staff image size */
if (function_exists('add_image_size')) {
    add_image_size('stnc_wp_kiosk-staffPostSize', 320, 320, false);
}


/*staff pagination fix*/
$scFW_staffLimit_posts = isset($stnc_wp_kiosk_rdx_options['staff_limit_posts']) ? $stnc_wp_kiosk_rdx_options['staff_limit_posts'] : 5;

function stnc_wp_kiosk_mp_staff_posts_per_page($query)
{
    global $scFW_staffLimit_posts;
    if (isset($query->query_vars['post_type'])) {
        if ($query->query_vars['post_type'] == 'staff') {
            $query->query_vars['posts_per_page'] = $scFW_staffLimit_posts;
        }
    }

    return $query;
}

if (!is_admin()) {
    add_filter('pre_get_posts', 'stnc_wp_kiosk_mp_staff_posts_per_page');
}





add_filter('manage_staff_posts_columns', 'stnc_wp_kiosk_add_img_column');
add_filter('manage_staff_posts_custom_column', 'stnc_wp_kiosk_manage_img_column', 10, 2);
function stncForm_adminMenu_About_contentsTest(){
    echo "sdds";
}
/*
add custom_colum
@use http://bit.ly/2zKE0k4
*/
function stnc_wp_kiosk_add_img_column($columns)
{
    $columns['img'] = 'Featured Image';
    return $columns;
}

function stnc_wp_kiosk_manage_img_column($column_name, $post_id)
{
    if ($column_name == 'img') {
        echo get_the_post_thumbnail($post_id, 'thumbnail');
    }

    return $column_name;
}


