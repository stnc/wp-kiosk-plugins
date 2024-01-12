<?php

/* image size https://wpshout.com/wordpress-custom-image-sizes/*/
if (function_exists('add_image_size')) {
    add_image_size('stnc_wp_kiosk_size', 1815, 2550, false);
}

/*
add custom_colum
@use http://bit.ly/2zKE0k4
*/


add_filter('manage_stnc_kiosk_posts_columns', 'stnc_wp_kiosk_add_img_column');
add_filter('manage_stnc_kiosk_posts_custom_column', 'stnc_wp_kiosk_manage_img_column', 10, 2);


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




//staff pagination fix ---panelde sayfalama yapacak ama işe yaramadı
$scFW_staffLimit_posts = 5;

function stnc_wp_kiosk_mp_staff_posts_per_page($query)
{
    global $scFW_staffLimit_posts;
    if (isset($query->query_vars['post_type'])) {
        if ($query->query_vars['post_type'] == 'stnc_kiosk') {
            $query->query_vars['posts_per_page'] = 5;
        }
    }

    return $query;
}

if (!is_admin()) {
    add_filter('pre_get_posts', 'stnc_wp_kiosk_mp_staff_posts_per_page');
}