<?php

/////*********************************************************************************************//////
/////buradailer uğdate den önce ve olayı silmeden once için gerekli event 
/////*********************************************************************************************//////
add_action('pre_post_update', 'stnc_wp_kiosk_post_updating_callback');
function stnc_wp_kiosk_post_updating_callback($post_id)
{
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($post->post_status)){
        if ($post->post_status == "publish" && $post->post_type == "stnc_kiosk") {
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


/////*********************************************************************************************//////
/////*********************************************************************************************//////
/////*********************************************************************************************//////
/////********ZAMANLYICI kullanmışım ---ne amaçla kullandım hatırlamıyorum*/
/////*********************************************************************************************//////
/////*********************************************************************************************//////
/////*********************************************************************************************//////
/////*********************************************************************************************//////
/////*********************************************************************************************//////



add_action( 'publish_staff', 'Staff_schedule_staff_expiration_event_insert' );
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