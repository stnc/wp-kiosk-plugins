<?php
add_action( 'admin_init', 'stncWpKiosk_Exchange_Settings_init' );

function stncWpKiosk_Exchange_Settings_init(  ) {
    register_setting( 'stncWpKiosk_ExchangeConfig', 'stncWpKiosk_Exchange_Settings' );
    add_settings_section(
        'stp_api_stpPlugin_section',
        __( 'Our Section Title', 'wordpress' ),
        'stncWpKiosk_Exchange_Settings_section_callback',
        'stncWpKiosk_ExchangeConfig'
    );

    add_settings_field(
        'stncWpKiosk_text_field_dolar',
        __( 'Dolar', 'wordpress' ),
        'dolar_text_field_render',
        'stncWpKiosk_ExchangeConfig',
        'stp_api_stpPlugin_section'
    );



    add_settings_field(
        'stncWpKiosk_text_field_euro',
        __( 'Euro', 'wordpress' ),
        'euro_text_field_render',
        'stncWpKiosk_ExchangeConfig',
        'stp_api_stpPlugin_section'
    );



    add_settings_field(
        'stncWpKiosk_select_field_1',
        __( 'Our Field 1 Title', 'wordpress' ),
        'stp_api_select_field_1_render',
        'stncWpKiosk_ExchangeConfig',
        'stp_api_stpPlugin_section'
    );
}

function dolar_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Exchange_Settings' );
    ?>
    <input type='text' name='stncWpKiosk_Exchange_Settings[stncWpKiosk_text_field_dolar]' value='<?php echo $options['stncWpKiosk_text_field_dolar']; ?>'>
    <?php
}


function euro_text_field_render(  ) {
    $options = get_option( 'stncWpKiosk_Exchange_Settings' );
    ?>
    <input type='text' name='stncWpKiosk_Exchange_Settings[stncWpKiosk_text_field_euro]' value='<?php echo $options['stncWpKiosk_text_field_euro']; ?>'>
    <?php
}

function stp_api_select_field_1_render(  ) {
    $options = get_option( 'stncWpKiosk_Exchange_Settings' );
    ?>
    <select name='stncWpKiosk_Exchange_Settings[stncWpKiosk_select_field_1]'>
        <option value='1' <?php selected( $options['stncWpKiosk_select_field_1'], 1 ); ?>>Option 1</option>
        <option value='2' <?php selected( $options['stncWpKiosk_select_field_1'], 2 ); ?>>Option 2</option>
    </select>

<?php
}

function stncWpKiosk_Exchange_Settings_section_callback(  ) {
    echo __( 'This Section Description', 'wordpress' );
}

function stp_api_options_page(  ) {
    ?>
    <form action='options.php' method='post'>
        <h2>Sitepoint Settings API Admin Page</h2>
        <?php
        settings_fields( 'stncWpKiosk_ExchangeConfig' );
        do_settings_sections( 'stncWpKiosk_ExchangeConfig' );
        submit_button();
        ?>
    </form>
    <?php
}