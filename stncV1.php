<?php
/*
 * Template Name: Kiosk Page
 * Description: TV ekranları için özel sayfa
* @package WordPress
 *@subpackage stnc-kiosk
 *@since stnc-kiosk 2.0
 */



// https://stackoverflow.com/questions/28249774/add-custom-css-to-a-page-template-in-wordpress
//https://stackoverflow.com/questions/20780422/wordpress-get-plugin-directory
// https://stackoverflow.com/questions/39652122/how-to-list-all-category-from-custom-post-type
//search wordpress plugin page path


/*

$list_child_terms_args = array(
    'taxonomy' => 'stnc_kiosk_binalar',
    'use_desc_for_title' => 0, // best practice: don't use title attributes ever
    'orderby' => 'name',
    'order'   => 'ASC',
    'slug'=> 'tekno-1',
);
$root_categories = get_categories($list_child_terms_args);
	print_r ($root_categories);
$mp_events = array(
    // 'offset' => -1,
    'post_type' => 'stnc_kiosk',
    'posts_per_page' => -1,
    'numberposts' => -1,
    "orderby" => "post_date",
    "order" => "DESC",
    "post_status" => "publish",
    'parent' => 0,
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'stnc_kiosk_binalar',
            'field' => 'term_id',
            'terms' => 22,//$root_categories[0]->term_id,
            'include_children' => true,
        ),
    )
);
$myposts_display_doctor_department = get_posts($mp_events);
?>
 <select name="" id="">
<?php foreach ($myposts_display_doctor_department as $mypost) { ?>
<option value="<?php echo $mypost->ID ?>"><?php echo $mypost->post_title ?></option>
<?php } ?>

</select>*/

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="SELMAN TUNÇ">
    <meta name="generator" content="selmantunc.com.tr">
    <title>Erciyes Teknopark KİOSK V1.23</title>

    <link rel="canonical" href="https://kiosk.erciyesteknopark.com/">

    <!-- Bootstrap core CSS -->
    <!-- <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <!-- Favicons -->

    <meta name="theme-color" content="#7952b3">


    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.2.5/video-js.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">


    <link href="https://kiosk.erciyesteknopark.com/assets/css/style.css" rel="stylesheet">

</head>

<body>
<div class="container-fluid ">


<div class="row">
    <div class="col-sm-12 col-lg-12">

        <div class="col-sm-12 col-lg-12">
            <div class="stnc-kiosk-top">
                <div class="row">

                    <div class="col-sm-12 col-lg-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">                         
<?php


$query = array(
    // 'offset' => -1,
    'post_type' => 'stnc_kiosk',
    'posts_per_page' => -1,
    'numberposts' => -1,
    "orderby" => "post_date",
    "order" => "DESC",
    "post_status" => "publish",
    'parent' => 0,
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'stnc_kiosk_binalar',
            'field' => 'term_id',
            'terms' => 22,//$root_categories[0]->term_id,
            'include_children' => true,
        ),
    )
);


$loop = new WP_Query( $query ); 
 while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

    <?php
    $imagewow = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'stnc_wp_kiosk_size' );
echo $imagewow[0];
the_post_thumbnail( 'stnc_wp_kiosk_size' );

?>
    <?php //echo esc_attr(trim(CHfw_get_metaSingle(get_the_ID(), 'CHfw-staffSetting_title', $CHfw_meta_key_staff))) . ' ' . get_the_title() 
     $ss=get_post_meta( get_the_ID(), 'stnc_wp_kiosk_slide_time_metaBox' );
    print_r($ss);
    ?>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>