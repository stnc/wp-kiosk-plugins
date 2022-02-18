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

///bağlı kategori ekleme sisitemi 


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