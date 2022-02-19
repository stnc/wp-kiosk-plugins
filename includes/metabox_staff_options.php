<?php
$stnc_wp_kiosk_themeName = 'stnc_wp_kiosk-';//for include data
$stnc_wp_kiosk_prefix_staff = $stnc_wp_kiosk_themeName . "staffSetting_";
$stnc_wp_kiosk_OptionsPageSettingstaff = array(
	'name' => $stnc_wp_kiosk_prefix_staff . 'meta-box-page',
	'nonce' => 'st_studio_staff',
	'title' => __('EK Bilgiler', 'chthemes-staff'),
	'page' => 'stnc_kiosk',
	//'context' => 'side',
	'context' => 'normal',
	'priority' => 'default',
	'class' => '',
	'style' => '',
	'title_h2' => true,
	'fields' => array(


		// array(
		// 	'name' => $stnc_wp_kiosk_prefix_staff . 'gender',
		// 	'title' => __('Gender of doctor', 'chthemes-staff'),
		// 	'type' => 'select',
		// 	'description' => __("Select gender", 'chthemes-staff'),
		// 	'style' => '',
		// 	'class' => '',
		// 	'class_li' => '',
		// 	'options' => array(
		// 		'male' => __('Male', 'stnc_wp_kiosk-lang'),
		// 		'female' => __('Female', 'stnc_wp_kiosk-lang'),
		// 	)
		// ),

	
		// array(
		// 	'name' => $stnc_wp_kiosk_prefix_staff . 'adress',
		// 	'title' => __('Adress ', 'chthemes-staff'),
		// 	'type' => 'upload',
		// 	'description' => __("Enter Adress", 'chthemes-staff'),
		// 	'style' => '',
		// 	'class' => '',
		// 	'class_li' => '',
		// ),
	

		// array(
		// 	'name' => 'page_header_type_info',
		// 	'title' => __('Professional Skills', 'stnc_wp_kiosk-lang'),
		// 	'type' => 'info',
		// 	'description' => '',
		// 	'style' => '',
		// 	'class' => '',
		// 	'class_li' => '',
		// 	'extra' => '',
		// ),

		// array(
		// 	'name' => $stnc_wp_kiosk_prefix_staff . 'expertise',
		// 	'title' => __('Expertise', 'chthemes-staff'),
		// 	'type' => 'text',
		// 	'description' => '',
		// 	'style' => '',
		// 	'class' => '',
		// 	'class_li' => '',
		// ),
		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'explanation',
			'title' => __('Ek Açıklama', 'chthemes-staff'),
			'type' => 'textarea',
			'description' => '',
			'style' => '',
			'class' => '',
			'class_li' => '',
		),



	)
);