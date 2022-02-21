<?php
$stnc_wp_kiosk_themeName = 'stnc_wp_kiosk';//for include data
$stnc_wp_kiosk_prefix_kiosk = $stnc_wp_kiosk_themeName . "_Metabox_";
$stnc_wp_kiosk_OptionsPageSettingkiosk = array(
	'name' => $stnc_wp_kiosk_prefix_kiosk . 'meta-box-page',
	'nonce' => 'st_studio_kiosk',
	'title' => __('EK Bilgiler', 'chthemes-kiosk'),
	'page' => 'stnc_kiosk',
	//'context' => 'side',
	'context' => 'normal',
	'priority' => 'default',
	'class' => '',
	'style' => '',
	'title_h2' => true,
	'fields' => array(

		array(
			'name' => 'page_header_type_info',
			'title' => __('Lütfen eklediğiniz resimin televizyon ekranlarında iyi görünmesi icin <span style="color:red">1815 px(genislik) * 2510 px (yukseklik) de</span> olmasına dikkat ediniz
			. <br> Resimi sistem tarafindan 1815*2510 px e tekrar boyutlandırılacak şekilde yaptim ama belirtilen genişlik ve yükseklikden düşük olursa resim kalitesi televizyonda kötü görünecektir.', 'stnc_wp_kiosk-lang'),
			'type' => 'info',
			'description' => '',
			'style' => '',
			'class' => '',
			'class_li' => '',
			'extra' => '',
		),

		// array(
		// 	'name' => $stnc_wp_kiosk_prefix_kiosk . 'gender',
		// 	'title' => __('Gender of doctor', 'chthemes-kiosk'),
		// 	'type' => 'select',
		// 	'description' => __("Select gender", 'chthemes-kiosk'),
		// 	'style' => '',
		// 	'class' => '',
		// 	'class_li' => '',
		// 	'options' => array(
		// 		'male' => __('Male', 'stnc_wp_kiosk-lang'),
		// 		'female' => __('Female', 'stnc_wp_kiosk-lang'),
		// 	)
		// ),

	
		array(
			'name' => $stnc_wp_kiosk_prefix_kiosk . 'video',
			'title' => __('Video', 'chthemes-kiosk'),
			'type' => 'upload',
			'button_text' => 'Video Yükle / Seç',
			'description' => __("Eğer video Eklenecekse burayı kullanınız, eğer video eklenmişse oncelik video da olacaktır", 'chthemes-kiosk'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),
	
		// array(
		// 	'name' => $stnc_wp_kiosk_prefix_kiosk . 'expertise',
		// 	'title' => __('Expertise', 'chthemes-kiosk'),
		// 	'type' => 'text',
		// 	'description' => '',
		// 	'style' => '',
		// 	'class' => '',
		// 	'class_li' => '',
		// ),
		array(
			'name' => $stnc_wp_kiosk_prefix_kiosk . 'explanation',
			'title' => __('Ek Açıklama / Not', 'chthemes-kiosk'),
			'type' => 'textarea',
			'description' => 'Ekranda gösterilmez sadece not yazmak içindir',
			'style' => '',
			'class' => '',
			'class_li' => '',
		),



	)
);