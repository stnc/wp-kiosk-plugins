<?php
add_action( 'admin_init', 'stncWpKiosk_Other_Settings_init' );

function stncWpKiosk_Other_Settings_init(  ) {

    register_setting('stncWpKiosk_OtherConfig', 'stncWpKiosk_Other_Settings');

    add_settings_section(
        'stncWpKiosk_Other_section',
        __( 'Diğer Ayarlar', 'wordpress' ),
        'stncWpKiosk_Other_Settings_section_callback',
        'stncWpKiosk_OtherConfig'
    );

    add_settings_field(
        'stncWpKiosk_text_field_Other_orderby',
        __( 'Resimlerin Sıralanma Şekli', 'wordpress' ),
        'Other_picture_sort_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 
    

        
    add_settings_field(
        'stncWpKiosk_text_field_Other_WeatherShowType',
        __( 'Hava Durumu Gösterim Tipi', 'wordpress' ),
        'Other_weather_Other_WeatherShowType_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    );



    
    add_settings_field(
        'stncWpKiosk_text_field_Other_exchange_status',
        __( 'Döviz Kapalı olsun', 'wordpress' ),
        'Other_exchange_status_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 

    add_settings_field(
        'stncWpKiosk_text_field_Other_6today_time',
        __( '6 gunluk hava durumunun görünme süresi ', 'wordpress' ),
        'Other_6today_time_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 



    add_settings_field(
        'stncWpKiosk_text_field_Other_exchange_weather_renew_time',
        __( 'Sadece döviz ve hava durumlarına ait verilerin gün içinde yenilenme süresi', 'wordpress' ),
        'Other_exchange_weather_renew_time_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 


    add_settings_field(
        'stncWpKiosk_text_field_Other_all_page',
        __('Sayfanın yenilenme süresi', 'wordpress' ),
        'Other_all_page_renew_stncWpKiosk_text_field_render',
        'stncWpKiosk_OtherConfig',
        'stncWpKiosk_Other_section'
    ); 
}

function Other_picture_sort_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Other_Settings' );
    ?>
    <select name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_orderby]'>
        <option value='id' <?php selected( $options['stncWpKiosk_text_field_Other_orderby'], 'id' ); ?>>ID durumuna Göre</option>
        <option value='date' <?php selected( $options['stncWpKiosk_text_field_Other_orderby'], 'post_date' ); ?>>Tarihine Göre</option>
    </select>
<small>Eger tarih secerseniz resim deki eklenme tarihini degistirerek resimlerin siralamasini degistirebilirsiniz</small>
<?php
}



function Other_weather_Other_WeatherShowType_stncWpKiosk_text_field_render() {
    $options = get_option( 'stncWpKiosk_Other_Settings' );
    ?>
    <select name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_WeatherShowType]'>
        <option value='tek' <?php selected( $options['stncWpKiosk_text_field_Other_WeatherShowType'], "tek" ); ?>>Tek Günlük Hava Durumu Görünsün</option>
        <option value='alti' <?php selected( $options['stncWpKiosk_text_field_Other_WeatherShowType'], "alti" ); ?>>6  Günlük Hava Durumu Görünsün</option>
        <option value='both' <?php selected( $options['stncWpKiosk_text_field_Other_WeatherShowType'], "both" ); ?>>Her Ikısı de Görünsün</option>
        <option value='close' <?php selected( $options['stncWpKiosk_text_field_Other_WeatherShowType'], "close" ); ?>>Hava Durumu Kapalı Olsun</option>
    </select>
<?php
}


function Other_exchange_status_stncWpKiosk_text_field_render() {
    $options = get_option( 'stncWpKiosk_Other_Settings' );
    ?>
    <select name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_exchange_status]'>
    
        <option value="hayir" <?php selected( $options['stncWpKiosk_text_field_Other_exchange_status'], "hayir" ); ?>>Hayır</option>
        <option value="evet" <?php selected( $options['stncWpKiosk_text_field_Other_exchange_status'],"evet" ); ?>>Evet</option>
    </select>
<?php
}


function Other_6today_time_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Other_Settings' );
    ?>
    <select name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_6today_time]'>
        <option value='30000' <?php selected( $options['stncWpKiosk_text_field_Other_6today_time'], 30000  ); ?>>30 saniye</option>
        <option value='40000' <?php selected( $options['stncWpKiosk_text_field_Other_6today_time'], 40000  ); ?>>40 saniye</option>
        <option value='50000' <?php selected( $options['stncWpKiosk_text_field_Other_6today_time'], 50000  ); ?>>50 saniye</option>
        <option value='60000' <?php selected( $options['stncWpKiosk_text_field_Other_6today_time'], 60000  ); ?>>60 saniye</option>
    </select>
<?php
}

function Other_all_page_renew_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Other_Settings' );
    ?>
    <select name='stncWpKiosk_Other_Settings[Other_all_page_renew_stncWpKiosk_text_field_render]'>
        <option value='3600000' <?php selected( $options['Other_all_page_renew_stncWpKiosk_text_field_render'], 3600000 ); ?>>1 saat</option>
        <option value='7200000' <?php selected( $options['Other_all_page_renew_stncWpKiosk_text_field_render'], 7200000 ); ?>>2 saat</option>
        <option value='10800000' <?php selected( $options['Other_all_page_renew_stncWpKiosk_text_field_render'], 10800000 ); ?>>3 saat</option>
        <option value='14400000' <?php selected( $options['Other_all_page_renew_stncWpKiosk_text_field_render'], 14400000 ); ?>>4 saat</option>
    </select>

<?php
}

function Other_exchange_weather_renew_time_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Other_Settings' );
    ?>
    <select name='stncWpKiosk_Other_Settings[stncWpKiosk_text_field_Other_exchange_weather_renew_time]'>
        <option value='1200000' <?php selected( $options['stncWpKiosk_text_field_Other_exchange_weather_renew_time'], 1200000 ); ?>>20 dakika</option>
        <option value='1800000' <?php selected( $options['stncWpKiosk_text_field_Other_exchange_weather_renew_time'], 1800000 ); ?>>30 dakika</option>
        <option value='3600000' <?php selected( $options['stncWpKiosk_text_field_Other_exchange_weather_renew_time'],  3600000 ); ?>>1 saat</option>
        <option value='7200000' <?php selected( $options['stncWpKiosk_text_field_Other_exchange_weather_renew_time'], 7200000 ); ?>>2 saat</option>
        <option value='10800000' <?php selected( $options['stncWpKiosk_text_field_Other_exchange_weather_renew_time'], 10800000 ); ?>>3 saat</option>
        <option value='14400000' <?php selected( $options['stncWpKiosk_text_field_Other_exchange_weather_renew_time'], 14400000 ); ?>>4 saat</option>
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