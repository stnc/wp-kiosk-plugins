
<?php 

function stnc_wp_kiosk_staff_options_()
{
	include('metabox_staff_options.php');
	$ch_post_options_staff['0'] = $stnc_wp_kiosk_OptionsPageSettingstaff;

	$engine_page_staff = new stnc_wp_kiosk_metabox_engine_staff_member($ch_post_options_staff, 'stnc_wp_kiosk-StaffLocation-Setting', true);


}


if ($stnc_wp_kiosk_post_type == 'staff') {
//staff
	stnc_wp_kiosk_staff_options_();
}


if ($stnc_wp_kiosk_post_type_post == 'staff') {
//staff
	stnc_wp_kiosk_staff_options_();
}


function stnc_wp_kiosk_staff_options_locaiton()
{
	include('metabox_staff_options.php');
	$ch_post_options_staff['0'] = $stnc_wp_kiosk_OptionsPageSettingstaffLocaiton;
	$engine_page_staff = new stnc_wp_kiosk_metabox_engine_staff_member($ch_post_options_staff, 'stnc_wp_kiosk-StaffLocation-Setting', false);

}


if ($stnc_wp_kiosk_post_type == 'locations') {
//staff
	stnc_wp_kiosk_staff_options_locaiton();
}


if ($stnc_wp_kiosk_post_type_post == 'locations') {
//staff
	stnc_wp_kiosk_staff_options_locaiton();
}



