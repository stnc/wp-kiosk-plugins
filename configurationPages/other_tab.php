<?php
add_action( 'admin_init', 'stncWpKiosk_Other_Settings_init' );

function stncWpKiosk_Other_Settings_init(  ) {

    register_setting('stncWpKiosk_OtherConfig', 'stncWpKiosk_Other_Settings');

    add_settings_section(
        'stncWpKiosk_Other_section',
        __( 'Diger Ayarlar', 'wordpress' ),
        'stncWpKiosk_Other_Settings_section_callback',
        'stncWpKiosk_OtherConfig'
    );

    add_settings_field(
        'stncWpKiosk_text_field_Other_sort',
        __( 'Resimlerin Siralanma Sekli', 'wordpress' ),
        'Other_picture_sort_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 
    

        
    add_settings_field(
        'stncWpKiosk_text_field_Other_sixDay_open_close',
        __( '6 gunluk hava durumu', 'wordpress' ),
        'Other_weather_sixDay_open_close_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    );


    add_settings_field(
        'stncWpKiosk_text_field_Other_weather_time',
        __( '6 gunluk hava durumunun ekranda gorunme suresi', 'wordpress' ),
        'Other_weather_time_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 
    

}

function Other_picture_sort_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Other_Settings' );
    ?>
    <select name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_sort]'>
        <option value='id' <?php selected( $options['stncWpKiosk_text_field_Other_sort'], 'id' ); ?>>ID durumuna Göre</option>
        <option value='date' <?php selected( $options['stncWpKiosk_text_field_Other_sort'], 'date' ); ?>>Tarihine Göre</option>
    </select>
<small>Eger tarih secerseniz resim deki eklenme tarihini degistirerek resimlerin siralamasini degistirebilirsiniz</small>
<?php
}

function Other_weather_time_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Other_Settings' );
    ?>
    <select name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_weather_time]'>
        <option value='30' <?php selected( $options['stncWpKiosk_text_field_Other_weather_time'], 30 ); ?>>30 saniye</option>
        <option value='40' <?php selected( $options['stncWpKiosk_text_field_Other_weather_time'], 40 ); ?>>40 saniye</option>
        <option value='50' <?php selected( $options['stncWpKiosk_text_field_Other_weather_time'], 50 ); ?>>50 saniye</option>

    </select>

<?php
}

function Other_weather_sixDay_open_close_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Other_Settings' );
    ?>
    <select name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_sixDay_open_close]'>
        <option value='1' <?php selected( $options['stncWpKiosk_text_field_Other_sixDay_open_close'], 1 ); ?>>Ekranda Gorunsun</option>
        <option value='2' <?php selected( $options['stncWpKiosk_text_field_Other_sixDay_open_close'], 2 ); ?>>Ekranda Gorunmesin</option>

    </select>

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