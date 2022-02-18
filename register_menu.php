<?php

function stnc_wp_kiosk_admin_menu()
{
    add_submenu_page( "edit.php?post_type=stnc_kiosk", 'Ayarlar', 'Ayarlar', 'manage_options', 'stncFullPage', 'stncForm_adminMenu_About_contentsTest' ); ////burası alt kısım onun altında olacak olan bolum için 

}

add_action('admin_menu', 'stnc_wp_kiosk_admin_menu');