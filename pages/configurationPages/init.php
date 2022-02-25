<?php
function stnc_wp_kiosk_configuration_content(){


    if ( ! current_user_can( 'manage_options' ) ) {
        return;
      }

      //Get the active tab from the $_GET param
      $default_tab = null;
      $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
    
      ?>
      <!-- Our admin page content should all be inside .wrap -->
      <div class="wrap">
        <!-- Print the page title -->
        <h1>Teknopark Ekranlar Ayarlamalar Bolumu <?php //echo esc_html( get_admin_page_title() ); ?></h1>
        <!-- Here are our tabs -->
        <nav class="nav-tab-wrapper">
          <a href="?post_type=stnc_kiosk&page=stncKioskConfig" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Döviz & Altın Ayarları</a>
          <a href="?post_type=stnc_kiosk&page=stncKioskConfig&tab=hava" class="nav-tab <?php if($tab==='hava'):?>nav-tab-active<?php endif; ?>">Hava Durumu Ayarları</a>
          <a href="?post_type=stnc_kiosk&page=stncKioskConfig&tab=other" class="nav-tab <?php if($tab==='other'):?>nav-tab-active<?php endif; ?>">Diğer Ayarlar</a>
        </nav>
        <div class="tab-content">
        <?php switch($tab) :
          case 'hava':
             stncWpKiosk_config_weather();
            break;
          case 'other':
            stncWpKiosk_config_Other();
            break;
          default:
          stncWpKiosk_config_exchange(); 
            break;
        endswitch; ?>
        </div>
      </div>
    <?php
}
require ('exchange_tab.php'); 
require ('weather_tab.php'); 
require ('other_tab.php'); 