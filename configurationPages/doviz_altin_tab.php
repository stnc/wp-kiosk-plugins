<?php
add_action( 'admin_init', 'stncWpKiosk_Exchange_Settings_init' );

function stncWpKiosk_Exchange_Settings_init(  ) {
    register_setting( 'stncWpKiosk_ExchangeConfig', 'stncWpKiosk_Exchange_Settings' );
    add_settings_section(
        'stncWpKiosk_Exchange_section',
        __( 'Doviz Altin Ayalari', 'wordpress' ),
        'stncWpKiosk_Exchange_Settings_section_callback',
        'stncWpKiosk_ExchangeConfig'
    );

    add_settings_field(
        'stncWpKiosk_text_field_dolar',
        __( 'Dolar', 'wordpress' ),
        'dolar_stncWpKiosk_text_field_render',
        'stncWpKiosk_ExchangeConfig',
        'stncWpKiosk_Exchange_section'
    );



    add_settings_field(
        'stncWpKiosk_text_field_euro',
        __( 'Euro', 'wordpress' ),
        'euro_stncWpKiosk_text_field_render',
        'stncWpKiosk_ExchangeConfig',
        'stncWpKiosk_Exchange_section'
    );

    add_settings_field(
        'stncWpKiosk_text_field_altin',
        __( 'Altin', 'wordpress' ),
        'altin_stncWpKiosk_text_field_render',
        'stncWpKiosk_ExchangeConfig',
        'stncWpKiosk_Exchange_section'
    );
    add_settings_field(
        'stncWpKiosk_text_field_ceyrek_altin',
        __( 'Ceyrek Altin', 'wordpress' ),
        'ceyrek_altin_stncWpKiosk_text_field_render',
        'stncWpKiosk_ExchangeConfig',
        'stncWpKiosk_Exchange_section'
    );



    add_settings_field(
        'stncWpKiosk_select_field_1',
        __( 'Our Field 1 Title', 'wordpress' ),
        'stnc_api_select_field_1_render',
        'stncWpKiosk_ExchangeConfig',
        'stncWpKiosk_Exchange_section'
    );
}

function dolar_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Exchange_Settings' );
    ?>
    <input type='text' name='stncWpKiosk_Exchange_Settings[stncWpKiosk_text_field_dolar]' value='<?php echo $options['stncWpKiosk_text_field_dolar']; ?>'>
    <?php
}


function euro_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Exchange_Settings' );
    ?>
    <input type='text' name='stncWpKiosk_Exchange_Settings[stncWpKiosk_text_field_euro]' value='<?php echo $options['stncWpKiosk_text_field_euro']; ?>'>
    <?php
}

function altin_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Exchange_Settings' );
    ?>
    <input type='text' name='stncWpKiosk_Exchange_Settings[stncWpKiosk_text_field_altin]' value='<?php echo $options['stncWpKiosk_text_field_altin']; ?>'>
    <?php
}

function ceyrek_altin_stncWpKiosk_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Exchange_Settings' );
    ?>
    <input type='text' name='stncWpKiosk_Exchange_Settings[stncWpKiosk_text_field_ceyrek_altin]' value='<?php echo $options['stncWpKiosk_text_field_ceyrek_altin']; ?>'>
    <?php
}


function stnc_api_select_field_1_render(  ) {
    $options = get_option( 'stncWpKiosk_Exchange_Settings' );
    ?>
    <select name='stncWpKiosk_Exchange_Settings[stncWpKiosk_select_field_1]'>
        <option value='1' <?php selected( $options['stncWpKiosk_select_field_1'], 1 ); ?>>Option 1</option>
        <option value='2' <?php selected( $options['stncWpKiosk_select_field_1'], 2 ); ?>>Option 2</option>
    </select>

<?php
}

function stncWpKiosk_Exchange_Settings_section_callback(  ) {
    echo __( 'bu konuda ayrintili bilgi icin bu sayfaya bakiniz ', 'wordpress' );
}

function stncWpKiosk_config_doviz_altin_ayarlari(  ) {
    ?>
    <form action='options.php' method='post'>
        <?php
        settings_fields( 'stncWpKiosk_ExchangeConfig' );
        do_settings_sections( 'stncWpKiosk_ExchangeConfig' );
        submit_button();
        ?>
    </form>
    <?php
}