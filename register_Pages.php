<?php
function stnc_wp_kiosk_configuration_menu()
{
    add_submenu_page( "edit.php?post_type=stnc_kiosk", 'Ayarlar', 'Ayarlar', 'manage_options', 'stncKioskConfig', 'stnc_wp_kiosk_configuration_content' ); ////burası alt kısım onun altında olacak olan bolum için 
    add_submenu_page( "edit.php?post_type=stnc_kiosk", 'Hakkında', 'Hakkında', 'manage_options', 'stncKioskAbout', 'stnc_wp_kiosk_about' ); ////burası alt kısım onun altında olacak olan bolum için 

}
add_action('admin_menu', 'stnc_wp_kiosk_configuration_menu');