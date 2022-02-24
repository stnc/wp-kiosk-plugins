<?php
add_action( 'admin_init', 'stncWpKiosk_Weather_Settings_init' );

function stncWpKiosk_Weather_Settings_init(  ) {

    register_setting('stncWpKiosk_WeatherConfig', 'stncWpKiosk_Weather_Settings');

    add_settings_section(
        'stncWpKiosk_Weather_section',
        __( 'Hava Durumu Ayarlari', 'wordpress' ),
        'stncWpKiosk_Weather_Settings_section_callback',
        'stncWpKiosk_WeatherConfig'
    );

    add_settings_field(
        'stncWpKiosk_text_field_weather_date',
        __( 'Tarih', 'wordpress' ),
        'weather_date_stncWpKiosk_text_field_render',
        'stncWpKiosk_WeatherConfig',
        'stncWpKiosk_Weather_section'
    );


    add_settings_field(
        'stncWpKiosk_text_field_weather_day',
        __( 'Gun', 'wordpress' ),
        'weather_day_stncWpKiosk_text_field_render',
        'stncWpKiosk_WeatherConfig',
        'stncWpKiosk_Weather_section'
    ); 
    
    add_settings_field(
        'stncWpKiosk_text_field_weather_icon',
        __( 'Ikon resmi', 'wordpress' ),
        'weather_icon_stncWpKiosk_text_field_render',
        'stncWpKiosk_WeatherConfig',
        'stncWpKiosk_Weather_section'
    ); 

    add_settings_field(
        'stncWpKiosk_text_field_weather_description',
        __( 'Hava Durumu', 'wordpress' ),
        'weather_description_stncWpKiosk_text_field_render',
        'stncWpKiosk_WeatherConfig',
        'stncWpKiosk_Weather_section'
    ); 

    add_settings_field(
        'stncWpKiosk_text_field_weather_description_en',
        __( 'Hava Durumu (ingilizce)', 'wordpress' ),
        'weather_description_en_stncWpKiosk_text_field_render',
        'stncWpKiosk_WeatherConfig',
        'stncWpKiosk_Weather_section'
    ); 

    add_settings_field(
        'stncWpKiosk_text_field_weather_degree',
        __( 'Derece', 'wordpress' ),
        'weather_degree_stncWpKiosk_text_field_render',
        'stncWpKiosk_WeatherConfig',
        'stncWpKiosk_Weather_section'
    ); 

    add_settings_field(
        'stncWpKiosk_text_field_weather_night',
        __( 'Gece Sicakligi', 'wordpress' ),
        'weather_night_stncWpKiosk_text_field_render',
        'stncWpKiosk_WeatherConfig',
        'stncWpKiosk_Weather_section'
    );   
    
    add_settings_field(
        'stncWpKiosk_text_field_weather_humidity',
        __( 'Nem Orani', 'wordpress' ),
        'weather_humidity_stncWpKiosk_text_field_render',
        'stncWpKiosk_WeatherConfig',
        'stncWpKiosk_Weather_section'
    ); 

}

function weather_day_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Weather_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Weather_Settings[stncWpKiosk_text_field_weather_day]' value='<?php echo $options['stncWpKiosk_text_field_weather_day']; ?>'>
    <small>Kullanimda degildir  bilgi amaclidir</small>
  <?php
}


function weather_date_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Weather_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Weather_Settings[stncWpKiosk_text_field_weather_date]' value='<?php echo $options['stncWpKiosk_text_field_weather_date']; ?>'>
    <small>Kullanimda degildir  bilgi amaclidir</small>
    <?php
}

function weather_icon_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Weather_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Weather_Settings[stncWpKiosk_text_field_weather_icon]' value='<?php echo $options['stncWpKiosk_text_field_weather_icon']; ?>'>
    <img src="<?php echo $options['stncWpKiosk_text_field_weather_icon']; ?>" alt="" style="width: 85px; height: 100px;">
    <?php
}
function weather_description_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Weather_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Weather_Settings[stncWpKiosk_text_field_weather_description]' 
    value='<?php echo $options['stncWpKiosk_text_field_weather_description']; ?>'>
    <?php
}

function weather_description_en_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Weather_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Weather_Settings[stncWpKiosk_text_field_weather_description_en]' 
    value='<?php echo $options['stncWpKiosk_text_field_weather_description_en']; ?>'>
    <small>Kullanimda degildir  bilgi amaclidir</small>
    <?php
}
function weather_degree_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Weather_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Weather_Settings[stncWpKiosk_text_field_weather_degree]' 
    value='<?php echo $options['stncWpKiosk_text_field_weather_degree']; ?>'>
    <?php
}

function weather_night_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Weather_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Weather_Settings[stncWpKiosk_text_field_weather_night]' 
    value='<?php echo $options['stncWpKiosk_text_field_weather_night']; ?>'>
    <?php
}

function weather_humidity_stncWpKiosk_text_field_render(  ) {
    $options = get_option('stncWpKiosk_Weather_Settings');
    ?>
    <input type='text' name='stncWpKiosk_Weather_Settings[stncWpKiosk_text_field_weather_humidity]' 
    value='<?php echo $options['stncWpKiosk_text_field_weather_humidity']; ?>'>
    <?php
}


function stncWpKiosk_Weather_Settings_section_callback(  ) {
    echo __( 'bu konuda ayrintili bilgi icin bu sayfaya bakiniz ', 'wordpress' );
}

function stncWpKiosk_config_weather(  ) {
    ?>
    <form action='options.php' method='post'>
        <?php
        settings_fields( 'stncWpKiosk_WeatherConfig' );
        do_settings_sections( 'stncWpKiosk_WeatherConfig' );
        submit_button();
        ?>
    </form>
    <?php
}