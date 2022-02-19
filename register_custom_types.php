<?php
function stnc_wp_kiosk_register_post_type()
{
    $singular = 'Stnc Kiosk';
    $plural = __('Teknopark Ekran Resimleri', 'stnc_wp_kiosk-Staff');
    $slug = str_replace(' ', '_', strtolower($singular));
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'add_new' => __('Yeni Resim Ekle', 'stnc_wp_kiosk-staff'),
        'add_new_item' => __('Yeni Resim Ekle', 'stnc_wp_kiosk-staff'),
        'edit' => __('Düzenle', 'stnc_wp_kiosk-staff'),
        'edit_item' => __('Resim Düzenle ', 'stnc_wp_kiosk-staff'),
        'new_item' => __('Yeni Bina', 'stnc_wp_kiosk-staff'),
        'view' => __('Bina Goster ', 'stnc_wp_kiosk-staff'),
        'view_item' => __('Bina ogesini goster ', 'stnc_wp_kiosk-staff'),
        'search_term' => __('Bina Ara ', 'stnc_wp_kiosk-staff'),
        'parent' => __('Alt Bina ', 'stnc_wp_kiosk-staff'),
        'not_found' => 'Eklenmis bina bulunmuyor',
        'not_found_in_trash' => 'Cop Kutusu Bos',
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
        'menu_position' => 30,
        'menu_icon' => 'dashicons-images-alt2',
        'can_export' => true,
        'delete_with_user' => false,
        'hierarchical' => true,
        'show_in_nav_menus' => false,
        'has_archive' => true,
        'query_var' => true,
        'map_meta_cap' => true,
        'rewrite' => array(
            'slug' =>  $slug,
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

add_action('init', 'stnc_wp_kiosk_register_post_type');

///bağlı kategori ekleme sisitemi 


/*
 * Staff Languages Support add 09-09-2017
 * */
function stnc_wp_kiosk_create_cat_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => __('Binalar', 'stnc_wp_kiosk-staff'),
        'singular_name' => __('Binalar', 'stnc_wp_kiosk-staff'),
        'add_new_item' => __('Yeni Bina Ekle ', 'stnc_wp_kiosk-staff'),
        'search_items' => __('Bina Ara', 'stnc_wp_kiosk-staff'),
        'popular_items' => __('Popular Bina', 'stnc_wp_kiosk-staff'),
        'all_items' => __('Tüm Binalar', 'stnc_wp_kiosk-staff'),
        'parent_item' => __('Alt kategori Bina', 'stnc_wp_kiosk-staff'),
        'parent_item_colon' => __('Alt kategori Bina:', 'stnc_wp_kiosk-staff'),
        'edit_item' => __('Bina Düzenle', 'stnc_wp_kiosk-staff'),
        'update_item' => __('Bina Güncelle', 'stnc_wp_kiosk-staff'),

        'new_item_name' => __('Yeni Bina', 'stnc_wp_kiosk-staff'),
    );
    register_taxonomy('stnc_kiosk_binalar', array("stnc_kiosk"), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,

        'rewrite' => array('slug' => 'stnc_kiosk_binalar'),
    ));
}

add_action('init', 'stnc_wp_kiosk_create_cat_taxonomies', 0);