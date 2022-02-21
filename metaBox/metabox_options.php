<?php
$stnc_wp_kiosk_themeName = 'stnc_wp_kiosk-';//for include data
$stnc_wp_kiosk_prefix_kiosk = $stnc_wp_kiosk_themeName . "kiosk_Setting_";
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
			'title' => __('Lutfen eklediginiz resimin televizyon ekranlarinda iyi gorunmesi icin <span style="color:red">1815 px(genislik) * 2510 px (yukseklik) de</span> olmasina dikkat ediniz
			. <br> Resimi sistem tarafindan 1815*2510 px ayarlanacak sekilde yaptim ama belirtilen genislik ve yukseklikden dusuk olursa resim kalitesi televizyonda kotu gorunecektir.', 'stnc_wp_kiosk-lang'),
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

	
		// array(
		// 	'name' => $stnc_wp_kiosk_prefix_kiosk . 'adress',
		// 	'title' => __('Adress ', 'chthemes-kiosk'),
		// 	'type' => 'upload',
		// 	'description' => __("Enter Adress", 'chthemes-kiosk'),
		// 	'style' => '',
		// 	'class' => '',
		// 	'class_li' => '',
		// ),
	



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
			'title' => __('Ek Açıklama', 'chthemes-kiosk'),
			'type' => 'textarea',
			'description' => '',
			'style' => '',
			'class' => '',
			'class_li' => '',
		),



	)
);