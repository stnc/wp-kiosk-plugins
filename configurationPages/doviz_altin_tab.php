<?php
function doviz_altin_ayarlari()
{
?>
    <form method="POST" action="options.php">
        <?php
        ///-***-Dolar section--***-/////
        settings_fields('dolar-config-save-page');
        do_settings_sections('dolar-config-save-page');

       

        submit_button();
        ?>
    </form>
<?php
}


add_action('admin_init', 'exchange_settings_init');

function exchange_settings_init()
{

    add_settings_section(
        'dolar_setting_section',
        __('Doviz Ayarlari', 'my-textdomain'),
        'dolar_section_callback_function',
        'dolar-config-save-page'
    );

    add_settings_field(
        'stnc_kiosk_dolar_setting_field',
        __('Dolar Kuru', 'my-textdomain'),
        'dolar_setting_markup',
        'dolar-config-save-page',
        'dolar_setting_section'
    );

    register_setting('dolar-config-save-page', 'stnc_kiosk_dolar_setting_field');


  

}
///--------------------------------------Dolar section----------------------------------------/////

function dolar_section_callback_function()
{
    echo '<p style="color:red">Buradaki ayarlar hakkinda daha fazla bilgi icin bu sayfayi ziyaret ediniz</p>';
}


function dolar_setting_markup()
{
?>
    <input type="text" id="stnc_kiosk_dolar_setting_field" name="stnc_kiosk_dolar_setting_field" value="<?php echo get_option('stnc_kiosk_dolar_setting_field'); ?>">
<?php
}



