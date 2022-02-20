<?php
/*
 * Template Name: Masonry Page
 * Description: Masonry Page
* @package WordPress
 *@subpackage wow
 *@since wow 1.5
 */
// https://stackoverflow.com/questions/28249774/add-custom-css-to-a-page-template-in-wordpress
//https://stackoverflow.com/questions/20780422/wordpress-get-plugin-directory

//search wordpress plugin page path

$loop = new WP_Query( array( 'post_type' => 'stnc_kiosk', 'posts_per_page' => 10 ) ); 
 while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

    <?php
    $imagewow = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'stnc_wp_kiosk_size' );
echo $imagewow[0];
the_post_thumbnail( 'stnc_wp_kiosk_size' );

?>
    <?php //echo esc_attr(trim(CHfw_get_metaSingle(get_the_ID(), 'CHfw-staffSetting_title', $CHfw_meta_key_staff))) . ' ' . get_the_title() 
     $ss=get_post_meta( get_the_ID(), 'stnc_wp_kiosk_DrAndDep_display_locations' );
    print_r($ss);
    ?>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>