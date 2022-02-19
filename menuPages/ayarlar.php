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

*/

function stncForm_adminMenu_About_contentsTest(){

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
          <a href="?post_type=stnc_kiosk&page=stncFullPage&tab=yenileme" class="nav-tab <?php if($tab==='yenileme'):?>nav-tab-active<?php endif; ?>">Yenileme Ayarlari</a>
          <a href="?post_type=stnc_kiosk&page=stncFullPage&tab=tricks" class="nav-tab <?php if($tab==='tricks'):?>nav-tab-active<?php endif; ?>">Tools</a>
        </nav>
        <div class="tab-content">
        <?php switch($tab) :
          case 'yenileme':
            echo 'yenileme ayalar';
            break;
          case 'tricks':
            echo 'tricks';
            break;
          default:
          doviz_altin_ayarlari(); 

            break;
        endswitch; ?>
        </div>
      </div>


    <?php
}


function doviz_altin_ayarlari() {  
    ?>
    <h1> <?php esc_html_e( 'Welcome to my custom admin page.', 'my-plugin-textdomain' ); ?> </h1>
    <form method="POST" action="options.php">
    <?php
    settings_fields( 'sample-page' );
    do_settings_sections( 'sample-page' );

    settings_fields( 'sample-page2' );
    do_settings_sections( 'sample-page2' );

    submit_button();
    ?>
    </form>
    <?php
}


add_action( 'admin_init', 'my_settings_init' );

function my_settings_init() {

    add_settings_section(
        'sample_page_setting_section',
        __( 'Custom settings', 'my-textdomain' ),
        'my_setting_section_callback_function',
        'sample-page'
    );

		add_settings_field(
		   'my_setting_field',
		   __( 'My custom setting field', 'my-textdomain' ),
		   'my_setting_markup',
		   'sample-page',
		   'sample_page_setting_section'
		);

		register_setting( 'sample-page', 'my_setting_field' );

////////(((((((((((((((((((((((*************)))))))))))))))))))))))
        add_settings_section(
            'sample_page_setting_section2',
            __( 'Custom settings222', 'my-textdomain' ),
            'my_setting_section_callback_function',
            'sample-page2'
        );
    
            add_settings_field(
               'my_setting_field2',
               __( 'My custom setting field2222', 'my-textdomain' ),
               'my_setting_markup2',
               'sample-page2',
               'sample_page_setting_section2'
            );
    
            register_setting( 'sample-page2', 'my_setting_field2' );  
}





function my_setting_section_callback_function() {
    echo '<p>Intro text for our settings section</p>';
}


function my_setting_markup() {
    ?>
    <label for="my-input"><?php _e( 'My Input' ); ?></label>
    <input type="text" id="my_setting_field" name="my_setting_field" value="<?php echo get_option( 'my_setting_field' ); ?>">
    <?php
}


function my_setting_markup2() {
    ?>
    <label for="my-input"><?php _e( 'My Input2' ); ?></label>
    <input type="text" id="my_setting_field2" name="my_setting_field2" value="<?php echo get_option( 'my_setting_field2' ); ?>">
    <?php
}