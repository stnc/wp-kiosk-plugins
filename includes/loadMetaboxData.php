<?php 
function stnc_wp_kiosk_staff_options_()
{
	include('metabox_staff_options.php');
	$ch_post_options_staff['0'] = $stnc_wp_kiosk_OptionsPageSettingstaff;

	$engine_page_staff = new stnc_wp_kiosk_metabox_engine_staff_member($ch_post_options_staff, 'stnc_wp_kiosk-StaffLocation-Setting', true);


}


if ($stnc_wp_kiosk_post_type == 'stnc_kiosk') {
//staff
	stnc_wp_kiosk_staff_options_();
}


if ($stnc_wp_kiosk_post_type_post == 'stnc_kiosk') {
//staff
	stnc_wp_kiosk_staff_options_();
}