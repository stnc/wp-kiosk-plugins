<?php
$stnc_wp_kiosk_themeName = 'stnc_wp_kiosk-';//for include data
$stnc_wp_kiosk_prefix_staff = $stnc_wp_kiosk_themeName . "staffSetting_";
$stnc_wp_kiosk_OptionsPageSettingstaff = array(
	'name' => $stnc_wp_kiosk_prefix_staff . 'meta-box-page',
	'nonce' => 'st_studio_staff',
	'title' => __('Doctor Info', 'chthemes-staff'),
	'page' => 'staff',
	//'context' => 'side',
	'context' => 'normal',
	'priority' => 'default',
	'class' => '',
	'style' => '',
	'title_h2' => true,
	'fields' => array(

		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'title',
			'title' => __('Title', 'chthemes-staff'),
			'type' => 'text',
			'description' => __("Enter title ", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),
		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'gender',
			'title' => __('Gender of doctor', 'chthemes-staff'),
			'type' => 'select',
			'description' => __("Select gender", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
			'options' => array(
				'male' => __('Male', 'stnc_wp_kiosk-lang'),
				'female' => __('Female', 'stnc_wp_kiosk-lang'),
			)
		),

		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'birth',
			'title' => __('Date of birth', 'chthemes-staff'),
			'type' => 'text',
			'description' => __("Enter date of birth.", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),
		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'adress',
			'title' => __('Adress ', 'chthemes-staff'),
			'type' => 'upload',
			'description' => __("Enter Adress", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),
		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'email',
			'title' => __('Email', 'chthemes-staff'),
			'type' => 'text',
			'description' => __("Enter email adress", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),
		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'phone',
			'title' => __('Phone', 'chthemes-staff'),
			'type' => 'text',
			'description' => __("Enter phone", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),

		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'website',
			'title' => __('Website', 'chthemes-staff'),
			'type' => 'text',
			'description' => __("Enter staff member's Google+ profile URL.", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),

		array(
			'name' => 'page_header_type_info',
			'title' => __('Professional Skills', 'stnc_wp_kiosk-lang'),
			'type' => 'info',
			'description' => '',
			'style' => '',
			'class' => '',
			'class_li' => '',
			'extra' => '',
		),
		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'expertise',
			'title' => __('Expertise', 'chthemes-staff'),
			'type' => 'text',
			'description' => '',
			'style' => '',
			'class' => '',
			'class_li' => '',
		),
		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'education',
			'title' => __('Education', 'chthemes-staff'),
			'type' => 'textarea',
			'description' => '',
			'style' => '',
			'class' => '',
			'class_li' => '',
		),


		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'degree',
			'title' => __('Degree', 'chthemes-staff'),
			'type' => 'text',
			'description' => '',
			'style' => '',
			'class' => '',
			'class_li' => '',
		),


		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'experience',
			'title' => __('Experience', 'chthemes-staff'),
			'type' => 'text',
			'description' => '',
			'style' => '',
			'class' => '',
			'class_li' => '',
		),


		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'profession',
			'title' => __('Profession', 'chthemes-staff'),
			'type' => 'text',
			'description' => '',
			'style' => '',
			'class' => '',
			'class_li' => '',
		),


	)
);


/*LOCATIONS */

$stnc_wp_kiosk_themeName = 'stnc_wp_kiosk-';//for include data
$stnc_wp_kiosk_prefix_staff = $stnc_wp_kiosk_themeName . "staffLocation-";
$stnc_wp_kiosk_OptionsPageSettingstaffLocaiton = array(
	'name' => $stnc_wp_kiosk_prefix_staff . 'meta-box-page',
	'nonce' => 'st_studio_staff',
	'title' => __('Location Info', 'chthemes-staff'),
	'page' => 'locations',
	'context' => 'normal',
	'priority' => 'default',
	'class' => '',
	'style' => '',
	'title_h2' => true,
	'fields' => array(

		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'adress',
			'title' => __('Adress', 'chthemes-staff'),
			'type' => 'textarea',
			'description' => __("Enter adress info", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),
		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'zipCode',
			'title' => __('Zip Code', 'chthemes-staff'),
			'type' => 'text',
			'description' => __("Enter zip code", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),


		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'email',
			'title' => __('Email', 'chthemes-staff'),
			'type' => 'text',
			'description' => __("Enter email adress", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),
		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'phone',
			'title' => __('Phone', 'chthemes-staff'),
			'type' => 'text',
			'description' => __("Enter phone", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),

		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'website',
			'title' => __('Website', 'chthemes-staff'),
			'type' => 'text',
			'description' => __("Enter staff member's Google+ profile URL.", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),

		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'latitude',
			'title' => __('Lat,Long', 'chthemes-staff'),
			'type' => 'text',
			'description' => __("Enter Latitude and Longitude eq 40.741895,-73.989308 / web site  https://www.gps-coordinates.net/  ", 'chthemes-staff'),
			'style' => '',
			'class' => '',
			'class_li' => '',
		),
		
	

		array(
			'name' => $stnc_wp_kiosk_prefix_staff . 'media',
			'title' => __('Images', 'stnc_wp_kiosk-lang'),
			'type' => 'media-gallery',
			'description' => __('Select a custom uploaded image.', 'chthemes-staff'),
			'style' => 'color:#fff;box-shadow:none;',
			'extra' => '',
			'class_li' => '',
			'class' => '',
		)


	)
);
