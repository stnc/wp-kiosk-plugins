<?php 

function stnc_wp_kiosk_kiosk_options_()
{
	include('metabox_options.php');
	$ch_post_options_kiosk['0'] = $stnc_wp_kiosk_OptionsPageSettingkiosk;

	$engine_page_kiosk = new stnc_wp_metabox_engine($ch_post_options_kiosk, 'stnc_wp_kiosk-kioskLocation-Setting', true);


}


if ($stnc_wp_kiosk_post_type == 'stnc_kiosk') {
//kiosk
	stnc_wp_kiosk_kiosk_options_();
}


if ($stnc_wp_kiosk_post_type_post == 'stnc_kiosk') {
//kiosk
	stnc_wp_kiosk_kiosk_options_();
}