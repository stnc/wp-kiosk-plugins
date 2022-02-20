<?php
add_action( 'admin_init', 'stncWpKiosk_Other_Settings_init' );

function stncWpKiosk_Other_Settings_init(  ) {

    register_setting('stncWpKiosk_OtherConfig', 'stncWpKiosk_Other_Settings');

    add_settings_section(
        'stncWpKiosk_Other_section',
        __( 'Hava Durumu Ayarlari', 'wordpress' ),
        'stncWpKiosk_Other_Settings_section_callback',
        'stncWpKiosk_OtherConfig'
    );

    add_settings_field(
        'stncWpKiosk_text_field_Other_date',
        __( 'Tarih', 'wordpress' ),
        'Other_date_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    );


    add_settings_field(
        'stncWpKiosk_text_field_Other_day',
        __( 'Gun', 'wordpress' ),
        'Other_day_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 
    
    add_settings_field(
        'stncWpKiosk_text_field_Other_icon',
        __( 'Ikon resmi', 'wordpress' ),
        'Other_icon_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 

    add_settings_field(
        'stncWpKiosk_text_field_Other_description',
        __( 'Hava Durumu', 'wordpress' ),
        'Other_description_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 

    add_settings_field(
        'stncWpKiosk_text_field_Other_description_en',
        __( 'Hava Durumu (ingilizce)', 'wordpress' ),
        'Other_description_en_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 

    add_settings_field(
        'stncWpKiosk_text_field_Other_degree',
        __( 'Derece', 'wordpress' ),
        'Other_degree_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 

    add_settings_field(
        'stncWpKiosk_text_field_Other_night',
        __( 'Gece Sicakligi', 'wordpress' ),
        'Other_night_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    );   
    
    add_settings_field(
        'stncWpKiosk_text_field_Other_humidity',
        __( 'Nem Orani', 'wordpress' ),
        'Other_humidity_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 

}

function Other_day_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Other_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_day]' value='<?php echo $options['stncWpKiosk_text_field_Other_day']; ?>'>
    <small>Kullanimda degildir  bilgi amaclidir</small>
  <?php
}


function Other_date_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Other_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_date]' value='<?php echo $options['stncWpKiosk_text_field_Other_date']; ?>'>
    <small>Kullanimda degildir  bilgi amaclidir</small>
    <?php
}

function Other_icon_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Other_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_icon]' value='<?php echo $options['stncWpKiosk_text_field_Other_icon']; ?>'>
    <?php
}
function Other_description_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Other_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_description]' 
    value='<?php echo $options['stncWpKiosk_text_field_Other_description']; ?>'>
    <?php
}

function Other_description_en_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Other_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_description_en]' 
    value='<?php echo $options['stncWpKiosk_text_field_Other_description_en']; ?>'>
    <small>Kullanimda degildir  bilgi amaclidir</small>
    <?php
}
function Other_degree_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Other_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_degree]' 
    value='<?php echo $options['stncWpKiosk_text_field_Other_degree']; ?>'>
    <?php
}

function Other_night_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Other_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_night]' 
    value='<?php echo $options['stncWpKiosk_text_field_Other_night']; ?>'>
    <?php
}

function Other_humidity_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Other_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_humidity]' 
    value='<?php echo $options['stncWpKiosk_text_field_Other_humidity']; ?>'>
    <?php
}


function stncWpKiosk_Other_Settings_section_callback(  ) {
    echo __( 'bu konuda ayrintili bilgi icin bu sayfaya bakiniz ', 'wordpress' );
}

function stncWpKiosk_config_Other(  ) {
    ?>
    <form action='options.php' method='post'>
        <?php
        settings_fields( 'stncWpKiosk_OtherConfig' );
        do_settings_sections( 'stncWpKiosk_OtherConfig' );
        submit_button();
        ?>
    </form>
    <?php
}