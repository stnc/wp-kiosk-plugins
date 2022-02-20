<?php
/*
slide genel gorunme suresi 

slidelar hangi tipe gore siralansin tarih id 

hava durumu gecis suresi 

6 gunluk hava durumu olsun mu 

doviz altin sekmesini gosterme onun yerine 6 gunluk hava durumu olsun 

dolar 
euro
altin
ceyrek altin


unutma video ise onun testinin yapilmasi lazim 
*/

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
          <a href="?post_type=stnc_kiosk&page=stncFullPage" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Doviz & Altin Ayarlari</a>
          <a href="?post_type=stnc_kiosk&page=stncFullPage&tab=hava" class="nav-tab <?php if($tab==='hava'):?>nav-tab-active<?php endif; ?>">Hava Durumu Ayarlari</a>
          <a href="?post_type=stnc_kiosk&page=stncFullPage&tab=yenileme" class="nav-tab <?php if($tab==='yenileme'):?>nav-tab-active<?php endif; ?>">Yenileme Ayarlari</a>
          <a href="?post_type=stnc_kiosk&page=stncFullPage&tab=tricks" class="nav-tab <?php if($tab==='tricks'):?>nav-tab-active<?php endif; ?>">Tools</a>
        </nav>
        <div class="tab-content">
        <?php switch($tab) :
          case 'hava':
             stncWpKiosk_config_weather();

            break;
          case 'yenileme':
            echo 'yenileme ayalari';
            break;
          case 'tricks':
            echo 'tricks';
            break;
          default:
          //
          stncWpKiosk_config_exchange(); 

            break;
        endswitch; ?>
        </div>
      </div>


    <?php
}
require ('exchange_tab.php'); 
require ('weather_tab.php'); 